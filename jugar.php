<?php
//Declaro variables. Las declaro en el momento que me interesa
//$min=0;
//$max=0;
//$numero_propuesto=0;
//$jugada=0;
//$intentos=0;
//$rtdo=0;

//Si lo he metido por submit y si no por url, que será nulo
$opcion = $_POST['submit'] ?? "Por url";
switch ($opcion){
    case "Reinciar":
    case "Empezar":
        //Input
        //Rango menor.
        $min =0;
        //Número de intentos que le pasamos.
        $intentos = $_POST['intentos'];
        //Número máximo 2 elevado al número de intentos. Rango mayor.
        $max = 2** $intentos;
        //Procesamiento.
        //Número en pantalla que ofrece la máquina. La suma del max y el min / 2
        $numero_propuesto=($min+$max)/2;
        //Número de la jugada
        $jugada=1;
        break;
    case "Jugar":
        //Obtener valores de variables y las guardamos en el hidden.
        $min = $_POST['min'];
        $max = $_POST['max'];
        //Número de intentos que le pasamos.
        $intentos = $_POST['intentos'];
        //Número de la jugada
        $jugada = $_POST['jugada'];
        //Número que tenemos guardado en el hidden y que ha salido del caso empezar
        $numero_propuesto = $_POST['numero_propuesto'];
        //Leer rtdo. QUe sale del radio button
        $rtdo = $_POST['rtdo'];

        //PROCESAMIENTO.Actualizar min o max en funcion del resultado
        switch ($rtdo){
            case ">":
                $min = $numero_propuesto;
                break;
            case "<":
                $max = $numero_propuesto;
                break;
            case "=":
                header ("location:fin.php?msj=Has acertado");
                exit();
                //TODO Falta implementar esta situación que será fin de juego

        }
        //actualizar las variables $numero_propuesto $jugada, porque no hemos salido por > o <
        $numero_propuesto = ($min+$max)/2;
        //Aquí no es igual
        $jugada++;
        //No es igual y los intentos es mayor
        if($jugada>$intentos){
            //Enviamos una variable con texto
            header("location:fin.php?msj=Me has engañado");
            exit();
        }
        break;
    case "Volver":
    default:
        header ("location:index.php");
        exit();

}

?>


<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Juego de adivina un número</title>
    <link rel="stylesheet" href="css/estilo.css" type="text/css"/>
</head>
<body style="width: 60%;float:left;margin-left: 20%; ">

<h3></h3>
<fieldset style="width:40%;background:bisque ">
    <legend>Empieza el juego</legend>
    <form action="jugar.php" method="POST" >
        <!-- SALIDA -->
        <h2> El n&uacutemero es  <span style="color: blue"> <?=$numero_propuesto?></span> </h2>
        <h5> Jugada  <span style="color: blue"> <?=$jugada?></span>  </h5>
        <h5> Actualmente te quedan   <span style="color: blue"> <?=$intentos-$jugada?> </span> intentos </h5>

        <input type="hidden" value="10" name="intentos">
        <fieldset>
            <legend>Indica c&oacutemo es el n&uacutemero qu&eacute has pensado</legend>
            <input type="radio" name="rtdo" checked value='>'> Mayor<br />
            <input type="radio" name="rtdo" value='<'> Menor<br />
            <input type="radio" name="rtdo" value='='> Igual<br />
        </fieldset>
        <hr />
        <!-- Lo anoto todo para poder recuperarlo -->
        <input type="submit" value="Jugar" name="submit" >
        <input type="submit" value="Reiniciar" name="submit"  >
        <input type="submit" value="Volver" name="submit"  >
        <input type="hidden" name="max" value="<?=$max?>">
        <input type="hidden" name="min" value="<?=$min?>">
        <input type="hidden" name="numero_propuesto" value="<?=$numero_propuesto?>">
        <input type="hidden" name="intentos" value="<?=$intentos?>">
        <input type="hidden" name="jugada" value="<?= $jugada ?>">


    </form>
</fieldset>

</body>
</html>