<?php
class Tafsir extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('quran_model');
        $this->load->model('tafsir_model');
    }
    public function index()
    {
        $data['surah']= $this->quran_model->getSurah();
        $data['title']= "Tafsir Al-Qur'an | Kemenag";
        $this->load->view('template/header1',$data);
        $this->load->view('tafsir/index', $data);
        $this->load->view('template/footer1');
    }
    public function surah($id)
    {
        
        $data['surah'] = $this->quran_model->getSpecSurah($id);
        $data['tafsir'] = $this->tafsir_model->getTafsir($id);
        $data['title'] = "Tafsir Surah ".$data['surah'][0]['nama'];
        $this->load->view('template/header1',$data);
        $this->load->view('tafsir/surah',$data);
        $this->load->view('template/footer1');
    }
}
