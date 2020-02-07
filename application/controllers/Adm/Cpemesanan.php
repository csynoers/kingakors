<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cpemesanan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mpemesanan');
    $this->load->model('M_barang');
    $this->load->model('Mpelanggan');
    $this->load->model('Malamatpen');
    $this->load->model('Mdetailpemesanan');
    $this->load->model('Mpembayaran');
    if ($this->session->userdata('status_login') != 'admin_oke') {
      redirect(base_url('Clogin/login'));
    }
  }
  public function index()
  {
    $data['pemesanan'] = $this->Mpemesanan->get_pesanan($this->session->userdata('id_pesan'));
    $this->load->view('template/Header');
    $this->load->view('menu_a/Vpemesanan', $data);
    $this->load->view('template/Footer');
  }
  public function detail_pesanan()
  {
    print_r($this->uri->segment(4));
  }
  public function update_pesanan()
  {
    print_r($this->uri->segment(4));
  }
}


/* End of file ${TM_FILENAME:cpemesanan.php} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)/cpemesanan/:application/controllers/cpemesanan.php} */
