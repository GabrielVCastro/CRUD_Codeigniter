<?php  

class Missao_model extends CI_Model {

  public function listar($ordem){
      $this->db->order_by($ordem, 'asc');
      $this->db->select("missao.*,  piloto.nome as piloto , copiloto.nome as co_piloto , aeronave.tipo as tipo_aeronave "   );
      $this->db->join("piloto ", "missao.id_piloto = piloto.id");
      $this->db->join("piloto copiloto ", "missao.id_copiloto = copiloto.id");
      $this->db->join("aeronave" , "missao.id_aeronave = aeronave.id");
      

      return $this->db->get("missao")->result();
  }

  public function listar_piloto(){
    return $this->db->select("*")->from("piloto")->get();
  }
  public function listar_aeronave(){
    return $this->db->select("*")->from("aeronave")->get();
  }




	public function cadastrar($missao){
	 	
	 	return $this->db->insert("missao", $missao);	
	}

  public function excluir($id){
    $this->db->where("id", $id);
     return $this->db->delete("missao");
  }

  public function form_editar($id){
  
    $this->db->select("missao.*,  piloto.nome as piloto , copiloto.nome as co_piloto , aeronave.tipo as tipo_aeronave " );
    $this->db->join("piloto ", "missao.id_piloto = piloto.id");
    $this->db->join("piloto copiloto ", "missao.id_copiloto = copiloto.id");
    $this->db->join("aeronave" , "missao.id_aeronave = aeronave.id");
    $this->db->where("missao.id", $id);
    return $this->db->get("missao")->result();

  }

  public function editar($id, $missao){
    $this->db->where('id', $id);
    return $this->db->update('missao', $missao);

  }


    
}



 /* public function cadastrar(){

    return $this->db->select("*")->from("pessoas")->get();

  }

  public function inserir($pessoa){
    return $this->db->insert("pessoas", $pessoa);
  }*/

               
?>