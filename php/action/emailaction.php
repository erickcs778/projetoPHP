<?php

include_once "../classes/Cadastro.class.php";

$email = $_POST['email'];
$subject = $_POST['subject'];
$msg = $_POST['msg'];

$cadastro = new Cadastro();


if ($cadastro->testeEmail($email, $subject, $msg)) {
    header("Location:/projeto/index.php?retorno=7");
} else {
    header("Location:/projeto/index.php?retorno=8");
}