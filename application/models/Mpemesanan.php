<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Mpemesanan extends CI_Model
{

  public $table = 'pemesanan';
  public $id = 'id_pesan';
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
  function get_all_by_id($id)
  {

    $this->db->select('*,pelanggan.id_pelanggan as id_pelangg, pemesanan.id_barang as id_brg');
    $this->db->from('pemesanan');
    $this->db->join('pelanggan', 'pelanggan.id_pelanggan = pemesanan.id_pelanggan');
    $this->db->join('barang', 'barang.id_barang = pemesanan.id_barang');
    $this->db->order_by('pemesanan.tgl_pesan', 'DESC');
    $this->db->where('pemesanan.id_pelanggan', $id);
    $this->db->where('pemesanan.id_al_peng', null);

    return $this->db->get()->result();
  }

  function get_pesanan($id)
  {
    $this->db->select('*,detail_pemesanan.id_pelanggan, detail_pemesanan.id_barang,
      detail_pemesanan.jumlah_pesan,pemesanan.total_harga_barang,
      pemesanan.ongkir, pemesanan.id_al_peng,
      pemesanan.tgl_pesan');
    $this->db->from('pemesanan');
    $this->db->join('detail_pemesanan', 'pemesanan.id_pesan = detail_pemesanan.id_pesan');
    $this->db->join('alamat_pengiriman', 'pemesanan.id_al_peng = alamat_pengiriman.id_al_peng');
    $this->db->join('pembayaran', 'pemesanan.id_pesan = pembayaran.id_pesan');
    $this->db->join('pelanggan', 'pemesanan.id_pelanggan = pelanggan.id_pelanggan');
    $this->db->join('barang', 'detail_pemesanan.id_barang = barang.id_barang');
    return $this->db->get()->result();
  }

  function get_pesanan_where($id)
  {
    $this->db->select('*');
    $this->db->from('pembayaran');
    $this->db->join('pemesanan', 'pembayaran.id_pesan = pemesanan.id_pesan');
    $this->db->join('alamat_pengiriman','alamat_pengiriman.id_al_peng=pemesanan.id_al_peng');
    $this->db->join('pelanggan', 'pemesanan.id_pelanggan = pelanggan.id_pelanggan');
    // $this->db->join('metode_pembayaran', 'pembayaran.id_met_pem = metode_pembayaran.id_met_pem');
    $this->db->where('pembayaran.id_pesan', $id);
    return $this->db->get()->result();
  }

  function get_pesanan_fix($from = "0", $to = "0")
  {
    $this->db->select('*');
    $this->db->from('pembayaran');
    $this->db->join('pemesanan', 'pembayaran.id_pesan = pemesanan.id_pesan');
    $this->db->join('pelanggan', 'pemesanan.id_pelanggan = pelanggan.id_pelanggan');
    // $this->db->join('metode_pembayaran', 'pembayaran.id_met_pem = metode_pembayaran.id_met_pem');
    $this->db->where('verifikasi', 'selesai');
    if ($from != "0" && $to != "0") {
      $this->db->where('tgl_bayar >=', $from);
      $this->db->where('tgl_bayar <=', $to);
      $this->db->order_by('tgl_bayar', 'ASC');
    }

    $res = $this->db->get();
    if (!$res) {
      return $this->db->error();
    } else {
      return $res->result();
    }
  }

  function get_riwayat($id)
  {
    $this->db->select('*');
    $this->db->from('pemesanan');
    // $this->db->join('detail_pemesanan', 'detail_pemesanan.id_pesan = pemesanan.id_pesan');
    $this->db->join('alamat_pengiriman', 'pemesanan.id_al_peng = alamat_pengiriman.id_al_peng');
    $this->db->join('pembayaran', 'pembayaran.id_pesan = pemesanan.id_pesan');
    $this->db->join('pelanggan', 'pemesanan.id_pelanggan = pelanggan.id_pelanggan');
    $this->db->where('pemesanan.id_pelanggan', $id);
    $this->db->order_by('pemesanan.id_pesan', 'DESC');
    return $this->db->get()->result();
  }

  function getDetailRiwayat($id)
  {
    $this->db->select('*');
    $this->db->from('detail_pemesanan');
    $this->db->join('barang', 'detail_pemesanan.id_barang = barang.id_barang');
    $this->db->join('pemesanan', 'detail_pemesanan.id_pesan = pemesanan.id_pesan');
    $this->db->where('detail_pemesanan.id_pesan', $id);
    $this->db->order_by('detail_pemesanan.id_det_pem', 'DESC');
    return $this->db->get();
  }

  function getDetailPes($id)
  {
    $this->db->select('*');
    $this->db->from('detail_pemesanan');
    $this->db->join('barang', 'detail_pemesanan.id_barang = barang.id_barang');
    $this->db->join('pemesanan', 'detail_pemesanan.id_pesan = pemesanan.id_pesan');
    $this->db->where('detail_pemesanan.id_pesan', $id);
    $this->db->order_by('detail_pemesanan.id_det_pem', 'DESC');
    return $this->db->get()->result();
  }

  // get all join
  function get_pesanan_by_id($id)
  {

    $this->db->select('*,pelanggan.id_pelanggan as id_pelangg, pemesanan.id_barang as id_brg');
    $this->db->from('pemesanan');
    $this->db->join('pelanggan', 'pelanggan.id_pelanggan = pemesanan.id_pelanggan');
    $this->db->join('barang', 'barang.id_barang = pemesanan.id_barang');
    $this->db->order_by('pemesanan.tgl_pesan', 'DESC');
    $this->db->where('pemesanan.id_pelanggan', $id);
    $this->db->where('pemesanan.id_al_peng !=', null);

    return $this->db->get()->result();
  }

  // get all join
  function get_pesanan_by_id_pelanggan($id)
  {

    $this->db->select('*,pelanggan.id_pelanggan as id_pelangg');
    $this->db->from('pemesanan');
    $this->db->join('pelanggan', 'pelanggan.id_pelanggan = pemesanan.id_pelanggan');
    $this->db->order_by('pemesanan.tgl_pesan', 'DESC');
    $this->db->where('pemesanan.id_pelanggan', $id);

    return $this->db->get()->result();
  }

  // get all join
  function get_join_row_by_id_pesan($id)
  {
    $this->db->select('*,pemesanan.id_pelanggan as id_pelangg, pemesanan.id_barang as id_brg');
    $this->db->from('pemesanan');
    $this->db->join('pelanggan', 'pemesanan.id_pelanggan = pemesanan.id_pelanggan');
    $this->db->join('barang', 'barang.id_barang = pemesanan.id_barang');
    $this->db->where('pemesanan.id_pesan', $id);
    return $this->db->get()->row();
  }

  // get last insert
  function get_last_pesan()
  {
    $sql = "select max(id_pesan) as id_pemesanan from pemesanan";
    return $this->db->query($sql)->row();
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
    // $this->db->trans_start();
    $this->db->insert($this->table, $data);
    $data['last_id'] = $this->db->insert_id();
    // $this->db->trans_complete();
    return $data;
  }

  // update data
  function update()
  {
    $sql = "UPDATE pemesanan, alamat_pengiriman SET pemesanan.alamat_lengkap = alamat_pengiriman.alamat_lengkap WHERE pemesanan.id_al_peng = alamat_lengkap.id_al_peng";
  }

  // update data
  function update_peng($id, $data)
  {
    $this->db->where($this->id, $id);
    return $this->db->update($this->table, $data);
  }

  // delete data
  function delete($id)
  {
    $this->db->where($this->id, $id);
    return $this->db->delete($this->table);
  }

  function delete_relasi1($id)
  {
    $this->db->WHERE('pembayaran.id_pesan=pemesanan.id_pesan');
    $this->db->WHERE('detail_pemesanan.id_pesan=pemesanan.id_pesan');
    $this->db->WHERE('pemesanan.id_pesan', $id);
    $this->db->DELETE(array('pemesanan', 'detail_pemesanan', 'pembayaran'));
    return $this->db->get()->result();
  }
}
