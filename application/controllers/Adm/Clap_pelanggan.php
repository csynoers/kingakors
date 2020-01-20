<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clap_pelanggan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mpelanggan');
    if ($this->session->userdata('status_login') != 'admin_oke') {
      redirect(base_url('clogin/login'));
    }
  }

  public function index()
  {
    $data['pelanggan'] = $this->Mpelanggan->get_all();
    $this->load->view('template/header');
    $this->load->view('menu_a/VLap_pelanggan', $data);
    $this->load->view('template/footer');
  }
}
/* End of file ${TM_FILENAME:} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)//:application/controllers/} */
