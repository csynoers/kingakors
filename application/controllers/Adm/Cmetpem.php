<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cmetpem extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mmetpem');
    if ($this->session->userdata('status_login') != 'admin_oke') {
      redirect(base_url('Clogin/login'));
    }
  }

  public function index()
  {
    $data['metode_pembayaran'] = $this->Mmetpem->get_all();
    $this->load->view('template/Header');
    $this->load->view('menu_a/Vmetpem', $data);
    $this->load->view('template/Footer');
  }

  public function data()
  {
    $data['metode_pembayaran'] = $this->Mmetpem->get_all();
    $this->load->view('template/Header');
    $this->load->view('menu_a/Vmetpem', $data);
    // $this->load->view('template/footer');
  }

  public function update($id_met_pem)
  {
    $data['update'] = 'update';
    $data['metode_pembayaran'] = $this->Mmetpem->get_all();
    $data['data_update'] = $this->Mmetpem->get_by_id($id_met_pem);
    $this->load->view('template/Header');
    $this->load->view('menu_a/Vmetpem', $data);
    // $this->load->view('template/footer');
  }

  public function insert_action()
  {
    //data yang akan di ubah dimasukkan ke array
    $data = array(
      'id_met_pem' => $this->input->post('id_met_pem'),
      'Transfer_Bank' => $this->input->post('Transfer_Bank'),
    );

    // mengirimkan data primary key dan data yang akan di ubah
    $this->Mmetpem->insert($data);
    redirect(base_url("Adm/Cmetpem"));
  }

  public function update_action()
  {
    //data yang akan di ubah dimasukkan ke array
    $data = array(
      'Transfer_Bank' => $this->input->post('Transfer_Bank')
    );

    // mengirimkan data primary key dan data yang akan di ubah
    $this->Mmetpem->update($this->input->post('id_met_pem'), $data);

    redirect(base_url("Adm/Cmetpem"));
  }

  public function hapus()
  {
    $id = $this->input->post("id");
    $hapus_data = $this->Mmetpem->delete($id);
    // echo "data terhapus";
    redirect(base_url("Adm/Cmetpem"));
  }
}
