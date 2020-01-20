<?php
class Login_model extends CI_Model{
    //cek user dan pass admin
    function auth_admin($username,$password){
        $query=$this->db->query("SELECT * FROM admin WHERE username='$username' AND pass=MD5('$password') LIMIT 1");
        return $query;
    }

    //cek user dan pass pelanggan
    function auth_pelanggan($username,$password){
        $query=$this->db->query("SELECT * FROM pelanggan WHERE username='$username' AND pass=MD5('$password') LIMIT 1");
        return $query;
    }

}
