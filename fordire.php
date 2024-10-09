<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="ooo.jpeg">
    <title>Inicio de Sesión</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f3f0; /* Fondo gris claro */
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
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

        .form-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            width: 350px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            border: 1px solid #cccccc; /* Borde gris */
            margin-top: 70px; /* Para darle espacio al encabezado */
        }

        h2 {
            color: #ff7a00; /* Naranja oscuro */
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #555555; /* Gris oscuro */
            display: block;
            margin-bottom: 8px;
            text-align: left;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #cccccc; /* Gris claro */
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #ff7a00; /* Naranja oscuro */
        }

        input[type="submit"] {
            background-color: #ff7a00; /* Naranja oscuro */
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 12px;
            width: 100%;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        input[type="submit"]:hover {
            background-color: #e66900; /* Naranja más oscuro */
            transform: scale(1.05);
        }

        .message {
            margin: 20px 0;
            padding: 15px;
            border-radius: 5px;
            width: 100%;
            font-weight: bold;
            text-align: center;
        }

        .error {
            background-color: #f2dede; /* Rojo claro para error */
            color: #a94442;
            border: 1px solid #ebccd1;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación centrada -->
    <div class="navbar">
        <a href="inicio.php">Inicio</a> 
    </div>

    <?php
    // Script PHP para autenticación
    session_start();

    if (isset($_POST['submit'])) {
        // Obtener los datos del formulario
        $nombre_usuario = trim($_POST['nombre_usuario']);
        $contrasena = trim($_POST['password']);

        // Verificar las credenciales
        if (strcasecmp($nombre_usuario, "directivo") === 0 && $contrasena === "ipet363") {
            $_SESSION['nombre_usuario'] = $nombre_usuario;
            // Redirigir a la página "directora.php"
            header("Location: directora.php");
            exit(); // Detener la ejecución del script
        } else {
            echo "<div class='message error'>Nombre de usuario o contraseña incorrectos.</div>";
        }
    }
    ?>

    <div class="form-container">
        <h2>Inicio de Sesión</h2>
        <form action="" method="POST">
            <label for="nombre_usuario">Nombre usuario:</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario" required>
            
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" name="submit" value="Iniciar Sesión">
        </form>
    </div>

</body>
</html>
