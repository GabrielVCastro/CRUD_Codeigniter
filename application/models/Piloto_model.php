<?php  

class Piloto_model extends CI_Model {

  public function listar($ordem){
    $this->db->order_by($ordem, 'asc');
    return $this->db->select("*")->from("piloto")->get();
  }
  public function listar_missao(){
    return $this->db->select("*")->from("missao")->get();
  }

	public function cadastrar($piloto){
	 	
	 	return $this->db->insert("piloto", $piloto);	
	}

  public function excluir($idpiloto, $piloto){
    $this->db->where("id", $idpiloto);
    return $this->db->update('piloto', $piloto);
  }

  public function form_editar($id){
    $this->db->where("id", $id);
    return $this->db->select("*")->from("piloto")->get();

  }

  public function editar($id, $piloto){
    $this->db->where('id', $id);
    return $this->db->update('piloto', $piloto);

  }


    
}



 /* public function cadastrar(){

    return $this->db->select("*")->from("pessoas")->get();

  }

  public function inserir($pessoa){
    return $this->db->insert("pessoas", $pessoa);
  }*/

               
?>