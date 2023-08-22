<?php
class artikel_model extends CI_Model
{
    private $table = 'postingan';
    private $table2 = 'kategori';

    public function getAllArtikel($limit, $start)
    {
        $this->db->select('id, judul, tanggal, deskripsi, tipe, gambar');
        // $this->db->where('tipe','Artikel');
        $this->db->order_by('tanggal', 'desc');
        return $this->db->get($this->table, $limit, $start)->result_array();
    }

    public function read($id)
    {
        $data = array('id' => $id);
        return $this->db->get_where($this->table, $data)->result_array();
    }

    public function postRows()
    {
        return $this->db->get($this->table)->num_rows();
    }

    public function getLastPost()
    {
        $this->db->select('id, judul, deskripsi, gambar');
        $this->db->order_by('tanggal', 'desc');
        return $this->db->get($this->table, 2)->result_array();
    }

    public function getKategori()
    {
        return $this->db->get($this->table2)->result_array();
    }

    public function searchArtikel($id, $post)
    {
        $this->db->select('id, judul, deskripsi, tanggal, gambar');
        $this->db->where('id_kategori', $id);
        if ($post != null) {
            $this->db->or_like('judul', $post);
        }
        return $this->db->get($this->table)->result_array();
    }

    public function getId(){
        $this->db->select('id');
        return $this->db->get($this->table)->result_array();
    }
}
