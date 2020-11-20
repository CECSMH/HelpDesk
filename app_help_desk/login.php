<?php
    session_start();
    //dados de usuários aqui foram engessados para fins didáticos, porem, poderiam vir de um banco de dados.
    $admControl = [1 => 'adm', 2 => 'user'];

    $user_hc = [
        array('id' => 1, 'email' => 'emaildeteste@test.com.br', 'password' => '12345', 'privilege' => 1),
        array('id' => 2, 'email' => 'email@ficticio.com.br',  'password' => '54321', 'privilege' => 1),
        array('id' => 3, 'email' => 'emailadm@ficticio.com.br',  'password' => 'abcde', 'privilege' => 2),
        array('id' => 4, 'email' => 'emailadm2@ficticio.com.br',  'password' => 'edcba', 'privilege' => 2)
    ];

    $userControl = false;

    //logica simples para realizar o login, condicionais para comparar os dados inseridos pelo usuário com os dados salvos.
    foreach($user_hc as $user){
        if($user['email'] == $_POST['email'] && $user['password'] == $_POST['password']){
            //caso seja compatível, os dados de login sao armazenados na global SESSION.
            $userControl = true;
            $_SESSION['login'] = 'yes';
            $_SESSION['id'] = $user['id'];
            $_SESSION['privilege'] = $user['privilege'];
            header('location:home.php');
        }else if(!$userControl){
            //caso invalido, a global SESSION recebe um valor de acesso negado, e retorna uma mensagem de erro para o usuário.
            $_SESSION['login'] = 'no';
            header('location:index.php?login=error');
        }
    }



?>