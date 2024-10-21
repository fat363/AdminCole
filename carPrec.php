<!DOCTYPE html>
<html lang="es">
    
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="ooo.jpeg">
    <title>Registro de Preceptores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 10000px;
            margin:0%;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f8f9fa;
        }
        h2 {
            text-align: center;
            color: #ff7a00;
            margin-bottom: 20px;
        }
        label {
            color: #333;
            font-weight: bold;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #fdfdfd;
        }
        input[type="submit"] {
            background-color: #ff7a00;
            color: white;
            padding: 10px 15px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background-color: #e66a00;
        }
        .alert {
            color: #e74c3c;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
        .success {
            color: #2ecc71;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
        /* Estilo de la barra de navegación */
    .navbar {
        background-color: #f18132; /* Color naranja */
        overflow: hidden;
        padding: 10px;
        border-radius: 8px;
        display: flex; /* Usar flexbox para el diseño */
        justify-content: flex-start; /* Alinear los botones a la izquierda */
        align-items: center; /* Centra verticalmente los botones */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Sombra sutil */
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
        transition: background-color 0.3s, transform 0.2s; /* Efecto de transición */
    }

    /* Cambiar el color al pasar el ratón por encima */
    .navbar a:hover {
        background-color: #ff6800; /* Color al pasar el mouse */
        transform: translateY(-2px); /* Efecto de desplazamiento */
        cursor: pointer; /* Cambiar el cursor al pasar el ratón */
    }

    /* Efecto activo para el botón seleccionado */
    .navbar a.active {
        background-color: #e64a19; /* Color diferente para el botón activo */
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
        <a href="inicio.php">Inicio</a>
    </div>

    <!-- Formulario de Registro -->
    <form action="" method="post">
        <h2>Registro de Preceptores</h2>

        <label for="nombre_usuario">Nombre de Usuario:</label>
        <input type="text" id="nombre_usuario" name="nombre_usuario" required>

        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required>

        <input type="submit" name="accion" value="Registrar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "preceptoria";

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar conexión
        if ($conn->connect_error) {
            die("<div class='alert'>Conexión fallida: " . $conn->connect_error . "</div>");
        }

        // Obtener los datos del formulario
        $nombre_usuario = $conn->real_escape_string($_POST['nombre_usuario']);
        $contraseña = $conn->real_escape_string($_POST['contraseña']);

        // Encriptar la contraseña antes de almacenarla
        $contraseña_encriptada = password_hash($contraseña, PASSWORD_BCRYPT);

        // Consulta para insertar el nuevo registro con la contraseña encriptada
        $sql = "INSERT INTO preceptores (nombre_usuario, contraseña) VALUES ('$nombre_usuario', '$contraseña_encriptada')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='success'>Registro exitoso.</div>";
        } else {
            echo "<div class='alert'>Error al registrar: " . $conn->error . "</div>";
        }

        // Cerrar la conexión
        $conn->close();
    }
    ?>

</body>
</html>

