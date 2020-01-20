<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class A_log extends CI_Controller {


  public function index()
  {
    $this->load->view('kerangka/Header');
    $this->load->view('menu_a/Vlogin');
    $this->load->view('kerangka/Footer');
  }
}
/* End of file ${TM_FILENAME:} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)//:application/controllers/} */
