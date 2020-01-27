<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ckota extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mkota');
    $this->load->model('Mprov');
    if ($this->session->userdata('status_login') != 'admin_oke') {
      redirect(base_url('clogin/login'));
    }
  }

  public function index()
  {
    $data['kodeunik'] = $this->Mkota->buat_kode();
    $data['kota'] = $this->Mkota->get_join_all();
    $data['provinsi'] = $this->Mprov->get_all();
    $this->load->view('template/Header');
    $this->load->view('menu_a/Vkota', $data);
    $this->load->view('template/Footer');
  }

  public function data()
  {
    $data['kota'] = $this->Mkota->get_all();
    $this->load->view('template/Header');
    $this->load->view('menu_a/Vkota', $data);
  }
  public function insert_action()
  {
    $data = array(
      "id_kota" => $this->input->post('id_kota'),
      "id_prov" => $this->input->post('id_prov'),
      "nm_kota" => $this->input->post('nm_kota'),
      "biaya" => $this->input->post('biaya'),
    );
    $this->Mkota->insert($data);
    redirect(base_url("Adm/Ckota"));
  }
  public function update($id_kota)
  {
    $data["update"] = "update";
    $data["data_update"] = $this->Mkota->get_by_id($id_kota);
    $data['kota'] = $this->Mkota->get_join_all();
    $data['provinsi'] = $this->Mprov->get_all();
    $this->load->view('template/Header');
    $this->load->view('menu_a/Vkota', $data);
  }
  public function update_action()
  {
    $data_update = array(
      // "id_kota" => $this->input->post('id_kota'),
      "id_prov" => $this->input->post('id_prov'),
      "nm_kota" => $this->input->post('nm_kota'),
      "biaya" => $this->input->post('biaya'),
    );
    // var_dump($data_update);
    $this->Mkota->update($this->input->post('id_kota'), $data_update);

    redirect(base_url("Adm/Ckota"));
  }
  public function hapus()
  {
    $id = $this->input->post("id");
    $hapus_data = $this->Mkota->delete($id);
    // echo "data terhapus";
    redirect(base_url("Adm/Ckota"));
  }
}
