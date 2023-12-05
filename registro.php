<?php
include("modelo/conexion_bd.php");

$alerta = ""; // Inicializa la variable de alerta

if (!empty($_POST["registro"])) {
    if (empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["correo"]) || empty($_POST["clave"]) || empty($_POST["edad"])) {
        $alerta = '<div class="alerta"> Uno de los campos está vacío</div>';
    } else {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $edad = $_POST["edad"];
        $correo = $_POST["correo"];
        $clave = $_POST["clave"];

        $sql = $conn->query("INSERT INTO usuarios(nombre, apellido, edad, correo, clave) VALUES('$nombre', '$apellido', '$edad', '$correo', '$clave')");
        if ($sql == 1) {
            header("Location: login.php");
        } else {
            $alerta = '<div class="alerta"> Error al registrar</div>';
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

        /* Restablece la visualización por defecto para los otros elementos */
        .edad, .correo, .clave, .cuenta {
            display: block;
            margin-right: 0; 
        }

/*------------------------------------------------------------------ */


        /* Estilo para el input "nombre" */

        .nombre{
            margin-top:35px;
        }


        .nombre input[type="text"] {
            background-color: black;
            border: 2px solid #333;
            border-radius: 10px;
            padding: 10px; 
            font-size: 16px; 
            color: white; 
            width: 100%; 
            margin-top: 5px;
        }

        /* Estilo para la etiqueta "Apellido" */

/*------------------------------------------------------------------ */
        
        /* Estilo para el input "apellido" */
        .apellido, .nombre, .edad, .correo,.clave{
            font-family:'Inter',sans-serif;
            font-size:24px;
            color:white;
        }

        .apellido input[type="text"] {
            background-color: black;
            border: 2px solid #333;
            border-radius: 10px;
            padding: 10px; 
            font-size: 16px; 
            color: white; 
            width: 100%; 
            margin-top: 5px;
        }

/*------------------------------------------------------------------ */

        /* Estilo para el input "edad" */

        .edad input[type="text"] {
            background-color: black;
            border: 2px solid #333;
            border-radius: 10px;
            padding: 10px; 
            font-size: 16px; 
            color: white; 
            margin-top: 5px;
            padding-right:35px;
            color:white;
        }

        .edad, .correo, .clave{
            margin-top:30px;
        }

/*------------------------------------------------------------------ */

        /* Estilo para el input "correo" */

        .correo input[type="text"] {
            background-color: black;
            border: 2px solid #333;
            border-radius: 10px;
            padding: 10px; 
            font-size: 16px; 
            
            margin-top: 5px;
            padding-right:306px;
            color:white;
        }


/*------------------------------------------------------------------ */

        /* Estilo para el input "clave" */

        .clave input[type="password"] {
            background-color: black;
            border: 2px solid #333;
            border-radius: 10px;
            padding: 10px; 
            font-size: 16px; 
            color: white; 
            margin-top: 5px;
            padding-right:35px;
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
                <li><a href="index.html" class="airwatch">AIRWATCH</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <form action="" method="post" class="formulario">
            <h2 class="titulo">Crear nueva cuenta</h2>
            <h3><?php echo $alerta; // Mostrar el mensaje de alerta debajo del título ?></h3>
            <a href="login.php" class="login">Ya eres miembro? Inicia Sesion</a>
            <?php?>
            <div class="padre">
                <div class="nombre">
                    <label for="nombre">Nombre</label><br>
                    <input type="text" name= "nombre">
                </div>
                <div class="apellido">
                    <label for="apellido">Apellido</label><br>
                    <input type="text" name= "apellido">
                </div>
                <div class="edad">
                    <label for="edad">Edad</label><br>
                    <input type="text" name= "edad">
                </div>
                <div class="correo">
                    <label for="correo">Correo</label><br>
                    <input type="text" name= "correo">
                </div>
                <div class="clave">
                    <label for="clave">Clave</label><br>
                    <input type="password" name= "clave">
                </div>
                <div class="cuenta">
                    <input class="boton" type="submit" value="Registrar Usuario" name="registro"><br>
                </div>
            </div>
        </form>
    </div>

</body>
</html>