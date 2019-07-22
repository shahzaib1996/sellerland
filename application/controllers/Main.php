<?php

class Main extends CI_Controller
{
    public function index()
    {
        $this->view();
    }
    public function data(){
        $data['web_login'] = $this->session->userdata('web_login');
        $data['vendor'] = $this->md->fetch('vendor');
        $data['product'] = $this->md->fetch('product');
        $data['single_vendor'] = $this->md->fetch('vendor',array('id'=>$this->uri->segment(4)));
        // $data['feedback'] = $this->md->fetch('feedback',array('vendor_id'=>$this->uri->segment(4)));
        $data['feedback'] = $this->md->fetch_vender_feedback( $this->uri->segment(4) ); //args vender_id
        $data['vendor_product'] = $this->md->fetch('product',array('user_id'=>$this->uri->segment(4)));
        $data['single_coupons'] = $this->md->fetch('coupons',array('vender_id'=>$this->uri->segment(4)));
        $data['single_product'] = $this->md->fetch('product',array('id'=>$this->uri->segment(5),'user_id'=>$this->uri->segment(4)));
        $data['single_feedback'] = $this->md->fetch('feedback',array('pro_id'=>$this->uri->segment(5),'vendor_id'=>$this->uri->segment(4)));
        return $data;
    }
    public function view($page='index')
    {   
        // if($page == 'myqueries') {
        //     $user_id = $this->session->userdata('web_login')[0]['id'];
        //     // die($user_id);
        //     $data['myqueries'] = $this->md->fetch_user_query( $user_id );
        //     // var_dump($data); die();
        //     $this->load->view('selly/header',$data);
        //     $this->load->view('selly/'.$page);
        //     $this->load->view('selly/footer');

        // } else if($page == 'openmyquery') {
        //     $query_id = $this->uri->segment(4);
        //     // $user_id = $this->session->userdata('web_login')[0]['id'];
        //     // die($user_id);
        //     $data['client_query'] = $this->md->fetch_query_detail( $query_id );
        //     $data['query_reply'] = $this->md->fetch_query_reply( $query_id );
        //     // var_dump($data); die();
        //     $this->load->view('selly/header',$data);
        //     $this->load->view('selly/'.$page);
        //     $this->load->view('selly/footer');
            
        // }

        if($page == 'signin' OR $page== 'signup'){
            $this->load->view('selly/'.$page);
        }elseif($page == 'vendor-groups' OR $page == 'vendor' OR $page=='vendor-brand-item-view' OR $page=='all-products' OR $page == 'vendor-contact' OR $page == 'vendor-store' OR $page=='all-stores' OR $page=='vendor-feedback'){
            if(!empty($this->session->userdata('web_login'))) {
                $data = $this->data();
                // print_r($data);
                // die();
               // var_dump($data);die;
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
            
            $this->load->view('selly/header',$data);
            $this->load->view('selly/'.$page);
            $this->load->view('selly/footer');

        } else if($page == 'openmyquery') {
            $query_id = $this->uri->segment(4);
            $data['web_login'] = $this->session->userdata('web_login');

            $data['client_query'] = $this->md->fetch_query_detail( $query_id );
            $data['query_reply'] = $this->md->fetch_query_reply( $query_id );
            // var_dump($data); die();
            $this->load->view('selly/header',$data);
            $this->load->view('selly/'.$page);
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

}