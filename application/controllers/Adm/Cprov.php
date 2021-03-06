<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cprov extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mprov');
    $this->load->model('Malamatpen');
    if ($this->session->userdata('status_login') != 'admin_oke') {
      redirect(base_url('Clogin/login'));
    }
  }

  public function index()
  {
    $data['kodeunik'] = $this->Mprov->buat_kode();
    $data['provinsi'] = $this->Mprov->get_all();
    $this->load->view('template/Header');
    $this->load->view('menu_a/Vprov', $data);
    $this->load->view('template/Footer');
  }

  public function data()
  {
    $data['provinsi'] = $this->Mprov->get_all();
    $this->load->view('template/Header');
    $this->load->view('menu_a/Vprov', $data);
  }

  public function update($id_prov)
  {
    $data['update'] = 'update';
    $data['provinsi'] = $this->Mprov->get_all();
    $data['data_update'] = $this->Mprov->get_by_id($id_prov);
    $this->load->view('template/Header');
    $this->load->view('menu_a/Vprov', $data);
  }

  public function insert_action()
  {
    //data yang akan di ubah dimasukkan ke array
    $data = array(
      'id_prov' => $this->input->post('id_prov'),
      'nama_prov' => $this->input->post('nama_prov')
    );

    // mengirimkan data primary key dan data yang akan di ubah
    $this->Mprov->insert($data);

    redirect(base_url("Adm/Cprov"));
  }

  public function update_action()
  {
    //data yang akan di ubah dimasukkan ke array
    $data = array(
      'nama_prov' => $this->input->post('nama_prov')
    );

    // mengirimkan data primary key dan data yang akan di ubah
    $this->Mprov->update($this->input->post('id_prov'), $data);

    redirect(base_url("Adm/Cprov"));
  }

  public function hapus()
  {
    $id = $this->input->post("id");
    $hapus_data = $this->Mprov->delete($id);
    // echo "data terhapus";
    redirect(base_url("Adm/Cprov"));
  }
}
