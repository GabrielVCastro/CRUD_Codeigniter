<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tecnico extends CI_Controller {

	public function index(){
		
		$this->load->view("commons/header");
		$this->load->view("tecnico/listar_tecnico");
		$this->load->view("commons/footer");
	}


}