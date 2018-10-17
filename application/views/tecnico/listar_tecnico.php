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
        <a class="btn btn-outline-success" href="<?= base_url('index.php/Tecnico/form_cadastro') ?>">Cadastrar</a>
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
            <th><a href="<?php echo base_url("index.php/Tecnico/index/id")  ?>">ID</a></th>
            <th><a href="<?php echo base_url("index.php/Tecnico/index/nome")  ?>">Nome</a></th>
            <th><a href="<?php echo base_url("index.php/Tecnico/index/data_nascimento")  ?>">Data de Nascimento</a></th>
            <th>Sexo</th>

            <th><a href="<?php echo base_url("index.php/Tenico/index/naturalidade")  ?>">Naturalidade</a></th>
            
            <th><a href="<?php echo base_url("index.php/Tecnico/index/exame_medico")  ?>">Último exame</a></th>
            <th><a href="<?php echo base_url("index.php/Tecnico/index/qualificacao")  ?>">Qualificação</a></th>
            <th><a href="<?php echo base_url("index.php/Tecnico/index/telefone")  ?>">Telefone</a></th>
            <th><a href="<?php echo base_url("index.php/Tecnico/index/endereco")  ?>">Endereço</a></th>
            <th><i class="fas fa-user-edit"></i></th>
            <th><i class="fas fa-trash-alt"></i></th>
          </tr>
        </thead>
        <tbody>
           <?php foreach ($tecnicos as  $tecnico) { ?>
            <tr>
              <td><?= $tecnico->id ?></td>
              <td><?= $tecnico->nome ?></td>
              <td><?php echo date("d-m-Y", strtotime($tecnico->data_nascimento)) ?></td>
              <td><?= $tecnico->sexo ?></td>
              <td><?= $tecnico->naturalidade?> </td>
              
             
              <td><?php echo  date("d-m-Y", strtotime($tecnico->exame_medico)) ?></td>
              <th><?= $tecnico->qualificacao ?> </th>
              <td class="telefone"><?= $tecnico->telefone ?></td>
              <td><?= $tecnico->endereco ?></td>
              <td><a href="<?php echo base_url("index.php/Tecnico/form_editar/$tecnico->id")  ?>"><i class="far fa-edit"></i></a></td>
              <td><a href="<?php echo base_url("index.php/Tecnico/excluir/$tecnico->id") ?>"><i class="fas fa-times-circle"></i></a></td>
            </tr>
    
  <?php } ?>
        </tbody>
  </table>
</div>





<?php }else{  
  $_SESSION['msg_error'] = "Faça o login antes de acessar o painel administrativo.";  
  header("Location:".base_url("index.php/Login/"));

} ?>