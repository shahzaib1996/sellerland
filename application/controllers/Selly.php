<?php

class Selly extends CI_Controller
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
    public function lock($id,$redir,$status){
        $this->md->update(array('id'=>$id),'vendor',array('status'=>$status));
        redirect('selly/dashboard/view_store');
    }
    public function index($page='login')
    {
        $this->load->view('pages/'.$page);
    }

    public function signup()
    {
            $data = $this->input->post();
            $this->md->insert("user", $data);
            redirect("selly/index/login");
    }

    public function login_check()
    {
        $check=$this->md->fetch("admin",$this->input->post());
        if(!empty($check))
        {
            $this->session->set_userdata('id',$check);
            redirect('selly/dashboard/index');
        }
        else
        {
            redirect('selly/index/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        redirect('selly/index/login');
    }
    public function dashboard($page='index'){
        $id = $this->uri->segment(4);
        // var_dump($this->session->userdata()['id']);
        $data['admin_message'] =  $this->session->userdata('vender_message');
        $data['store']=$this->md->fetch("store");
        $data['package']=$this->md->fetch("package");
        $data['my_message']=$this->md->fetch('my_message');
        $data['message'] = $this->md->ascending('my_message',array('id'=>'ASC'),array('user_id'=>$this->uri->segment(4)));
        $data['wh_store']=$this->md->fetch("store",array('id'=>$id));
        $data['wh_package']=$this->md->fetch("package",array('id'=>$id));
        $data['wh_profile']=$this->md->fetch("user",array('id'=>$id));
        $data['vendor']=$this->md->fetch("vendor");
        $data['wh_vendor']=$this->md->fetch("vendor",array('id'=>$id));
        // $data['product']=$this->md->fetch("product");
        $data['product']=$this->md->fetch_user_products($id);
        $data['week']=$this->md->week_profit();
        $data['month']=$this->md->month_profit();
        $data['year']=$this->md->year_profit();
        $data['soldperday']=$this->md->productSoldPerDay($id);
        if($this->session->userdata('id'))
        {
            $data['login'] = $this->session->userdata('id');
            $this->load->view('pages/header');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('pages/footer');
        }
        else
        {
            redirect('selly/index/login');
        }

    }

    public function insert_store()
    {
        $data=$this->input->post();
        $images['image'] = $this->do_upload('image');
        $data['image'] = $images['image']['upload_data']['file_name'] ;
        $data['date'] = date('Y-m-d');
        $this->md->insert("store",$data);
        redirect('selly/dashboard/view_store');

    }
    public function del(){
        $this->md->delete(array($this->uri->segment(3)=>$this->uri->segment(4)),'vendor');
        redirect('selly/dashboard/view_store');
    }
    public function del_product(){
        $this->md->delete(array($this->uri->segment(3)=>$this->uri->segment(4)),'product');
        redirect('selly/dashboard/view_store');
    }
    public function update_store()
    {
        $id=$this->uri->segment(3);
        $data=$this->input->post();
        $images['image'] = $this->do_upload('image');
        $data['image'] = $images['image']['upload_data']['file_name'] ;
        $this->md->update(array('id'=>$id),'store',$data);
        redirect("selly/dashboard/view_store");
    }

    public function delete_store()
    {
        $id=$this->uri->segment(3);
        $data=$this->input->post();
        $this->md->delete(array('id'=>$id),"store",$data);
        redirect('selly/dashboard/view_store');
    }

    public function insert_package()
    {
        $data=$this->input->post();
        $this->md->insert("package",$data);
        redirect('selly/dashboard/view_package');

    }

    public function update_package()
    {
        $id=$this->uri->segment(3);
        $data=$this->input->post();
        $this->md->update(array('id'=>$id),'package',$data);
        redirect("selly/dashboard/view_package");
    }

    public function delete_package()
    {
        $id=$this->uri->segment(3);
        $data=$this->input->post();
        $this->md->delete(array('id'=>$id),"package",$data);
        redirect('selly/dashboard/view_package');
    }

    public function reset(){
        for($x=1;$x<20;$x++){
            echo  mt_rand(1000,99999999).'<br>';
        }

        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config);
        $this->email->from('usamaasif8809@gmail.com', 'Your Name');
        $this->email->to('usamaasif4190@gmail.com');
        $this->email->cc('usamaasif4190@gmail.com');
        $this->email->bcc('usamaasif4190@gmail.com');

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');
        $this->email->send();
        echo 'email send';
    }
    public function up_email(){
        $this->form_validation->set_rules('cur_email','Current Email','required');
        $this->form_validation->set_rules('email','New Email','required|is_unique[user.email]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-warning ">', '</div>');
        if($this->form_validation->run()==true){
        $this->session->set_flashdata('email','Update Email');
        //  echo var_dump( $this->session->userdata('id')); die();
         if($this->session->userdata('id') != null){
            $this->md->update(array('email'=>$this->input->post('cur_email')),'admin',array('email'=>$this->input->post('email')));
            redirect('selly/dashboard/reset');
         }
         else{
            $this->md->update(array('email'=>$this->input->post('cur_email')),'user',array('email'=>$this->input->post('email')));
            redirect('selly/dashboard/reset');         
         }
        }else{
            $this->form_validation->set_error_delimiters('<div class="alert alert-warning ">', '</div>');
            redirect('selly/dashboard/reset');
        }
    }
    public function up_password(){
        $this->form_validation->set_rules('cur_password','Current Password','required');
        $this->form_validation->set_rules('password','New Password','required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-warning ">', '</div>');
        if($this->form_validation->run()==true){
        $this->session->set_flashdata('password','Update Password');
        if($this->session->userdata('id') != null){
          //  echo var_dump( $this->session->userdata('id')[0]['email']); die();
            $this->md->update(array('password'=>$this->input->post('cur_password')),'admin',array('password'=>$this->input->post('password')),$this->session->userdata('id')[0]['email']);
            redirect('selly/dashboard/reset');
         }
         else{
            $this->md->update(array('password'=>$this->input->post('cur_password')),'user',array('password'=>$this->input->post('password')));
            redirect('selly/dashboard/reset');        
         }
    }else{
            redirect('selly/dashboard/reset');
        }
    }
    public function destroy(){
     $this->session->unset_userdata('admin_message');
     $this->session->unset_userdata('vender_message');
    }
    public function send_vendor_message(){
        $user_info = $this->session->userdata('login');
        $user_message = $this->session->userdata('admin_message');
        if(empty($user_message)){
            $no = 0;
        }else{
            $no = count($user_message);
        }
        $_SESSION['admin_message'][$this->uri->segment(3)][$no+1]['message'] = $this->input->post('message');
        $_SESSION['admin_message'][$this->uri->segment(3)][$no+1]['user_id'] = $this->uri->segment(3);
        $_SESSION['admin_message'][$this->uri->segment(3)][$no+1]['username'] = 'admin';
        $_SESSION['admin_message'][$this->uri->segment(3)][$no+1]['account_type'] = $user_info[0]['account_type'];
        $x['message'] = $this->input->post('message');
        $x['user_id'] = $this->uri->segment(3);
        $x['account_type'] = 'admin';
        $this->md->insert('my_message',$x);
        redirect('Selly/dashboard/support_messages/'.$this->uri->segment(3));
    }

    public function blacklist() {
        $user_id = $this->uri->segment(4); 
        $this->md->blacklist_user($user_id);
        redirect('vender/view/black-list');
    }

    public function unblacklist() {
        $user_id = $this->uri->segment(4); 
        $this->md->unblacklist_user($user_id);
        redirect('vender/view/black-list');
    }

    public function update_vendor_merchant_id() {
        // print_r($this->session->userdata('login')[0]['id']);
        // die();
        $this->session->set_flashdata('coinpayment','Coinpayment Merchant ID Updated!');
        $this->md->update( 
            [ 'vendor_id'=> $this->session->userdata('login')[0]['id'] ] ,
            'vendor_payment_details', 
            [ 'coinpayment_merchant_id'=>$this->input->post('vendor_merchant_id')] 
        );
        redirect('vender/view/vender_settings');
    }

    public function update_paypal_email() {
        // print_r($this->session->userdata('login')[0]['id']);
        // die();
        $this->session->set_flashdata('paypal','Paypal Email Updated!');
        $this->md->update( 
            [ 'vendor_id'=> $this->session->userdata('login')[0]['id'] ] ,
            'vendor_payment_details', 
            [ 'paypal_email'=>$this->input->post('paypal_email')] 
        );
        redirect('vender/view/vender_settings');
    }

}