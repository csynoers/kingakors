<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class cadmin extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('Madmin');
  }

  public function index()
  {
    $data['admin'] = $this->Madmin->get_all($this->session->userdata('id_admin'));
    $this->load->view('template/header');
    $this->load->view('menu_a/Vadmin', $data);
    // $this->load->view('kerangka/footer');
  }
    }


/* End of file ${TM_FILENAME:cprofil.php} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)/cprofil/:application/controllers/cprofil.php} */
