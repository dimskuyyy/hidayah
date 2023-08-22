<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

    class quran_model extends CI_Model{
        
        private $table1 = 'surat';
        private $table2 = 'ayat_quran';
        
        public function getSurah(){
            return $this->db->get($this->table1)->result_array();
        }

        public function getAyat($id){
            $sql = "SELECT * FROM ".$this->table2." WHERE surat=?";
            return $this->db->query($sql,$id)->result_array();
        }

        public function getSpecSurah($id){
            $sql = "SELECT * FROM ".$this->table1." WHERE surat=?";
            return $this->db->query($sql,$id)->result_array();
        }
        public function getId(){
            $this->db->select('surat');
            return $this->db->get($this->table1)->result_array();
        }
    }