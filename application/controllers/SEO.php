<?php

class SEO extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('quran_model');
        $this->load->model('artikel_model');
    }
    public function sitemap()
    {
        $data = array(
            'surah' => $this->quran_model->getId(),
            'artikel' => $this->artikel_model->getId(),
        );

        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("sitemap",$data);
    }
}
