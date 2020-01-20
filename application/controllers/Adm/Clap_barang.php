<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clap_barang extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mkota');
    $this->load->model('m_barang');
    $this->load->model('m_kategori');
    if ($this->session->userdata('status_login') != 'admin_oke') {
      redirect(base_url('clogin/login'));
    }
  }

  public function index()
  {
    $data['kodeunik'] = $this->m_barang->buat_kode();
    $data['barang'] = $this->m_barang->get_all();
    $data['kategori'] = $this->m_kategori->get_all();
    $this->load->view('template/header');
    $this->load->view('menu_a/vLapBarang', $data);
    $this->load->view('template/footer');
  }
}
