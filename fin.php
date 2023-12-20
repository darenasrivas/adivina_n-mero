<?php

//Si mensaje tiene el valor de nulo, lleva a index.php

//Mensaje que aparecerá en pantalla. El valor viene del header en jugar.php
$msj = $_GET['msj'];

if($msj===null){
    header("location:index.php");
    exit();
}

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilo.css" type="text/css"/>
    <title>Fin de juego</title>
</head>
<body>
    <h1 style="text-align: center; margin: 20% auto 0 auto; color: red; background-color: white; padding: 20px"><?= $msj ?></h1>
    <a href="index.php" style="padding: 6px; background-color: red; text-align: center; border-radius: 40px; color: white; text-decoration: none">Vuelve a jugar
</body>
</html>
