<?php

session_start();

//verifica se a autenticação foi realizada
$usuario_autenticado = false;
$usuario_id = null;
$usuario_perfil_id = null;

$perfis = [
    [
        1 => 'adm'
    ],

    [
        2 => 'user'
    ]
    ];

//autenticação do usuário sem banco de dados, apenas com um relação de usuarios
$usuarios_app = [
    [
        'id' => 1, 'email' => 'adm@teste.com.br', 'senha' => 'henriq', 'perfil_id' => 1
    ],

    [
        'id' => 2, 'email' => 'user@teste.com.br', 'senha' => '654321', 'perfil_id' => 1
    ],

    [
        'id' => 3, 'email' => 'joao@teste.com.br', 'senha' => '123456', 'perfil_id' => 2
    ],

    [
        'id' => 4, 'email' => 'maria@teste.com.br', 'senha' => 'abcde', 'perfil_id' => 2
    ]

];


//verificando se o usuario existe e pode logar
foreach($usuarios_app as $user){

    if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
        $usuario_autenticado = true;
        $usuario_id = $user['id'];
        $usuario_perfil_id = $user['perfil_id'];
    }

};

    if($usuario_autenticado){
        echo 'Usuário autenticado';
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('Location: home.php');
    }else{
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro');
    }
?>