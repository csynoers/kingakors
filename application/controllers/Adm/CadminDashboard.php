<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CadminDashboard extends CI_Controller {

   public function __construct(){
     parent::__construct();
     $this->load->model('M_barang');
     $this->load->model('M_kategori');
     $this->load->model('Mprov');
     $this->load->model('Mkota');
     $this->load->model('Mkecamatan');
     $this->load->model('Mpelanggan');
     $this->load->model('Mpembayaran');
   }
	public function index()
	{
    //memanggil fungsi jumlah_pelanggan dari model Mpelanggan
    $data['jumlah_pelanggan'] = $this->Mpelanggan->jumlah_pelanggan();

      $this->load->view('template/Header');
      // $this->load->view('template/Footer');

}

}
