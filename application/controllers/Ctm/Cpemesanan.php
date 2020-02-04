<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/jakarta');

class Cpemesanan extends CI_Controller {


	 public function __construct(){
     parent::__construct();
     $this->load->model('Mpemesanan');
		 $this->load->model('Malamatpen');
		 $this->load->model('M_barang');
		 $this->load->model('Mdetailpemesanan');
		 $this->load->model('Mpembayaran');

		 //validasi customer
     if ($this->session->userdata('status_login')!='customer_oke') {
       redirect(base_url('Clogin/login'));
     }

   }
	public function index()
	{
		$data['pemesanan'] = $this->Mpemesanan->get_all_by_id($this->session->userdata('id_pelanggan'));
		// var_dump($data['pemesanan']);die();
		$this->load->view('kerangka/Header');
		$this->load->view('menu_p/Vpemesanan',$data);
		$this->load->view('kerangka/Footer');
	}

	public function checkout($pemesanan)
	{
		$data["update"]="checkout";
		$data["data_update"] = $this->Mpemesanan->get_join_row_by_id_pesan($pemesanan);
		// echo $pemesanan;
		// var_dump(	$data["data_update"]);
		// die();
		$data['alamat_pengiriman'] = $this->Malamatpen->get_all();
			$this->load->view('kerangka/Header');
			$this->load->view('menu_p/Vcheckout', $data);
			$this->load->view('kerangka/Footer');
	}
	public function update_action()
	{
		$data_update = array(
			// "id_kota" => $this->input->post('id_kota'),
			"alamat_lengkap" => $this->input->post('alamat_lengkap'),
		);
		// var_dump($data_update);
		$this->Mpemesanan->update($this->input->post('id_pesan'),$data_update);

		redirect(base_url("Ctm/Cpemesanan"));

	}
	public function delete_relasi(){
		error_reporting(1);
		//ambil data detail pemesanan
		$detail_pemesanan = $this->Mdetailpemesanan->get_join_row_by_id_pesan(@$this->input->get('id_pesan'));
		// print_r($detail_pemesanan);die();

		foreach ($detail_pemesanan as $key_data) {
			//ambil data barang
			$data_barang = $this->M_barang->get_by_id(@$key_data->id_barang);

			// set data update barang
			$data_update = array(
				"stok" => @$data_barang->stok + @$key_data->jumlah_pesan,
			);

			// update barang
			$update = $this->M_barang->update($key_data->id_barang, $data_update);

			//jika sukses hapus data detail pemesanan
			if ($update == true) {
				$delete_detail_pemesanan = $this->Mdetailpemesanan->delete(@$key_data->id_det_pem);
			}

		}

		$delete_pembayaran = $this->Mpembayaran->delete(@$this->input->get('id_pembayaran'));
		$delete_pemesanan = $this->Mpemesanan->delete(@$this->input->get('id_pesan'));
		if ($delete_pembayaran == true && $delete_pemesanan == true) {
			$this->session->set_flashdata('info', 'sukses');
			$this->session->set_flashdata('message', 'Pembatalan Pesan Sukses');
		} else {
			$this->session->set_flashdata('info', 'gagal');
			$this->session->set_flashdata('message', 'Pembatalan Pesan Gagal');
		}
		// die();
		redirect("Ctm/Criw");
	}
}
