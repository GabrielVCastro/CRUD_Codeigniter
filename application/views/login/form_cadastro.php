


<div class="container-fluid">
	<div class="row">
		<div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6 offset-md-2 col-md-8 col-sm-12 col-12">
			<form action="<?= base_url('index.php/Login/cadastrar/')?>" method="POST" class="form_cadastro" id="cadastro">
				<h2>Cadastro</h2>
				
				
				
				
				<div class="input-group input-group-lg">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fas fa-at"></i></span>
				  </div>
				  <input type="email" class="form-control" placeholder="E-mail" name="email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
				</div><br>

				<div class="input-group input-group-lg">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fas fa-user-ninja"></i></span>
				  </div>
				  <input type="text" class="form-control" placeholder="Name" name="nome" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
				</div><br>

				<div class="input-group input-group-lg">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fas fa-key"></i></span>
				  </div>
				  <input type="password" class="form-control" placeholder="Password" name="password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
				</div><br>

				<div class="input-group input-group-lg">
				  <div class="input-group-prepend">
				    <span class="input-group-text"  id="inputGroup-sizing-lg"><i class="fas fa-unlock-alt"></i></span>
				  </div>
				  <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
				</div><br>


				<button type="submit" onclick class="btn btn-success btn-lg btn-block" >Cadastrar</button>
				<a href="<?= base_url('index.php/Login/form_login/') ?>" class="btn btn-warning btn-lg btn-block">Voltar</a>
			</form>
		</div>
	</div>
</div>
    