<?php

include_once "../classes/Cadastro.class.php";


$nome = $_POST['nome'];
$idade = $_POST['idade'];
$email = $_POST['email'];

$cadastro = new Cadastro();

if ($cadastro->cadastrar($nome, $idade, $email)) {
    header("Location:/projeto/index.php?retorno=1");
} else {
    header("Location:/projeto/index.php?retorno=2");
}
