<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="../php/action/emailaction.php" method="post">
        Digite o email: <input type="email" name="email">
        <br>
        Digite o assunto: <input type="text" name="subject">
        <br>
        <textarea name="msg" cols="30" rows="10">Digite seu texto aqui...</textarea>
        <br>
        <input type="submit" value="Enviar Email">

    </form>
</body>

</html>