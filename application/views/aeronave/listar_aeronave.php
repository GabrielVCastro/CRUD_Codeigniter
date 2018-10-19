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
        <a class="btn btn-outline-success" href="<?= base_url('index.php/Aeronave/form_cadastro') ?>">Cadastrar</a>
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
        <th><a href="<?php echo base_url("index.php/Aeronave/index/id")  ?>">N°</a></th>
        <th><a href="<?php echo base_url("index.php/Aeronave/index/prefixo")  ?>">Prefixo</a></th>
        <th><a href="<?php echo base_url("index.php/Aeronave/index/tipo")  ?>">Tipo de Aeronave</a></th>
        <th><a href="<?php echo base_url("index.php/Aeronave/index/horas_voo")  ?>">Horas de Vôo</a></th>
        <th><a href="<?php echo base_url("index.php/Aeronave/index/ano_fabricacao")  ?>">Ano de Fabricação</a></th>
        <th><i class="fas fa-user-edit"></i></th>
        <th>Ativar/Desativar</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        foreach ($aeronaves as $aeronave) { ?>
            <tr>
              <td><?= $aeronave->id ?></td>
              <td><?= $aeronave->prefixo ?></td>
              <td><?php if ($aeronave->tipo=="P") {
                    echo "Passageiros";
              }else{
                    echo "Carga";
              } ?></td>
              <td><?= $aeronave->horas_voo ?></td>
              <td><?= $aeronave->ano_fabricacao ?></td>
               <td><a href="<?php echo base_url("index.php/Aeronave/form_editar/$aeronave->id")  ?>"><i class="far fa-edit"></i></a></td>
            <td>
              <?php 
                  if ($aeronave->status=="A") { ?>
                    <a href="<?php echo base_url("index.php/Aeronave/excluir/$aeronave->id/D") ?>" class="badge badge-danger" ><?= "Desativar" ?></a> 
                  <?php }else{ ?>
                    <a href="<?php echo base_url("index.php/Aeronave/excluir/$aeronave->id/A") ?>" class="badge badge-success" ><?= "Ativar" ?></a>
                  <?php }
                ?>
            </td>

            </tr>


          <?php }       
      ?>
    </tbody>
  </table>
</div>
<?php 
 if (count($aeronaves)==0) { ?>
   <div class="container">
    <div class="row">
      <div class="col">
        <div class="alert alert-danger" role="alert">
          <p>Nenhuma Aeronave foi cadastrada ainda!</p>
        </div>
      </div>
    </div>
  </div>
  <?php }
?>












<?php }else{  
  $_SESSION['msg_error'] = "Faça o login antes de acessar o painel administrativo.";  
  header("Location:".base_url("index.php/Login/"));

} ?>