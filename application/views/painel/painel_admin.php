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
		    <li class="nav-item">
		        <a class="btn btn-outline-info" href="<?= base_url('index.php/Piloto/') ?>">Piloto</a>
		    </li>
		    &emsp;
		    <li class="nav-item">
		        <a class="btn btn-outline-info " href="<?= base_url('index.php/Tecnico/') ?>">Técnico</a>
		    </li>
		  	 &emsp;
		    <li class="nav-item">
		      	<a  class="btn btn-outline-info" href="<?= base_url('index.php/Aeronave/') ?>">Aeronave</a>
		    </li>
		     &emsp;
			<li class="nav-item">
		      	<a class="btn btn-outline-info" href="<?= base_url('index.php/Missao/') ?>">Missão</a>
		    </li>
		     &emsp;		
			<li class="nav-item">
		      	<a class="btn btn-outline-info" href="<?= base_url('index.php/Manutencao/') ?>">Manutenção</a>
		    </li>
	    </ul>
	    <ul class="navbar-nav ">
	   
	     
	      <li class="nav-item">
	        <a class="nav-link " href="<?= base_url('index.php/Login/') ?>"><i class="fas fa-sign-out-alt"></i></a>
	      </li>
	    </ul>  
	  </div>
	</nav>


	<?php

	 if (isset($_SESSION['msg_aviso'])) { ?>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="alert alert-warning" role="alert">
					  <p><?= $_SESSION['msg_aviso']?></p>
					</div>
				</div>
			</div>
		</div>
	<?php 
	$_SESSION['msg_aviso'] = null;
	} ?>
	
<?php }else{
	$_SESSION['msg_error'] = "Faça o login antes de acessar o painel administrativo.";  
	header("Location:".base_url("index.php/Login/"));
} ?>

