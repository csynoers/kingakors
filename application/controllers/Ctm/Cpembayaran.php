<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/jakarta');

class Cpembayaran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mpembayaran');
		$this->load->model('Mpemesanan');
		$this->load->model('Mdetailpemesanan');

		//validasi customer
		if ($this->session->userdata('status_login') != 'customer_oke') {
			redirect(base_url('Clogin/login'));
		}
	}

	public function detail_pembayaran($input =  "")
	{
		$input = str_replace("%22", "", $input);
		// echo $input;
		// die();
		if ($input != "") {
			$id_pembayaran = $input;
			$data["pembayaran"] = $this->Mpembayaran->get_join_by_id($id_pembayaran, 'pemesanan');
		} else {
			$id_pembayaran = $this->input->post('id');
			$data["pembayaran"] = $this->Mpembayaran->get_join_by_id($id_pembayaran, 'pembayaran');
		}
		$data['cart'] = $this->Mdetailpemesanan->get_cart_row($this->session->userdata('id_pelanggan'));

		$this->load->view('kerangka/Header', $data);
		$this->load->view('menu_p/vdetailpembayaran', $data);
		$this->load->view('kerangka/Footer');
	}

	public function update($id_pembayaran)
	{
		$data['update'] = 'update';
		$data['pembayaran'] = $this->Mpembayaran->get_all();
		$data['data_update'] = $this->Mpembayaran->get_join_by_id($id_pembayaran, 'pembayaran');
		$this->load->view('kerangka/Header');
		$this->load->view('menu_p/vdetailpembayaran', $data);
		$this->load->view('kerangka/Footer');
	}

	public function update_action()
	{
		$path_asli = './assets/uploads/';
		$config['upload_path'] = $path_asli;
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '5120';
		$config['file_name'] = date('YmdHis');
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('bukti_transfer')) {
			$error = array('error' => $this->upload->display_errors());
			$nama_file_upload = null;
		} else {
			$data = array('upload_data' => $this->upload->data());
			// var_dump($data);
			$file_upload = $this->upload->data('file_name');
			$nama_file_upload = $this->Mpembayaran->image_compressor($file_upload, $path_asli);
		}
		//data yang akan di ubah dimasukkan ke array
		$data = array(
			"bukti_transfer" => $nama_file_upload,
			"nama_peng" => $this->input->post('nama_peng'),
			// mengirimkan data primary key dan data yang akan di ubah
		);
		$this->Mpembayaran->update($this->input->post('id_pembayaran'), $data);
		// var_dump($data);
		// die();
		redirect(base_url("Ctm/Criw"));
	}


	public function konfirmasi()
	{
		$id_pembayaran = $this->input->post('id');
		$kadaluarsa = $this->db->query("SELECT kadaluarsa FROM pembayaran WHERE id_pembayaran='{$id_pembayaran}'")->result();
		foreach ($kadaluarsa as $key) {
			if ((time() - $key->kadaluarsa) > (60 * 60 * 48)) {
				$this->db->set('verifikasi', 'kadaluarsa');
				$this->db->where('id_pembayaran', $id_pembayaran);
				$this->db->update('pembayaran');
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    <strong>Error!</strong> Verifikasi Gagal, Waktu Pembayaran Telah Habis !
                    </div>');
				redirect('ctm/cprofil');
			}
		}
		$data["pembayaran"] = $this->Mpembayaran->get_join_by_id($id_pembayaran, 'pembayaran');
		// var_dump($data);die();
		$this->load->view('kerangka/Header');
		$this->load->view('menu_p/Vkonfirmasi_pem', $data);
		$this->load->view('kerangka/Footer');
	}
}
