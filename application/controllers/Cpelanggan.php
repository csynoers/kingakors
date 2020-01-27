<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpelanggan extends CI_Controller {

   public function __construct(){
     parent::__construct();
     $this->load->model('Mpelanggan');
   }

   	public function index()
   	{
      $data['pelanggan'] = $this->Mpelanggan->get_all();
   		$this->load->view('template/Header');
   		$this->load->view('menu_pelanggan/Vpelanggan', $data);
   		$this->load->view('template/Footer');
   	}

  public function update($id_pelanggan)
  {
    $data['update']='update';
    $data['pelanggan'] = $this->Mpelanggan->get_all();
    $data['data_update'] = $this->Mpelanggan->get_by_id($id_pelanggan);
    $this->load->view('template/Header');
    $this->load->view('menu_pelanggan/Vpelanggan', $data);
    $this->load->view('template/Footer');
  }
	public function insert_action()
	{
		//data yang akan di ubah dimasukkan ke array
		$data = array(
			'id_pelanggan' => $this->input->post('id_pelanggan'),
      'nama_pel' => $this->input->post('nama_pel'),
			'username' => $this->input->post('username'),
      'pass' => $this->input->post('pass'),
      'email' => $this->input->post('email'),
      'no_telp' => $this->input->post('no_telp'),
      'alamat' => $this->input->post('alamat'),
		);

		// mengirimkan data primary key dan data yang akan di ubah
		$this->Mpelanggan->insert($data);

		redirect(base_url("menu_pelanggan/Vlogin"));
	}

	public function update_action()
  {
		//data yang akan di ubah dimasukkan ke array
    $data = array(
      'nama_pel' => $this->input->post('nama_pel'),
			'username' => $this->input->post('username'),
      'pass' => $this->input->post('pass'),
      'email' => $this->input->post('email'),
      'no_telp' => $this->input->post('no_telp'),
      'alamat' => $this->input->post('alamat') );
		// mengirimkan data primary key dan data yang akan di ubah
		$this->Mpelanggan->update($this->input->post('id_pelanggan'), $data);

    redirect(base_url("customer/Cpelanggan"));
  }

  public function hapus(){
    $id = $this->input->post("id");
    $hapus_data = $this->Mpelanggan->delete($id);
    // echo "data terhapus";
    redirect(base_url("customer/Cpelanggan"));
  }
}
