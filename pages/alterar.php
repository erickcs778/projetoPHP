<?php
include_once "../php/classes/Cadastro.class.php";
$cadastro = new Cadastro();

$cadastro->nome = $_GET['nome'];
$cadastro->idade = $_GET['idade'];
$cadastro->email = $_GET['email'];
$cadastro->id = $_GET['id'];




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="../php/action/alteraraction.php" method="post">
        digite seu nome: <input type="text" name="nome" value="<?= $cadastro->nome ?>" required>
        <br>
        digite sua idade: <input type="number" name="idade" value="<?= $cadastro->idade ?>" required>
        <br>
        digite seu email: <input type="email" name="email" value="<?= $cadastro->email ?>" required>
        <br>
        <input type="hidden" name="id" value="<?= $cadastro->id ?>">
        <input type="submit" value="cadastrar">
    </form>
</body>

</html>