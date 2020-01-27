<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clogin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('M_kategori');
    $this->load->model('Mpelanggan');
    $this->load->model('Madmin');
    $this->load->model('Mprov');
    $this->load->model('Mkota');
    $this->load->model('Mkecamatan');
    $this->load->model('Malamatpen');
    $this->load->model('Mdetailpemesanan');
  }

  public function index()
  {
    $data['status_login'] = $this->session->userdata('status_login');
    $data['username'] = $this->session->userdata('username');
    $data['kategori'] = $this->M_kategori->get_all();
    $this->load->view('kerangka/Header');
    $this->load->view('kerangka/Footer');
  }

  public function login()
  {
    $this->load->view('kerangka/Header');
    $this->load->view('menu_a/Vlogin');
    $this->load->view('kerangka/Footer');
  }

  		public function datakota()
  		{
          $data['kota'] = $this->Mkota->get_all();
          $this->load->view('kerangka/Header');
          $this->load->view('menu_p/Vprofil', $data);
          $this->load->view('kerangka/Footer');
      }

  		public function dataprov()
  		{
  			$data['provinsi'] = $this->Mprov->get_all();
  			$this->load->view('kerangka/Header');
  			$this->load->view('menu_p/Vprofil', $data);
  			$this->load->view('kerangka/Footer');
  	}

  		public function cari_kota_ajax()
      {
          $provinsi= $this->input->get('provinsi');
          $kota = $this->Mkota->get_kota($provinsi);
          $json = json_encode($kota,JSON_PRETTY_PRINT);
          echo $json;
  		}

  		public function cari_kecamatan_ajax()
      {
          $kota= $this->input->get('kota');
          $kecamatan = $this->Mkecamatan->get_kecamatan($kota);
          $json = json_encode($kecamatan,JSON_PRETTY_PRINT);
          echo $json;
  		}

  //data yang akan di ubah dimasukkan ke array
  public function login_action()
  {
    $this->form_validation->set_rules('username', 'Username', 'trim|required', [
      'required' => 'Username tidak boleh kosong'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'trim|required', [
      'required' => 'Password tidak boleh kosong'
    ]);
    if ($this->form_validation->run() == false) {
      $this->load->view('kerangka/Header');
      $this->load->view('menu_a/Vlogin');
      $this->load->view('kerangka/Footer');
    } else {
      $this->_logP();
    }
  }

  private function _logP()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    //mengambil data login
    $get_login_by_username = $this->Mpelanggan->login_username($username);
    $get_login = $this->Mpelanggan->login($username, $password);
    $get_cart = $this->Mdetailpemesanan->get_null_id_pesan($get_login->id_pelanggan);
    var_dump(count($get_cart));
    if (count($get_login) != null) {

      //data session
      $data_login = array(
        'username' => $get_login->username,
        'id_pelanggan' => $get_login->id_pelanggan,
        'status_login' => "customer_oke",
      );

      $this->session->set_userdata($data_login);
      redirect(base_url('chome'));
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
        redirect(base_url('Adm/CadminDashboard'));
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        <strong>Error</strong> Username dan password Salah!
        </div>');
        redirect(base_url('Clogin/Login'));
      }
    }
  }

  public function register()
  {
    $data['kecamatan'] = $this->Mkecamatan->get_join_all();
    $data['kota'] = $this->Mkota->get_join_all();
    $data['provinsi'] = $this->Mprov->get_all();
    $this->load->view('kerangka/Header');
    $this->load->view('menu_p/V_pelanggan',$data);
    $this->load->view('kerangka/Footer');
  }

  public function insert_register()
  {
    // proses input data ke tabel pelanggan
    //data yang akan di ubah dimasukkan ke array
    $data = array(
      // 'id_pelanggan' => $this->input->post('id_pelanggan'),
      'nama_pel' => $this->input->post('nama_pel'),
      'username' => $this->input->post('username'),
      'pass' => $this->input->post('pass'),
      'email' => $this->input->post('email'),
      'no_telp' => $this->input->post('no_telp')
    );

    // mengirimkan data primary key dan data yang akan di ubah
    $this->Mpelanggan->insert($data);

// cek data pelanggan terakhir
    $get_lastId = $this->db->query("SELECT max(id_pelanggan) as xId FROM pelanggan")->row();

// proses input data ke tabel alamat_pengiriman
    $data = array(
      "id_pelanggan" => $get_lastId->xId,
      "nama" => $this->input->post('nama_pel'),
      "no_tlpn" => $this->input->post('no_telp'),
      "id_prov" => $this->input->post('id_prov'),
      "kota" => $this->input->post('id_kota'),
      "kecamatan" => $this->input->post('id_kecamatan'),
      "alamat_lengkap" => $this->input->post('alamat_lengkap'),
    );
    $this->Malamatpen->insert($data);

    $this->_sendemail();

    redirect(base_url('Clogin/Login'));
  }

  private function _sendemail(){

    $config = [
        'protocol'  => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_user' => 'hanistn27@gmail.com',
        'smtp_pass' => 'setiani12',
        'smtp_port' => 465,
        'mailtype'  => 'html',
        'charset'   => 'utf-8',
        'newline'   => "\r\n"
    ];

    $this->load->library('email', $config);
    $this->email->initialize($config);
    $this->email->from('hanistn27@gmail.com', "kING AKOR'S");
    $this->email->to($this->input->post('email'));
    $this->email->subject('Pemberitahuan');
    $this->email->message('Selamat anda telah terdaftar sebagai member silahkan
    <a href="'.base_url('Adm/A_log').'">Login</a>');

    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
      die;
    }
  }

  public function update1($id_pelanggan)
  {
    $data['update']='update';
    $data['pelanggan'] = $this->Mpelanggan->get_all();
    $data['data_update'] = $this->Mpelanggan->get_by_id($id_pelanggan);
    $this->load->view('kerangka/Header');
    $this->load->view('menu_p/Vprofil', $data);
    $this->load->view('kerangka/Footer');
  }

  public function update_action1()
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

    redirect(base_url("Cprofil"));
  }

  public function hapus1(){
    $id = $this->input->post("id");
    $hapus_data = $this->Mpelanggan->delete($id);
    // echo "data terhapus";
    redirect(base_url("Cprofil"));

}
  public function log_out()
  {
    //menghilangkan session
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('id_pelanggan');
    $this->session->unset_userdata('status_login');
    redirect(base_url('clogin/Login'));
  }
}
