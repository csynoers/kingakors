<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clap_barang extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mkota');
    $this->load->model('M_barang');
    $this->load->model('M_kategori');
    if ($this->session->userdata('status_login') != 'admin_oke') {
      redirect(base_url('clogin/login'));
    }
  }

  public function index()
  {
    $data['kodeunik'] = $this->M_barang->buat_kode();
    $data['barang'] = $this->M_barang->get_all();
    $data['kategori'] = $this->M_kategori->get_all();
    $this->load->view('template/Header');
    $this->load->view('menu_a/vLapBarang', $data);
    $this->load->view('template/Footer');
  }
}
