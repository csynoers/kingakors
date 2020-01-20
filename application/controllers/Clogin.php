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
        redirect(base_url('Clogin/login'));
      }
    }
  }

  public function register()
  {
    $this->load->view('kerangka/Header');
    $this->load->view('menu_p/v_pelanggan');
    $this->load->view('kerangka/Footer');
  }

  public function send()
  {
    $subject = "Aplikasi untuk pendaftaran member baru oleh - " .
    $this->input->post("nama");
    if (is_array($file_data))
    {
      $message = '
      <h3 align="center">member baru</h3>
      <table border="1" width="100%" cellpadding="5">
      <tr>
      <td width="30%">Name</td>
      <td width="70%">'.$this->input->post("nama").'</td>
      </tr>
      </table>
      ';
      $config = array(
        'protocol'  => 'smtp',
        'smtp_host' => 'smtpout.secureserver.net',
        'smtp_port' => 80,
        'smtp_user' => 'xxxxx',
        'smtp_pass' =>  'xxxxx',
        'mailtype'  =>  'html',
        'charset'   => 'iso-8859-1',
        'wordwrap'  =>  TRUE
       );
       $this->load->library('Email', $config);
       $this->email->set_newline("\r\n");
       $this->email->from($this->input->post("email"));
       $this->email->to('hanistn12@gmail.com');
       $this->email->subject($subject);
       $this->email->message($message);
       $this->email->attach($file_data['full_path']);
       if($this->email->send())
       {
          if(delete_files($file_data['file_path']))
          {
            $this->session->set_flashdata('message', 'Application Sended');
            redirect('Clogin');
          }
       }
    }
    else
    {
      $this->session->set_flashdata('massage', 'There is an error in attach file');
    }
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

    redirect(base_url('Clogin/login'));
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
    redirect(base_url('clogin/login'));
  }
}
