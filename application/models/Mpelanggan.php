<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mpelanggan extends CI_Model
{
    public $table = 'pelanggan';
    public $id = 'id_pelanggan';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    //mengambil data pelanggan
    function jumlah_pelanggan()
    {
      return $this->db->get('pelanggan')->num_rows();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    public function getget($id_pelanggan){
      return $this->db->get_where( $this->table , [ 'id_pelanggan' => $id_pelanggan] )->row();
    }

    // get data login
    function login_username($username)
    {
        $this->db->where('username', $username);
        // $this->db->where('pass', $password);
        return $this->db->get($this->table)->row();
    }

    // get data login
    function login($username,$password)
    {
        $this->db->where('username', $username);
        $this->db->where('pass', $password);
        return $this->db->get($this->table)->row();
    }

    // cek sesion data login
    function cek_sesion_login()
    {
        $status_login=$_SESSION['status_login'];
        if ($status_login != 'oke') {
          redirect(base_url('auth/login'));
        } else {
          redirect(base_url('Cbarang'));
        }
    }

    function get_al_pel()
    {
       $sql = "SELECT pelanggan.id_pelanggan, pelanggan.nama_pel, alamat_pengiriman.alamat_lengkap, pelanggan.no_telp, pelanggan.email, pelanggan.username, pelanggan.pass
       FROM pelanggan JOIN alamat_pengiriman ON pelanggan.id_pelanggan = alamat_pengiriman.id_pelanggan" ;
       return $this->db->query($sql)->result();
    }

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
