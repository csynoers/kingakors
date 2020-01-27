<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Malamatpen extends CI_Model
{

    public $table = 'alamat_pengiriman';
    public $id = 'id_al_peng';
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


    // get all join
    function get_join_all()
    {
      $this->db->from($this->table);
      $this->db->join('provinsi',$this->table.'.id_prov = provinsi.id_prov');
      $this->db->join('kota',$this->table.'.kota = kota.id_kota');
      $this->db->join('kecamatan',$this->table.'.kecamatan = kecamatan.id_kec');
      $this->db->order_by($this->id, $this->order);
      return $this->db->get()->result();
    }

    // get all
    function get_all_by_id($id)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('id_pelanggan', $id);
        return $this->db->get($this->table)->result();
    }

    // get join id
    function get_join_id($id)
    {
      $this->db->from($this->table);
      $this->db->join('provinsi',$this->table.'.id_prov = provinsi.id_prov');
      $this->db->join('kota',$this->table.'.kota = kota.id_kota');
      $this->db->join('kecamatan',$this->table.'.kecamatan = kecamatan.id_kec');
      $this->db->where('alamat_pengiriman.id_al_peng', $id);
      return $this->db->get()->row();
    }

    // get all join
    function get_alamat_ready($id)
    {
    $this->db->from($this->table);
    $this->db->where('id_pelanggan', $id);
    $this->db->where('status', 'ready');
    return $this->db->get()->row();
    }


    // get data by id
    function get_by_id($id)
    {
      $this->db->join('kota','alamat_pengiriman.kota=kota.id_kota');
      $this->db->join('kecamatan','alamat_pengiriman.kecamatan=kecamatan.id_kec');
      $this->db->join('pelanggan','alamat_pengiriman.id_pelanggan=pelanggan.id_pelanggan');
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
