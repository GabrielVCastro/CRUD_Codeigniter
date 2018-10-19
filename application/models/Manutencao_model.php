<?php  

class Manutencao_model extends CI_Model {

  public function listar($ordem){
    $this->db->order_by($ordem, 'asc');
    $this->db->select("manutencao.*, tecnico.nome, aeronave.prefixo");
    $this->db->join("tecnico", "manutencao.id_tecnico = tecnico.id");
    $this->db->join("aeronave", "manutencao.id_aeronave = aeronave.id");
  
    return $this->db->get("manutencao")->result();
  }

  public function listar_tecnico(){
    return $this->db->select("*")->from("tecnico")->get();
  }


  public function listar_aeronave(){
    return $this->db->select("*")->from("aeronave")->get();
  }



  public function cadastrar($manutencao){
    
    return $this->db->insert("manutencao", $manutencao);  
  }





  public function form_editar($id){
  
    $this->db->select("manutencao.*,  tecnico.nome, , aeronave.prefixo " );
    $this->db->join("tecnico ", "manutencao.id_tecnico = tecnico.id");
    $this->db->join("aeronave ", "manutencao.id_aeronave = aeronave.id");
    $this->db->where("manutencao.id", $id);
    return $this->db->get("manutencao")->result();

  }

  public function editar($id, $editar_manutencao){
    $this->db->where('id', $id);
    return $this->db->update('manutencao', $editar_manutencao);

  }

public function excluir($id){
    $this->db->where("id", $id);
     return $this->db->delete("manutencao");
  }
    
}




 /* public function cadastrar(){

    return $this->db->select("*")->from("pessoas")->get();

  }

  public function inserir($pessoa){
    return $this->db->insert("pessoas", $pessoa);
  }*/

               
?>