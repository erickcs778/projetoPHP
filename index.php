<?php
include_once "php/classes/Cadastro.class.php";
$cadastro = new Cadastro();
// $conexao->testarconexao();
if ($_GET) {
    switch ($_GET['retorno']) {
        case 1:
            echo "<script>
        alert('usuario cadastrado com sucesso');
        </script>";
            break;

        case 2:
            echo "<script>
            alert('houve um erro ao cadastrar usuario');
            </script>";
            break;

        case 3:
            echo "<script>
            alert('usuario alterado com sucesso');
            </script>";
            break;

        case 4:
            echo "<script>
                alert('houve um erro ao alterar o usuario');
                </script>";
            break;

        case 5:
            echo "<script>
                alert('usuario excluido com sucesso');
                </script>";
            break;

        case 6:
            echo "<script>
                    alert('houve um erro ao excluir o usuario');
                    </script>";
            break;

        case 7:
            echo "<script>
                    alert('Email enviado com sucesso');
                    </script>";
            break;

        case 8:
            echo "<script>
                        alert('houve um erro ao enviar o email');
                        </script>";
            break;
    }
}



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
    <table border="">
        <tr>
            <th>
                nome
            </th>
            <th>
                idade
            </th>
            <th>
                email
            </th>
            <th colspan="2">

                opções
            </th>
        </tr>
        <?= $cadastro->listar(); ?>
    </table>

    <a href="pages/cadastrar.php">cadastrar</a>
    <br>
    <a href="pages/enviaremail.php">enviar email</a>

</body>

</html>