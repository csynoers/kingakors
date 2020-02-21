<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //validasi jika user belum login

    $this->load->model('M_kategori');
    $this->load->model('Mpelanggan');
    $this->load->model('M_barang');
    $this->load->model('Madmin');
  }

  public function index()
  {
    $data['barang'] = $this->M_barang->get_limit();

    $data['kategori'] = $this->M_kategori->get_all();
    $this->load->view('kerangka/Header');
    $this->load->view('Vhome', $data);
    $this->load->view('kerangka/Footer');
  }

  public function ktg($id_kategori)
  {
    //
    $data['barang'] = $this->M_barang->get_result_by_id_kategori($id_kategori);
    $this->load->view('kerangka/Header');
    $this->load->view('menu_p/Vkat_barang', $data);
    $this->load->view('kerangka/Footer');
  }

  public function login()
  {
    $this->load->view('kerangka/Header');
    $this->load->view('menu_a/Vlogin');
    $this->load->view('kerangka/Footer');
  }

  //data yang akan di ubah dimasukkan ke array
  public function login_action()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    //mengambil data login
    $get_login = $this->Mpelanggan->login($username, $password);

    if (count($get_login) != null) {

      //data session
      $data_login = array(
        'username' => $get_login->username,
        'id_pelanggan' => $get_login->id_pelanggan,
        'status_login' => "customer_oke",
      );

      //set data ke session
      $this->session->set_userdata($data_login);
      redirect(base_url('customer/Home'));
    } else {
      $get_admin = $this->Madmin->login($username, $password);
      if (count($get_admin) != null) {

        //data session
        $data_login = array(
          'username' => $get_login->username,
          'id_admin' => $get_login->id_admin,
          'status_login' => "admin_oke",
        );

        $this->session->set_userdata($data_login);
        redirect(base_url('admin/Cadmindashboard'));
      } else {
        redirect(base_url('auth/Login'));
      }
    }
  }

  public function register()
  {
    $this->load->view('kerangka/Header');
    $this->load->view('menu_p/V_pelanggan');
  }

  public function insert_register()
  {
    //data yang akan di ubah dimasukkan ke array
    $data = array(
      // 'id_pelanggan' => $this->input->post('id_pelanggan'),
      'nama_pel' => $this->input->post('nama_pel'),
      'username' => $this->input->post('username'),
      'pass' => $this->input->post('pass'),
      'email' => $this->input->post('email'),
      'no_telp' => $this->input->post('no_telp'),
      'alamat' => $this->input->post('alamat'),
    );

    // mengirimkan data primary key dan data yang akan di ubah
    $this->Mpelanggan->insert($data);

    redirect(base_url('auth/Login'));
  }

  public function lKonsumen()
  {
    $this->load->view('kerangka/Header');
    $this->load->view('lKonsumen');
    $this->load->view('kerangka/Footer');
  }

  public function log_out()
  {
    //menghilangkan session
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('id_pelanggan');
    $this->session->unset_userdata('status_login');
    redirect(base_url('auth/Login'));
  }
}
