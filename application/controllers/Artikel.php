<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	 public function __construct()
	 {
		 parent::__construct();
		 $this->load->model('artikel_model');
	 }
	public function index()
	{
		$data['total'] = $this->artikel_model->postRows();
		$data['title'] = 'Artikel';
		$this->load->library('pagination');

		$config['base_url'] = base_url('artikel/index');
		$config['total_rows'] = $data['total'];
		$config['per_page'] = 12;
		$config['num_links'] = 5;  

		//styling
		//full
		$config['full_tag_open']	='<div><nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">';
		$config['full_tag_close']	="</nav></div>";

		//first
		$config['first_link']		='<svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" /></svg>';

		//last
		$config['last_link']		='<svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" /></svg>';

		//prev
		$config['prev_link']		='<svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" /></svg>';

		//current
		$config['cur_tag_open']		='<a href="" aria-current="page" class="relative z-10 inline-flex items-center border border-mytosca bg-indigo-50 px-4 py-2 text-sm font-medium text-mytosca focus:z-20">';
		$config['cur_tag_close']	= '</a>';

		//default class
		$config['attributes']		=array('class'=>'relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20');

		$this->pagination->initialize($config);


		$data['start'] = $this->uri->segment(3);
		$data['page'] = $config['per_page'];
		$data['artikel'] = $this->artikel_model->getAllArtikel($config['per_page'],$data['start']);
		$data['carousel'] = $this->artikel_model->getLastPost();
		$data['kategori'] = $this->artikel_model->getKategori();

		// var_dump($data['carousel']);die;
		$this->load->view('template/header1',$data);
		$this->load->view('artikel/index', $data);
		$this->load->view('template/footer1');
	}

	public function search($id=null)
	{
		$data['title'] = 'Cari';
		if ($id==null) {
			if (isset($_POST['submit'])) {
				$id = 0;
				$post = $_POST['search'];
			}else{
				redirect(base_url());
			}
		}else{
			$post=null;
		}

		$data['artikel'] = $this->artikel_model->searchArtikel($id,$post);
		$data['kategori'] = $this->artikel_model->getKategori();
		$this->load->view('template/header1',$data);
		$this->load->view('artikel/search',$data);
		// $this->load->view('template/footer2');
	}

	public function baca($id)
	{
		$data['artikel'] = $this->artikel_model->read($id);
		$data['title'] = $data['artikel'][0]['judul'];
		$this->load->view('template/header1',$data);
		$this->load->view('artikel/baca',$data);
		$this->load->view('template/footer1');
	}

}
