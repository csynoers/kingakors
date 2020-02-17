<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clap_penjualan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mpelanggan');
    $this->load->model('Malamatpen');
    $this->load->model('Mpemesanan');
    $this->load->model('Mdetailpemesanan');
    $this->load->model('M_barang');
    $this->load->model('M_kategori');
    if ($this->session->userdata('status_login') != 'admin_oke') {
      redirect(base_url('clogin/login'));
    }
  }

  public function index()
  {
    $data['penjualan'] = $this->Mpemesanan->get_pesanan_fix();
    $this->load->view('template/Header');
    $this->load->view('menu_a/vLapPenjualan', $data);
    $this->load->view('template/Footer');
  }

  public function print_struct()
  {
    // print_r($this->input->post());
    // die();
    $id = $this->input->post('id_pesan');
    $data['det_pesanan'] = $this->Mpemesanan->getDetailRiwayat($id);
    $data['pembayaran'] = $this->Mpemesanan->get_pesanan_where($id);
    print_r($data);
    $this->load->library('pdf');
    $this->pdf->setPaper('A4', 'landscape');
    $this->pdf->filename = "Struct-Pembelian.pdf";
    $this->pdf->load_view('print/struct_pemesanan', $data);
  }

}

/* End of file ${TM_FILENAME:} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)//:application/controllers/} */
