<?php
// Conexión a la base de datos
$host = "localhost";
$user = "root"; // Cambia esto según tu configuración
$pass = ""; // Cambia esto según tu configuración
$db = "preceptoria";
$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtener viajes desde la base de datos
$sql = "SELECT * FROM Viajes";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="ooo.jpeg">
    <title>Ver Viajes</title>
    <style>
        body {
            background-color: white;
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #ff7043;
            color: white;
        }

        /* Estilo de la barra de navegación */
        .navbar {
            background-color: #f18132; /* Color rojo */
            overflow: hidden;
            padding: 10px;
            border-radius: 8px;
        }

        /* Contenedor de los botones */
        .navbar a {
            display: inline-block;
            color: #ffffff;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 17px;
            margin: 5px; /* Espaciado entre los botones */
            border-radius: 4px;
        }

        /* Cambiar el color al pasar el ratón por encima */
        .navbar a:hover {
            background-color:  #ff6800 ;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación centrada -->
    <div class="navbar">
        <a href="autoriDire.php">Ver viajes</a>
        <a href="carPrec.php">Preceptores</a>
        <a href="listaprecep.php">Lista de Preceptores</a>
        <a href="EstuViaj.php">Estudiantes por Viaje </a>
        <a href="listalum2.php">Alumnos</a>
        <a href="inicio.php">inicio</a>
       
    </div>

    <h1>Lista de Viajes</h1>
    <table>
        <tr>
            <th>Numero de viaje</th>
            <th>Destino</th>
            <th>Fecha de Salida</th>
            <th>Fecha de Regreso</th>
            <th>Descripción</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id_viaje']}</td>
                        <td>{$row['destino']}</td>
                        <td>{$row['fecha_salida']}</td>
                        <td>{$row['fecha_regreso']}</td>
                        <td>{$row['descripcion']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay viajes disponibles.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
<?php
$conn->close();
?>
