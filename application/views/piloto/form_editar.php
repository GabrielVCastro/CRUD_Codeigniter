<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        
      </li>

    </ul>
    <ul class="navbar-nav ">
   
     
      <li class="nav-item">
        <a class="btn btn-outline-warning " href="<?= base_url('index.php/Piloto/') ?>">Voltar</a>
      </li>
    </ul>  
  </div>
</nav>
<?php
if (isset($_SESSION['msg_error'])) { ?>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="alert alert-danger" role="alert">
          <?= $_SESSION['msg_error']?>
        </div>
      </div>
    </div>
  </div>
<?php 
  $_SESSION['msg_error'] = null;

}  
$data = date("d-m-Y",strtotime($edit[0]->data_nascimento)) ; 
$data_exame = date("d-m-Y",strtotime($edit[0]->ultimo_exame)) ; 
$id = $edit[0]->id;
?>



<div class="container-fluid">
  <div class="row">
    <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 offset-md-2 col-md-8 col-sm-12 col-12 ">
      <form action="<?php echo base_url("index.php/Piloto/editar/$id") ?>" method="POST">
        <h2>Editar Piloto</h2>
        <label for="nome">Nome Completo</label>
        <input type="text" class="form-control" name="nome" value="<?= $edit[0]->nome ?>" id="nome" required><br>

        <label for="cpf">CPf</label>
        <input type="text" class="form-control cpf" name="cpf" value="<?= $edit[0]->cpf ?>" id="cpf" required><br>
        <label for="data">Data de Nascimento</label>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>  
          </div>
          <input type="text" class="form-control data placeholder" value="<?= $data ?>" name="data" id="data" required>
        </div>
       <br>

        <label for="qualificacao">Qualificação</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-fighter-jet"></i></label>
          </div>
          <select class="custom-select" name="qualificacao"  id="inputGroupSelect01" required>
            <option selected hidden value="<?= $edit[0]->qualificacao ?>"><?php if ($edit[0]->qualificacao=="P") {
              echo "Piloto";
            }else{ echo "Copiloto"; } ?></option>
            <option value="P">Piloto</option>
            <option value="C-P">Copiloto</option>
            
          </select>
        </div><br>

        <label for="data_exame">Data do último exame médico</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>  
          </div>
          <input type="text" class="form-control data placeholder" value="<?= $data_exame ?>" name="data_exame" id="data_exame" required>
        </div>
        <br>

        <label for="telefone">Telefone</label>
        <input type="text" class="form-control telefone" name="telefone" value="<?= $edit[0]->telefone ?>" id="telefone" required><br>

        <label for="endereco">Endereço</label>
        <input type="text" class="form-control" name="endereco" id="endreco" value="<?= $edit[0]->endereco ?> " required><br>
        <input type="hidden" value="<?= $edit[0]->sexo ?>" name="sexo">
       

        <button type="submit" class="btn btn-success btn-lg btn-block">Cadastrar</button>
  
      </form>
    </div>
  </div>
</div>