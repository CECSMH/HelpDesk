<?php

    //script responsável por concatenar e gravar informações em um arquivo .txt, de onde serão recuperados na hora da consulta.
    session_start();

    //caso exista '#' dentro das strings, seram substituídas por '-', para não quebrar a logica de separação dos dados.
    $title = str_replace('#', '-', $_POST['title']);
    $category = str_replace('#', '-', $_POST['category']);
    $description = str_replace('#', '-', $_POST['description']);

    //strings são concatenadas com o "#" entre eles como separador.
    $txtdb = fopen('../../app_help_desk/txt_bd.txt', 'a');
    $conctxt = implode('#', $_POST);
    $conctxt = $_SESSION['id'] .'#'. $conctxt . PHP_EOL;
    fwrite($txtdb, $conctxt);
    fclose($txtdb);
    header('location: open.php')
?>