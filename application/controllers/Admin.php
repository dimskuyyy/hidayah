<?php
class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('artikel_model');
        $this->load->model('about_model');
    }

    private function handle_error($err)
    {
        $this->error .= nl2br($err . "\n");
    }

    public function index()
    {
        if ($this->admin_model->checkSession() == false) {
            echo "<script>
            alert('Dilarang Masuk');
            window.location='" . base_url('/admin/login') . "';
            </script>";
        } else {
            $data['title']='List Postingan';
            $data['total'] = $this->artikel_model->postRows();

            $this->load->library('pagination');

            $config['base_url'] = base_url('admin/index');
            $config['total_rows'] = $data['total'];
            $config['per_page'] = 12;
            $config['num_links'] = 5;

            //styling
            //full
            $config['full_tag_open']    = '<div><nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">';
            $config['full_tag_close']    = "</nav></div>";

            //first
            $config['first_link']        = '<svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" /></svg>';

            //last
            $config['last_link']        = '<svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" /></svg>';

            //prev
            $config['prev_link']        = '<svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" /></svg>';

            //current
            $config['cur_tag_open']        = '<a href="" aria-current="page" class="relative z-10 inline-flex items-center border border-mytosca bg-indigo-50 px-4 py-2 text-sm font-medium text-mytosca focus:z-20">';
            $config['cur_tag_close']    = '</a>';

            //default class
            $config['attributes']        = array('class' => 'relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20');

            $this->pagination->initialize($config);


            $data['start'] = $this->uri->segment(3);
            $data['page'] = $config['per_page'];
            $data['artikel'] = $this->artikel_model->getAllArtikel($config['per_page'], $data['start']);
            $this->load->view('template/header1',$data);
            $this->load->view('template/adminHeader');
            $this->load->view('admin/index', $data);
        }
    }
    public function upload()
    {
        if ($this->admin_model->checkSession() == false) {
            echo "<script>
            alert('Dilarang Masuk');
            window.location='" . base_url('/admin/login') . "';
            </script>";
        } else {

            //load data
            $data['kategori'] = $this->admin_model->getKategori();
            $data['title'] = "Upload Artikel";

            $this->load->view('template/header1', $data);
            $this->load->view('template/adminHeader');
            $this->load->view('admin/upload', $data);
        }
    }
    public function kontak()
    {
        if ($this->admin_model->checkSession() == false) {
            echo "<script>
            alert('Dilarang Masuk');
            window.location='" . base_url('/admin/login') . "';
            </script>";
        } else {
            $data['title'] = "Kotak Masuk";
            $data['kontak'] = $this->about_model->getData();
            $this->load->view('template/header1',$data);
            $this->load->view('template/adminHeader');
            $this->load->view('admin/kontak', $data);
        }
    }
    public function login()
    {
        if (isset($_POST['login'])) {
            $this->admin_model->loginAdmin($_POST);
        }

        if ($this->admin_model->checkSession() == true) {
            echo "<script>
            alert('Anda Sudah Login');
            window.location='" . base_url('/admin/') . "';
            </script>";
        } else {
            $data['title'] = "Login";
            $this->load->view('template/header1',$data);
            $this->load->view('admin/login');
        }
    }

    public function logout()
    {
        $this->admin_model->logout();
        redirect(base_url('admin/login'));
    }

    public function uploaddata()
    {
        if ($this->admin_model->checkSession() == false) {
            echo "<script>
            alert('Anda Bukan Admin');
            window.location='" . base_url() . "';
            </script>";
        } else {
            $judul      = $this->input->post('judul');
            $tanggal    = $this->input->post('tanggal');
            $kategori   = $this->input->post('kategori');
            $tipe       = $this->input->post('tipe');
            $deskripsi  = $this->input->post('deskripsi');
            $isi        = $this->input->post('isi');
            $img        = $_FILES['gambar'];

            //config
            $config['upload_path']      = "./assets/upload/";
            $config['allowed_types']    = "jpeg|jpg|png";
            $config['encrypt_name']     = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "<script>
            alert('Gagal Upload');
            window.location='" . base_url('/admin/upload') . "';
            </script>";
            } else {
                $img = $this->upload->data();

                //resize configuration
                $config['image_library'] = 'gd2';
                $config['source_image'] = $img['full_path'];
                $config['maintain_ratio'] = TRUE;
                $config['create_thumb'] = TRUE;

                $size = getimagesize($img['full_path']);
                if ($size[0] > 4000) {
                    $width = $size[0] * 0.35;
                    $height = $size[1] * 0.35;
                } else if ($size[0] > 1000) {
                    $width = $size[0] * 0.5;
                    $height = $size[1] * 0.5;
                } else {
                    $width = $size[0] * 0.8;
                    $height = $size[1] * 0.8;
                }

                $config['width'] = $width;
                $config['height'] = $height;

                //load library imagelib
                $this->load->library('image_lib', $config);
                if (!$this->image_lib->resize()) {
                    $this->handle_error($this->image_lib->display_errors());
                }
            }


            $checkCat = $this->admin_model->checkKategori($kategori);

            // var_dump($rowCat->id_kategori);die;
            if (empty($checkCat)) {
                $dataCat = array('nama' => $kategori);
                $this->admin_model->inKategori($dataCat);
                $rowCat = $this->admin_model->getLastKategori();
                $kategori = $rowCat->id_kategori;
            }

            $data = array(
                'judul' => $judul,
                'tanggal' => $tanggal,
                'id_kategori' => $kategori,
                'tipe' => $tipe,
                'deskripsi' => $deskripsi,
                'isi' => $isi,
                'gambar' => $img['file_name']
            );

            $this->admin_model->input($data);
            redirect(base_url('admin/upload/'));
        }
    }

    public function delete($id)
    {
        if ($this->admin_model->checkSession() == false) {
            echo "<script>
            alert('Anda Bukan Admin');
            window.location='" . base_url() . "';
            </script>";
        } else {
            $file = $this->admin_model->getImage($id);
            $file = $file[0]['gambar'];

            $this->admin_model->deletePost($id);
            if (file_exists('assets/upload/' . $file)) {
                $img = explode('.', $file);
                //clear thumb
                unlink('assets/upload/' . $img['0'] . '_thumb.' . $img[1]);

                //clear oriFile
                unlink('assets/upload/' . $file);

                echo "<script>
            alert('Berhasil Di hapus');
            window.location='" . base_url('admin/') . "';
            </script>";
            }
        }
    }
}
