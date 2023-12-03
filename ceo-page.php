<?php
    session_start(); // Asegúrate de iniciar la sesión en perfil.php también

    if (isset($_SESSION["nombre"]) && isset($_SESSION["correo"])) {
        $nombre = $_SESSION["nombre"];
        $correo = $_SESSION["correo"];
        
    } else {
        // Si las variables de sesión no están configuradas, puedes mostrar un mensaje de error o redirigir al usuario.
        echo "No se ha encontrado información de usuario.";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        /* Estilo del header */

        .airwatch{
            font-size: 25px;
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

        /* Estilo para h1, body, etc. permanece igual */
        body {
            background-color: black;
        }

        .airwatch {
            font-size: 25px;
            margin-left: 630px;
            font-weight: bold;
        }

        .current {
            border-bottom: 1px solid white;
            text-decoration: none;
            padding-bottom: 0px;
            font-size: 25px;
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

        /* SECCION DE ESTILOS DE LAS DOS COLUMNAS */
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
            margin-left: 150px;
        }

        .right-column {
            /* Estilos para la columna de la imagen */
            text-align: center; /* Centra la imagen */
        }

        .container1 h1 .perfil {
            color: red;
        }

        .container1 {
            background-color: black;
            color: rgb(255, 255, 255);
            height: 800px;
            width: 500px;
            margin-left: 9rem;
            align-items: center;
            border-radius: 20px;
            padding-top: 45px;
        border: 2px solid white; /* Agregar un borde blanco de 2px */
         }


        .container2 {
            float: left;
            height: 40%;
            width: 40%; /* 50% del ancho para que estén uno al lado del otro */
            background-color: #000000;
            border-radius: 20px;
            margin-top: 40px;
            margin-left: 95px;
            transition: background-color 0.3s; /* Transición para cambiar el color al hacer hover */
            cursor: pointer; /* Cambia el cursor al hacer hover para indicar que es clickeable */
        }

        .container2:hover {
            background-color: #070707; /* Cambia el color al hacer hover */
        }

        .container2 img {
            padding-top: 65px;
        }

        .container3 {
            float: left;
            height: 40%;
            width: 40%; /* 50% del ancho para que estén uno al lado del otro */
            background-color: #000000;
            border-radius: 20px;
            margin-top: 40px;
            margin-left: 20px;
            transition: background-color 0.3s; /* Transición para cambiar el color al hacer hover */
            cursor: pointer; /* Cambia el cursor al hacer hover para indicar que es clickeable */
        }

        .container3:hover {
            background-color: #070707; /* Cambia el color al hacer hover */
        }

        .container1 h2 {
            margin: 0;
            padding-top: 45px;
            font-size: 1.5rem;
            text-align: center;
            position: relative;
            background-color: #000000;
            font-family: 'Inter', sans-serif;
            font-weight: thin;
            
        }

        .container1 h3 {
            margin: 0;
            padding-top: 195px;
            font-size: 15px;
            text-align: center;
            position: relative;
            background-color: #000000;
            font-family: 'Inter', sans-serif;
        }

        .container1 h4 {
            margin: 0;
            padding-top: 15px;
            font-size: 15px;
            text-align: center;
            position: relative;
            background-color: #000000;
            font-family: 'Inter', sans-serif;
        }

        h5 {
            margin: 0;
            padding-top: 35px;
            font-size: 15px;
            text-align: center;
            font-family: 'Inter', sans-serif;
            color: white;
        }

        .left-column h6 {
            font-family: 'Inter', sans-serif;
            padding-left: 315px;
            font-size: 35px;
            color: white;
        }

        .container1 img {
            background-color: #000000;
            align-items: center;
            margin-top: 65px;
            margin-left: 150px;
        }

        .container2 h6 {
            font-family: 'Inter', sans-serif;
            font-size: 25px;
            color: white;
            font-weight: bold;
            margin-top: 35px;
            text-align: center;
        }

        .container3 h6 {
            font-family: 'Inter', sans-serif;
            font-size: 25px;
            color: white;
            font-weight: bold;
            margin-top: 47px;
            text-align: center;
        }

        .container3 img{
            margin-top:60px;
        }

        .boton2 {
            background-color: black;
            color: white;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            padding: 10px 20px;
            text-align: center;
            margin-top: 125px;
            text-decoration: none;
            font-size: 15px;
        }

        .boton2:hover h4{
            color: gray;
        }

        .boton3{
            background-color: black;
            color: white;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font-size:15px;
        }

        .boton3:hover h4{
            color: gray;
        }

        .boton4:hover h4{
            color: gray;
        }

        .boton5:hover h4{
            color: gray;
        }

        .boton4{
            background-color: black;
            color: white;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font-size:15px;
            margin-left: 175px;
            margin-top: 150px;
        }

        .boton5{
            background-color: black;
            color: white;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font-size:15px;
            margin-left: 167px;
        }

        /**/
    </style>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <ul>

                <li><a href="ceo-page.html" class="current">Perfil</a></li>
                <li><a href="index.html" class="airwatch">AIRWATCH</a></li>
                <li><a href="user-page.php"><img src="img/usuarios.png" alt="Imagen de usuario" class="user-image"></a></li>
            </ul>
        </nav>
    </header>

    <div class="page-content">
        <div class="left-column">
            <div class="container1">          
                <img src="img/usuarios.png" alt="">
                <h2>Bienvenido <?php echo $nombre?><BR><BR><?php echo $correo?></h2>
                    <a href="#"><button class="boton4"><h4>Preguntas Frecuentes</h4></button></a><br>
                    <a href="index.html"><button class="boton5"><h4>Terminos y Condiciones</h4></button></a>
            </div>
        </div>
        <div class="right-column">
            <h1>TU PERFIL</h1>
            <a href="ceo-usuarios.php">
                <div class="container2">      
                    <img src="img/usuarios.png" alt="">
                    <h6>USUARIOS</h6> 
                </div>
            </a>
            <a href="ceo-reportes.php">
                <div class="container3">          
                    <img src="img/monitoreo.png" alt="">
                    <h6>REPORTE</h6>                  
                </div>
                <a href="#"><button class="boton2"><h4>Ayuda</h4></button></a><br>
                <a href="index.html"><button class="boton3"><h4>Cerrar Sesion</h4></button></a>
            </a>
        </div>
    </div>
</body>
</html>


