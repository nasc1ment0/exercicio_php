<?php

//montagem do texto
$titulo = str_replace('#', '-',$_POST['titulo']);
$categoria = str_replace('#', '-',$_POST['categoria']);
$descricao = str_replace('#', '-',$_POST['descricao']);

$texto = $titulo . '#' . $categoria . '#' . $descricao. PHP_EOL;

//vai abrir o arquivo
$arquivo = fopen('arquivo.txt', 'a');

//passando oq foi escrito para um arquivo
fwrite($arquivo, $texto);

//para fechar o arquivo
fclose($arquivo);

header('Location: abrir_chamado.php');
?>