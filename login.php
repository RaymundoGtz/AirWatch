<?php
// Incluir la conexión a la base de datos
include("modelo/conexion_bd.php");

if (!empty($_POST["btn-ingresar"])) {
    if (empty($_POST["usuario"]) || empty($_POST["password"])) {
        echo "UNO DE LOS CAMPOS ESTÁ VACÍO";
    } else {
        $usuario = $_POST["usuario"];
        $clave = $_POST["password"];

        $sql = $conn->query("select * from usuarios where nombre='$usuario' and clave='$clave'");

        if ($datos = $sql->fetch_object()) {
            // Iniciar sesión y configurar las variables de sesión
            session_start(); // Inicia la sesión
            $_SESSION["nombre"] = $datos->nombre;
            $_SESSION["correo"] = $datos->correo;

            // Obtener el valor del campo "tipo_usuario" de la base de datos
            $tipo_usuario = $datos->tipo_usuario;

            // Redirigir al usuario a la página de admin o user según el valor de "tipo_usuario"
            if ($tipo_usuario == 1) {
                header("Location: admin-page.php");
            } else if($tipo_usuario == 2) {
                header("Location: ceo-page.php");
            } else{
                header("Location: user-page.php");
            }
            exit;
        } else {
            $error = "<h5>El usuario no existe</h5>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="css/login.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&family=Pacifico&display=swap" rel="stylesheet">
</head>
<style>
    .tittle{
        color:white;
        font-family:'Inter',sans-serif;
        font-size: 34px;
        justify-content:center;
        text-align:center;
        margin-top:55px;

    }

    /* Estilo de texto de Inicio de Sesion */

    .miembro-existente {
            background-color: black;
            font-family:'Inter',sans-serif;
            color: white;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            padding: 10px 20px;
            text-align: center;
            margin-top: 0px;
            margin-left: 840px;
            text-decoration: none;
            font-weight:bold;
            margin-bottom:70px;

        }

        .miembro-existente h4 {
            margin: 0;
            font-weight:bold;
        }

        .miembro-existente:hover h4 {
            color: grey;
        }

    /* ESTILO DE PRIMER FORMULARIO DE USUARIO --------------------- */


    .input-div-one .div input[type="text"] {
        font-family:'Inter',sans-serif;
        font-size:25px;
        padding-top:15px;
        padding-bottom:15px;
        padding-left:25px;
        padding-right:22px;
        margin-left: 762px;
        text-align:center;

        background-color: black;
        border: 2px solid #333;
        border-radius: 10px;
        color: white;
        margin-top:20px; 
        margin-bottom:50px;
    }



    /* ESTILO DE SEGUNDO FORMULARIO DE CONTRASENYA -----------------*/

    .div h6{
            font-family:'Inter',sans-serif;
            font-size:24px;
            color:white;
        }

    .input-div-pass .div input[type="password"] {
        font-family:'Inter',sans-serif;
        font-size:25px;
        padding-top:15px;
        padding-bottom:15px;
        padding-left:25px;
        padding-right:22px;
        margin-left: 762px;
        text-align:center;

        background-color: black;
        border: 2px solid #333;
        border-radius: 10px;
        color: white;
        margin-top:20px; 
        margin-bottom:50px;
    }

    .olvidar {
            background-color: black;
            font-family:'Inter',sans-serif;
            color: white;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            text-align: center;
            margin-top: 0px;
            margin-left: 840px;
            text-decoration: none;

        }

        .olvidar h4 {
            margin: 0;
        }

        .olvidar:hover h4 {
            color: grey;
        }

        .btn {
            border-radius: 15px;
            border: 2px solid grey;;
            color:white;
            margin-top: 70px;
            margin-left: 841px;
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

        .div label{
            color:white;
            font-family:'Inter',sans-serif;
            font-size:24px;
            margin-left:800px;
            margin-top:50px;
        }

        h5{
            font-family:'Inter',sans-serif;
            color:white;
            text-align:center;
            
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
        
        <div class="login-content">
            <form method="post" action="login.php"> <!-- Establece el atributo action con el nombre del archivo actual -->
                
                <h2 class="tittle">Iniciar Sesion</h2>
                
                <div class="input-div-one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <button type="button" class="miembro-existente" onclick="window.location.href='registro.php'">
                        <h4>No eres miembro? Registrate!</h4>
                    </button>

                    <div class="div">
                        <label for="nombre">Nombre</label><br>
                        <input id="usuario" type="text" class="input" name="usuario">
                    </div>
                </div>
                <div class="input-div-pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <label for="password">Contrasena</label><br>
                        <input type="password" id="input" class="input" name="password"><br>
                        <?php echo $error?>
                    </div>
                </div>
                <div class="view">
                    <div class="fas fa-eye verPassword" onclick="vista()" id="verPassword"></div>
                </div>
                <input name="btn-ingresar" class="btn" type="submit" value="INICIAR SESIÓN">
                <div class="text-center">
                    <a class="olvidar" href="#"><h4>No recuerdo mi contrasena</h4></a>
                </div>
                
            </form>
        </div>
    </div>
</body>
</html>
