<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mprov extends CI_Model
{

    public $table = 'provinsi';
    public $id = 'id_prov';
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
  		  $this->db->select('RIGHT(provinsi.id_prov,2) as prov', FALSE);
  		  $this->db->order_by('id_prov','DESC');
  		  $this->db->limit(1);
  		  $query = $this->db->get('provinsi');      //cek dulu apakah ada sudah ada kode di tabel.
  		  if($query->num_rows() <> 0){
  		   //jika kode ternyata sudah ada.
  		   $data = $query->row();
  		   $prov = intval($data->prov) + 1;
  		  }
  		  else {
  		   //jika kode belum ada
  		   $prov = 1;
  		  }
  		  $kodemax = str_pad($prov, 2, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
  		  $kodejadi = "PRO-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
  		  return $kodejadi;
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

    // function get_join_row_by_id_prov($id)
    // {
    //   $this->db->select('*,alamat_pengiriman.id_prov as id_provi ');
    //   $this->db->from('alamat_pengiriman');
    //   $this->db->join('provinsi','provinsi.id_prov = alamat_pengiriman.id_prov');
    //   $this->db->where('Provinsi.id_prov', $id);
    //   return $this->db->get()->row();
    // }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
