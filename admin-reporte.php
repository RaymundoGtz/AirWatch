<?php
    include('modelo/conexion_bd.php');
    $error = "";
    $success = "";

    // Recibir datos del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['report'])) {
            $error = "<h6> Escribe tu reporte.<h6>";
        } else {

            $reporte_nuevo = $_POST['report'];

            // Consulta SQL para actualizar la tabla
            $sql = "INSERT INTO `reporte`(observaciones) VALUES ('$reporte_nuevo')";

            if ($conn->query($sql) === TRUE) {
                $success = "<h6>Reporte registrado correctamente</h6>";
            } else {
                $error = "Error al realizar el reportet: " . $conn->error;
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

        /* ESTILOS DEL HEADER */

         /* Estilo del header */
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

        .user-image {
            width: 40px;
            height: 40px;
            margin-left: 700px;
        }

        .letras-nav {
            vertical-align: middle;
            font-size: 25px;
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

        /* ESTILOS RESTO DE LA PANTALLA */
        body {
            background-color: black;
        }

        .page-content {
            background: rgba(0, 0, 0);
            padding: 20px;
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .left-column {
            font-weight: 100;
            text-align: center;
            width: 50%; /* Ajusta el ancho del formulario */
        }

        .left-column input[type="text"] {
            font-family: 'Inter', sans-serif;
            font-size: 25px;
            padding: 15px;
            width: 80%; /* Ajustar el ancho del campo de texto */
            height: 100px; /* Ajustar la altura del campo de texto */
            background-color: black;
            border: 2px solid #333;
            border-radius: 10px;
            color: white;
            margin-top: 20px;
            margin-bottom: 20px;
            word-wrap: break-word; /* Permite que el texto salte a la siguiente línea */
        }

        .btn {
            border-radius: 15px;
            border: 2px solid grey;
            color: white;
            margin-top: 20px;
            margin-bottom: 50px;
            padding: 20px 50px;
            cursor: pointer;
            background-color: black;
        }

        .btn::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 100%;
            bottom: 0;
            background-color: black;
            transition: right 0.3s, background-color 0.3s;
        }

        .btn:hover::before {
            right: 0;
            background-color: black;
        }

        .btn:hover {
            color: white;
            border-color: white;
            background-color: black;
        }

        h1{
            font-family:'Inter',sans-serif;
            color:white;
        }

        label{
            color:white;
            font-family:'Inter',sans-serif;
        }

        h6{
            color:white;
            font-family:'Inter',sans-serif;
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
                
                <li><a href="sensores.html" class="current">Monitoreo</a></li>
                <li><a href="alarmas-activas.html" class="letras-nav">Alarmas</a></li>
                <li><a href="user-page.html" class="letras-nav">Perfil</a></li>
                <li><a href="admin-page.php" class="airwatch">AIRWATCH</a></li>
                <li><a href="admin-page.php"><img src="img/usuarios.png" alt="Imagen de usuario" class="user-image"> </a>
            </ul>
        </nav>
</header>

    <div class="page-content">
        <div class="left-column">
            <h1>Crear Reporte</h1>
            <form method="post" action="admin-reporte.php">
                <label for="report">Texto del reporte</label><br>
                <input id="report" type="text" class="input" name="report"> <br>
                <?php echo $success?>
                <input name="btn-ingresar" class="btn" type="submit" value="Guardar Reporte">
            </form>
        </div>
    </div>
</body>
</html>
