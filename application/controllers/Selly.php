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

    public function do_upload_vendor($file)
    {
        $config['upload_path']          = './image/profile_image';
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

    public function profile_picture_upload($file)
    {
        $config['upload_path']          = './image/profile_image';
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
        // $data['my_message']=$this->md->fetch('my_message');
        $data['my_message']=$this->md->messages_with_img();
        $data['message'] = $this->md->ascending('my_message',array('id'=>'ASC'),array('user_id'=>$this->uri->segment(4)));
        $data['wh_store']=$this->md->fetch("store",array('id'=>$id));
        $data['wh_package']=$this->md->fetch("package",array('id'=>$id));
        $data['wh_profile']=$this->md->fetch("user",array('id'=>$id));
        // $data['vendor']=$this->md->fetch("vendor");
        $data['vendor']=$this->md->vendor_with_package();
        // print_r($data['vendor']);die();
        // $data['wh_vendor']=$this->md->fetch("vendor",array('id'=>$id));
        $data['wh_vendor']=$this->md->single_vendor($id); //arg vendor_id
        // $data['product']=$this->md->fetch("product");
        $data['product']=$this->md->fetch_user_products($id);
        $data['week']=$this->md->week_profit();
        $data['month']=$this->md->month_profit();
        $data['year']=$this->md->year_profit();
        $data['soldperday']=$this->md->productSoldPerDay($id);
        $data['vendor_coin']=$this->md->fetch('coinpayment_accept_coins');

        $data['admin_data'] = $this->md->fetch('admin',['id'=>$this->session->userdata('id')[0]['id']]);

        $data['login_data'] = $this->session->userdata('id')[0];


        // print_r($data['login_data']['username']);
        // die();
        
        if($this->session->userdata('id'))
        {
            $data['login'] = $this->session->userdata('id');
            $this->load->view('pages/header',$data);
            // $this->load->view('pages/'.$page,$data);
            $this->load->view('pages/'.$page);
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
        if( isset($data['is_default']) ) {
            $data['is_default'] = 1;
            $this->md->remove_package_default();
        } else {
            $data['is_default'] = 0;
        }
        // print_r($data);
        // print_r($isDefault);
        // die();
        $this->md->insert("package",$data);
        redirect('selly/dashboard/view_package');

    }

    public function update_package()
    {
        $id=$this->uri->segment(3);
        $data=$this->input->post();

        if( isset($data['is_default']) ) {
            $data['is_default'] = 1;
            $this->md->remove_package_default();
        } else {
            $data['is_default'] = 0;
        }

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

    public function vender_forgot_password() {
        $this->load->view('pages/forgotpassword');
    }

    public function vender_forgot_password_sent() {
        $email = $this->input->post('email');

        $check_user = $this->md->fetch('vendor',[ 'email' => $email ] );
        
        // print_r(count($check_user));
        // die();

        if( count($check_user) != 1 ) {
            $this->session->set_flashdata('fperror','Email does not exist.');
            $this->load->view('pages/forgotpassword'); 
        } else {


            $verificationCode = hash('ripemd160', $check_user[0]['created_at'] );

            $veriLink = site_url().'/selly/vender_reset_password/'.$check_user[0]['id'].'/'.$verificationCode;

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
            $this->load->view('pages/forgotpassword');
        }

    }

    public function vender_reset_password() {
        $v_id = $this->uri->segment(3);
        $veri_hash = $this->uri->segment(4);



        $user_details = $this->md->fetch('vendor',[ 'id' => $v_id ]);

        // print_r($user_details);
        // die();

       if(count($user_details) == 1) {
            $created_at = $user_details[0]['created_at'];
            $ca_hash = hash('ripemd160', $created_at );
            if( $ca_hash == $veri_hash ) {
                
                $this->load->view('pages/vender_reset_password',[ 'vendor_id' => $v_id ]);

            } else {
                echo "<center> <h1> Invalid Link </h1> </center>";
            }
       } else {

            echo "<center> <h1> User not found! </h1> </center>";

       }

    }

    public function vender_fp_update() {

        $data = $this->input->post();

        if( $data['password'] != $data['cpassword'] ) {
            $this->session->set_flashdata('rserror','Password not matched.');
            $this->load->view('pages/vender_reset_password',[ 'vendor_id'=> $data['vendor_id'] ]);
        } else {

            $this->md->update( 
                    [ 'id'=> $data['vendor_id'] ],
                    'vendor', 
                    [ 'password'=> $data['password'] ]
                );

            $this->session->set_flashdata('loginsuccess','Your Password has been changed!');
            redirect('vender/view/signin');

        }

    }

    // public function up_email(){
    //     $this->form_validation->set_rules('cur_email','Current Email','required');
    //     $this->form_validation->set_rules('email','New Email','required|is_unique[admin.email]');
    //     if($this->form_validation->run()==true){
    //     $this->session->set_flashdata('email','Update Email');
    //     //  echo var_dump( $this->session->userdata('id')); die();
    //      if($this->session->userdata('id') != null){
    //         $this->md->update(array('email'=>$this->input->post('cur_email')),'admin',array('email'=>$this->input->post('email')));
    //         $this->session->set_flashdata('email','Update Email');

    //         redirect('selly/dashboard/reset');
    //      }
         
    //     }else{
    //         $this->form_validation->set_error_delimiters('<div class="alert alert-warning ">', '</div>');
    //         redirect('selly/dashboard/reset');
    //     }
    // }


    public function up_email(){
        $this->form_validation->set_rules('cur_email','Current Email','required');
        $this->form_validation->set_rules('email','New Email','required|is_unique[admin.email]');
        if($this->form_validation->run()==true){
         if($this->session->userdata('id') != null){

            $vendor = $this->md->fetch( 'admin', [ 'id'=> $this->session->userdata('id')[0]['id'] ] );

            if( $vendor[0]['email'] == $this->input->post('cur_email') ) {

                $this->md->update( [ 'id'=> $this->session->userdata('id')[0]['id']  ],'admin',[ 'email'=>$this->input->post('email') ] );
                $this->session->set_flashdata('email','Update Email');
                redirect('selly/dashboard/reset');

            } else {
                $this->session->set_flashdata('email_er','Current email does not matched!');
                redirect('selly/dashboard/reset');
            }

         }
        }else{
            $this->form_validation->set_error_delimiters('<div class="alert alert-warning ">', '</div>');
            redirect('selly/dashboard/reset');
        }
    }


    public function update_vendor_email() {
        $this->form_validation->set_rules('cur_email','Current Email','required');
        $this->form_validation->set_rules('email','New Email','required|is_unique[vendor.email]');
        if($this->form_validation->run()==true){
        // $this->session->set_flashdata('vendor_email','Update Email');
        //  echo var_dump( $this->session->userdata('id')); die();
         if($this->session->userdata('login') != null){

            $vendor = $this->md->fetch( 'vendor', [ 'id'=> $this->session->userdata('login')[0]['id'] ] );

            if( $vendor[0]['email'] == $this->input->post('cur_email') ) {

                $this->md->update( [ 'id'=> $this->session->userdata('login')[0]['id']  ],'vendor',[ 'email'=>$this->input->post('email') ] );
                $this->session->set_flashdata('vendor_email','Update Email');
                redirect('Vender/view/vender_settings');

            } else {
                $this->session->set_flashdata('vendor_e_error','Current email does not matched!');
                redirect('Vender/view/vender_settings');
            }

         }
        }else{
            $this->form_validation->set_error_delimiters('<div class="alert alert-warning ">', '</div>');
            redirect('Vender/view/vender_settings');
        }
    }


    public function update_vendor_password() {
        
        $data = $this->input->post();

         if($this->session->userdata('login') != null){

            $vendor = $this->md->fetch( 'vendor', [ 'id'=> $this->session->userdata('login')[0]['id'], 'password'=> $data['old_password'] ] );

            // print_r($vendor);
            // die();

            if( count($vendor) == 1 ) {

                if( $data['new_password'] == $data['new_c_password'] ) {

                    $this->md->update( [ 'id'=> $this->session->userdata('login')[0]['id']  ],'vendor',[ 'password'=> $data['new_password'] ] );
                    $this->session->set_flashdata('vendor_pass','Password updated!');
                    redirect('Vender/view/vender_settings');

                } else {
                    $this->session->set_flashdata('vendor_p_error','Password does not matched!');
                    redirect('Vender/view/vender_settings');
                }

            } else {
                $this->session->set_flashdata('vendor_p_error','Incorrect Password!');
                redirect('Vender/view/vender_settings');
            }

         }
        
    }


    public function up_password(){

        $data = $this->input->post();

         if($this->session->userdata('id') != null){

            $admin = $this->md->fetch( 'admin', [ 'id'=> $this->session->userdata('id')[0]['id'], 'password'=> $data['old_password'] ] );

            // print_r($vendor);
            // die();

            if( count($admin) == 1 ) {

                if( $data['new_password'] == $data['new_c_password'] ) {

                    $this->md->update( [ 'id'=> $this->session->userdata('id')[0]['id']  ],'admin',[ 'password'=> $data['new_password'] ] );
                    $this->session->set_flashdata('password','Password updated!');
                    redirect('selly/dashboard/reset');

                } else {
                    $this->session->set_flashdata('password','Password does not matched!');
                    redirect('selly/dashboard/reset');
                }

            } else {
                $this->session->set_flashdata('password','Incorrect Password!');
                redirect('selly/dashboard/reset');
            }

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
        if( !empty($this->input->post('coinpayment_status')) ) {
            $enableCP = 1;
        } else {
            $enableCP = 0;
        }
        // print_r($enableCP);
        // die();
        $this->session->set_flashdata('coinpayment','Coinpayment Merchant ID Updated!');
        $this->md->update( 
            [ 'vendor_id'=> $this->session->userdata('login')[0]['id'] ] ,
            'vendor_payment_details', 
            [ 'coinpayment_wallet_address'=>$this->input->post('vendor_merchant_id'), 'coinpayment_status'=> $enableCP, 'ipn_secret'=>$this->input->post('ipn_secret')] 
        );
        redirect('vender/view/vender_settings');
    }

    public function update_paypal_email() {
        // print_r($this->session->userdata('login')[0]['id']);
        // die();
        if( !empty($this->input->post('paypal_status')) ) {
            $enableCP = 1;
        } else {
            $enableCP = 0;
        }
        $this->session->set_flashdata('paypal','Paypal Email Updated!');
        $this->md->update( 
            [ 'vendor_id'=> $this->session->userdata('login')[0]['id'] ] ,
            'vendor_payment_details', 
            [ 'paypal_email'=>$this->input->post('paypal_email'), 'paypal_status'=> $enableCP, ] 
        );
        redirect('vender/view/vender_settings');
    }

    
    public function admin_update_coinpayment() {
        $this->session->set_flashdata('coinpayment','Coinpayment Merchant ID Updated!');
        $this->md->update( 
            [ 'id'=> $this->session->userdata('id')[0]['id'] ] ,
            'admin', 
            [ 'coinpayment_merchant'=>$this->input->post('admin_wallet_address'), 'ipn_secret'=>$this->input->post('ipn_secret')] 
        );
        redirect('selly/dashboard/admin_settings');
    }

    public function admin_update_paypal() {
        $this->session->set_flashdata('paypal','Paypal Email Updated!');
        $this->md->update( 
            [ 'id'=> $this->session->userdata('id')[0]['id'] ] ,
            'admin', 
            [ 'paypal_email'=>$this->input->post('paypal_email') ] 
        );
        redirect('selly/dashboard/admin_settings');
    }

    public function update_admin_profile_picture() {
        $this->session->set_flashdata('profile_picture','Picture Updated!');

        $images['image'] = $this->profile_picture_upload('profile_image');
        $imageName = $images['image']['upload_data']['file_name'] ;
        // print_r($imageName);
        $this->md->update( 
            [ 'id'=> $this->session->userdata('id')[0]['id'] ] ,
            'admin', 
            [ 'img'=>$imageName ] 
        );
        redirect('selly/dashboard/reset');
    }

    public function update_vendor_profile_image()
    {
        $id=$this->session->userdata('login')[0]['id'];
        $data=$this->input->post();

        if (isset($_FILES['vendor_image']) && is_uploaded_file($_FILES['vendor_image']['tmp_name'])) {
            $images['vendor_image'] = $this->do_upload_vendor('vendor_image');
            $data['img'] = $images['vendor_image']['upload_data']['file_name'] ;
        }

        $this->md->update(array('id'=>$id),'vendor',$data);
        $this->session->set_flashdata('vendor_pp','Profile Image updated!');
        redirect('vender/view/vender_settings');
    }

}