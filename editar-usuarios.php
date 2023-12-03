<?php
    include('modelo/conexion_bd.php');
    $error = "";
    $success = "";

    // Recibir datos del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['correo']) || empty($_POST['tipo_usuario'])) {
            $error = "<h6>Por favor, rellena ambos campos.<h6>";
        } else {
            $correo = $_POST['correo'];
            $nuevo_tipo_usuario = $_POST['tipo_usuario'];

            // Consulta SQL para actualizar la tabla
            $sql = "UPDATE usuarios SET tipo_usuario = '$nuevo_tipo_usuario' WHERE correo = '$correo'";

            if ($conn->query($sql) === TRUE) {
                $success = "<h6>Registro actualizado correctamente</h6>";
            } else {
                $error = "Error al actualizar el registro: " . $conn->error;
            }
        }
    }
    // Cerrar la conexión a la base de datos
    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        /* Estilo del header */
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
            padding-top: 20px;
            margin-bottom:50px;
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
            font-size: 20px;
            font-family: 'Inter', sans-serif;
            transition: color 0.3s; /* Agregar una transición para el cambio de color */
        }

        /* Estilo de los enlaces de navegación al pasar el cursor */
        nav a:hover {
            color: grey;
        }

        /* Estilo para h1, body, etc. permanece igual */
        body {
            background-color: black;
        }

        .airwatch {
            font-size: 25px;
            margin-left: 380px;
            font-weight: bold;
        }

        .current {
            border-bottom: 1px solid white;
            text-decoration: none;
            padding-bottom: 0px;
            font-size: 25px;
        }

        h4 {
            color: #fff;
            font-size: 15px;
            font-family: 'Inter', sans-serif;
            text-align: center;
        }

        .user-image {
            width: 40px;
            height: 40px;
            margin-left: 700px;
        }

        .letras-nav {
            vertical-align: middle;
            font-size: 25px;
        }

        .boton {
            background-color: grey;
            color: white;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            margin-left: 275px;
            margin-top: 35px;
            padding: 0px 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
        }

        .boton2 {
            background-color: black;
            color: white;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            padding: 10px 20px;
            text-align: center;
            margin-top: 25px;
            text-decoration: none;
        }

        .boton2 h4 {
            margin: 0;
        }

        .boton2:hover h4 {
            color: grey;
        }

        .boton3 {
            background-color: black;
            color: white;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            padding: 10px 20px;
            text-align: center;
            margin-top: 25px;
            text-decoration: none;
        }

        .boton3 h4 {
            margin: 0;
        }

        .boton3:hover h4 {
            color: grey;
        }

        .boton:hover {
            background-color: black;
        }

        .page-content h5 {
            text-decoration: none;
        }

        .conectar h1 {
            font-size: 15px;
        }

        /*SECCION DE ESTILOS DE LAS DOS COLUMNAS*/

        .page-content {
            background: rgba(0, 0, 0,);
            padding: 20px;
            position: relative;
            z-index: 2;

            display: grid; /* Utilizamos CSS Grid para las columnas */
            grid-template-columns: 1fr 1fr; /* Divide la sección en dos columnas */
            gap: 20px; /* Espacio entre las columnas */
        }

        .left-column {
            font-weight: 100;
            text-align: center;
        }

        .right-column {
            /* Estilos para la columna de la imagen */
            text-align: center; /* Centra la imagen */
            display: block; /* Cambiado de display: none a display: block */
        }


        /* ESTILOS DE FORMULARIO */

        .left-column label{
            color:white;
            font-family:'Inter',sans-serif;
        }

        .left-column input[type="text"] {
        font-family:'Inter',sans-serif;
        font-size:25px;
        padding-top:15px;
        padding-bottom:15px;
        padding-left:25px;
        padding-right:22px;
        margin-left: 152px;
        text-align:center;

        background-color: black;
        border: 2px solid #333;
        border-radius: 10px;
        color: white;
        margin-top:20px;
        margin-bottom:50px;
    }

    /* ESTILOS BOTON DE GUARDADO */
        .btn {
            border-radius: 15px;
            border: 2px solid grey;;
            color:white;
            margin-top: 20px;
            margin-left: 151px;
            margin-bottom: 50px;
            padding: 20px 50px;
            cursor: pointer;
            position: relative; /* Necesario para agregar un pseudo-elemento */
            overflow: hidden; /* Ocultar el pseudo-elemento */
            background-color:black;
        }

        .btn::before {
            content: ""; /* Pseudo-elemento para el efecto de hover */
            position: absolute;
            top: 0;
            left: 0;
            right: 100%;
            bottom: 0;
            background-color: black;
            transition: right 0.3s, background-color 0.3s; /* Agregar una transición */
        }

        .btn:hover::before {
            right: 0;
            background-color: black;
        }

        .btn:hover {
            color: white;
            border-color: white;
            background-color:black;
        }

        h3{
            color:white;
            font-family:'Inter',sans-serif;
        }

        h6{
            font-family:'Inter',sans-serif;
            color:white;
            font-size:15px;
        }

        .container{
            background-color:black;
            width:40%;
            height:190px;
            border-radius:20px;
            border: 2px solid white;
            margin-top:150px;
        }

    </style>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="sensores.html" class="letras-nav">Monitoreo</a></li>
                <li><a href="alarmas-activas.html" class="current">Alarmas</a></li>
                <li><a href="user-page.html" class="letras-nav">Perfil</a></li>
                <li><a href="admin-page.php" class="airwatch">AIRWATCH</a></li>
                <li><a href="admin-page"><img src="img/usuarios.png" alt="Imagen de usuario" class="user-image"></a></li>
            </ul>
        </nav>
    </header>

    <div class="page-content">
        <div class="left-column">
            <h1>Editar Usuario</h1>
            
        <form method="post" action="editar-usuarios.php">
            <label for="correo">Correo de usuario a editar</label><br>
            <input id="correo" type="text" class="input" name="correo"> <br>

            <label for="tipo_usuario">  Nuevo tipo de usuario (0, 1, 2, 3)</label><br>
            <input id="tipo_usuario" type="text" class="input" name="tipo_usuario"> <br>
           <?php echo $success ?><br>
           <?php echo $error ?><br>
            <input name="btn-ingresar" class="btn" type="submit" value="Actualizar Perfil">
            
        </form>
        </div>
        <div class="right-column">
            <div class="container">
                <h3>Tipos de Usuario:</h3>
                <h4>1 - Administrador</h4>
                <h4>2 - CEO</h4>
                <h4>3 - Usuario</h4>
            </div>
        </div>
    </div>

</body>
</html>


