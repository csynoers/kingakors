<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ckecamatan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mkecamatan');
    $this->load->model('Mkota');
    if ($this->session->userdata('status_login') != 'admin_oke') {
      redirect(base_url('Clogin/login'));
    }
  }
  public function index()
  {
    $data['kodeunik'] = $this->Mkecamatan->buat_kode();
    $data['kecamatan'] = $this->Mkecamatan->get_join_all();
    $data['kota'] = $this->Mkota->get_all();
    $this->load->view('template/Header');
    $this->load->view('menu_a/Vkecamatan', $data);
    $this->load->view('template/footer');
  }

  public function data()
  {
    $data['kecamatan'] = $this->Mkecamatan->get_all();
    $this->load->view('template/Header');
    $this->load->view('menu_a/Vkecamatan', $data);
  }
  public function insert_action()
  {
    $data = array(
      "id_kec" => $this->input->post('id_kec'),
      "id_kota" => $this->input->post('id_kota'),
      "nm_kec" => $this->input->post('nm_kec'),
      "jarak" => $this->input->post('jarak'),
      "harga" => $this->input->post('harga'),
    );
    $this->Mkecamatan->insert($data);
    redirect(base_url("Adm/Ckecamatan"));
  }
  public function update($id_kec)
  {
    $data["update"] = "update";
    $data["data_update"] = $this->Mkecamatan->get_by_id($id_kec);
    $data['kecamatan'] = $this->Mkecamatan->get_join_all();
    $data['kota'] = $this->Mkota->get_all();
    $this->load->view('template/Header');
    $this->load->view('menu_a/Vkecamatan', $data);
  }
  public function update_action()
  {
    $data_update = array(
      //"id_kec" => $this->input->post('id_kec'),
      "id_kota" => $this->input->post('id_kota'),
      "nm_kec" => $this->input->post('nm_kec'),
      "jarak" => $this->input->post('jarak'),
      "harga" => $this->input->post('harga'),
    );
    // var_dump($data_update);
    $this->Mkecamatan->update($this->input->post('id_kec'), $data_update);

    redirect(base_url("Adm/Ckecamatan"));
  }
  public function hapus()
  {
    $id = $this->input->post("id");
    $hapus_data = $this->Mkecamatan->delete($id);
    // echo "data terhapus";
    redirect(base_url("Adm/Ckecamatan"));
  }
}
