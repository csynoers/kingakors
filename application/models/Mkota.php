<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mkota extends CI_Model
{

    public $table = 'kota';
    public $id = 'id_kota';
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

    public function buat_kode()
    {
  		  $this->db->select('RIGHT(kota.id_kota,3) as kot', FALSE);
  		  $this->db->order_by('id_kota','DESC');
  		  $this->db->limit(1);
  		  $query = $this->db->get('kota');      //cek dulu apakah ada sudah ada kode di tabel.
  		  if($query->num_rows() <> 0){
  		   //jika kode ternyata sudah ada.
  		   $data = $query->row();
  		   $kot = intval($data->kot) + 1;
  		  }
  		  else {
  		   //jika kode belum ada
  		   $kot = 1;
  		  }
  		  $kodemax = str_pad($kot, 3, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
  		  $kodejadi = "KAB-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
  		  return $kodejadi;
    }

    // get all join
    function get_join_all()
    {
      $this->db->from($this->table);
      $this->db->join('provinsi',$this->table.'.id_prov = provinsi.id_prov');
      $this->db->order_by($this->id, $this->order);
      return $this->db->get()->result();
    }


    // get kota
    function get_kota($id_provinsi)
    {
      $this->db->from($this->table);
      $this->db->where('id_prov', $id_provinsi);
      return $this->db->get()->result();
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
