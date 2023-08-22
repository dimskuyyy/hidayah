<?php

class admin_model extends CI_Model
{

    private $table = 'admin';
    private $table2 = 'kategori';
    private $table3 = 'postingan';

    public function register()
    {
        $email = "dimasfauzan1712@gmail.com";
        $pass = password_hash("dimas890", PASSWORD_DEFAULT);

        return $this->db->query("INSERT INTO admin VALUES ('$email','$pass')");
    }

    public function checkDataAdmin($email)
    {
        return $this->db->query("SELECT * FROM $this->table WHERE email = '$email'")->result_array();
    }

    public function getDataAdmin()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function checkSession()
    {
        $row = $this->getDataAdmin();
        foreach ($row as $key) {
            $check = $this->checkDataAdmin($key['email']);
            if (isset($check)) {
                if ($this->session->userdata('ID-US') && $this->session->userdata('LOGIN')) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

    public function loginAdmin($data)
    {
        $email = $data['email'];
        $pass = $data['password'];

        $data = $this->checkDataAdmin($email);
        if (isset($data) == true) {
            $newEmail = $data[0]['email'];
            $newPass = $data[0]['password'];

            if (password_verify($pass, $newPass)) {
                $userdata = array(
                    'ID-US' => $newEmail,
                    'LOGIN' => "LOGIN"
                );
                $this->session->set_userdata($userdata);
            }
        }
    }

    public function logout()
    {
        $userdata = array('ID-US', 'LOGIN');
        $this->session->unset_userdata($userdata);
    }




    //*****************************************************************************
    // UPLOAD METHOD
    public function getKategori()
    {
        return $this->db->get($this->table2)->result_array();
    }

    public function checkKategori($data)
    {
        return $this->db->query("SELECT * FROM $this->table2 WHERE id_kategori='$data' || nama='$data'")->result_array();
    }

    public function inKategori($data)
    {
        $this->db->insert($this->table2, $data);
    }

    public function getLastKategori()
    {
        return $this->db->query("SELECT id_kategori FROM $this->table2 ORDER BY id_kategori DESC LIMIT 1")->row();
    }

    public function input($data)
    {
        $this->db->insert($this->table3,$data);
    }

    public function getImage($id){
        $this->db->select('gambar');
        $this->db->where('id',$id);
        return $this->db->get($this->table3)->result_array();
    }

    public function deletePost($id){
        $this->db->delete($this->table3,array('id'=>$id));
    }
}
