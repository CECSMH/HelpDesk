<?php 
  //verificação de login, caso inexistente ou errado, retorna para a tela de login acusando erro.
  session_start();
  if(!isset($_SESSION['login']) || $_SESSION['login']!= 'yes'){
    header('location: index.php?login=error');
  }
?>