<?php if ((isset($_SESSION['logado'])) && ($_SESSION['logado']!="")){

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

} ?>

<?php }else{
	$_SESSION['msg_error'] = "Faça o login antes de acessar o painel administrativo.";
	header("Location:".base_url("index.php/Login/"));
} ?>
