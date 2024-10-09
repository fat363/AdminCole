<?php
   include "cob.php";
// Insertar datos en la base de datos cuando se envíe el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destino = $_POST['destino'];
    $fecha_salida = $_POST['fecha_salida'];
    $fecha_regreso = $_POST['fecha_regreso'];
    $descripcion = $_POST['descripcion'];

    // Verificar si los campos están completos
    if (!empty($destino) && !empty($fecha_salida) && !empty($fecha_regreso) && !empty($descripcion)) {
        // Consulta para insertar datos en la tabla Viajes
        $sql = "INSERT INTO Viajes (destino, fecha_salida, fecha_regreso, descripcion) 
                VALUES ('$destino', '$fecha_salida', '$fecha_regreso', '$descripcion')";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='color:green; text-align:center;'>Viaje registrado con éxito.</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "<p style='color:red; text-align:center;'>Por favor, completa todos los campos.</p>";
    }
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="ooo.jpeg">
    <title>Formulario de Viaje</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f3e5;
            color: #333;
        }

        .form-container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff2e0;
            border: 1px solid #e67e22;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #d35400;
        }

        label {
            font-weight: bold;
            color: #e67e22;
        }

        input[type="text"], input[type="date"], textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #e67e22;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #e67e22;
            color: white;
            padding: 12px 20px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #d35400;
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
        <a href="mateadeuP.php">Materias adeudadas</a>
        <a href="listalum.php">Alumnos</a>
        <a href="forviaje.php">Viaje</a>
        <a href="viajestu.php">Viajes Estudiantes</a>
        <a href="viajProf.php">Documentacion Viaje</a>
        <a href="inicio.php">inicio</a>
       
    </div>

    <div class="form-container">
        <h2>Registro de Viaje</h2>
        <form method="post" action="">
            <label for="destino">Destino:</label>
            <input type="text" id="destino" name="destino" required>

            <label for="fecha_salida">Fecha de Salida:</label>
            <input type="date" id="fecha_salida" name="fecha_salida" required>

            <label for="fecha_regreso">Fecha de Regreso:</label>
            <input type="date" id="fecha_regreso" name="fecha_regreso" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="4" required></textarea>

            <input type="submit" value="Registrar Viaje">
        </form>
    </div>

</body>
</html>
