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
        <a class="btn btn-outline-success" href="<?= base_url('index.php/Missao/form_cadastro') ?>">Cadastrar</a>
      </li>
      
     
    </ul>
    <ul class="navbar-nav ">
   
     
      <li class="nav-item">
        <a class="btn btn-outline-warning " href="<?= base_url('index.php/Missao/') ?>">Voltar</a>
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
 $dat_partida = str_replace('/', '-', $missao[0]->data_partida);
 $data_partida = date("d-m-Y H:i:s" ,strtotime($dat_partida));

$dat_chegada = str_replace('/', '-', $missao[0]->data_chegada);
$data_chegada = date("d-m-Y H:i:s" ,strtotime($dat_chegada));

$id = $missao[0]->id;
?>

<div class="container-fluid">
  <div class="row">
    <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 offset-md-2 col-md-8 col-sm-12 col-12">
      <form action="<?= base_url("index.php/Missao/editar/$id") ?>" method="POST">
        <h2>Editar Missão</h2>
        <label for="data_hora_partida">Data/Hora da Partida</label>
        <input type="text" class="form-control date_time " name="data_partida"  value="<?= $data_partida ?>" id="data_hora_partida"><br>
        <label for="data_hora_chegada">Data/Hora de Chegada</label>
        <input type="text" class="form-control date_time " name="data_chegada" value="<?= $data_chegada ?>" id="data_hora_chegada"><br>
        <label for="tipo">Tipo da Missão</label>
        <textarea name="tipo" id="tipo" cols="30" rows="5" class="form-control"><?= $missao[0]->tipo ?></textarea><br>
        <label for="piloto">Piloto</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-user-tie"></i></label>
          </div>
          <select class="custom-select" name="id_piloto" id="inputGroupSelect01" required>
            <option selected value="<?= $missao[0]->id_piloto ?>" ><?= $missao[0]->piloto ?></option>
            <?php foreach ($pilotos as $piloto) { 
                 if ($piloto->qualificacao=="P") { ?>
                   <option value="<?= $piloto->id ?>"><?= $piloto->nome ?></option>
                <?php } ?>
                
           <?php } ?>
          </select>
        </div><br>

        <label for="piloto">Copiloto</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-user-alt"></i></label>
          </div>
          <select class="custom-select" name="id_copiloto" id="inputGroupSelect01" required>
            <option selected value="<?= $missao[0]->id_copiloto ?>"><?= $missao[0]->co_piloto ?></option>
            <?php foreach ($pilotos as $piloto) { 
                 if ($piloto->qualificacao!="P") { ?>
                   <option value="<?= $piloto->id ?>"><?= $piloto->nome ?></option>
                <?php } ?>
                
           <?php } ?>
          </select>

        </div><br>

        <label for="piloto">Aeronave</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-fighter-jet"></i></label>
          </div>
          <select class="custom-select" name="id_aeronave" id="inputGroupSelect01" required>
            <option selected value="<?= $missao[0]->id_aeronave ?>"><?php if($missao[0]->tipo_aeronave=="P"){
                  echo "Passageiro";
            }else{
                  echo "Carga";
            } ?></option>
            <?php foreach ($aeronaves as $aeronave) { ?>
                <option value="<?= $aeronave->id ?>"><?php echo "Prefixo: ".$aeronave->prefixo; 
                if($aeronave->tipo=="P"){
                  echo " --Passageiro"; 
                }else{
                  echo " --Carga";
                } ?></option>
                
           <?php } ?>
          </select>

        </div><br>

        <button type="submit" class="btn btn-success btn-lg btn-block">Cadastrar</button>

      </form>
    </div>
  </div>
</div>





<?php }else{  
  $_SESSION['msg_error'] = "Faça o login antes de acessar o painel administrativo.";  
  header("Location:".base_url("index.php/Login/"));

} ?>