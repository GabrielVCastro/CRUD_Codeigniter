<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller {

	public function index(){
		
		$this->load->view("commons/header");
		$this->load->view("painel/painel_admin");
		$this->load->view("commons/footer");
	}


	public function listar(){
		
		$this->load->view("commons/header");
		$this->load->view("tecnico/listar_tecnico");
		$this->load->view("commons/footer");
	}



}