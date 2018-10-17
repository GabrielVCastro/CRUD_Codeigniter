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
        <a class="btn btn-outline-success" href="<?= base_url('index.php/Piloto/form_cadastro') ?>">Cadastrar</a>
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
        <th><a href="<?php echo base_url("index.php/Piloto/index/id")  ?>">ID</a></th>
        <th><a href="<?php echo base_url("index.php/Piloto/index/nome")  ?>">Nome</a></th>
        <th><a href="<?php echo base_url("index.php/Piloto/index/cpf")  ?>">cpf</a></th>
        <th><a href="<?php echo base_url("index.php/Piloto/index/data_nascimento")  ?>">Nascimento</a></th>
        <th><a href="<?php echo base_url("index.php/Piloto/index/sexo")  ?>">Sexo</a></th>
        <th><a href="<?php echo base_url("index.php/Piloto/index/qualificacao")  ?>">Qualificação</a></th>
        <th><a href="<?php echo base_url("index.php/Piloto/index/ultimo_exame")  ?>">Último Exame</a></th>
        <th><a href="<?php echo base_url("index.php/Piloto/index/telefone")  ?>">Telefone</a></th>
        <th><a href="<?php echo base_url("index.php/Piloto/index/endereco")  ?>">Endereço</a></th>
        <th><i class="fas fa-user-edit"></i></th>
        <th><i class="fas fa-trash-alt"></i></th>

      </tr>
    </thead>
  
    <tbody>

  <?php foreach ($pilotos as  $piloto) { ?>
      <tr>
        <td><?= $piloto->id ?></td>
        <td><?= $piloto->nome ?></td>
        <td class="cpf"><?= $piloto->cpf ?></td>
        <td><?php echo date("d-m-Y", strtotime($piloto->data_nascimento)) ?></td>
        <td><?= $piloto->sexo ?></td>
        <td><?php if($piloto->qualificacao=="P"){
          echo "Piloto";
        }else{ echo "Copiloto"; } ?></td>
        <td><?php echo  date("d-m-Y", strtotime($piloto->ultimo_exame)) ?></td>
        <td class="telefone"><?= $piloto->telefone ?></td>
        <td><?= $piloto->endereco ?></td>
        <td><a href="<?php echo base_url("index.php/Piloto/form_editar/$piloto->id")  ?>"><i class="far fa-edit"></i></a></td>
        <td><a href="<?php echo base_url("index.php/Piloto/excluir/$piloto->id")  ?>"><i class="fas fa-times-circle"></i></a></td>
      </tr>
    
  <?php } ?>
    </tbody>
  </table>
</div>
   <?php if(count($pilotos)==0){ ?>
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="alert alert-danger" role="alert">
              <p><?= "Nenhum piloto foi cadastrado no momento!" ?></p>
            </div>
          </div>
        </div>
      </div>  
   <?php } ?>
<?php }else{  
  $_SESSION['msg_error'] = "Faça o login antes de acessar o painel administrativo.";  
  header("Location:".base_url("index.php/Login/"));

} ?>