<?php
    class about_model extends CI_Model{
        private $table = 'kontak';
        public function input($data){
            $this->db->insert($this->table,$data);
        }

        public function getData(){
            return $this->db->get($this->table)->result_array();
        }
    }