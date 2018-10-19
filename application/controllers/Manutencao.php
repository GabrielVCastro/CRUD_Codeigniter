<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Manutencao extends CI_Controller {

	public function index($ordem="id"){
		$this->load->model("Manutencao_model", "manutencao");
		
		$manutencoes = $this->manutencao->listar($ordem);
	

		$tecnicos = $this->manutencao->listar_tecnico();
		$tecnicos = $tecnicos->result();

		$aeronaves = $this->manutencao->listar_aeronave();
		$aeronaves = $aeronaves->result();


		$params = array(
			"manutencoes" => $manutencoes,
			"aeronaves" => $aeroanves,
			"tecnicos" => $tecnicos
		);

	

		$this->load->view("commons/header");
		$this->load->view("manutencao/listar_manutencao", $params);
		$this->load->view("commons/footer");
	}

	public function form_cadastro(){
		$this->load->model("Manutencao_model", "manutencao");

		$tecnicos = $this->manutencao->listar_tecnico();
		$tecnicos = $tecnicos->result();

		$aeronaves = $this->manutencao->listar_aeronave();
		$aeronaves = $aeronaves->result();

		$params = array(
			
			"tecnicos" => $tecnicos,
			"aeronaves" => $aeronaves
		);

		$this->load->view("commons/header");
		$this->load->view("manutencao/form_cadastro", $params);
		$this->load->view("commons/footer");

	}

	public function cadastrar(){
		$this->load->model("Manutencao_model", "manutencao");


		$post = $this->input->post();
		$data =  date("Y-m-d H:i:s");
		$manutencao = array(
			"id_tecnico" => $post['id_tecnico'],
			"id_aeronave" => $post['id_aeronave'],
			"tipo" => $post['tipo'],
			"data_hora" => $data
		);

	
		if ($this->manutencao->cadastrar($manutencao)) {
			$_SESSION['msg_success'] = "Cadastrada  com sucesso!";
		}else{
			$_SESSION['msg_error'] = "erro ao inserir.";
		}

	
		header("Location: ".base_url("index.php/Manutencao/"));

	}

	public function form_editar($id){
		$this->load->model("Manutencao_model", "manutencao");

		$manutencao_edit = $this->manutencao->form_editar($id);


		$tecnicos = $this->manutencao->listar_tecnico();
		$tecnicos = $tecnicos->result();

		$aeronaves = $this->manutencao->listar_aeronave();
		$aeronaves = $aeronaves->result();


		$params = array(
			"manutencao" => $manutencao_edit,
			'tecnicos' => $tecnicos,
			"aeronaves" => $aeronaves

		);

		$this->load->view("commons/header");
		$this->load->view("manutencao/form_editar", $params);
		$this->load->view("commons/footer");



	}

	public function editar($id){
		$this->load->model("Manutencao_model", "manutencao");
		$post = $this->input->post();
		$data = date("Y-m-d H:i:s");

		$editar_manutencao = array(
			"id_tecnico" => $post['id_tecnico'],
			"id_aeronave" => $post['id_aeronave'],
			"tipo" => $post['tipo'],
			"data_hora" =>$data

		);

		var_dump($editar_manutencao);

		if ($this->manutencao->editar($id, $editar_manutencao)) {
			$_SESSION['msg_success'] = "Cadastrada  com sucesso!";
		}else{
			$_SESSION['msg_error'] = "erro ao inserir.";
		}

	
		header("Location: ".base_url("index.php/Manutencao/"));


	}

	public function excluir($id){
		$this->load->model("Manutencao_model", "manutencao");

		if ($this->manutencao->excluir($id)) {
			$_SESSION['msg_success'] = "Manutenção excluida com sucesso!";

		}else{
			$_SESSION['msg_error'] = "erro ao tentar excluir";

		}

		header("Location: ".base_url("index.php/Manutencao/"));	
	}
	
}	