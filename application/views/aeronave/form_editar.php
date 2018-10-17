<?php if ((isset($_SESSION['logado'])) && ($_SESSION['logado']!="")){ ?>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="<?= base_url('index.php/Painel/') ?>">Início</a>
      </li>
      &emsp; 
    
      
     
    </ul>
    <ul class="navbar-nav ">
   
     
      <li class="nav-item">
        <a class="btn btn-outline-warning " href="<?= base_url('index.php/Aeronave/') ?>">Voltar</a>
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

} $data = date("d-m-Y",strtotime($edit[0]->ano_fabricacao)) ; 
  $id = $edit[0]->id;
?>




<div class="container-fluid">
  <div class="row">
    <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6 offset-md-2 col-md-8 col-sm-12 col-12">
      <form action="<?= base_url("index.php/Aeronave/editar/$id") ?>" method="POST">
        <h2>Editar Aeronave</h2>
        <label for="prefixo">Prefixo</label>
        <input type="text" class="form-control" name="prefixo" id="prefixo" value="<?= $edit[0]->prefixo?>" required><br>
        <label for="tipo_aeronave">Tipo de Aeronave</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-fighter-jet"></i></label>
          </div>
          <select class="custom-select" name="tipo" id="inputGroupSelect01" required>
            <option selected  value="<?= $edit[0]->tipo ?>"><?php if ($edit[0]->tipo=="P") { 
                echo "Passageiro";
            }else{
              echo "Cargueiro";
            } ?></option>
            <option value="P">Passageiro</option>
            <option value="C">Carga</option>
            
          </select>
        </div><br>

        <label for="horas">Horas de Vôo</label>
        <input type="text" class="form-control time" name="horas_voo" id="horas" value="<?= $edit[0]->horas_voo ?>" required><br>

        <label for="ano_fabricacao">Ano de Fabricação</label>
        <input type="texte" class="form-control data placeholder" name="ano_fabricacao" id="ano_fabricaco" value="<?= $data ?>" required><br>

         <button type="submit" class="btn btn-success btn-lg btn-block">Cadastrar</button>

      </form>
    </div>
  </div>
</div>






<?php }else{  
  $_SESSION['msg_error'] = "Faça o login antes de acessar o painel administrativo.";  
  header("Location:".base_url("index.php/Login/"));

} ?>