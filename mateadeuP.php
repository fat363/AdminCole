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
        $estado = $_POST['estado'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $materia = $_POST['materia'];
        $descripcion = $_POST['descripcion']; // Obtener la descripción

        // Asumir que obtienes los IDs de otra manera
        //$id_estudiante = obtenerIdEstudiante($nombre, $apellido); // Implementar esta función según tu lógica
        $id_materia = obtenerIdMateria($materia); // Implementar esta función según tu lógica

        // Preparar y ejecutar la consulta de inserción
        $sql = "INSERT INTO Materias_Estudiantes (id_estudiante, id_materia, estado, nombre, apellido, materia, descripcion) 
                VALUES (:id_estudiante, :id_materia, :estado, :nombre, :apellido, :materia, :descripcion)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_estudiante', $id_estudiante, PDO::PARAM_INT);
        $stmt->bindParam(':id_materia', $id_materia, PDO::PARAM_INT);
        $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
        $stmt->bindParam(':materia', $materia, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        
        $stmt->execute();

        echo "<p style='color: green;'></p>";
    }
} catch (PDOException $e) {
    echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
}

function obtenerIdEstudiante($nombre, $apellido) {
    // Implementar la lógica para obtener el ID del estudiante basado en el nombre y apellido
    // Ejemplo:
    global $pdo;
    $sql = "SELECT id_estudiante FROM Estudiantes WHERE nombre = :nombre AND apellido = :apellido";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->execute();
    return $stmt->fetchColumn();
}

function obtenerIdMateria($materia) {
    // Implementar la lógica para obtener el ID de la materia basado en el nombre de la materia
    // Ejemplo:
    global $pdo;
    $sql = "SELECT id_materia FROM Materias WHERE nombre = :materia";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':materia', $materia);
    $stmt->execute();
    return $stmt->fetchColumn();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="ooo.jpeg">
    <title>Registro de Materias Adeudadas</title>
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
        input[type="text"],
        select,
        textarea {
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

</body>
    <div class="container">
        <h1>Registro de Materias Adeudadas</h1>
        <form action="" method="post">
            <label for="estado">Estado:</label>
            <select id="estado" name="estado" required>
                <option value="Pendiente">Pendiente</option>
                <option value="Aprobada">Aprobada</option>
                <option value="Reprobada">Reprobada</option>
            </select>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>
            
            <label for="materia">Materia:</label>
            <input type="text" id="materia" name="materia" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="4" placeholder="Escribe una descripción opcional"></textarea>
            
            <input type="submit" value="Registrar">
        </form>
    </div>
</body>
</html>