<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/jakarta');

class Cbarang extends CI_Controller {
  private $idKategori = "";

   public function __construct(){
     parent::__construct();
     $this->load->model('M_barang');
     $this->load->model('Mpemesanan');
     $this->load->model('Mdetailpemesanan');
     if ($this->session->userdata('status_login')!='customer_oke') {
       redirect(base_url('clogin/login'));
     }
     // $this->idKategori = $idKategori;
   }

  public function setKategori($value){
    $this->idKategori = $value;
    $this->index();
  }

  public function index()
  {
    if ($this->idKategori == "") {
      // $data['kategori'] = [null];
      $this->session->set_userdata('kategori', null);
      $data['barang'] = $this->M_barang->get_alls();
      // echo "no inputan";
    }else {
      $data['barang'] = $this->M_barang->get_result_by_id_kategori($this->idKategori);
      // $data['kategori'] = [ $this->idKategori];
      $this->session->set_userdata('kategori', $this->idKategori);
      // echo "ada input".$this->idKategori;
    }
    // var_dump($data);
		$data['cart'] = $this->Mdetailpemesanan->get_cart_row($this->session->userdata('id_pelanggan'));
    $this->load->view('kerangka/header', $data);
    $this->load->view('menu_p/V_barang', $data);
    $this->load->view('kerangka/footer');
    // echo $this->idKategori."akwejflkj";
  }

  public function detailbarang($idbarang)
  {
    $data['barang'] = $this->M_barang->get_by_id($idbarang);
    // var_dump($this->m_barang->get_by_id($idbarang));
    // die();
    $this->load->view('kerangka/header');
    $this->load->view('menu_p/Vdetail_barang',$data);
    $this->load->view('kerangka/footer');
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
    redirect(base_url('Ctm/Cpemesanan'));
  }

  public function add_keranjang()
  {
    $idbarang = $this->input->post('id_barang');
    $qty = $this->input->post('quantity');

    // echo "<pre> id_barang = ";
    // print_r ($idbarang);
    // echo "<br> <br> qty = ";
    // print_r ($qty);
    // echo "</pre>";
    // die();
    $cart = $this->Mdetailpemesanan->get_info_detail_barang($this->session->userdata('id_pelanggan'),$idbarang);
    $q = 0;
    if ($cart->num_rows() == 1) {
      // echo "barang sudah ada";
      $q = $qty;
      foreach ($cart->result() as $row) {
        // echo $row->jumlah_pesan.$row->id_barang;
        $q += $row->jumlah_pesan;
      }
      $data = array(
        'jumlah_pesan' => $q
      );
      $updt = $this->Mdetailpemesanan->update_cart($this->session->userdata('id_pelanggan'),$idbarang,$data);
      if($updt){
        redirect(base_url('Ctm/Ckeranjang'));
      }else{
        echo "gagal update data lama cart";
      }
    }else{
      echo "barang belum ada";
      $data = array(
        'id_det_pem' => $nomor_pesanan,
        'id_barang' => $idbarang,
        'jumlah_pesan' => $qty,
        'id_pelanggan' => $this->session->userdata('id_pelanggan')
      );
      $insert = $this->Mdetailpemesanan->insert($data);
      if($insert){
        redirect(base_url('Ctm/Ckeranjang'));
      }else{
        echo "gagal tambah data cart";
      }
    }
  }

}
