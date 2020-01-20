<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdetailpemesanan extends CI_Model
{

    public $table = 'detail_pemesanan';
    public $id = 'id_det_pem';
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
    function get_null_id_pesan($id)
    {    
      $this->db->select('*,pelanggan.id_pelanggan as id_pelangg, detail_pemesanan.id_barang as id_brg');
      $this->db->from('detail_pemesanan');
      $this->db->join('pelanggan','pelanggan.id_pelanggan = detail_pemesanan.id_pelanggan');
      $this->db->join('barang','barang.id_barang = detail_pemesanan.id_barang');
      $this->db->order_by('detail_pemesanan.id_det_pem', 'DESC');
      $this->db->where('detail_pemesanan.id_pelanggan', $id);
      $this->db->where('detail_pemesanan.id_pesan', null);
      return $this->db->get()->result();
    }

    function get_cart_row($id)
    {    
      $this->db->select('*,pelanggan.id_pelanggan as id_pelangg, detail_pemesanan.id_barang as id_brg');
      $this->db->from('detail_pemesanan');
      $this->db->join('pelanggan','pelanggan.id_pelanggan = detail_pemesanan.id_pelanggan');
      $this->db->join('barang','barang.id_barang = detail_pemesanan.id_barang');
      $this->db->order_by('detail_pemesanan.id_det_pem', 'DESC');
      $this->db->where('detail_pemesanan.id_pelanggan', $id);
      $this->db->where('detail_pemesanan.id_pesan', null);
      return $this->db->get();
    }

    // get all join
    function get_row_null_id_pesan($id)
    {
        
        $this->db->select('*,pelanggan.id_pelanggan as id_pelangg, detail_pemesanan.id_barang as id_brg');
        $this->db->from('detail_pemesanan');
        $this->db->join('pelanggan','pelanggan.id_pelanggan = detail_pemesanan.id_pelanggan');
        $this->db->join('barang','barang.id_barang = detail_pemesanan.id_barang');
        $this->db->where('detail_pemesanan.id_det_pem', $id);
        
        return $this->db->get()->row();
    }
    
    public function get_info_detail_barang($id,$idBrg)
    {      
        $this->db->select('*,pelanggan.id_pelanggan as id_pelangg, detail_pemesanan.id_barang as id_brg');
        $this->db->from('detail_pemesanan');
        $this->db->join('pelanggan','pelanggan.id_pelanggan = detail_pemesanan.id_pelanggan');
        $this->db->join('barang','barang.id_barang = detail_pemesanan.id_barang');
        $this->db->order_by('detail_pemesanan.id_det_pem', 'DESC');
        $this->db->where('detail_pemesanan.id_pelanggan', $id);
        $this->db->where('detail_pemesanan.id_barang', $idBrg);
        $this->db->where('detail_pemesanan.id_pesan', null);
        return $this->db->get();
    }

    public function cek_barang_keranjang($id,$idBrg)
    {      
        $this->db->select('*,pelanggan.id_pelanggan as id_pelangg, detail_pemesanan.id_barang as id_brg');
        $this->db->from('detail_pemesanan');
        $this->db->join('pelanggan','pelanggan.id_pelanggan = detail_pemesanan.id_pelanggan');
        $this->db->join('barang','barang.id_barang = detail_pemesanan.id_barang');
        $this->db->order_by('detail_pemesanan.id_det_pem', 'DESC');
        $this->db->where('detail_pemesanan.id_pelanggan', $id);
        $this->db->where('detail_pemesanan.id_barang', $idBrg);
        $this->db->where('detail_pemesanan.id_pesan', null);
        return $this->db->get();
    }

    // // get all join
    // function get_all_by_id($id)
    // {
        
    //   $this->db->select('*,pelanggan.id_pelanggan as id_pelangg, pemesanan.id_barang as id_brg');
    //   $this->db->from('pemesanan');
    //   $this->db->join('pelanggan','pelanggan.id_pelanggan = pemesanan.id_pelanggan');
    //   $this->db->join('barang','barang.id_barang = pemesanan.id_barang');
    //   $this->db->order_by('pemesanan.tgl_pesan', 'DESC');
    //   $this->db->where('pemesanan.id_pelanggan', $id);
    //   $this->db->where('pemesanan.id_al_peng', null);
      
    //   return $this->db->get()->result();
    // }

    // // get all join
    // function get_pesanan_by_id($id)
    // {
        
    //   $this->db->select('*,pelanggan.id_pelanggan as id_pelangg, pemesanan.id_barang as id_brg');
    //   $this->db->from('pemesanan');
    //   $this->db->join('pelanggan','pelanggan.id_pelanggan = pemesanan.id_pelanggan');
    //   $this->db->join('barang','barang.id_barang = pemesanan.id_barang');
    //   $this->db->order_by('pemesanan.tgl_pesan', 'DESC');
    //   $this->db->where('pemesanan.id_pelanggan', $id);
    //   $this->db->where('pemesanan.id_al_peng !=', null);
      
    //   return $this->db->get()->result();
    // }

    // get all join
    function get_join_row_by_id_pesan($id)
    {
      $this->db->select('*,detail_pemesanan.id_pelanggan as id_pelangg, detail_pemesanan.id_barang as id_brg');
      $this->db->from('detail_pemesanan');
      $this->db->join('pelanggan','pelanggan.id_pelanggan = detail_pemesanan.id_pelanggan');
      $this->db->join('barang','barang.id_barang = detail_pemesanan.id_barang');
      $this->db->where('detail_pemesanan.id_pesan', $id);
      return $this->db->get()->result();
    }

    function get_row_by_id_pesan($id)
    {
      $this->db->from('detail_pemesanan');
      $this->db->where('id_pesan', $id);
      return $this->db->get()->row();
    }

    // // get last insert
    // function get_last_pesan()
    // {
    //   $sql = "select max(id_pesan) as id_pemesanan from pemesanan";
    //   return $this->db->query($sql)->row();
    // }

    public function update_cart($idPlg,$idBrg,$isi)
    {
        $this->db->where('detail_pemesanan.id_pelanggan', $idPlg);
        $this->db->where('detail_pemesanan.id_barang', $idBrg);
        $this->db->where('detail_pemesanan.id_pesan', null);
        return $this->db->update($this->table, $isi);
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
    function update_peng($id,$data)
    {
        $this->db->where($this->id, $id);
        return $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
