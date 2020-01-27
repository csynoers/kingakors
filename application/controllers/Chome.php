<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Chome extends CI_Controller {

     public function __construct(){
       parent::__construct();
       $this->load->model('M_kategori');
       $this->load->model('M_barang');
       $this->load->model('Mdetailpemesanan');
  }

  public function index()
  {
		$data['cart'] = $this->Mdetailpemesanan->get_cart_row($this->session->userdata('id_pelanggan'));
    $data['barang']=$this->M_barang->get_limit();
    $this->load->view('kerangka/Header', $data);
    $this->load->view('Vhome', $data);
    $this->load->view('kerangka/Footer');
  }

  public function ktg($id_kategori)
  {
    //
    $data['barang'] = $this->M_barang->get_result_by_id_kategori($id_kategori);
    $this->load->view('kerangka/Header');
    $this->load->view('menu_p/Vkat_barang', $data);
    $this->load->view('kerangka/Footer');
  }

  public function detailbarang($idbarang)
  {
    $data['barang'] = $this->M_barang->get_by_id($idbarang);
    $this->load->view('kerangka/Header');
    $this->load->view('menu_p/Vdetail_barang',$data);
    $this->load->view('kerangka/Footer');
  }

  public function profil_akors()
  {
    $this->load->view('kerangka/Header');
    $this->load->view('Vprofil_akors');
    $this->load->view('kerangka/Footer');
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
