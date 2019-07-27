<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller{

    function  __construct(){
        parent::__construct();

        // Load paypal library & product model
        $this->load->library('paypal_lib');
        $this->load->model('product');
    }

    function index(){
        $data = array();

        // Get products data from the database
        $data['products'] = $this->product->getRows();

        // Pass products data to the view
        $this->load->view('products/index', $data);
    }

    function buy($id){
        $post_data = $this->input->post();
        $qty = $post_data['qty'];
        $user = $post_data['user_email'];
        // Set variables for paypal form
        // $returnURL = base_url().'paypal/success/'; //used with order id below
        $cancelURL = base_url().'paypal/cancel';
        $notifyURL = base_url().'paypal/ipn';

        // Get product data from the database
        $product = $this->product->getRows($id);
        $vendor = $this->md->fetch('vendor',[ 'id'=>$product['user_id'] ])[0];
        $pay_details = $this->md->fetch('admin',[ 'id'=>1 ])[0];
        $total_price = $product['price']*$qty;

        // echo $total_price;
        // die();

        //creating order
        $this->md->insert('orders',
                [
                    'title' => $product['title'].' - '.$vendor['store_name'],
                    'total' => $total_price,
                    'qty'   => $post_data['qty'],
                    'product_id' => $product['id'],    
                    'vendor_id' => $product['user_id'],
                    'user_email' => $post_data['user_email'],
                    'status' => "pending"
                ]

            );

        $order_id = $this->db->insert_id();
        $returnURL = base_url().'paypal/success/'.$order_id;
        // print_r($post_data);
        // die();
//        var_dump($product);die;
        // Get current user ID from the session
//        $userID = $_SESSION['userID'];
        $data = $this->session->userdata('web_login');
//        var_dump($data);die;
        $userID = $data[0]['id'];

        // Add fields to paypal form
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', $product['title'].' - '.$vendor['store_name'] );
        $this->paypal_lib->add_field('custom', $order_id);
        $this->paypal_lib->add_field('item_number',  $product['id']);
        $this->paypal_lib->add_field('amount',  $total_price );
        $this->paypal_lib->add_field('quantity', $qty);
        $this->paypal_lib->add_field('business',$pay_details['paypal_email']);


        // Render paypal form'
        $this->load->view('selly/header');
        $this->paypal_lib->paypal_auto_form();
        $this->load->view('selly/footer');
    }
}