<?php

include_once "../classes/Cadastro.class.php";


$nome = $_POST['nome'];
$idade = $_POST['idade'];
$email = $_POST['email'];
$id = $_POST['id'];

$cadastro = new Cadastro();


if ($cadastro->alterar($nome, $idade, $email, $id )) {
    header("Location:/projeto/index.php?retorno=3");
} else {
    header("Location:/projeto/index.php?retorno=4");
}