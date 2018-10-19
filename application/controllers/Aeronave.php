<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aeronave extends CI_Controller {

	public function index($ordem='id'){
		$this->load->model("Aeronave_model", "aeronave");
		
		$aeronaves = $this->aeronave->listar($ordem);
		$aeronaves = $aeronaves->result();

		$params = array(
			"aeronaves" => $aeronaves
		);


		$this->load->view("commons/header");
		$this->load->view("aeronave/listar_aeronave", $params);
		$this->load->view("commons/footer");
	}

	public function form_cadastro(){

		$this->load->view("commons/header");
		$this->load->view("aeronave/form_cadastro");
		$this->load->view("commons/footer");

	}

	public function cadastrar(){
		$this->load->model("Aeronave_model", "aeronave");

		$post = $this->input->post();
		$dat = str_replace('/', '-', $post['ano_fabricaco']);
		$data = date("Y-m-d",strtotime($dat));

		$aeronave = array(
			"prefixo" => $post['prefixo'],
			"tipo" => $post['tipo'],
			"horas_voo" => $post['horas_voo'],
			"ano_fabricacao" => $data

		);

		if ($this->aeronave->cadastrar($aeronave)) {
			 echo $_SESSION['msg_success'] = "inserido com sucesso";
		}else{
			 echo $_SESSION['msg_error'] = "erro ao inserir";

		}
		header("Location: ".base_url("index.php/Aeronave/"));

	}

	public function excluir($idaeronave,$status){
		$this->load->model("Aeronave_model", "aeronave");

		$aeronave = array(
			"status" => $status
		);
		
		if ($this->aeronave->excluir($idaeronave, $aeronave)) {
			$_SESSION['msg_success'] = "Status alterado com sucesso!";

		}else{
			$_SESSION['msg_error'] = "Erro ao tentar alterar os status.";

		}
		header("Location: ".base_url("index.php/Aeronave/"));
	}

	public function form_editar($id){
		$this->load->model("Aeronave_model", "aeronave");
		
		$edit = $this->aeronave->form_editar($id);
		$edit = $edit->result();

		$params = array(
			"edit" => $edit
		);

		$this->load->view("commons/header");
		$this->load->view("aeronave/form_editar", $params);
		$this->load->view("commons/footer");

	}

	public function editar($id){
		$this->load->model("Aeronave_model", "aeronave");

		$post = $this->input->post();

		$aeronave = array(
			"prefixo" => $post['prefixo'],
			"tipo" => $post['tipo'],
			"horas_voo" => $post['horas_voo'],
			"ano_fabricacao" => $post['ano_fabricacao']

		);

	
		if ($this->aeronave->editar($id, $aeronave)) {
			$_SESSION['msg_success'] = "Aeronave editado com sucesso!";

		}else{
			$_SESSION['msg_error'] = "erro ao tentar editar";

		}

		header("Location: ".base_url("index.php/Aeronave/"));

	}

}	
?>