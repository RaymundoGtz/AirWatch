<?php
    $correo = "airwatch@hotmail.com"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="nuevo-sensor.css">
    <title>Solicitar Sensor</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&family=Pacifico&display=swap" rel="stylesheet">
</head>

<body>
<header>
        <nav>
            <ul>
                <li><a href="sensores.html" class="letras-nav">Monitoreo</a></li>
                <li><a href="admin-alarmas.php" class="current">Alarmas</a></li>
                <li><a href="admin-page.php" class="letras-nav">Perfil</a></li>
                <li><a href="admin-page.php" class="airwatch">AIRWATCH</a></li>
                <li><a href="admin-page,php"><img src="img/usuarios.png" alt="Imagen de usuario" class="user-image"></a></li>
            </ul>
        </nav>
    </header>

    <div class="page-content">
        <div class="left-column">
            <h1>Solicitar Activacion de Nuevo Sensor</h1>
            <form action="https://formsubmit.co/raymundo.gutierrez@iest.edu.mx" method="POST" />

                <label for="email">Correo</label><br>
                <input name="email" type="text" name="email"><br>

                <label for="subject" type="text" class="input" name="subject">Asunto</label><br>
                <input name="subject" class="text" type="text" name="subject"><br>

                <input class="btn" type="submit" value="Enviar">


            </form>
        </div>
    </div>
</body>
</html>
