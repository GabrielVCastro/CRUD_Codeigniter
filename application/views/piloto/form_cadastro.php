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

} ?>


<div class="container-fluid">
	<div class="row">
		<div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 offset-md-2 col-md-8 col-sm-12 col-12 ">
			<form action="<?= base_url('index.php/Piloto/cadastrar') ?>" method="POST">
				<h2>Cadastrar Piloto</h2>
				<label for="nome">Nome Completo</label>
				<input type="text" class="form-control" name="nome" id="nome" required><br>

        <label for="cpf">CPf</label>
        <input type="text" class="form-control cpf" name="cpf" id="cpf" required><br>
        <label for="data">Data de Nascimento</label>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>  
          </div>
          <input type="text" class="form-control data placeholder" name="data" id="data" required>
        </div>
       <br>

        <label for="qualificacao">Qualificação</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-fighter-jet"></i></label>
          </div>
          <select class="custom-select" name="qualificacao" id="inputGroupSelect01" required>
            <option selected disabled>Selecionar...</option>
            <option value="P">Piloto</option>
            <option value="C-P">Copiloto</option>
            
          </select>
        </div><br>

        <label for="data_exame">Data do último exame médico</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>  
          </div>
          <input type="text" class="form-control data placeholder" name="data_exame" id="data_exame" required>
        </div>
        <br>

        <label for="telefone">Telefone</label>
        <input type="text" class="form-control telefone" name="telefone" id="telefone" required><br>

        <label for="endereco">Endereço</label>
        <input type="text" class="form-control" name="endereco" id="endreco" required><br>

        <label for="sexo">Sexo</label>

        <div class="form-check">
          <input class="form-check-input" type="radio" name="sexo" id="exampleRadios1" value="M" checked >
          <label class="form-check-label" for="exampleRadios1">
            <i class="fas fa-male"></i> Masculino
          </label>
        </div>

        <div class="form-check">
        <input class="form-check-input" type="radio" name="sexo" id="exampleRadios2" value="F">
          <label class="form-check-label" for="exampleRadios2">
              <i class="fas fa-female"></i> Feminino
           </label>
        </div>


        <button type="submit" class="btn btn-success btn-lg btn-block">Cadastrar</button>
  
			</form>
		</div>
	</div>
</div>

<?php }else{  
  $_SESSION['msg_error'] = "Faça o login antes de acessar o painel administrativo.";  
  header("Location:".base_url("index.php/Login/"));

} ?>