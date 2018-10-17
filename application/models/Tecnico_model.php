<?php  

class Tecnico_model extends CI_Model {

  public function listar($ordem){
    $this->db->order_by($ordem, 'asc');
    return $this->db->select("*")->from("tecnico")->get();
  }

	public function cadastrar($tecnico){
	 	
	 	return $this->db->insert("tecnico", $tecnico);	
	}

  public function excluir($idtecnico){
    $this->db->where("id", $idtecnico);
     return $this->db->delete("tecnico");
  }

  public function form_editar($id){
    $this->db->where("id", $id);
    return $this->db->select("*")->from("tecnico")->get();

  }

  public function editar($id, $tecnico){
    $this->db->where('id', $id);
    return $this->db->update('tecnico', $tecnico);

  }


    
}



 /* public function cadastrar(){

    return $this->db->select("*")->from("pessoas")->get();

  }

  public function inserir($pessoa){
    return $this->db->insert("pessoas", $pessoa);
  }*/

               
?>