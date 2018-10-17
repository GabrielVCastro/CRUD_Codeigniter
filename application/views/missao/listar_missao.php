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
        <a class="btn btn-outline-warning " href="<?= base_url('index.php/Painel/') ?>">Voltar</a>
      </li>
    </ul>  
  </div>
</nav>



<?php 
if (isset($_SESSION['msg_success'])) { ?>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="alert alert-success" role="alert">
          <?= $_SESSION['msg_success']?>
        </div>
      </div>
    </div>
  </div>
<?php 
  $_SESSION['msg_success'] = null;

} 
 
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

} ?>



<div class="table-responsive">
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th><a href="<?php echo base_url("index.php/Missao/index/id")  ?>">N°</a></th>
        <th><a href="<?php echo base_url("index.php/Missao/index/data_partida")  ?>">Data de Partida</a></th>
        <th><a href="<?php echo base_url("index.php/Missao/index/data_chegada")  ?>">Data de Chegada</a></th>
        <th><a href="<?php echo base_url("index.php/Missao/index/tipo")  ?>">Tipo</a></th>
        <th><a href="<?php echo base_url("index.php/Missao/index/id_piloto")  ?>">Piloto</a></th>
        <th><a href="<?php echo base_url("index.php/Missao/index/id_copiloto")  ?> ">Copiloto</a></th>
        <th><a href=" <?php echo base_url("index.php/Missao/index/id_aeronave")  ?>">Aeronave</a></th>
        <th><i class="fas fa-user-edit"></i></th>
        <th><i class="fas fa-trash-alt"></i></th>
      </tr>
    </thead>
    <tbody>
      <?php 
       foreach ($missoes as $missao) { ?>
        <tr>
          <td><?= $missao->id ?></td>
          <td><?= $missao->data_partida ?></td>
          <td><?= $missao->data_chegada ?></td>
          <td><?= $missao->tipo ?></td>
          <td><?= $missao->piloto ?></td>
          <td><?= $missao->co_piloto ?></td>
          <td><?php if($missao->tipo_aeronave=="P"){
                  echo "Passageiro";
              }else{
                  echo "Carga";
              } ?>     
          </td>
          <td><a href="<?php echo base_url("index.php/Missao/form_editar/$missao->id")  ?>"><i class="far fa-edit"></i></a></td>
          <td><a href="<?php echo base_url("index.php/Missao/excluir/$missao->id")  ?>"><i class="fas fa-times-circle"></i></a></td>

        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>




<?php }else{  
  $_SESSION['msg_error'] = "Faça o login antes de acessar o painel administrativo.";  
  header("Location:".base_url("index.php/Login/"));
  
} ?>