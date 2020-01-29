<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clap_pelanggan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mpelanggan');
    $this->load->model('Malamatpen');

    if ($this->session->userdata('status_login') != 'admin_oke') {
      redirect(base_url('clogin/login'));
    }
  }

  public function index()
  {
    $data['pelanggan'] = $this->Mpelanggan->get_al_pel();
    $this->load->view('template/Header');
    $this->load->view('menu_a/Vlap_Pelanggan', $data);
    $this->load->view('template/Footer');
  }
}
/* End of file ${TM_FILENAME:} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)//:application/controllers/} */
