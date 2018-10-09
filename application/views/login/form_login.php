<?php 
	$_SESSION['logado'] = null;

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
		<div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6 offset-md-2 col-md-8 col-sm-12 col-12">
			<form action="<?= base_url('index.php/Login/logar/') ?>" method="POST" class="login">
				<h2>Login</h2>
				
				<div class="input-group input-group-lg">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fas fa-at"></i></span>
				  </div>
				  <input type="email" class="form-control" placeholder="E-mail" name="email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
				</div><br>
				<div class="input-group input-group-lg">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fas fa-key"></i></span>
				  </div>
				  <input type="password" class="form-control" placeholder="Password" name="password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
				  
				</div><br>
				
				<button type="submit" class="btn btn-success btn-lg btn-block">Logar</button>
				<a href="<?= base_url('index.php/Login/form_cadastro/') ?>" class="btn btn-info btn-lg btn-block">Cadastre-se</a>
			</form>
		</div>
	</div>
</div>
    

 