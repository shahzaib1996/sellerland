<?php

require('coinpayments/coinpayments.inc.php');

class Main extends CI_Controller
{
    public function index()
    {
        $this->view();
    }
    public function data(){

        if(isset($_GET['search']) || isset($_GET['vendor'])) {
            // print_r($_GET['search']);
            // die();
            $data['product'] = $this->md->search_products($_GET['search'],$_GET['vendor']); 
        } else {
            $data['product'] = $this->md->products_with_vendor();
        }

        $data['web_login'] = $this->session->userdata('web_login');
        $data['vendor'] = $this->md->fetch('vendor');
        // $data['product'] = $this->md->fetch('product');
        // $data['product'] = $this->md->products_with_vendor(); // this is moved to search conditions
        $data['single_vendor'] = $this->md->fetch('vendor',array('id'=>$this->uri->segment(4)));
        // $data['feedback'] = $this->md->fetch('feedback',array('vendor_id'=>$this->uri->segment(4)));
        $data['feedback'] = $this->md->fetch_vender_feedback( $this->uri->segment(4) ); //args vender_id
        $data['vendor_product'] = $this->md->fetch('product',array('user_id'=>$this->uri->segment(4)));
        $data['single_coupons'] = $this->md->fetch('coupons',array('vender_id'=>$this->uri->segment(4)));
        // $data['single_product'] = $this->md->fetch('product',array('id'=>$this->uri->segment(5),'user_id'=>$this->uri->segment(4)));
        $data['single_product'] = $this->md->single_product_with_vendor($this->uri->segment(5) ); //args(productID)
        // print_r($data['single_product']);
        // die();
        $data['single_feedback'] = $this->md->fetch('feedback',array('pro_id'=>$this->uri->segment(5),'vendor_id'=>$this->uri->segment(4)));
        return $data;
    }
    public function view($page='index')
    {   

        if($page == 'signin' OR $page== 'signup'){
            $this->load->view('selly/'.$page);
        }elseif($page == 'vendor-groups' OR $page == 'vendor' OR $page=='vendor-brand-item-view' OR $page=='all-products' OR $page == 'vendor-contact' OR $page == 'vendor-store' OR $page=='all-stores' OR $page=='vendor-feedback' OR $page=='coin_checkout'){
            if(!empty($this->session->userdata('web_login'))) {
                $data = $this->data();
                
                if( count( $data['single_product'] ) == 0  && $page == 'vendor-brand-item-view') {
                    redirect('Main/view/all-products');
                }

                $this->load->view('selly/header',$data);
                $this->load->view('selly/'.$page);
                $this->load->view('selly/footer');
            }else{
                redirect('Main/view/signin');
            }
        } else if($page == 'myqueries') {
            $user_id = $this->session->userdata('web_login')[0]['id'];

            $data['web_login'] = $this->session->userdata('web_login');
            $data['myqueries'] = $this->md->fetch_user_query( $user_id );
            if(!empty($this->session->userdata('web_login'))) {
                $this->load->view('selly/header',$data);
                $this->load->view('selly/'.$page);
                $this->load->view('selly/footer');
            }else{
                redirect('Main/view/signin');
            }

        } else if($page == 'openmyquery') {
            $query_id = $this->uri->segment(4);
            $data['web_login'] = $this->session->userdata('web_login');

            $data['client_query'] = $this->md->fetch_query_detail( $query_id );
            $data['query_reply'] = $this->md->fetch_query_reply( $query_id );
            if(!empty($this->session->userdata('web_login'))) {
                $this->load->view('selly/header',$data);
                $this->load->view('selly/'.$page);
                $this->load->view('selly/footer');
            }else{
                redirect('Main/view/signin');
            }
            
        } else if ($page == 'coin_checkout') {
            $cp_details = $this->md->fetch('admin',[ 'id'=>1 ])[0];
            $vendor = $this->md->fetch('vendor',[ 'id'=>$this->uri->segment(4) ])[0];
            $product = $this->md->fetch('product',[ 'id'=>$this->uri->segment(5) ])[0];
            $user = $this->md->fetch('user',[ 'id'=>$this->session->userdata('web_login')[0]['id'] ])[0];
             $this->md->insert('orders',
                [
                    'title' => $product['title'].' - '.$vendor['store_name'],
                    'price' => $data['total_price'],
                    'qty'   => $data['quantity'],
                    'product_id' => $product['id'],    
                    'vendor_id' => $vendor['id'],
                    'status' => "pending"
                ]

            );

            $data['single_product'] = $this->md->single_product_with_vendor($this->uri->segment(5) );
            $data['cp_details'] = $this->md->fetch('admin',[ 'id'=>1 ])[0];
            if(!empty($this->session->userdata('web_login'))) {
                $this->load->view('selly/header',$data);
                $this->load->view('selly/'.$page);
                $this->load->view('selly/footer');
            }else{
                redirect('Main/view/signin');
            }
        } else{
            $this->load->view('selly/header');
            $this->load->view('selly/'.$page);
            $this->load->view('selly/footer');
        }
    }
    public function destroy(){
        $this->session->unset_userdata('web_login');
        redirect('Main/index');
    }
    public function signup(){
        $data['username'] = $this->input->post('username');
        $data['email'] = $this->input->post('email');
        $data['password'] = $this->input->post('password');
        $this->md->insert('user',$data);
        redirect('Main/view/signin');
    }
    public function login(){
      $data = $this->md->fetch('user',$this->input->post());
      if(!empty($data)){
          $this->session->set_userdata('web_login',$data);
          redirect('Main/view/all-products');
      }else{
          redirect('Main/view/signin');
      }
    }
    public function feedback($pro_id,$user_id,$vendor_id){
//        var_dump($this->input->post('message'));
        $data['message'] = $this->input->post('message');
        $data['pro_id'] = $pro_id;
        $data['client_id'] = $user_id;
        $data['vendor_id'] = $vendor_id;
        $this->md->insert('feedback',$data);
        redirect('Main/view/vendor-brand-item-view/'.$vendor_id.'/'.$pro_id);
    }
    public function send_query(){
       // var_dump($this->input->post());
        // print_r($this->session->userdata('web_login')[0]['id']);
       // die();
        $data = $this->input->post();
        $data['vendor_id']= $this->uri->segment(3);
        $data['user_id']= $this->session->userdata('web_login')[0]['id'];
        $this->md->insert('client_query',$data);
        redirect('Main/view/vendor-contact/'.$this->uri->segment(3));
    }

    public function paypal($buy,$id){
        $this->load->view('products/buy/'.$id);
    }

    public function add_user_reply() {
        $data = $this->input->post();
 
        if( $this->uri->segment(3) != '' ) {

            $data_insert['user_id'] = $this->session->userdata('web_login')[0]['id'];
            $data_insert['vendor_id'] = '';
            $data_insert['client_query_id'] = $this->uri->segment(3);
            $data_insert['reply'] = $data['reply'];
            $this->md->insert('client_query_reply',$data_insert);
        }
        redirect('Main/view/openmyquery/'.$this->uri->segment(3));
    }


    public function coin_transaction_complete() {

        // print_r($this->input->post());
        // die();

        // $data =  $this->input->post();

        // $cps = new CoinPaymentsAPI();
        // $cps->Setup('407f4DE7bebb09b6FF8aA1f64cfcfD0DDF3751Bd44D22Cace9981d9F8c99C33e', 'aafa971b38e64a1e3af868e86fd9ea8c3476f14f352e0f7ec9313b952b9951a5');

        // $cp_details = $this->md->fetch('admin',[ 'id'=>1 ])[0];
        // $vendor = $this->md->fetch('vendor',[ 'id'=>$data['vendor_id'] ])[0];
        // $product = $this->md->fetch('product',[ 'id'=>$data['product_id'] ])[0];
        // $user = $this->md->fetch('user',[ 'id'=>$this->session->userdata('web_login')[0]['id'] ])[0];

        // // print_r($cp_details);
        // // die();

        // $req = array(
        //     'amount' => $data['total_price'],
        //     'currency1' => 'USD',
        //     'currency2' => $cp_details['coin'],
        //     'buyer_email' => $user['email'],
        //     'item_name' => $product['title'].' - '.$vendor['store_name'],
        //     'item_number' => $product['id'],
        //     'address' => $cp_details['coinpayment_merchant'], // leave blank send to follow your settings on the Coin Settings page
        //     'ipn_url' => site_url('/Main/cp_ipn_script'),
        // );

        
        // // print_r($req);
        // // die();

        // // See https://www.coinpayments.net/apidoc-create-transaction for all of the available fields            
        // $result = $cps->CreateTransaction($req);
        // if ($result['error'] == 'ok') {
        //     $le = php_sapi_name() == 'cli' ? "\n" : '<br />';
            
        //     $this->md->insert('orders',
        //         [
        //             'title' => $product['title'].' - '.$vendor['store_name'],
        //             'price' => $data['total_price'],
        //             'qty'   => $data['quantity'],
        //             'product_id' => $data['product_id'],    
        //             'vendor_id' => $data['vendor_id'],
        //             'transaction_id' => $result['result']['txn_id'],
        //             'cp_coin_amount' => $result['result']['amount'],
        //             'status' => "pending"
        //         ]

        //     );

        //     print 'Transaction created with ID: '.$result['result']['txn_id'].$le;
        //     print 'Buyer should send '.sprintf('%.08f', $result['result']['amount']).' BTC'.$le;
        //     print 'Status URL: '.$result['result']['status_url'].$le;



        // } else {
        //     print 'Error: '.$result['error']."\n";
        // }
        echo "Complete";

    }

    public function cp_ipn_script() {
        echo "CP IPN SCRIPT FUNCTION";
    }



}