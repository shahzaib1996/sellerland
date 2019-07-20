<?php 


class Test extends CI_Controller{


    public function index( $page='index')
    {
        $data['user']=$this->md->select("user");
        $this->load->view('raza/'.$page,$data);
    }
//    public function contact()
//    {
//        $this->load->view('raza/contact');
//    }
//    public function news()
//    {
//        $this->load->view('raza/news');
//    }
//    public function about()
//    {
//        $this->load->view('raza/about');
//    }


    public function insert()
    {
        $data=$this->input->post();
        $images['image'] = $this->do_upload('image');
        $data['image'] = $images['image']['upload_data']['file_name'] ;

        $this->md->insert('user',$data);
        redirect('test/index');

    }



    public function do_upload($file)
    {
        $config['upload_path']          = './image';
        $config['allowed_types']        = 'JPEG|PNG|JPG|jpg|png|jpeg';
//        $config['max_size']             = 100;
//        $config['max_width']            = 100;
//        $config['max_height']           = 100;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($file))
        {
            $error = array('error' => $this->upload->display_errors());
            return $error;
//            $this->load->view('upload_form', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
//            var_dump($data);
            return $data;
//            $this->load->view('upload_success', $data);
        }
//        die;

    }
    
}