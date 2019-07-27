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