<?php  

class Login_model extends CI_Model {

	public function cadastrar($login){
	 	
	 	return $this->db->insert("login", $login);	
	}

  public function logar($email, $password){
    $this->db->where("email", $email);
    $this->db->where("password", $password);
    $usuario = $this->db->get("login")->row_array();
    if ($usuario) {
      $this->session->set_userdata("usuario_logado", $usuario);
      $this->session->set_flashdata("success", "Logado com sucesso");
    }else{
      $this->session->set_flashdata("danger", "Usuário ou senha invalidoss");
    }
    return $usuario;


     

    
  }



 /* public function cadastrar(){

    return $this->db->select("*")->from("pessoas")->get();

  }

  public function inserir($pessoa){
    return $this->db->insert("pessoas", $pessoa);
  }*/

  }               

?>