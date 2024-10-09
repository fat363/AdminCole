<?php
// Configuración de la base de datos
$host = 'localhost'; // Cambia esto si tu servidor es diferente
$dbname = 'preceptoria';
$username = 'root'; // Cambia esto si tienes un usuario diferente
$password = ''; // Cambia esto si tienes una contraseña

try {
    // Crear una conexión a la base de datos
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar si el formulario ha sido enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los datos del formulario
        $nombre = $_POST['nombre'];
        $año = date('Y'); // Obtener el año actual

        // Preparar y ejecutar la consulta de inserción
        $sql = "INSERT INTO Materias (nombre, año) VALUES (:nombre, :año)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':año', $año, PDO::PARAM_INT); // Añadir el año
        
        $stmt->execute();

        echo "<p style='color: green;'>Materia registrada exitosamente.</p>";
    }
} catch (PDOException $e) {
    echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="ooo.jpeg">
    <title>Registro de Materias</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 20px;
        }
        h1 {
            color: #ff6600;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            margin: 10px 0 5px;
            color: #333;
        }
        input[type="text"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 15px;
            width: calc(100% - 22px);
        }
        input[type="submit"] {
            background-color: #ff6600;
            color: #fff;
            border: none;
            padding: 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #e65c00;
        }
        .message {
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
        }

        /* Estilo de la barra de navegación */
        .navbar {
            background-color: #f18132; /* Color naranja */
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
        <h1>Registro de Materias</h1>
        <form action="" method="post">
            <label for="nombre">Nombre de la Materia:</label>
            <input type="text" id="nombre" name="nombre" required>
            
            <input type="submit" value="Registrar">
        </form>
    </div>
</body>
</html>

