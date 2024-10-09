<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="ooo.jpeg">
    <title>Inicio de Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .navbar {
            background-color: #f18132; /* Color naranja */
            width: 100%;
            padding: 10px;
            border-radius: 0 0 8px 8px;
            text-align: center;
            position: absolute;
            top: 0;
            left: 0;
        }

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

        .navbar a:hover {
            background-color:  #ff6800 ;
        }

        form {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 70px; /* Para que no quede cubierto por el encabezado */
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
    </style>
</head>
<body>

    <!-- Barra de navegación centrada -->
    <div class="navbar">
        <a href="inicio.php">Inicio</a> 
    </div>

    <!-- Formulario de Inicio de Sesión -->
    <form action="" method="post">
        <h2>Inicio de Sesión</h2>

        <label for="nombre_usuario">Nombre de Usuario:</label>
        <input type="text" id="nombre_usuario" name="nombre_usuario" required>

        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required>

        <input type="submit" name="accion" value="Iniciar Sesión">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include "cob.php"; // Incluye tu archivo de conexión a la base de datos

        // Obtener los datos del formulario
        $nombre_usuario = $conn->real_escape_string($_POST['nombre_usuario']);
        $contraseña = $conn->real_escape_string($_POST['contraseña']);

        // Consulta para verificar las credenciales y si el usuario está activo
        $sql = "SELECT * FROM preceptores WHERE nombre_usuario = '$nombre_usuario' AND contraseña = '$contraseña' AND activo = 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Credenciales correctas y el usuario está activo, redirigir a la página deseada
            header("Location: preceptoria.php");
            exit();
        } else {
            // Credenciales incorrectas o el usuario está inhabilitado
            echo "<div class='alert'>Nombre de usuario o contraseña incorrectos o usuario inhabilitado.</div>";
        }

        // Cerrar la conexión
        $conn->close();
    }
    ?>

</body>
</html>
