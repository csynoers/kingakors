<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Madmin extends CI_Model
{
    public $table = 'admin';
    public $id = 'id_admin';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function login($username,$password)
    {
        $this->db->where('username', $username);
        $this->db->where('pass', $password);
        return $this->db->get($this->table)->row();
    }


    function get_all_by_id($id)
    {
      $this->db->order_by($this->id, $this->order);
      $this->db->where('id_admin', $id);
      return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
