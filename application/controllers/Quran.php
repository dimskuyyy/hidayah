<?php
class Quran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('quran_model');
    }
    public function index()
    {
        $data['surah'] = $this->quran_model->getSurah();
        $data['title'] = "Surah Al-Qur'an";
        // var_dump($data['surah']);die;
        $this->load->view('template/header1',$data);
        $this->load->view('quran/index', $data);
        $this->load->view('template/footer1');
    }
    public function surah($id)
    {
        $data['ayat'] = $this->quran_model->getAyat($id);
        $data['surah'] = $this->quran_model->getSpecSurah($id);
        $data['title'] = "Surah ".$data['surah'][0]['nama'];
        // var_dump($data['surah'][0]['nama']);die;
        $this->load->view('template/header1',$data);
        $this->load->view('quran/surah', $data);
        // $this->load->view('template/footer1');
    }
}
