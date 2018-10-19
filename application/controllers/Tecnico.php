<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tecnico extends CI_Controller {

	public function index($ordem='id'){
		$this->load->model("Tecnico_model", "tecnico");
		
		$tecnicos = $this->tecnico->listar($ordem);
		$tecnicos = $tecnicos->result();

		$params = array(
			"tecnicos" => $tecnicos
		);


		$this->load->view("commons/header");
		$this->load->view("tecnico/listar_tecnico", $params);
		$this->load->view("commons/footer");
	}

	public function form_cadastro(){
		$this->load->view("commons/header");
		$this->load->view("tecnico/form_cadastro");
		$this->load->view("commons/footer");

	}

	public function  cadastrar(){

		$this->load->model("Tecnico_model", "tecnico");
		$post = $this->input->post();

		
		if ((substr($post['data_nascimento'], 0,2)>31) || (substr($post['data_nascimento'], 0,2)<0)) {
			$_SESSION['msg_error'] = "A data de nascimento não confere";
			header("Location: ".base_url("index.php/Piloto/form_cadastro"));
		
		}
		if ((substr($post['data_nascimento'], 3,2)>12) || (substr($post['data_nascimento'], 3,2)<0)) {
			$_SESSION['msg_error'] = "A data de nascimento não confere";
			header("Location: ".base_url("index.php/Piloto/form_cadastro"));
		}
		if ((substr($post['data_nascimento'], 6,4)>2000) || (substr($post['data_nascimento'], 6,4)<0)) {
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

		


	
		$dat = str_replace('/', '-', $post['data_nascimento']);
		$data = date("Y-m-d",strtotime($dat));
		$dat_exame = str_replace('/', '-', $post['data_exame']);
		$ultimo_exame = date("Y-m-d",strtotime($dat_exame));
		$telefone = str_replace("(", "", $post['telefone']);
		$telefone1 = str_replace(")", "", $telefone);
		$telefone2 = str_replace("-", "", $telefone1);
		$telefone3 = str_replace(" ", "", $telefone2);

		$tecnico = array(

			"nome" => $post['nome'],
			"sexo" => $post['sexo'],
			"naturalidade" => $post['naturalidade'],
			"data_nascimento" => $data,
			"qualificacao" => $post['qualificacao'],
			"exame_medico" => $ultimo_exame,
			"telefone" => $telefone3,
			"endereco" => $post['endereco']
			

		);

		var_dump($tecnico);

		if ($this->tecnico->cadastrar($tecnico)) {
			$_SESSION['msg_success'] = "inserido com sucesso";
		}else{
			$_SESSION['msg_error'] = "erro ao inserir";

		}

		header("Location: ".base_url("index.php/Tecnico/"));
		

	}

	public function form_editar($id){
		$this->load->model("Tecnico_model", "tecnico");
		
		$edit = $this->tecnico->form_editar($id);
		$edit = $edit->result();

		$params = array(
			"edit" => $edit
		);

		$this->load->view("commons/header");
		$this->load->view("tecnico/form_editar", $params);
		$this->load->view("commons/footer");


	}

	public function editar($id){
		$this->load->model("Tecnico_model", "tecnico");

		$post = $this->input->post();

		$dat = str_replace('/', '-', $post['data_nascimento']);
		$data = date("Y-m-d",strtotime($dat));
		$dat_exame = str_replace('/', '-', $post['data_exame']);
		$ultimo_exame = date("Y-m-d",strtotime($dat_exame));
		$telefone = str_replace("(", "", $post['telefone']);
		$telefone1 = str_replace(")", "", $telefone);
		$telefone2 = str_replace("-", "", $telefone1);
		$telefone3 = str_replace(" ", "", $telefone2);

		$tecnico = array(

			"nome" => $post['nome'],
			
			"naturalidade" => $post['naturalidade'],
			"data_nascimento" => $data,
			"qualificacao" => $post['qualificacao'],
			"exame_medico" => $ultimo_exame,
			"telefone" => $telefone3,
			"endereco" => $post['endereco']
			

		);

		

		if ($this->tecnico->editar($id, $tecnico)) {
			$_SESSION['msg_success'] = "Piloto editado com sucesso!";

		}else{
			$_SESSION['msg_error'] = "erro ao tentar editar";

		}

		header("Location: ".base_url("index.php/Tecnico/"));

	}

	public function excluir($idtecnico, $status){
		

		$this->load->model("Tecnico_model", "tecnico");
		
		$tecnico = array(
			"status" => $status
		);
		
		if ($this->tecnico->excluir($idtecnico, $tecnico)) {
			$_SESSION['msg_success'] = " Status alterado com sucesso!!";

		}else{
			$_SESSION['msg_error'] = "Erro ao tentar alterar os status";

		}
		header("Location: ".base_url("index.php/Tecnico/"));

		

	}


}