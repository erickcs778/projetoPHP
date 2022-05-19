<?php

include_once "../classes/Cadastro.class.php";



$id = $_GET['id'];

$cadastro = new Cadastro();


if ($cadastro->excluir($id)) {
    header("Location:/projeto/index.php?retorno=5");
} else {
    header("Location:/projeto/index.php?retorno=6");
}
