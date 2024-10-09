<?php
include "cob.php";

// Función para obtener los cursos
function obtenerCursos($conn) {
    $query = "SELECT DISTINCT curso FROM Estudiantes ORDER BY curso";
    $result = $conn->query($query);
    $cursos = [];
    while ($row = $result->fetch_assoc()) {
        $cursos[] = $row['curso'];
    }
    return $cursos;
}

// Función para obtener los estudiantes por curso
function obtenerEstudiantesPorCurso($conn, $curso) {
    $query = "SELECT id_estudiante, nombre, apellido FROM Estudiantes WHERE curso = '$curso'";
    $result = $conn->query($query);
    $estudiantes = [];
    while ($row = $result->fetch_assoc()) {
        $estudiantes[] = $row;
    }
    return $estudiantes;
}

$cursos = obtenerCursos($conn);

// Si se selecciona un curso, se obtienen los estudiantes de ese curso
$estudiantes = [];
if (isset($_POST['curso'])) {
    $cursoSeleccionado = $_POST['curso'];
    $estudiantes = obtenerEstudiantesPorCurso($conn, $cursoSeleccionado);
}

// Insertar datos en la base de datos cuando se envíe el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre']) && isset($_POST['apellido'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $relacion = $_POST['relacion'];
    $idEstudiante = $_POST['estudiante']; // Obtén el ID del estudiante seleccionado

    // Verificar si los campos están completos
    if (!empty($nombre) && !empty($apellido) && !empty($idEstudiante)) {
        // Consulta para insertar datos en la tabla Tutores
        $sql = "INSERT INTO Tutores (nombre, apellido, telefono, email, direccion, relacion, id_estudiante) 
                VALUES ('$nombre', '$apellido', '$telefono', '$email', '$direccion', '$relacion', '$idEstudiante')";
        if ($conn->query($sql) === TRUE) {
            echo "<p style='color:green; text-align:center;'>Registro guardado con éxito.</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "<p style='color:red; text-align:center;'>Por favor, completa todos los campos requeridos.</p>";
    }
}

// Cerrar la conexión
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="ooo.jpeg">
    <title>Registro de Tutores</title>
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
        input[type="email"] {
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
        <h1>Registro de Tutores</h1>
        <form action="" method="post">
            <label for="curso">Curso:</label>
                <select id="curso" name="curso" onchange="this.form.submit()">
                    <option value="">Selecciona un curso</option>
                    <?php foreach ($cursos as $curso): ?>
                        <option value="<?php echo $curso; ?>" <?php if (isset($cursoSeleccionado) && $cursoSeleccionado == $curso) echo 'selected'; ?>><?php echo $curso; ?></option>
                    <?php endforeach; ?>
                </select>

                <?php if (!empty($estudiantes)): ?>
                    <label for="estudiante">Estudiante:</label>
                    <select id="estudiante" name="estudiante" required>
                        <?php foreach ($estudiantes as $estudiante): ?>
                            <option value="<?php echo $estudiante['id_estudiante']; ?>">
                                <?php echo $estudiante['nombre'] . ' ' . $estudiante['apellido']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                <?php endif; ?>
        <form action="" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>
            
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono">
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion">
            
            <label for="relacion">Relación:</label>
            <input type="text" id="relacion" name="relacion" required>

            
            <input type="submit" value="Registrar">
        </form>
    </div>
</body>
</html>
