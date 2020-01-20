<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mkecamatan extends CI_Model
{

    public $table = 'kecamatan';
    public $id = 'id_kec';
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
      $this->db->join('kota',$this->table.'.id_kota = kota.id_kota');
      $this->db->order_by($this->id, $this->order);
      return $this->db->get()->result();

    }

    public function buat_kode()
    {
        $this->db->select('RIGHT(kecamatan.id_kec,3) as kec', FALSE);
        $this->db->order_by('id_kec','DESC');
        $this->db->limit(1);
        $query = $this->db->get('kecamatan');      //cek dulu apakah ada sudah ada kode di tabel.
        if($query->num_rows() <> 0){
         //jika kode ternyata sudah ada.
         $data = $query->row();
         $kec = intval($data->kec) + 1;
        }
        else {
         //jika kode belum ada
         $kec = 1;
        }
        $kodemax = str_pad($kec, 3, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $kodejadi = "KEC-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
        return $kodejadi;
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get kota
    function get_kecamatan($id_kota)
    {
      $this->db->from($this->table);
      $this->db->where('id_kota', $id_kota);
      return $this->db->get()->result();
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
