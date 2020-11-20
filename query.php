<!--chamada de script de confirmação de login na sessão-->
<?php 
  require_once('autentication.php');
?>

<!--recuperação de informações a partir de um arquivo.txt-->
<?php
  $query = array();
  $txt_bd = fopen('../../app_help_desk/txt_bd.txt', 'r');

  while(!feof($txt_bd)){
    $lines = fgets($txt_bd);
    $query[] = $lines;
  }

  fclose($txt_bd)
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">Sair</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
              <!--loop foreach que vai percorrer todo o array e exibir na tela em formas de card-->
              <?php foreach($query as $line){?>
              <?php $item = explode('#', $line);

                //caso o usuário sera um administrado, tudo é mostrado, caso ele seja usuário comum, apenas os cards do mesmo serão exibidos.
                if($_SESSION['privilege'] == 2){
                  if($_SESSION['id'] == $item[0]){
                    continue;
                  }
                }

                //limitador para que não seja exibido dados de user id ou adm id.
                if(count($item) < 3){
                  continue;
                }

              ?>
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?=$item[1]?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?=$item[2]?></h6>
                  <p class="card-text"><?=$item[3]?></p>

                </div>
              </div>

              <!--fechamento do loop foreach-->
              <?php }?>

              <div class="row mt-5">
                <div class="col-6">
                  <a href="home.php" class="btn btn-lg btn-warning btn-block" type="submit">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>