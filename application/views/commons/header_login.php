<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  	<link rel="stylesheet" href="<?= base_url('assets/css/style_login.css') ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">



    
    <title>Aeronave</title>

  </head>
  <body>

    <div class="container">
      <br><br>
      <div class="row">
        <div class="col">
          <?php if(isset($_SESSION['msg_success'])){ ?>
            <div class="alert alert-success" role="alert">
              <?= $_SESSION['msg_success'] ?>
              <?php  $_SESSION['msg_success'] = null ?>
            </div>
          <?php } ?>


          <?php if(isset($_SESSION['msg_errpr'])){ ?>
            <div class="alert alert-danger" role="alert">
              <?= $_SESSION['msg_errpr'] ?>
              <?php  $_SESSION['msg_error'] = null ?>
            </div>
          <?php } ?>



        </div>

      </div>

    </div>