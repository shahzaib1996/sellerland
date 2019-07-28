 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends CI_Controller{

    function  __construct(){
        parent::__construct();

        // Load paypal library & product model
        $this->load->library('paypal_lib');
        $this->load->model('product');
        $this->load->model('Md');
    }

    function success(){
        // Get the transaction data

        $order_id = $this->uri->segment(3);
        $order = $this->md->fetch('orders',[ 'id'=>$order_id ])[0];
        $vendor = $this->md->fetch('vendor',[ 'id'=>$order['vendor_id'] ])[0];
        $pay_details = $this->md->fetch('admin',[ 'id'=>1 ])[0];
        
        $paypalInfo = $this->input->get();

        $data['item_name']      = $paypalInfo['item_name'];
        $data['item_number']    = $paypalInfo['item_number'];
        $data['txn_id']         = $paypalInfo["tx"];
        $data['payment_amt']    = $paypalInfo["amt"];
        $data['currency_code']  = $paypalInfo["cc"];
        $data['status']         = $paypalInfo["st"];

        $this->md->update( 
            [ 'id'=> $order_id ] ,
            'orders', 
            [ 
                'transaction_id' => $data['txn_id'],
                'status' => 'pending',
                'note' => 'paid using paypal (Payment Amt: '.$data['payment_amt'].')'
            ] 
        );


        $msg = "Dear Sir,<br>";
            $msg .= "You have succefully paid ".$data['payment_amt']." for ".$data['item_name']." Store<br>";
            $msg .= "You order ID: ".$order_id." <br>";
            $msg .= "You Transaction ID: ".$data['txn_id']." <br>";
            


            $this->load->library('email');
            $this->email->from($vendor['email'], $vendor['store_name']);
            $this->email->to($post_data['user_email']);
            $this->email->cc($pay_details['email']);
            // $this->email->bcc('them@their-example.com');
            $this->email->subject('Selly - Payment Successfull For '.$product['title'].' - '.$vendor['store_name']);
            $this->email->message($msg);
            $this->email->send();



        // Pass the transaction data to view
        $this->load->view('paypal/success', $data);
    }

    function cancel(){
        // Load payment failed view
        $this->load->view('paypal/cancel');
    }

    function ipn(){
        // Paypal posts the transaction data
        $paypalInfo = $this->input->post();

        if(!empty($paypalInfo)){
            // Validate and get the ipn response
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);

            // Check whether the transaction is valid
            if($ipnCheck){
                // Insert the transaction data in the database
                $order_id        = $paypalInfo["custom"];
                $data['item_number']        = $paypalInfo["item_number"];
                $data['txn_id']            = $paypalInfo["txn_id"];
                $data['payment_amount']    = $paypalInfo["mc_gross"];
                $data['payment_currency']    = $paypalInfo["mc_currency"];
                $data['payer_email']    = $paypalInfo["payer_email"];
                $data['payment_status'] = $paypalInfo["payment_status"];

                if( $data['payment_status'] == 'Completed' ) {
                    $ps = 'paid';
                } else {
                    $ps = 'pending';
                }

                $this->md->update( 
                    [ 'id'=> $order[0]['id'] ] ,
                    'orders', 
                    [ 
                        'transaction_id' => $order_id ,
                        'status' => $ps,
                        'note' => $data['payment_status']
                    ] 
                );

                $this->product->insertTransaction($data);
            }
        }
    }
}