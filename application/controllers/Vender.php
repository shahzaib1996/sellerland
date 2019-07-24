<?php

class Vender extends CI_Controller
{

    public function do_upload($file)
    {
        $config['upload_path']          = './image';
        $config['allowed_types']        = 'JPEG|PNG|JPG|jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($file))
        {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            return $data;
        }

    }
    public function index(){
        $this->view();
    }
    public function view($page = 'index'){
        if($page=='login'){ // goto login
            $this->login();
        } elseif($page=='signup'){ // goto signup
            $this->signup();
        } else if($page=='client_query_reply'){

            //required by vender header
            $data['user_info']  = $this->session->userdata('login');
            $data['login'] = $this->session->userdata('login');

            $query_id = $this->uri->segment(4);
            $data['client_query_detail'] = $this->md->fetch_query_detail( $query_id );
            $data['query_reply'] = $this->md->fetch_query_reply( $query_id );
            if(!empty($this->session->userdata('login'))){ // if start
                $this->load->view('vender/header',$data);
                $this->load->view('vender/'.$page);
                $this->load->view('vender/footer');
            }else{ $this->login(); }

        }else if( $page=='vender_settings' ) {
            //required by vender header
            $data['user_info']  = $this->session->userdata('login');
            $data['login'] = $this->session->userdata('login');
            $data['vendor_payment']=$this->md->fetch('vendor_payment_details',array('vendor_id'=>$data['login'][0]['id'] ));
            // print_r($data['vendor_payment']);
            // die();
            if(!empty($this->session->userdata('login'))){ // if start
                $this->load->view('vender/header',$data);
                $this->load->view('vender/'.$page);
                $this->load->view('vender/footer');
            }else{ $this->login(); } // end if close

        } else{ // else if there is session go to index
//            var_dump($this->session->userdata('login'));die;
            $id=$this->uri->segment(4);
            $data['user_info']  = $this->session->userdata('login');
            $data['login'] = $this->session->userdata('login');
            $data['message'] = $this->md->ascending('my_message',array('id'=>'ASC'),array('user_id'=>$this->uri->segment(4)));
            $data['admin_message'] = $this->session->userdata('admin_message');
            // print_r($data['login']);
            // die();
            $data['product']=$this->md->fetchh('product');
            $data['wh_product']=$this->md->fetch('product',array('id'=>$id));
            $data['code_product']=$this->md->fetch('product',array('user_id'=>$id));
            $data['user']=$this->md->fetch('user');
            $data['product']=$this->md->fetch('product',array('user_id'=>$data['login'][0]['id']));
            // $data['feedback']=$this->md->fetch('feedback',array('vendor_id'=>$data['login'][0]['id']));
            $data['feedback']=$this->md->feedback_join_product($data['login'][0]['id']); //arg vendor_id
            $data['week']=$this->md->week_profit();
            $data['month']=$this->md->month_profit();
            $data['year']=$this->md->year_profit();
//            $data['orders']=$this->md->fetch('orders');
            $data['wh_orders']=$this->md->fetch('orders',array('id'=>$id));
            $data['report']=$this->md->report();
            $data['orders']=$this->md->user();
            $data['client_query'] = $this->md->fetch('client_query',array('vendor_id'=>$data['login'][0]['id']));
            if(!empty($this->session->userdata('login'))){ // if start
                $this->load->view('vender/header',$data);
                $this->load->view('vender/'.$page);
                $this->load->view('vender/footer');
            }else{ $this->login(); } // end if close
        }//else close
    }
    public function check(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run() == true){
            $data = $this->input->post();
            $data['status'] = 'active';
            $data = $this->md->fetch('vendor',$data);
            if(!empty($data)){
                $this->session->set_userdata('login',$data);
                $this->view();
            }else{
                $this->login();
            }
        }else{
            $this->login();
        }
    }
    public function logout(){
        $this->session->unset_userdata('login');
        $this->login();
    }
//     public function add_store(){
//         $this->form_validation->set_rules('username', 'Username', 'required');
//         $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[vendor.email]');
//         $this->form_validation->set_rules('password', 'Password', 'required|min_length[10]');
//         $this->form_validation->set_rules('phone', 'Number', 'required|min_length[11]');
//         $this->form_validation->set_rules('store_name', 'Store Name', 'required|is_unique[vendor.store_name]');
// //        $this->form_validation->set_error_delimiters('<div class="alert alert-warning ">', '</div>');
//         if($this->form_validation->run() == true){
//             $data= $this->input->post();
//             $data['status'] = 'active';
//             $this->md->insert('vendor',$data);
//             $this->login();
//         }else{
//             $this->signup();
//         }
//     }

    public function add_store(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[vendor.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[10]');
        $this->form_validation->set_rules('phone', 'Number', 'required|min_length[11]');
        $this->form_validation->set_rules('store_name', 'Store Name', 'required|is_unique[vendor.store_name]');
//        $this->form_validation->set_error_delimiters('<div class="alert alert-warning ">', '</div>');
        if($this->form_validation->run() == true){
            $data= $this->input->post();
            $data['status'] = 'active';
            $this->md->insert('vendor',$data);
            $v_id = $this->db->insert_id();
            $this->md->insert('vendor_payment_details',['vendor_id'=>$v_id, 'coinpayment_merchant_id'=>'update your merchant id','paypal_email'=>'example@paypal.com'] );
            $this->login();
        } else{
            $this->signup();
        }
    }

    public function signup(){
        $this->load->view('vender/signup');
    }
    public function login(){
        $this->load->view('vender/login');
    }

    public function add_product()
    {
        $data=$this->input->post();
        $images['image'] = $this->do_upload('image');
        $data['image'] = $images['image']['upload_data']['file_name'] ;
        $data['date'] = date('Y-m-d');
        $this->md->insert("product",$data);
        redirect('vender/view/view_product');
    }


    public function update_product()
    {
        $id=$this->uri->segment(3);
        $data=$this->input->post();
        $images['image'] = $this->do_upload('image');
        $data['image'] = $images['image']['upload_data']['file_name'] ;
        $this->md->update(array('id'=>$id),'product',$data);
        redirect("vender/view/view_product");
    }


    public function del_product()
    {
        $id=$this->uri->segment(3);
        $data=$this->input->post();
        $this->md->delete(array('id'=>$id),"product",$data);
        redirect('vender/view/view_product');
    }

    public function add_order()
    {
        $data=$this->input->post();
        $data['date'] = date('Y-m-d');
//        var_dump($data);die;
        $this->md->insert("orders",$data);
//        die;
        redirect('vender/view/view_order');
    }

    public function update_order()
    {
        $id=$this->uri->segment(3);
        $data=$this->input->post();
        $this->md->update(array('id'=>$id),'orders',$data);
        redirect("vender/view/view_order");
    }

    public function delete_order()
    {
        $id=$this->uri->segment(3);
        $data=$this->input->post();
        $this->md->delete(array('id'=>$id),"orders",$data);
        redirect('vender/view/view_order');
    }
    public function feed_back_del($id){
        $this->md->delete(array('id'=>$id),'feedback');
        redirect('vender/view/feedback');
    }
    public function send_message(){
        $user_info = $this->session->userdata('login');
        $user_message = $this->session->userdata('vender_message');
        if(empty($user_message)){
            $no = 0;
        }else{
            $no = count($user_message);
        }
        $_SESSION['vender_message'][$no+1]['message'] = $this->input->post('message');
        $_SESSION['vender_message'][$no+1]['user_id'] = $user_info[0]['id'];
        $_SESSION['vender_message'][$no+1]['username'] = $user_info[0]['username'];
        $_SESSION['vender_message'][$no+1]['account_type'] = $user_info[0]['account_type'];
        $x['message'] = $this->input->post('message');
        $x['user_id'] = $user_info[0]['id'];
        $x['username'] = $user_info[0]['username'];
        $x['account_type'] = "vendor";
        $this->md->insert('my_message',$x);
        redirect('Vender/view/support_messages1/'.$user_info[0]['id']);
    }
    public function reply(){
        var_dump($this->input->post('message'));
    }
    public function reply_query(){
       $data =  $this->md->fetch('client_query',array('id'=>$this->uri->segment(3)));
//       var_dump($data);
    }
    public function add_coupons(){
        $data = $this->input->post();
//        var_dump($data);die;
        $data['vender_id'] = $this->uri->segment(3);
        $this->md->insert('coupons',$data);
        redirect('vender/view/add_coupons/'.$this->uri->segment(3));
    }

    public function add_vendor_reply() {
        $data = $this->input->post();
        
        if( $this->uri->segment(3) != '' ) {

            $data_insert['vendor_id'] = $this->session->userdata('login')[0]['id'];
            $data_insert['user_id'] = '';
            $data_insert['client_query_id'] = $this->uri->segment(3);
            $data_insert['reply'] = $data['reply'];
            $this->md->insert('client_query_reply',$data_insert);
        }
        redirect('vender/view/client_query_reply/'.$this->uri->segment(3));
    }

}