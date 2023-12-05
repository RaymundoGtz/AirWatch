<?php

    include('modelo/conexion_bd.php');

    $alerta ="";


    if (!empty($_POST["alarma"])) {
        if (empty($_POST["min"])  || empty($_POST["max"])) {
        } else {
            $min = $_POST["min"];
            $max = $_POST["max"];
            
            $sql = $conn->query("delete from alarmas");
            $sql = $conn->query("INSERT INTO alarmas(valormax, valormin) VALUES('$max','$min')");
            if ($sql == 1) {
                $alerta = '<div class="alerta">Alarma creada correctamente</div>';
            } else {
                $alerta = '<div class="alerta">Alarma no creada</div>';
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIRWATCH</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&family=Pacifico&display=swap" rel="stylesheet">
</head>
    <style>
        .tittle{
            font-family: sans-serif;
        }

        .label{
            font-family: sans-serif;
        }

        body{
            background-color:black;
        }

        .titulo{
            color:white;
            font-family:'Inter',sans-serif;
        }

        /* ESTILOS DEL HEADER */

        .airwatch{
            font-size: 25px;
            margin-left:700px;
        }

        header {
            background-color: black;
            color: #fff;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h1 {
            text-align: center;
            padding-top: 100px;
            font-size: 30px;
            font-family: 'Inter', sans-serif;
            color: white;
        }

        /* Estilo de la navegación para que esté a la derecha */
        nav {
            display: flex;
            align-items: center;
        }

        nav ul {
            margin-left: 100px;
            list-style: none;
            display: flex;
        }

        nav li {
            margin-left: 20px;
        }

        /* Estilo de los enlaces de navegación */
        nav a {
            text-decoration: none;
            color: #fff;
            font-size: 25px;
            font-family: 'Inter', sans-serif;
            transition: color 0.3s; /* Agregar una transición para el cambio de color */
        }

        /* Estilo de los enlaces de navegación al pasar el cursor */
        nav a:hover {
            color: grey;
        }

        /* ESTILOS FORMULARIO ---------------------------------------------------- */

        .container .titulo{
            font-family:'Inter',sans-serif;
            color:white;
            font-size:35px;
            margin-left:250px;
            margin-top:80px;
        }

        .nombre, .edad, 
        .correo, .clave{
            color:white;
            margin-left:250px;
        }

        .padre h2{
            color:white;
            font-family: 'Inter',sans-serif;
        }

        .padre h3{
            color:white;
            font-family:'Inter',sans-serif;
        }

        .nombre, .apellido {
            display: inline-block;
            margin-right: 0px; 
        }

        .apellido{
            margin-left:50px;
        }

        .edad, .correo, .clave, .cuenta {
            display: block;
            margin-right: 0; 
        }

/*------------------------------------------------------------------ */


        .min{
            margin-top:35px;
        }


        .min input[type="int"] {
            background-color: black;
            border: 2px solid #333;
            border-radius: 10px;
            padding: 10px; 
            font-size: 16px; 
            color: white; 
            width: 5%; 
            height:35px;
            margin-top: 5px;
        }


/*------------------------------------------------------------------ */
        
        .max, .min{
            font-family:'Inter',sans-serif;
            font-size:24px;
            color:white;
            margin-left:250px;
        }

        .max input[type="int"] {
            background-color: black;
            border: 2px solid #333;
            border-radius: 10px;
            padding: 10px; 
            font-size: 16px; 
            color: white; 
            width: 5%; 
            height:35px;
            margin-top: 5px;
        }

        .max{
            margin-top:30px;
        }




/*--------------Boton de inicio de sesion---------------------------- */

        /* ESTILOS PARA BOTON DE REGISTRO Y DE INICIO DE SESION */

        .boton {
            border-radius: 15px;
            color:white;
            background-color:black;
            border: 2px solid #333;
            margin-top: 70px;
            margin-bottom: 50px;
            padding: 20px 50px;
            cursor: pointer;
            font-size:15px;
            font-size:bold;
            margin-left:250px;
        }



        .boton:hover::before {
            right: 0;
            background-color: black;
        }

        .boton:hover {
            color: white;
            border-color: white;
            background-color:black;
        }

        a{
            color:white;
            margin-left:260px;
            text-decoration:none;
            font-family:'Inter',sans-serif;
        }

        h3{
            color: gray;
            font-family:'Inter',sans-serif;
            margin-left:250px;
        }

</style>
<body>

    <header>
        <nav>
            <ul>  
                <li><a href="admin-page.php" class="airwatch">AIRWATCH</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <form action="" method="post" class="formulario">
            <h2 class="titulo">Crear nueva alarma</h2>
            <h3><?php echo $alerta; // Mostrar el mensaje de alerta debajo del título ?></h3>
            <?php?>
            <div class="padre">
                <div class="min">
                    <label for="min">Valor Minimo</label><br>
                    <input type="int" name= "min">
                </div>
                <div class="max">
                    <label for="max">Valor Maximo</label><br>
                    <input type="int" name= "max">
                </div>
                <div class="cuenta">
                    <input class="boton" type="submit" value="Crear Alarma" name="alarma"><br>
                </div>
            </div>
        </form>
    </div>

</body>
</html>