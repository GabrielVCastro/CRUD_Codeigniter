<?php if ((isset($_SESSION['logado'])) && ($_SESSION['logado']!="")){ ?>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="<?= base_url("index.php/Painel/") ?>">Início</a>
      </li>
      &emsp; 
      <li class="nav-item ">
        <a class="btn btn-outline-success" href="<?= base_url('index.php/Missao/form_cadastro') ?>">Cadastrar</a>
      </li>
      
     
    </ul>
    <ul class="navbar-nav ">
   
     
      <li class="nav-item">
        <a class="btn btn-outline-warning " href="<?= base_url('index.php/Missao/') ?>">Voltar</a>
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
$id = $manutencao[0]->id;
?>

<div class="container-fluid">
  <div class="row">
    <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 offset-md-2 col-md-8 col-sm-12 col-12">
      <form action="<?= base_url("index.php/Manutencao/editar/$id") ?>" method="POST">
          <h2>Editar Manutenção</h2>
          <label for="tecnico">Técnico</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-user-tie"></i></label>
            </div>
            <select class="custom-select" name="id_tecnico" id="inputGroupSelect01" required>
              <option selected value="<?= $manutencao[0]->id_tecnico ?>"><?=$manutencao[0]->nome?></option>
              <?php foreach ($tecnicos as $tecnico) { ?>

                     <option value="<?= $tecnico->id ?>"><?= $tecnico->nome ?></option>
                  
             <?php } ?>
            </select>
          </div><br>


          <label for="tecnico">Aeronave</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-fighter-jet"></i></label>
            </div>
            <select class="custom-select" name="id_aeronave" id="inputGroupSelect01" required>
              <option selected value="<?= $manutencao[0]->id_aeronave ?>"><?=$manutencao[0]->prefixo?></option>
              <?php foreach ($aeronaves as $aeronave) { ?>

                     <option value="<?= $aeronave->id ?>"><?php echo "Prefixo: ".$aeronave->prefixo ?></option>
                  
             <?php } ?>
            </select>
          </div><br>


          <label for="tecnico">Tipo de Manutenção</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-wrench"></i></label>
            </div>
            <select class="custom-select" name="tipo" id="inputGroupSelect01" required>
              <option selected value="<?= $manutencao[0]->tipo ?>"><?php if ($manutencao[0]->tipo=="P") {
                  echo "Preventiva";
              }else{
                  echo "Corretiva";
              } ?></option>
              <option value="P">Preventiva</option>
              <option value="C">Corretiva</option>
            </select>
          </div><br>

          <button type="submit" class="btn btn-success btn-lg btn-block">Editar</button>
          

      </form>
    </div>
  </div>
</div>




<?php }else{  
  $_SESSION['msg_error'] = "Faça o login antes de acessar o painel administrativo.";  
  header("Location:".base_url("index.php/Login/"));

} ?>
