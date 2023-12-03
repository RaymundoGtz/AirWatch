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
            padding-left: 280px;
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
            font-size: 20px;
            font-family: 'Inter', sans-serif;
            transition: color 0.3s; /* Agregar una transición para el cambio de color */
        }

        /* Estilo de los enlaces de navegación al pasar el cursor */
        nav a:hover {
            color: grey;
        }

        .letras-nav {
            vertical-align: middle;
            font-size: 25px;
        }

        .current {
            border-bottom: 1px solid white;
            text-decoration: none;
            padding-bottom: 0px;
            font-size: 25px;
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
            margin-left: 360px;
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
            margin-left: 315px;
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

        .boton4{
            background-color:black;
            border: 2px solid white;
            justify-content:center;
            text-align:center;
            margin-left:385px;
            border-radius:10px;
            padding-top:50px;
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
                <li><a href="test_data.php" class="current">Monitoreo</a></li>
                <li><a href="admin-alarmas.php" class="letras-nav">Alarmas</a></li>
                <li><a href="admin-page.php" class="letras-nav">Perfil</a></li>
                <li><a href="admin-page.php" class="airwatch">AIRWATCH</a></li>
                <li><a href="admin-page.php"><img src="img/usuarios.png" alt="Imagen de usuario" class="user-image"></a></li>
            </ul>
        </nav>
    </header>
    <div class="page-content">
        <h1>Sensores Activos</h1>
        <a href="admin-test-data.php"><button class="boton"><h4>Sensores</h4></button></a>
        <a href="admin-agregar-sensor.php"><button class="boton2"><h4>Conectar Sensor</h4></button></a><br>
        <a href=""><button class="boton3"><h4>No aparece tu sensor? Ayuda</h4></button></a>
    </div>
</body>
</html>
