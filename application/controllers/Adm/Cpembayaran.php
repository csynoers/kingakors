<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cpembayaran  extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mpemesanan');
    $this->load->model('Mpelanggan');
    $this->load->model('Mpembayaran');
    $this->load->model('Mmetpem');
    if ($this->session->userdata('status_login') != 'admin_oke') {
      redirect(base_url('Clogin/login'));
    }
  }
  public function index()
  {
    $data['pembayaran'] = $this->Mpembayaran->get_pembayaran($this->session->userdata('id_pembayaran'));
    $this->load->view('template/Header');
    $this->load->view('menu_a/Vpembayaran', $data);
    $this->load->view('template/Footer');
  }

  public function update($id_pembayaran)
  {
    $data['update'] = 'update';
    $data['pembayaran'] = $this->Mpembayaran->get_pembayaran($this->session->userdata('id_pembayaran'));
    $data['data_update'] = $this->Mpembayaran->get_by_id($id_pembayaran);
    $data['detail_pembayaran'] = $this->Mpembayaran->get_detail_pembayaran( $this->uri->segment(4) )[0];
    $this->load->view('template/Header');
    $this->load->view('menu_a/Vpembayaran', $data);
    $this->load->view('template/Footer');
  }

  public function update_action()
  {
    //data yang akan di ubah dimasukkan ke array
    if ($this->input->post('verifikasi') == 1) {
      //data yang akan di ubah dimasukkan ke array
      $data = array(
        'verifikasi' => 'selesai'
      );

      // mengirimkan data primary key dan data yang akan di ubah
      $this->Mpembayaran->update($this->input->post('id_pembayaran'), $data);
    }

    redirect(base_url("Adm/Cpembayaran"));
  }
}
