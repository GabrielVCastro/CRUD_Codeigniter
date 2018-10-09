<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Piloto extends CI_Controller {

	public function index($ordem='id'){
		$this->load->model("Piloto_model", "piloto");
		
		$pilotos = $this->piloto->listar($ordem);
		$pilotos = $pilotos->result();

		$params = array(
			"pilotos" => $pilotos
		);


		$this->load->view("commons/header");
		$this->load->view("piloto/listar_piloto", $params);
		$this->load->view("commons/footer");
	}

	public function form_cadastro(){

		$this->load->view("commons/header");
		$this->load->view("piloto/form_cadastro");
		$this->load->view("commons/footer");
	}



	public function cadastrar(){
		$this->load->model("Piloto_model", "piloto");
	
		$post = $this->input->post();


		if ((substr($post['data'], 0,2)>31) || (substr($post['data'], 0,2)<0)) {
			$_SESSION['msg_error'] = "A data de nascimento não confere";
			header("Location: ".base_url("index.php/Piloto/form_cadastro"));
		
		}
		if ((substr($post['data'], 3,2)>12) || (substr($post['data'], 3,2)<0)) {
			$_SESSION['msg_error'] = "A data de nascimento não confere";
			header("Location: ".base_url("index.php/Piloto/form_cadastro"));
		}
		if ((substr($post['data'], 6,4)>2000) || (substr($post['data'], 6,4)<0)) {
			$_SESSION['msg_error'] = "A data de nascimento não confere";
			header("Location: ".base_url("index.php/Piloto/form_cadastro"));
		}


		if ((substr($post['data_exame'], 0,2)>31) || (substr($post['data_exame'], 0,2)<0)) {
			$_SESSION['msg_error'] = "A data do último exame não confere";
			header("Location: ".base_url("index.php/Piloto/form_cadastro"));
		
		}
		if ((substr($post['data_exame'], 3,2)>12) || (substr($post['data_exame'], 3,2)<0)) {
			$_SESSION['msg_error'] = "A data do último exame não confere";
			header("Location: ".base_url("index.php/Piloto/form_cadastro"));
		}
		if ((substr($post['data_exame'], 6,4)>2018) || (substr($post['data_exame'], 6,4)<0)) {
			$_SESSION['msg_error'] = "A data do último exame não confere";
			header("Location: ".base_url("index.php/Piloto/form_cadastro"));
		}

		

		$cpf_1 = str_replace(".", "", $post['cpf']);
		$cpf_2 = str_replace("-", "", $cpf_1);
	
		$dat = str_replace('/', '-', $post['data']);
		$data = date("Y-m-d",strtotime($dat));
		$ultimo_exame = date("Y-m-d",strtotime($post['data_exame']));
		$telefone = str_replace("(", "", $post['telefone']);
		$telefone1 = str_replace(")", "", $telefone);
		$telefone2 = str_replace("-", "", $telefone1);
		$telefone3 = str_replace(" ", "", $telefone2);

		$piloto = array(

			"nome" => $post['nome'],
			"cpf" => $cpf_2,
			"data_nascimento" => $data,
			"qualificacao" => $post['qualificacao'],
			"ultimo_exame" => $ultimo_exame,
			"telefone" => $telefone3,
			"endereco" => $post['endereco'],
			"sexo" => $post['sexo']

		);

		
		
		if ($this->piloto->cadastrar($piloto)) {
			$_SESSION['msg_success'] = "inserido com sucesso";
		}else{
			$_SESSION['msg_error'] = "erro ao inserir";

		}

		header("Location: ".base_url("index.php/Piloto/"));
		

	}

	public function excluir($idpiloto){
		$this->load->model("Piloto_model", "piloto");
		
		if ($this->piloto->excluir($idpiloto)) {
			$_SESSION['msg_success'] = "Piloto excluido com sucesso!";

		}else{
			$_SESSION['msg_error'] = "erro ao excluir";

		}
		header("Location: ".base_url("index.php/Piloto/"));

		

	}

	public function form_editar($id){
		$this->load->model("Piloto_model", "piloto");
		
		$edit = $this->piloto->form_editar($id);
		$edit = $edit->result();

		$params = array(
			"edit" => $edit
		);

		$this->load->view("commons/header");
		$this->load->view("piloto/form_editar", $params);
		$this->load->view("commons/footer");


	}

	public function editar($id){
		$this->load->model("Piloto_model", "piloto");
		

		$post = $this->input->post();


		

		

		$cpf_1 = str_replace(".", "", $post['cpf']);
		$cpf_2 = str_replace("-", "", $cpf_1);
	
		$dat = str_replace('/', '-', $post['data']);
		$data = date("Y-m-d",strtotime($post['data']));
		$ultimo_exame = date("Y-m-d",strtotime($post['data_exame']));
		$telefone = str_replace("(", "", $post['telefone']);
		$telefone1 = str_replace(")", "", $telefone);
		$telefone2 = str_replace("-", "", $telefone1);
		$telefone3 = str_replace(" ", "", $telefone2);

		$piloto = array(

			"nome" => $post['nome'],
			"cpf" => $cpf_2,
			"data_nascimento" => $data,
			"qualificacao" => $post['qualificacao'],
			"ultimo_exame" => $ultimo_exame,
			"telefone" => $telefone3,
			"endereco" => $post['endereco'],
			"sexo" => $post['sexo']

		);


		if ($this->piloto->editar($id, $piloto)) {
			$_SESSION['msg_success'] = "Piloto editado com sucesso!";

		}else{
			$_SESSION['msg_error'] = "erro ao tentar editar";

		}
		header("Location: ".base_url("index.php/Piloto/"));


	}
}