<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="ooo.jpeg">
    <title>Registro de Estudiantes</title>
    <style>
        body {
            background-color: #ffffff; /* Fondo blanco */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 30px auto;
            padding: 20px;
            background-color: #ff7a00; /* Fondo naranja */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #ffffff; /* Texto blanco */
            margin-bottom: 20px;
        }
        label {
            color: #ffffff;
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input[type="text"], input[type="email"], input[type="date"], input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 5px 0 15px 0;
            border: none;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        input[type="submit"] {
            width: 100%;
            background-color: #ff5722; /* Naranja más oscuro */
            color: #ffffff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #e64a19; /* Naranja aún más oscuro */
        }

        /* Estilo de la barra de navegación */
        .navbar {
            background-color: #ff7a00; /* Naranja */
            padding: 10px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 20px;
        }

        .navbar a {
            color: #ffffff;
            text-decoration: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 4px;
            margin: 0 5px;
        }

        .navbar a:hover {
            background-color: #e64a19; /* Naranja oscuro */
        }
    </style>
</head>
<body>

    <!-- Barra de navegación centrada -->
   <div class="navbar">
        <a href="carmateP.php">Materias</a>
        <a href="listEstu.php">Estudiantes</a>
        <a href="nuevEstu.php">Nuevos Alumnos</a>
        <a href="tutores.php">Tutores</a>
        <a href="carProf.php">Cargar Profesores</a>
        <a href="listatutor.php">Lista de Tutores</a>
        <a href="listaprof.php">Lista de Profesores</a>
        <a href="inicio.php">Inicio</a>
       
    </div>

    <div class="container">
        <h2>Registro de Nuevos Estudiantes</h2>
        <form method="POST" action="nuevEstu.php">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>

            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>

            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required>

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="padre">Padre/Madre/Tutor:</label>
            <input type="text" id="padre" name="padre" required>

            <label for="dni">DNI:</label>
            <input type="numeric" id="dni" name="dni" required>

            <label for="curso">Curso:</label>
            <input type="numeric" id="curso" name="curso" required>

            <label for="turno">Turno:</label>
            <input type="text" id="turno" name="turno" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Registrar Estudiante">
        </form>
    </div>

</body>
</html>


<?php
   include "cob.php";

// Insertar datos en la tabla Estudiantes
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escapar los datos para prevenir inyección SQL
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $apellido = $conn->real_escape_string($_POST['apellido']);
    $fecha_nacimiento = $conn->real_escape_string($_POST['fecha_nacimiento']);
    $direccion = $conn->real_escape_string($_POST['direccion']);
    $telefono = $conn->real_escape_string($_POST['telefono']);
    $email = $conn->real_escape_string($_POST['email']);
    $padre = $conn->real_escape_string($_POST['padre']);
    $dni = $conn->real_escape_string($_POST['dni']);
    $curso = $conn->real_escape_string($_POST['curso']);
    $turno = $conn->real_escape_string($_POST['turno']);
    $password = $_POST['password']; // Encriptar la contraseña

    // Cambiar 'contraseña' a 'password' o el nombre correcto de la columna en la base de datos
    $sql = "INSERT INTO Estudiantes (nombre, apellido, fecha_nacimiento, direccion, telefono, email, padre, dni, curso, turno, password,año)
            VALUES ('$nombre', '$apellido', '$fecha_nacimiento', '$direccion', '$telefono', '$email', '$padre', '$dni', '$curso', '$turno', '$password', '2024')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo estudiante registrado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>

