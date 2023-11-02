<!DOCTYPE html>  
<html>
    <style>
		h1{
			font-family: sans-serif;
			font-size:50px
		}
		body{
			background-color:#131313;
		}
		td{
			
		}

		table{
			
			margin-right: 100px
		}

        td {
            font-size: 45px;
			color: white
        }

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
            font-size: 30px
        }

        /* Estilo de la navegación para que esté a la derecha */
        nav {
            display: flex;
            align-items: center;
        }

        nav ul {
            margin-left:800px;
            list-style: none;
            padding: 0;
            display: flex; /* Utilizar flexbox para alinear los elementos de navegación a la derecha */
        }

        nav li {
            margin-left: 20px; /* Cambiar el margen izquierdo para separar los elementos de navegación */
        }

        /* Estilo de los enlaces de navegación */
        nav a {
            text-decoration: none;
            color: #fff;
            font-size:20px
        }

        /* Estilo de los enlaces de navegación al pasar el cursor */
        nav a:hover {
            color: grey;
        }

        body h2{
            color:white;
            font-size:40px;
            text-align: center;
            font-family:sans-serif;
        }

        body h3{
            color:white;
            font-size:35px;
            font-weight:1;
            font-family:sans-serif;
            text-align:center;
        }

        .page-content{
            position:relative;
            z-index: 2;

            display: grid; /*Se usa grid para poder dividir en columnas*/
            grid-template-columns: 1fr 1fr; /*Divide la seccion en dos columnas*/
            gap: 10px; /*Espacio entre columnas*/
        }

        p{
            text-align:left;
            padding-left: 45px;
        }

        h4{
            text-align:center;
            color: white;
        }


    </style>  
		<header>
		<nav>
            <a href="index.html">
                <h1>AIRWATCH</h1>
                </a>
            <ul>
                <li><a href="sensores.html">Monitoreo</a></li>
				<li><a href="alarmas.html">Alarmas</a></li>
                <li><a href="nosotros.html">Perfil</a></li>
            </ul>
		</nav>
	</header>
    
    <body>
        <h2>Monitoreo de CO2</h2>
        <div class="page-content">
            <div class="left-colum">
                <h3>Información del Sensor<h3>
                <p>
                    Nombre: MQ7<br><br>
                    Estado: Conectado<br><br>
                    ID: 6HUFRN43<br><br>
                    Media de PPM hoy:
                </p>
                <br>
                <h4>
                Si alguna informacion no es correcta, favor de contaactarse con el administrador. 
                AIRWATCH no se hace responsable por fallas en el hardware. o algun tipo de malfuncionamiento. 
                </h4>

            </div>
            <div class="right-column">
                <table align="right" border="15" cellpadding="5" cellspacing="3">  
                    <tr>  
                        <td> ID </td>  
                        <td> PPM </td>  
                        <td> Fecha </td>  
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

                    $sql = "SELECT * FROM mq7";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";  
                            echo "<td>".$row["id"]."</td>";  
                            echo "<td>".$row["ppm"]."</td>";  
                            echo "<td>".$row["datetime"]."</td>";  
                            echo "</tr>";  
                        }
                    } else {
                        echo "0 results";
                    }

                    if (isset($_POST["ppm"])) {
                        echo "DATA SAVED";
                        $p = $_POST["ppm"];

                        $sql = "INSERT INTO mq7 (ppm) VALUES (" . $p . ")";

                        if (mysqli_query($conn, $sql)) {
                            echo "\nNew record created successfully";

                            // Obtén el ID del último registro insertado
                            $last_id = mysqli_insert_id($conn);

                            // Consulta para obtener el valor PPM del último registro
                            $sql = "SELECT ppm FROM mq7 WHERE id = $last_id";
                            $result = $conn->query($sql);

                            if ($result->num_rows == 1) {
                                $row = $result->fetch_assoc();
                                $last_ppm = $row["ppm"];
                                echo "<script>document.getElementById('ppm-value').textContent = 'PPM: " . $last_ppm . "';</script>";
                            }
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                    }
                    $conn->close();
                    ?>
            </table> 

            </div>
        </div>
    </body>  
</html>
