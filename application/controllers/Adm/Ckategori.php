<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ckategori extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_kategori');
    if ($this->session->userdata('status_login') != 'admin_oke') {
      redirect(base_url('clogin/login'));
    }
  }

  public function index()
  {
    $data['kategori'] = $this->M_kategori->get_all();
    $this->load->view('template/header');
    $this->load->view('menu_a/Vkategori', $data);
    $this->load->view('template/footer');
  }

  public function insert_action()
  {
    // var_dump($this->input->post('nama_kat'));
    //directory upload
    $path_asli = './assets/foto/';

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

    //upload gambar
    if (!$this->upload->do_upload('gambar')) {
      $error = array('error' => $this->upload->display_errors());
      $nama_file_upload = null;
      // var_dump($error);

    } else {
      $data = array('upload_file' => $this->upload->data());
      // var_dump($data);
      $file_upload = $this->upload->data('file_name');
      //proses kompres data
      $nama_file_upload = $this->M_kategori->image_compressor($file_upload, $path_asli);
    }
    $data = array(
      "id_kategori" => $this->input->post('id_kategori'),
      "nama_kat" => $this->input->post('nama_kat'),
      "gambar" => $nama_file_upload,
    );
    // var_dump($data);
    // die();
    $this->M_kategori->insert($data);
    redirect(base_url("Adm/Ckategori"));;
  }

  public function update($id_kategori)
  {
    $data['update'] = 'update';
    $data['kategori'] = $this->M_kategori->get_all();
    $data['data_update'] = $this->M_kategori->get_by_id($id_kategori);
    $this->load->view('template/header');
    $this->load->view('menu_a/Vkategori', $data);
    // $this->load->view('template/footer');
  }

  public function update_action()
  {
    // var_dump($this->input->post('gambar'));
    $path_asli = './assets/foto/';

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
    //upload gambar
    if (!$this->upload->do_upload('gambar1')) {
      $error = array('error' => $this->upload->display_errors());
      $nama_file_upload = null;
      var_dump($error);
    } else {
      $data = array('upload_file' => $this->upload->data());
      // var_dump($data);
      $file_upload = $this->upload->data('file_name');
      //proses kompres data
      $nama_file_upload = $this->m_kategori->image_compressor($file_upload, $path_asli);
    }

    //data yang akan di ubah dimasukkan ke array
    $data = array(
      'nama_kat' => $this->input->post('nama'),
      'gambar' => $nama_file_upload,
    );
    // mengirimkan data primary key dan data yang akan di ubah
    $this->M_kategori->update($this->input->post('id_kategori'), $data);

    redirect(base_url("Adm/Ckategori"));
  }
  public function data()
  {
    $data['kategori'] = $this->M_kategori->get_all();
    $this->load->view('menu_a/Vkategori', $data);
  }

  public function hapus()
  {
    $id = $this->input->post("id");
    $hapus_data = $this->M_kategori->delete($id);
    // echo "data terhapus";
    redirect(base_url("Adm/Ckategori"));
  }
}
