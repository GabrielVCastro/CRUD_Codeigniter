<?php if ((isset($_SESSION['logado'])) && ($_SESSION['logado']!="")){ ?>

<?php if ((count($tecnicos)==0) || (count($aeronaves)==0)) {
  $_SESSION['msg_aviso'] = "Cadastre Técnico e Aeronave antes de fazer manutenção!";
  header("Location: ".base_url("index.php/Painel/"));

  }else{
    $_SESSION['msg_aviso'] = null;
  } ?>

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
        <a class="btn btn-outline-success" href="<?= base_url('index.php/Manutencao/form_cadastro') ?>">Cadastrar</a>
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

}  ?>



<div class="table-responsive">
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th><a href="<?php echo base_url("index.php/Manutencao/index/id")  ?>">N°</a></th>
        <th><a href="<?php echo base_url("index.php/Manutencao/index/id_tecnico")  ?>">Técnico</a></th>
        <th><a href="<?php echo base_url("index.php/Manutencao/index/id_aeronave")  ?>">Aeronave</a></th>
        <th><a href="<?php echo base_url("index.php/Manutencao/index/tipo")  ?>">Tipo</a></th>
        <th><a href="<?php echo base_url("index.php/Manutencao/index/data_hora")  ?>">Data</a></th>
        
        <th><i class="fas fa-user-edit"></i></th>
        <th><i class="fas fa-trash-alt"></i></th>
      </tr>
    </thead>
    <tbody>
      <?php 
        foreach ($manutencoes as $manutencao) { ?>
          <tr>
            <td><?=$manutencao->id?></td>
            <td><?=$manutencao->nome?></td>
            <td><?=$manutencao->prefixo?></td>
            <td><?php if($manutencao->tipo=="P"){
                echo "Preventiva";
            }else{
                echo "Corretiva";
            } ?></td>
            <td><?=$manutencao->data_hora?></td>
            <td><a href="<?php echo base_url("index.php/Manutencao/form_editar/$manutencao->id")  ?>"><i class="far fa-edit"></i></a></td>
            <td><a href="<?php echo base_url("index.php/Manutencao/excluir/$manutencao->id")  ?>"><i class="fas fa-times-circle"></i></a></td>
          </tr> 
       <?php }


      ?>
      
    </tbody>
  </table>
</div>
<?php 
 if (count($manutencoes)==0) { ?>
   <div class="container">
    <div class="row">
      <div class="col">
        <div class="alert alert-danger" role="alert">
          <p>Nenhuma manutenção foi cadastrada ainda!</p>
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