<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Missao extends CI_Controller {

	public function index($ordem="id"){
		$this->load->model("Missao_model", "missao");
		
		$missoes = $this->missao->listar($ordem);
		
		$params = array(
			"missoes" => $missoes
		);

	

		$this->load->view("commons/header");
		$this->load->view("missao/listar_missao", $params);
		$this->load->view("commons/footer");
	}


	public function form_cadastro(){
		$this->load->model("Missao_model", "missao");
 			
		$pilotos = $this->missao->listar_piloto();
		$pilotos = $pilotos->result();

	

		$aeronaves = $this->missao->listar_aeronave();
		$aeronaves = $aeronaves->result();


		$params = array(
			"pilotos" => $pilotos,
			"aeronaves" => $aeronaves
		);


		$this->load->view("commons/header");
		$this->load->view("missao/form_cadastro", $params);
		$this->load->view("commons/footer");
	}

	public function cadastrar(){
		$this->load->model("Missao_model", "missao");
		$post = $this->input->post();
		$dat_partida = str_replace('/', '-', $post['data_partida']);
		$data_partida = date("Y-m-d H:i:s" ,strtotime($dat_partida));

		$dat_chegada = str_replace('/', '-', $post['data_chegada']);
		$data_chegada = date("Y-m-d H:i:s" ,strtotime($dat_chegada));
		$missao = array(
			"data_partida" => $data_partida,
			"data_chegada" => $data_chegada,
			"tipo" => $post['tipo'],
			"id_piloto" => $post['id_piloto'],
			"id_copiloto" => $post['id_copiloto'],
			"id_aeronave" => $post['id_aeronave']
		);

		var_dump($missao);

		if ($this->missao->cadastrar($missao)) {
			$_SESSION['msg_success'] = "Cadastrada  com sucesso!";
		}else{
			$_SESSION['msg_error'] = "erro ao inserir.";
		}

		header("Location: ".base_url("index.php/Missao/"));
	}

	public function form_editar($id){
		$this->load->model("Missao_model", "missao");

		$missao_edit  = $this->missao->form_editar($id);
		

		$pilotos = $this->missao->listar_piloto();
		$pilotos = $pilotos->result();


		$aeronaves = $this->missao->listar_aeronave();
		$aeronaves = $aeronaves->result();

		$params = array(
				"missao" => $missao_edit,
				"pilotos" => $pilotos,
				"aeronaves" => $aeronaves
		);


		$this->load->view("commons/header");
		$this->load->view("missao/form_editar", $params);
		$this->load->view("commons/footer");
	}

	public function editar($id){
		$this->load->model("Missao_model", "missao");
		$post = $this->input->post();

		$dat_partida = str_replace('/', '-', $post['data_partida']);
		$data_partida = date("Y-m-d H:i:s" ,strtotime($dat_partida));

		$dat_chegada = str_replace('/', '-', $post['data_chegada']);
		$data_chegada = date("Y-m-d H:i:s" ,strtotime($dat_chegada));
		$missao = array(
			"data_partida" => $data_partida,
			"data_chegada" => $data_chegada,
			"tipo" => $post['tipo'],
			"id_piloto" => $post['id_piloto'],
			"id_copiloto" => $post['id_copiloto'],
			"id_aeronave" => $post['id_aeronave']
		);
			var_dump($missao);
		
		if ($this->missao->editar($id, $missao)) {
			$_SESSION['msg_success'] = "Missão editada com sucesso!";

		}else{
			$_SESSION['msg_error'] = "erro ao tentar editar";

		}

		header("Location: ".base_url("index.php/Missao/"));
	}

	public function excluir($id){
		$this->load->model("Missao_model", "missao");

		if ($this->missao->excluir($id)) {
			$_SESSION['msg_success'] = "Missão excluida com sucesso!";

		}else{
			$_SESSION['msg_error'] = "erro ao tentar excluir";

		}

		header("Location: ".base_url("index.php/Missao/"));	
	}

}