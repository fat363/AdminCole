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

// Función para obtener los viajes
function obtenerViajes($conn) {
    $query = "SELECT id_viaje, destino FROM Viajes";
    $result = $conn->query($query);
    $viajes = [];
    while ($row = $result->fetch_assoc()) {
        $viajes[] = $row;
    }
    return $viajes;
}

$cursos = obtenerCursos($conn);
$viajes = obtenerViajes($conn);

// Si se selecciona un curso, se obtienen los estudiantes de ese curso
$estudiantes = [];
if (isset($_POST['curso'])) {
    $cursoSeleccionado = $_POST['curso'];
    $estudiantes = obtenerEstudiantesPorCurso($conn, $cursoSeleccionado);
}

// Insertar datos en la base de datos cuando se envíe el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['estudiante']) && isset($_POST['viaje'])) {
    $idEstudiante = $_POST['estudiante'];
    $idViaje = $_POST['viaje'];  // Cambiado a id_viaje

    // Verificar si los campos están completos
    if (!empty($idEstudiante) && !empty($idViaje)) {
        // Consulta para insertar datos en la tabla Viajes_Estudiantes
        $sql = "INSERT INTO Viajes_Estudiantes (id_estudiante, id_viaje) VALUES ('$idEstudiante', '$idViaje')";
        if ($conn->query($sql) === TRUE) {
            echo "<p style='color:green; text-align:center;'>Registro guardado con éxito.</p>";
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

        select, input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #e67e22;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #e67e22;
            color: white;
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
        <h2>Registro de Viaje del Estudiante</h2>
        <form method="post" action="">
            <label for="curso">Curso:</label>
            <select id="curso" name="curso" onchange="this.form.submit()">
                <option value="">Selecciona un curso</option>
                <?php foreach ($cursos as $curso): ?>
                    <option value="<?php echo $curso; ?>" <?php if (isset($cursoSeleccionado) && $cursoSeleccionado == $curso) echo 'selected'; ?>><?php echo $curso; ?></option>
                <?php endforeach; ?>
            </select>

            <?php if (!empty($estudiantes)): ?>
                <label for="estudiante">Estudiante:</label>
                <select id="estudiante" name="estudiante">
                    <?php foreach ($estudiantes as $estudiante): ?>
                        <option value="<?php echo $estudiante['id_estudiante']; ?>">
                            <?php echo $estudiante['nombre'] . ' ' . $estudiante['apellido']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>

            <label for="viaje">Viaje:</label>
            <select id="viaje" name="viaje" required>
                <option value="">Selecciona un viaje</option>
                <?php foreach ($viajes as $viaje): ?>
                    <option value="<?php echo $viaje['id_viaje']; ?>">
                        <?php echo $viaje['destino']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <input type="submit" value="Registrar">
        </form>
    </div>

</body>
</html>

