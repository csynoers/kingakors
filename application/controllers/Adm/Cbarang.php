<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cbarang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_barang');
		$this->load->model('M_kategori');
		if ($this->session->userdata('status_login') != 'admin_oke') {
			redirect(base_url('Clogin/login'));
		}
	}

	public function index()
	{
		$data['kodeunik'] = $this->M_barang->buat_kode();
		$data['barang'] = $this->M_barang->get_alls();
		$data['kategori'] = $this->M_kategori->get_all();
		$this->load->view('template/Header');
		$this->load->view('menu_a/Vbarang', $data);
		$this->load->view('template/Footer');
	}
	public function insert_action()
	{
		//directory upload
		$path_asli = './assets/uploads/';

		$config['upload_path'] = $path_asli;

		//type file gambar yang boleh di upload
		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		//maksimal upload size (kb)
		$config['max_size'] = '5120';
		$config['file_name'] = date('YmdHis');

		//memangil library upload
		$this->load->library('upload', $config);

		//eksekusi configurasi foto
		$this->upload->initialize($config);

		//upload gambar 1
		if (!$this->upload->do_upload('gambar1')) {
			$error = array('error' => $this->upload->display_errors());
			$nama_file_upload = null;
			// var_dump($error);

		} else {
			$data = array('upload_data' => $this->upload->data());
			// var_dump($data);
			$file_upload = $this->upload->data('file_name');
			//proses kompres data
			$nama_file_upload = $this->M_barang->image_compressor($file_upload, $path_asli);
		}

		//upload gambar 2
		if (!$this->upload->do_upload('gambar2')) {
			$error = array('error' => $this->upload->display_errors());
			$nama_file_upload2 = null;
			// var_dump($error);
		} else {
			$data = array('upload_data' => $this->upload->data());
			// var_dump($data);
			$file_upload2 = $this->upload->data('file_name');
			$nama_file_upload2 = $this->M_barang->image_compressor2($file_upload2, $path_asli);
		}

		$data = array(
			"id_barang" => $this->input->post('id_barang'),
			"merek" => $this->input->post('nama'),
			"diskripsi" => $this->input->post('deskripsi'),
			"gambar" => $nama_file_upload,
			"gambar1" => $nama_file_upload2,
			"harga" => $this->input->post('harga'),
			"stok" => $this->input->post('stok'),
			"id_kategori" => $this->input->post('id_kategori'),
			"tanggal_masuk" => $this->input->post('tanggal_masuk'),
		);
		$this->M_barang->insert($data);
		redirect(base_url("Adm/Cbarang"));
	}

	public function update($id_barang)
	{
		$data["update"] = "update";
		$data["data_update"] = $this->M_barang->get_by_id($id_barang);
		$data['barang'] = $this->M_barang->get_alls();
		$data['kategori'] = $this->M_kategori->get_all();
		$this->load->view('template/Header');
		$this->load->view('menu_a/Vbarang', $data);
		// $this->load->view('template/Footer');

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

		if (!$this->upload->do_upload('gambar1')) {
			$error = array('error' => $this->upload->display_errors());
			$nama_file_upload = null;
			// var_dump($error);
		} else {
			$data = array('upload_data' => $this->upload->data());
			// var_dump($data);
			$file_upload = $this->upload->data('file_name');
			$nama_file_upload = $this->M_barang->image_compressor($file_upload, $path_asli);
		}

		if (!$this->upload->do_upload('gambar2')) {
			$error = array('error' => $this->upload->display_errors());
			$nama_file_upload2 = null;
			// var_dump($error);
		} else {
			$data = array('upload_data' => $this->upload->data());
			// var_dump($data);
			$file_upload2 = $this->upload->data('file_name');
			$nama_file_upload2 = $this->M_barang->image_compressor2($file_upload2, $path_asli);
		}

		$data_update = array(
			"merek" => $this->input->post('nama'),
			"diskripsi" => $this->input->post('deskripsi'),
			"gambar" => $nama_file_upload,
			"gambar1" => $nama_file_upload2,
			"harga" => $this->input->post('harga'),
			"stok" => $this->input->post('stok'),
			"id_kategori" => $this->input->post('id_kategori'),
			"tanggal_masuk" => $this->input->post('tanggal_masuk'),
		);
		// var_dump($data_update);
		$this->M_barang->update($this->input->post('id_barang'), $data_update);

		redirect(base_url("Adm/Cbarang"));
	}


	public function data()
	{
		$data['barang'] = $this->M_barang->get_alls();
		$this->load->view('menu_a/Vbarang', $data);
	}

	public function hapus()
	{
		$id = $this->input->post("id");
		$hapus_data = $this->M_barang->delete($id);
		// echo "data terhapus";
		redirect("Adm/Cbarang");
	}
}
