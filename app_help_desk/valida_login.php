<?php

session_start();

//verifica se a autenticação foi realizada
$usuario_autenticado = false;

//autenticação do usuário sem banco de dados, apenas com um relação de usuarios
$usuarios_app = [
    [
        'email' => 'joao@teste.com.br', 'senha' => '123456'
    ],

    [
        'email' => 'maria@teste.com.br', 'senha' => 'abcde'
    ],    
];


//verificando se o usuario existe e pode logar
foreach($usuarios_app as $user){

    if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
        $usuario_autenticado = true;
    }

};

    if($usuario_autenticado){
        echo 'Usuário autenticado';
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['x'] = 'um valor';
        $_SESSION['y'] = 'um outro valor';
        header('Location: home.php');
    }else{
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro');
    }
?>