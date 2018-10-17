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
      
      
     
    </ul>
    <ul class="navbar-nav ">
   
     
      <li class="nav-item">
        <a class="btn btn-outline-warning " href="<?= base_url('index.php/Tecnico/') ?>">Voltar</a>
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
$data_exame = date("d-m-Y",strtotime($edit[0]->exame_medico)) ; 
$id = $edit[0]->id;
?>

<div class="container-fluid">
  <div class="row">
    <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 offset-md-2 col-md-8 col-sm-12 col-12 ">
      <form action="<?= base_url("index.php/Tecnico/editar/$id") ?>" method="POST">
        <h2>EditarTécnico</h2>
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" value="<?= $edit[0]->nome?>" required><br>
        <label for="data_nascimento">Data de Nascimento</label>
        <input type="text" class=" form-control data placeholder" name="data_nascimento" id="data_nascimento" value="<?= $data ?>" required><br>

        <label for="sexo">Sexo</label><br>

          <?php if ($edit[0]->sexo=="M") { ?>
            <label class="form-check-label" for="exampleRadios1">
              <i class="fas fa-male"></i> Masculino
            </label>  
          <?php }else{ ?>
            <label class="form-check-label" for="exampleRadios2">
              <i class="fas fa-female"></i> Feminino
            </label>

          <?php } ?>
      
         
        <br><br>
        <label for="naturalidade">Naturalidade</label>
        <input type="text" class="form-control" name="naturalidade" id="naturalidade" value="<?= $edit[0]->naturalidade ?>" required ><br>

        <label for="data_exame">último Exame Médico</label>
        <input type="text" class="form-control data placeholder" name="data_exame" id="data" value="<?= $data_exame ?>" required><br>

        <label for=""></label>
      
        <label for="qualificacao">Qualificação</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-users"></i></label>
          </div>
          <select class="custom-select" name="qualificacao" id="inputGroupSelect01" required>
            <option selected disabled value="<?= $edit[0]->qualificacao ?>"><?= $edit[0]->qualificacao ?></option>
            <option value="eletrico">Elêtrico</option>
            <option value="mecanico">Mecânico</option>
            <option value="eletronico">Eletrônico</option>
            
          </select>
        </div><br>

        <label for="telefone">Telefone</label>
        <input type="text" class="form-control telefone" name="telefone" id="telefone" value="<?= $edit[0]->telefone ?>" required><br>

        <label for="Endereco">Endereço</label>
        <input type="text" class="form-control" name="endereco" id="endereco" value="<?= $edit[0]->endereco ?>" required><br>

         <button type="submit" class="btn btn-success btn-lg btn-block">Cadastrar</button>




      </form>
    </div>
  </div>
</div>



<?php }else{  
  $_SESSION['msg_error'] = "Faça o login antes de acessar o painel administrativo.";  
  header("Location:".base_url("index.php/Login/"));

} ?>