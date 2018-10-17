<?php  

class Aeronave_model extends CI_Model {

  public function listar($ordem){
    $this->db->order_by($ordem, 'asc');
    return $this->db->select("*")->from("aeronave")->get();
  }

	public function cadastrar($aeronave){
	 	
	 	return $this->db->insert("aeronave", $aeronave);	
	}

  public function excluir($idaeronave){
    $this->db->where("id", $idaeronave);
     return $this->db->delete("aeronave");
  }

  public function form_editar($id){
    $this->db->where("id", $id);
    return $this->db->select("*")->from("aeronave")->get();

  }

  public function editar($id, $aeronave){
    $this->db->where('id', $id);
    return $this->db->update('aeronave', $aeronave);

  }


    
}



 /* public function cadastrar(){

    return $this->db->select("*")->from("pessoas")->get();

  }

  public function inserir($pessoa){
    return $this->db->insert("pessoas", $pessoa);
  }*/

               
?>