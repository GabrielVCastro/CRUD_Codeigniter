<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index(){
		
		$this->load->view("commons/header_login");
		$this->load->view("login/form_login");
		$this->load->view("commons/footer");
	}
	public function form_login(){
		
		$this->load->view("commons/header_login");
		$this->load->view("login/form_login");
		$this->load->view("commons/footer");
	}


	public function cadastrar(){
		$this->load->model("Login_model", "login");

		$post = $this->input->post();

		$login = array(
			"nome" => $post['nome'],
			"email" => $post['email'],
			"password" => hash('sha512', hash('sha512', $post['password']))		
		);


		if ($this->login->cadastrar($login)) {
			$_SESSION['msg_success'] = "inserido com sucesso";
		}else{
			$_SESSION['msg_error'] = "erro ao inserir";

		}

		header("Location: ".base_url("index.php/Login/"));
	}

	public function form_cadastro(){
		$this->load->view("commons/header_login");
		
		$this->load->view("login/form_cadastro");
		$this->load->view("commons/footer");
	}

	public function logar(){

		$this->load->model("Login_model", "login");

		$email = $this->input->post("email");
		
		$password = hash('sha512', hash('sha512', $this->input->post("password")));

		$usuario = $this->login->logar($email, $password);
		if ($usuario) {
			
			$_SESSION['logado'] = $usuario;
			header("Location:".base_url("index.php/Painel/"));
		}else{
			$_SESSION['msg_error'] = "Usuário ou senha incorreto";
			header("Location:".base_url("index.php/Login/"));

			




	
		}
	}


}
