<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class c_barang extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('M_barang');
    $this->load->model('Mpemesanan');
    $this->load->model('Mdetailpemesanan');
  }

  public function index()
  {
    $data['barang'] = $this->M_barang->get_alls();
    $this->load->view('kerangka/Header');
    $this->load->view('Vbarang', $data);
    $this->load->view('kerangka/Footer');
  }

    public function detailbarang($idbarang)
    {
      $data['barang'] = $this->M_barang->get_by_id($idbarang);
      // var_dump($this->m_barang->get_by_id($idbarang));
      // die();
      $this->load->view('kerangka/Header');
      $this->load->view('menu_p/Vdetail_barang',$data);
      $this->load->view('kerangka/Footer');
    }

    public function add_cart()
    {
      $idbarang = $this->input->post('id_barang');
      $qty = $this->input->post('quantity');
      $lastinsert = $this->Mpemesanan->get_last_pesan();

      $no_urut = (int) substr($lastinsert->id_pemesanan,12,3);
      $tambah_no_urut = $no_urut+1;
      $nomor_pesanan = "FNR".date("mdY")."-".sprintf("%03s",$tambah_no_urut);

      $data = array(
        'id_pesan' => $nomor_pesanan,
        'id_barang' => $idbarang,
        'jumlah_pesan' => $qty,
        'tgl_pesan' => date('Y-m-d'),
        'id_pelanggan' => $this->session->userdata('id_pelanggan')
      );
      $insert = $this->Mpemesanan->insert($data);
      // var_dump($this->session->userdata('id_pelanggan'));
      // die();
      redirect(base_url('Ctm/Cpemesanan'));
    }

    public function add_keranjang()
    {
      $idbarang = $this->input->post('id_barang');
      $qty = $this->input->post('quantity');

      $data = array(
        'id_det_pem' => $nomor_pesanan,
        'id_barang' => $idbarang,
        'jumlah_pesan' => $qty,
        'id_pelanggan' => $this->session->userdata('id_pelanggan')
      );
      $insert = $this->Mdetailpemesanan->insert($data);
      // var_dump($this->session->userdata('id_pelanggan'));
      // die();
      redirect(base_url('Ctm/Ckeranjang'));
    }
}
