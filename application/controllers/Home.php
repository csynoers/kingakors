<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

   public function __construct(){
     parent::__construct();
     $this->load->model('M_kategori');
   }

   	public function index()
   	{
      $data['kategori']=$this->M_kategori->get_all();
   		$this->load->view('template/header');
   		$this->load->view('index',$data);
   		$this->load->view('template/footer');
   	}

}
