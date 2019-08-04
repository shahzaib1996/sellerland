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
        }elseif($page == 'vendor-groups' OR $page == 'vendor' OR $page=='vendor-brand-item-view' OR $page=='all-products' OR $page == 'vendor-contact' OR $page == 'vendor-store' OR $page=='all-stores' OR $page=='vendor-feedback' ){
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
            $post_data = $this->input->post();
            $cp_details = $this->md->fetch('admin',[ 'id'=>1 ])[0];
            $vendor = $this->md->fetch('vendor',[ 'id'=>$this->uri->segment(4) ])[0];
            $product = $this->md->fetch('product',[ 'id'=>$this->uri->segment(5) ])[0];
            $user = $this->md->fetch('user',[ 'id'=>$this->session->userdata('web_login')[0]['id'] ])[0];
            $total_price = $post_data['qty']*$product['price'];
            $coupon_used = $this->md->fetch('coupons',[ 'codes'=> $post_data['coupon'] ]);

            $cu = '';
            if( count($coupon_used) == 1 ) {
                if( $coupon_used[0]['discount'] < $total_price ) {
                    $cu = $coupon_used[0]['codes'];
                    $total_price = $total_price - $coupon_used[0]['discount'];
                }
            }

            //creating order
             $this->md->insert('orders',
                [
                    'title' => $product['title'].' - '.$vendor['store_name'],
                    'price' => $product['price'],
                    'total' => $total_price,
                    'qty'   => $post_data['qty'],
                    'product_id' => $product['id'],    
                    'vendor_id' => $vendor['id'],
                    'user_id' => $user['id'],
                    'user_email' => $post_data['user_email'],
                    'status' => "pending",
                    'payment_type' => 'coinpayment',
                    'coupon_used' => $cu
                ]

            );

            $data['order_id'] = $this->db->insert_id();

            $msg = "Dear Sir,<br>";
            $msg .= "You have Order ".$product['title']." From ".$vendor['store_name']." Store<br>";
            $msg .= "You order ID: ".$data['order_id']." <br>";
            $msg .= "<table border='1' cellpadding='10'> <tr> <td> Product </td> <td> Price </td> <td> Quantity </td> <td> Total </td> <td> Payment Method </td> </tr> </table>";
            $msg .= "<table> <tr> <td> ".$product['title']." </td> <td> $".$product['price']." </td> <td> ".$post_data['qty']." </td> <td> $".$total_price." </td> <td> coinpayment </td> </tr> </table>";


            $this->load->library('email');
            $this->email->from($vendor['email'], $vendor['store_name']);
            $this->email->to($post_data['user_email']);
            // $this->email->cc($cp_details['email']);
            // $this->email->bcc('them@their-example.com');
            $this->email->subject('You bought at Selly - '.$product['title'].' - '.$vendor['store_name']);
            $this->email->message($msg);
            $this->email->send();


            $data['single_product'] = $this->md->single_product_with_vendor($this->uri->segment(5) );
            $data['cp_details'] = $cp_details;
            $data['vendor'] = $vendor;
            // print_r($data);
            // die();
            if(!empty($this->session->userdata('web_login'))) {
                $this->load->view('selly/header',$data);
                $this->load->view('selly/'.$page);
                $this->load->view('selly/footer');
            }else{
                redirect('Main/view/signin');
            }
        }else if($page == 'vendor_products') {

            $vendor_id = $this->uri->segment(4);
            // echo $vendor_id;
            // die();
            if(isset($_GET['search']) ) {
                // print_r($_GET['search']);
                // die();
                $data['vendor_products'] = $this->md->search_vendor_products($_GET['search'],$vendor_id); 
            } else {
                $data['vendor_products'] = $this->md->search_vendor_products('',$vendor_id); 
            }

            $data['vendor'] =$this->md->fetch('vendor',[ 'id'=>$vendor_id ]);

            // print_r(count( $data['vendor'] ));
            // die();
            if( count( $data['vendor'] ) == 0 ) {
                Echo "<h1> <center> Vendor Doesn't Exist! </center> </h1>";
                die();
            }


            $this->load->view('selly/header',$data);
            $this->load->view('selly/vendor_products');
            $this->load->view('selly/footer');
               
        }
         else{
            $this->load->view('selly/header');
            $this->load->view('selly/'.$page);
            $this->load->view('selly/footer');
        }
    }
    public function destroy(){
        $this->session->unset_userdata('web_login');
        redirect('Main/index');
    }

    function getUserIpAddr(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public function signup(){
        $data['username'] = $this->input->post('username');
        $data['email'] = $this->input->post('email');
        $data['password'] = $this->input->post('password');
        $data['cpassword'] = $this->input->post('cpassword');
        $data['status'] = 'Active';
        $data['ip_address'] = $this->getUserIpAddr();

        $check_user = $this->md->check_user_signup( $data['username'], $data['email'] );

        if( $data['password'] != $data['cpassword'] ) {
            $this->session->set_flashdata('signuperror',' Password not matched! ');
            redirect('Main/view/signup');
        }


        if( count($check_user) > 0  ) {

            if( $check_user[0]['username'] == $data['username'] ) {
                $this->session->set_flashdata('signuperror',' Username Already Exist! ');
            } else if( $check_user[0]['email'] == $data['email'] ) {
                $this->session->set_flashdata('signuperror',' Email Already Exist! ');
            } else {
                $this->session->set_flashdata('signuperror',' Something went wrong! ');
            }

            redirect('Main/view/signup');
        }   


        $this->md->insert('user',$data);


        $u_id = $this->db->insert_id();
        // Email verification link generation 
            
            $user_details = $this->md->fetch('user',[ 'id' => $u_id ])[0];
            $verificationCode = hash('ripemd160', $user_details['created_at'] );

            $veriLink = site_url().'/main/verify_user/'.$u_id.'/'.$verificationCode;

            $cp_details = $this->md->fetch('admin',[ 'id'=>1 ])[0];
            $msg = "Dear ".$data['username'].",<br>";
            $msg .= "Please Verify your email by clicking the link below:<br>";
            $msg .= "Email Verification Link: ".$veriLink."<br>";
            $msg .= "Thank You ! <br>";
            $msg .= "Selly Admin.<br>";

                $this->load->library('email');
                $this->email->from($cp_details['email'], 'Selly Admin');
                $this->email->to($data['email']);
                // $this->email->cc($cp_details['email']);
                // $this->email->bcc('them@their-example.com');
                $this->email->subject('Selly - Your Email Verification Link');
                $this->email->message($msg);
                $this->email->send();

            $data['status'] = 2;
            $data['message'] = $user_details['username'].", Please check your email for verification";

            $this->load->view('pages/email_verification',$data);

        // redirect('Main/view/signin');
    }
    public function login(){
      $data = $this->md->fetch_user_login('user',$this->input->post());
      if(!empty($data)){
          $this->session->set_userdata('web_login',$data);
          redirect('Main/view/all-products');
      }else{
            $this->session->set_flashdata('loginerror',' username/password incorrect. ');
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

        //email 
        $vendor = $this->md->fetch('vendor', $data['vendor_id'] )[0];
        $cp_details = $this->md->fetch('admin',[ 'id'=>1 ])[0];
        $msg = "Dear ".$vendor['username'].",<br>";

            $msg .= "User created a query.<br>";
            $msg .= "User Email: ".$data['email']." <br>";
            $msg .= "Query Title: ".$data['title']." <br>";
            $msg .= "Query Message: ".$data['message']." <br>";
            $msg .= "Click here to reply: ".site_url('vender/view/client_query/'.$vendor['id'])." <br>";
            $msg .= " Regards, <br>";
            $msg .= " Selly Admin <br>";


            $this->load->library('email');
            $this->email->from($cp_details['email'], 'Selly Admin');
            $this->email->to($vendor['email']);
            // $this->email->cc($cp_details['email']);
            // $this->email->bcc('them@their-example.com');
            $this->email->subject('Selly - User Created Query');
            $this->email->message($msg);
            $this->email->send();
        // end email

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

    function errorAndDie($error_msg,$cp_debug_email) { 
        // global $cp_debug_email; 
        if (!empty($cp_debug_email)) { 
            $report = 'Error: '.$error_msg."\n\n"; 
            $report .= "POST Data\n\n"; 
            foreach ($_POST as $k => $v) { 
                $report .= "|$k| = |$v|\n"; 
            } 
            // mail($cp_debug_email, 'CoinPayments IPN Error', $report); 
            // print_r($report);
        } 
        die('IPN Error: '.$error_msg); 
    } 

    public function coin_ipn_handler() {
        // echo $this->uri->segment(3);die();
    $order = $this->md->fetch('orders',[ 'id'=>$this->uri->segment(3) ] );
    $cp_details = $this->md->fetch('admin',[ 'id'=>1 ])[0];
    $cp_merchant_id = $cp_details['coinpayment_merchant']; 
    $cp_ipn_secret = $cp_details['ipn_secret']; 
    // $cp_debug_email = 'shahzaibmehfooz420@gmail.com'; //for testing   
    $cp_debug_email = $cp_details['email'];   

    if( count($order) != 1 ) {
       $this->errorAndDie('No Order found!',$cp_debug_email);
    }

    // $this->md->update( 
    //         [ 'id'=> $order[0]['id'] ] ,
    //         'orders', 
    //         [ 
    //             'transaction_id' => '',
    //             'status' => 'test',
    //             'note' => ''
    //         ] 
    //     );

    // print_r($order[0]);

    // die();

    // These would normally be loaded from your database, the most common way is to pass the Order ID through the 'custom' POST field. 
    $order_currency = 'USD'; 
    $order_total = $order[0]['total']; 


    if (!isset($_POST['ipn_mode']) || $_POST['ipn_mode'] != 'hmac') { 
        $this->errorAndDie('IPN Mode is not HMAC',$cp_debug_email); 
    } 

    if (!isset($_SERVER['HTTP_HMAC']) || empty($_SERVER['HTTP_HMAC'])) { 
        $this->errorAndDie('No HMAC signature sent.',$cp_debug_email); 
    } 

    $request = file_get_contents('php://input'); 
    if ($request === FALSE || empty($request)) { 
        $this->errorAndDie('Error reading POST data',$cp_debug_email); 
    } 

    if (!isset($_POST['merchant']) || $_POST['merchant'] != trim($cp_merchant_id)) { 
        $this->errorAndDie('No or incorrect Merchant ID passed',$cp_debug_email); 
    } 

    $hmac = hash_hmac("sha512", $request, trim($cp_ipn_secret)); 
    if (!hash_equals($hmac, $_SERVER['HTTP_HMAC'])) { 
    //if ($hmac != $_SERVER['HTTP_HMAC']) { <-- Use this if you are running a version of PHP below 5.6.0 without the hash_equals function 
        $this->errorAndDie('HMAC signature does not match',$cp_debug_email); 
    } 
     
    // HMAC Signature verified at this point, load some variables. 

    $txn_id = $_POST['txn_id']; 
    $item_name = $_POST['item_name']; 
    $item_number = $_POST['item_number']; 
    $amount1 = floatval($_POST['amount1']); 
    $amount2 = floatval($_POST['amount2']); 
    $currency1 = $_POST['currency1']; 
    $currency2 = $_POST['currency2']; 
    $status = intval($_POST['status']); 
    $status_text = $_POST['status_text']; 

    //depending on the API of your system, you may want to check and see if the transaction ID $txn_id has already been handled before at this point 

    // Check the original currency to make sure the buyer didn't change it. 
    if ($currency1 != $order_currency) { 
        $this->errorAndDie('Original currency mismatch!',$cp_debug_email); 
    }     
     
    // Check amount against order total 
    if ($amount1 < $order_total) { 
        $this->errorAndDie('Amount is less than order total!',$cp_debug_email); 
    } 
   
    if ($status >= 100 || $status == 2) { 
        // payment is complete or queued for nightly payout, success 
        $order_status = "Paid";
    } else if ($status < 0) { 
        //payment error, this is usually final but payments will sometimes be reopened if there was no exchange rate conversion or with seller consent 
        $order_status = "Pending 1";
    } else { 
        //payment is pending, you can optionally add a note to the order page
        $order_status = "Pending 2";

    }

    $this->md->update( 
            [ 'id'=> $order[0]['id'] ] ,
            'orders', 
            [ 
                'transaction_id' => $txn_id,
                'status' => $order_status,
                'note' => $status_text
            ] 
        );

    $msg = "Dear Vendor,<br>";
    $msg .= "Order ID: ".$order[0]['id']."<br>";
    $msg .= "User (".$order[0]['user_email']." has paid for the ) ".$product['title'].' - '.$vendor['store_name']."<br>";

    $this->load->library('email');
            $this->email->from($cp_details['email'], 'Selly Admin');
            $this->email->to($vendor['email']);
            // $this->email->cc($cp_details['email']);
            // $this->email->bcc('them@their-example.com');
            $this->email->subject('Selly - Customer Paid for'.$product['title'].' - '.$vendor['store_name']);
            $this->email->message($msg);
            $this->email->send();


    die('IPN OK'); 

    }


    public function test_email() {
        $this->load->library('email');
        $this->email->from('shahzaibtesting@dispostable.com', 'Your Name');
        $this->email->to('shahzaibmehfooz420@gmail.com');
        $this->email->cc('shahzaibmehfooz420@gmail.com');
        $this->email->bcc('shahzaibmehfooz420@gmail.com');
        $this->email->subject('Email Test xYx');
        $this->email->message('Testing the email class.');
        $this->email->send();
        echo "sent";
    }

    public function show_store($storeName) {
            // $vendor_id = $this->uri->segment(4);
            $vendor_id = $storeName;
            // echo $vendor_id;
            // die();
            if(isset($_GET['search']) ) {
                // print_r($_GET['search']);
                // die();
                $data['vendor_products'] = $this->md->search_vendor_products($_GET['search'],$vendor_id); 
            } else {
                $data['vendor_products'] = $this->md->search_vendor_products('',$vendor_id); 
            }

            $data['vendor'] =$this->md->fetch('vendor',[ 'username'=>$vendor_id ]);

            // print_r(count( $data['vendor'] ));
            // die();
            if( count( $data['vendor'] ) == 0 ) {
                Echo "<h1> <center> Vendor Doesn't Exist! </center> </h1>";
                die();
            }


            $this->load->view('selly/header',$data);
            $this->load->view('selly/vendor_products');
            $this->load->view('selly/footer');    
    }


    public function verify_user() {
        
       $v_id = $this->uri->segment(3);
       $veri_hash = $this->uri->segment(4);
       $user_details = $this->md->fetch('user',[ 'id' => $v_id ]);

       if(count($user_details) == 1) {
            $created_at = $user_details[0]['created_at'];
            $ca_hash = hash('ripemd160', $created_at );
            if( $ca_hash == $veri_hash ) {
                $data['status'] = 1;
                $data['message'] = $user_details[0]['username'].", Your Email has been verified!";

                $this->md->update( 
                    [ 'id'=> $v_id ],
                    'user', 
                    [ 'email_verified'=> 1 ] 
                );

            } else {
                $data['status'] = 0;
                $data['message'] = "Failed to verify your email!";
            }
       }
       $this->load->view('pages/email_verification',$data);
    }



    public function user_forgot_password() {
        $this->load->view('pages/user_forgotpassword');
    }

    public function user_forgot_password_sent() {
        $email = $this->input->post('email');

        $check_user = $this->md->fetch('user',[ 'email' => $email ] );
        
        // print_r(count($check_user));
        // die();

        if( count($check_user) != 1 ) {
            $this->session->set_flashdata('fperror','Email does not exist.');
            $this->load->view('pages/user_forgotpassword'); 
        } else {


            $verificationCode = hash('ripemd160', $check_user[0]['created_at'] );

            $veriLink = site_url().'/main/user_reset_password/'.$check_user[0]['id'].'/'.$verificationCode;

            $cp_details = $this->md->fetch('admin',[ 'id'=>1 ])[0];
            $msg = "Dear ".$check_user[0]['username'].",<br>";
            $msg .= "Your reset password link:<br>";
            $msg .= "Email Verification Link: ".$veriLink."<br>";
            $msg .= "Thank You ! <br>";
            $msg .= "Selly Admin.<br>";

                $this->load->library('email');
                $this->email->from($cp_details['email'], 'Selly Admin');
                $this->email->to($email);
                // $this->email->cc($cp_details['email']);
                // $this->email->bcc('them@their-example.com');
                $this->email->subject('Selly - Reset Password');
                $this->email->message($msg);
                $this->email->send();


            $this->session->set_flashdata('fpsuccess','Email has been sent.');
            $this->load->view('pages/user_forgotpassword');
        }

    }

    public function user_reset_password() {
        $v_id = $this->uri->segment(3);
        $veri_hash = $this->uri->segment(4);



        $user_details = $this->md->fetch('user',[ 'id' => $v_id ]);

        // print_r($user_details);
        // die();

       if(count($user_details) == 1) {
            $created_at = $user_details[0]['created_at'];
            $ca_hash = hash('ripemd160', $created_at );
            if( $ca_hash == $veri_hash ) {
                
                $this->load->view('pages/user_reset_password',[ 'user_id' => $v_id ]);

            } else {
                echo "<center> <h1> Invalid Link </h1> </center>";
            }
       } else {

            echo "<center> <h1> User not found! </h1> </center>";

       }

    }

    public function user_fp_update() {

        $data = $this->input->post();

        if( $data['password'] != $data['cpassword'] ) {
            $this->session->set_flashdata('rserror','Password not matched.');
            $this->load->view('pages/user_reset_password',[ 'user_id'=> $data['user_id'] ]);
        } else {

            $this->md->update( 
                    [ 'id'=> $data['user_id'] ],
                    'user', 
                    [ 'password'=> $data['password'] ]
                );

            $this->session->set_flashdata('loginsuccess','Your Password has been changed!');
            redirect('main/view/signin');

        }

    }



}