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


        header h1 {
            padding-left:100px;
            font-size: 24px;
            margin: 0;
            font-size: 30px;
            font-family: 'Inter', sans-serif;
        }

        /* Estilo de la navegación para que esté a la derecha */
        nav {
            display: flex;
            align-items: center;
        }

        nav ul {
            margin-left:100px;
            list-style: none;
            display: flex; /* Utilizar flexbox para alinear los elementos de navegación a la derecha */
        }

        nav li {
            margin-left: 20px; /* Cambiar el margen izquierdo para separar los elementos de navegación */
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
        /* Tu estilo para h1, body, etc. permanece igual */

        body{
            background-color:black;
        }

        .page-content {
            display: flex;
            justify-content: space-between;
        }

        .left-column {
            flex: 1;
            padding: 10px;
        }

        .right-column {
            flex: 1;
            overflow-y: auto; /* Agrega una barra de desplazamiento vertical solo a la tabla */
            padding: 50px;

        }

        table {
            width: 100%; /* Hace que la tabla ocupe el 100% del contenedor */
            border-collapse: collapse; /* Borra los espacios entre celdas */
        }

        table, th, td {
            border: 1px solid black; /* Agrega bordes a las celdas */
            font-family:'Inter',sans-serif;
            color:white;
        }

        th, td {
            padding: 10px;
            text-align: center;
            font-family:'Inter',sans-serif;
            color:white;
        }

        th {
            background-color: black;
            color: white; /* Cambia el color de fondo del encabezado */
        }

        tr:nth-child(even) {
            background-color: black; /* Cambia el color de fondo de las filas pares */
            color:grey;
        }

        tr:nth-child(odd) {
            background-color: #0a0a0a; /* Cambia el color de fondo de las filas impares */
            color:grey;
        }

        .current {
            border-bottom: 1px solid white; /* Ancho y color de la línea */
            text-decoration: none; /* Eliminar el subrayado predeterminado del enlace */
            padding-bottom: 0px; /* Espacio entre el texto y la línea */
            font-size: 25px
        }

        h4{
            color: #fff;
            font-size:40px;
            font-family: 'Inter', sans-serif;
            text-align: center;
            padding-top: 150px;
        }

        h5{
            color: #fff;
            font-size:20px;
            font-family: 'Inter', sans-serif;
            text-align: center;
            padding-top: 5px;
        }

        h6{
            color: #fff;
            font-family: 'Inter', sans-serif;
            text-align: center;
            padding-top: 50px;
        }

        /*Circulo al lado del texto*/
        .connected::before {
        content: "";
        display: inline-block;
        width: 15px;
        height: 15px;
        border-radius: 70%;
        background-color: green;
        margin-right: 5px; /* Espacio entre el círculo y el texto */
        }

        .user-image {
            width: 40px; /* Ancho de la imagen */
            height: 40px; /* Alto de la imagen */
            margin-left:700px;        }

        .letras-nav{
            vertical-align: middle;
            font-size:25px
        }

        .airwatch{
            font-size:25px;
            margin-left: 630px;
            font-weight: bold;
            
        }

        .right-column h1{
            color:white;
            font-family: 'Inter',sans-serif;
            text-align:center;
            font-size:35px;
            font-weight:bold;
            margin-bottom:70px;
        }

        
        button {
            border-radius: 15px;
            border: 2px solid grey;;
            color:white;
            margin-top: 280px;
            margin-right:150px;
            margin-left:150px;
            margin-bottom: 50px;
            padding: 20px 50px;
            cursor: pointer;
            position: relative; /* Necesario para agregar un pseudo-elemento */
            overflow: hidden; /* Ocultar el pseudo-elemento */
            background-color:black;
        }

        button:hover{
            border:2px solid white;
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
                
                <li><a href="ceo-page.php" class="letras-nav">Perfil</a></li>
                <li><a href="ceo-page.php" class="airwatch">AIRWATCH</a></li>
                <li><a href="ceo-page.php"><img src="img/usuarios.png" alt="Imagen de usuario" class="user-image"> </a>
            </ul>
        </nav>
    </header>



    <div class="page-content">
        <div class="right-column">
            <h1>REPORTES</h1>
            <div style="max-height: 800px; overflow-y: auto;">
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <th>Observaciones</th>
                        <th>Fecha</th>
                    </tr>
                    <?php
                    
                    $hostname = "localhost"; 
                    $username = "root"; 
                    $password = ""; 
                    $database = "mq7_data"; 
    
                    $conn = mysqli_connect($hostname, $username, $password, $database);
    
                    if (!$conn) { 
                        die("Connection failed: " . mysqli_connect_error()); 
                    } 
    
                    $sql = "SELECT * FROM reporte";
                    $result = $conn->query($sql);
    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";  
                            echo "<td>".$row["id"]."</td>";  
                            echo "<td>".$row["observaciones"]."</td>";  
                            echo "<td>".$row["fecha"]."</td>";  
                            echo "</tr>";  
                        }
                    } else {
                        echo "0 results";
                    }
    
                    
                    $conn->close();
                    ?>
                </table><br>
            </div>
        </div>
        <div>

    </div>

</body>
</html>

