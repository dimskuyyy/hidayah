<?php
class tafsir_model extends CI_Model
{
    private $table = 'tafsir_ayat';
    
    public function getTafsir($id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE surat=?";
        return $this->db->query($sql, $id)->result_array();
    }
}
