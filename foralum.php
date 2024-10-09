<!DOCTYPE html>
<html lang="es">
    
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="ooo.jpeg">
    <title>Registro de Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff; /* Fondo blanco */
            color: #333; /* Texto oscuro para contraste */
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            background-color: #ffffff;
        }
        h2 {
            color: #ff7a00; /* Naranja para el título */
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="text"], input[type="email"], input[type="date"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #ff7a00; /* Naranja */
            color: white;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #e66900; /* Naranja oscuro */
        }
        .navbar {
            background-color: #ff7a00; /* Naranja */
            padding: 10px;
            border-radius: 8px;
            text-align: center; /* Centra los enlaces */
            margin-bottom: 20px;
        }
        .navbar a {
            display: inline-block;
            color: #ffffff;
            text-align: center;
            padding: 10px 15px;
            text-decoration: none;
            font-size: 16px;
            margin: 5px;
            border-radius: 4px;
        }
        .navbar a:hover {
            background-color: #e66900; /* Naranja oscuro */
        }
        #corner-button {
            position: fixed;
            top: 10px;
            left: 10px;
            padding: 10px 20px;
            background-color: #ff7a00; /* Naranja */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            z-index: 1000;
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
        <a href="inicio.php">Inicio</a> 
    </div>
   
    <div class="container">
        <form action="alumnos.php" method="post">
            <h2>Iniciar Sesión</h2>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>

            <label for="dni">DNI:</label>
            <input type="text" id="dni" name="dni" required>

            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" required>

            <input type="submit" name="accion" value="Iniciar Sesión">
          
        </form>
    </div>
  
</body>
</html>
