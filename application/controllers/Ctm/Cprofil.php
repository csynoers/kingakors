<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/jakarta');

class cprofil extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mpelanggan');
    $this->load->model('Mpemesanan');
    $this->load->model('Mdetailpemesanan');
    $this->load->model('Mprov');
    $this->load->model('Mkota');
    $this->load->model('Mkecamatan');
    $this->load->model('Malamatpen');
  }

  public function index()
  {
    $data['cart'] = $this->Mdetailpemesanan->get_cart_row($this->session->userdata('id_pelanggan'));
    $data['pelanggan'] = $this->Mpelanggan->get_all_by_id($this->session->userdata('id_pelanggan'));
    $data['pemesanan'] = $this->Mpemesanan->get_riwayat($this->session->userdata('id_pelanggan'));
    $data['kecamatan'] = $this->Mkecamatan->get_join_all();
    $data['kota'] = $this->Mkota->get_join_all();
    $data['provinsi'] = $this->Mprov->get_all();
    $data['alamat_pengiriman'] = $this->Malamatpen->get_all_by_id($this->session->userdata('id_pelanggan'));
    $this->load->view('kerangka/Header', $data);
    $this->load->view('menu_p/Vprofil', $data);
    $this->load->view('kerangka/Footer');
  }

  public function update($id_pelanggan)
  {
    $data['update'] = 'update';
    $data['data_update'] = $this->Mpelanggan->get_by_id($id_pelanggan);

    $data['pelanggan'] = $this->Mpelanggan->get_all_by_id($this->session->userdata('id_pelanggan'));
    $data['pemesanan'] = $this->Mpemesanan->get_riwayat($this->session->userdata('id_pelanggan'));
    $data['alamat_pengiriman']=$this->Malamatpen->get_all_by_id($this->session->userdata('id_pelanggan'));
    $this->load->view('kerangka/Header');
    $this->load->view('menu_p/Vprofil', $data);
    $this->load->view('kerangka/Footer');
  }

  public function update_action()
  {
    //data yang akan di ubah dimasukkan ke array
    $data = array(
      'nama_pel' => $this->input->post('nama_pel'),
      'username' => $this->input->post('username'),
      'pass' => $this->input->post('pass'),
      'email' => $this->input->post('email'),
      'no_telp' => $this->input->post('no_telp')
    );
    // mengirimkan data primary key dan data yang akan di ubah
    $this->Mpelanggan->update($this->input->post('id_pelanggan'), $data);
    redirect(base_url("Ctm/Cprofil"));
  }

  		public function datakota()
  		{
          $data['kota'] = $this->Mkota->get_all();
          $this->load->view('kerangka/Header');
          $this->load->view('menu_p/Vprofil', $data);
          $this->load->view('kerangka/Footer');
      }

  		public function dataprov()
  		{
  			$data['provinsi'] = $this->Mprov->get_all();
  			$this->load->view('kerangka/Header');
  			$this->load->view('menu_p/Vprofil', $data);
  			$this->load->view('kerangka/Footer');
  	}

  		public function cari_kota_ajax()
      {
          $provinsi= $this->input->get('provinsi');
          $kota = $this->Mkota->get_kota($provinsi);
          $json = json_encode($kota,JSON_PRETTY_PRINT);
          echo $json;
  		}

  		public function cari_kecamatan_ajax()
      {
          $kota= $this->input->get('kota');
          $kecamatan = $this->Mkecamatan->get_kecamatan($kota);
          $json = json_encode($kecamatan,JSON_PRETTY_PRINT);
          echo $json;
  		}

      public function insert_action1(){
        $data = array(
          "id_pelanggan" => $this->session->userdata('id_pelanggan'),
          "nama" => $this->input->post('nama'),
  				"no_tlpn" => $this->input->post('no_tlpn'),
  				"id_prov" => $this->input->post('id_prov'),
          "kota" => $this->input->post('id_kota'),
          "kecamatan" => $this->input->post('id_kecamatan'),
  				"alamat_lengkap" => $this->input->post('alamat_lengkap'),
        );
        $this->Malamatpen->insert($data);
        redirect(base_url("Ctm/Cprofil"));
      }

    	public function update1($id_al_peng)
      {
        $data["update1"]="update1"; //letak kesalahan nya
        $data["data_update"] = $this->Malamatpen->get_by_id($id_al_peng);
        // var_dump($data["data_update"]);die();
        $data['provinsi'] = $this->Mprov->get_all();
        $data['kota'] = $this->Mkota->get_all();
        $data['kecamatan'] = $this->Mkecamatan->get_all();
        $data['alamat_pengiriman'] = $this->Malamatpen->get_all_by_id($this->session->userdata('id_pelanggan'));
        $data['pelanggan'] = $this->Mpelanggan->get_all_by_id($this->session->userdata('id_pelanggan'));
        $this->load->view('kerangka/Header');
        $this->load->view('menu_p/Vprofil', $data);
        $this->load->view('kerangka/Footer');
     	}

      	public function update_action1(){
      		$data_update = array(
         		"id_pelanggan" => $this->session->userdata('id_pelanggan'),
            "nama" => $this->input->post('nama'),
      			"no_tlpn" => $this->input->post('no_tlpn'),
  					"id_prov" => $this->input->post('id_prov'),
  					"kota" => $this->input->post('id_kota'),
  					"kecamatan" => $this->input->post('id_kecamatan'),
  					"alamat_lengkap" => $this->input->post('alamat_lengkap'),

      		);
      		// var_dump($data_update);
          $this->Malamatpen->update($this->input->post('id_al_peng'),$data_update);

      		redirect(base_url("Ctm/Cprofil"));

      	}
          public function hapus1(){
            $id = $this->input->post("id");
            $hapus_data = $this->Malamatpen->delete($id);
            // echo "data terhapus";
            redirect(base_url("Ctm/Cprofil"));
          }
        }
