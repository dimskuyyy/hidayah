<?php
class About extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('about_model');
    }
    public function index()
    {
        $data['title'] = "About";
        $this->load->view('template/header1',$data);
        $this->load->view('about/index');
        $this->load->view('template/footer1');
    }

    public function contact()
    {
        $nama   = $this->input->post('nama');
        $email  = $this->input->post('email');
        $pesan  = $this->input->post('pesan');

        $data   = array(
            'nama'  => $nama,
            'email' => $email,
            'pesan' => $pesan
        );

        $this->about_model->input($data);
        echo "<script>
            alert('Terimakasih, pesan anda sudah disampaikan ke author');
            window.location='".base_url('about/#kontak')."';
        </script>";
    }
}
