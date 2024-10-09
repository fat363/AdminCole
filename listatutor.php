<?php
include "cob.php"; // Incluye tu archivo de conexión a la base de datos

// Verificar si se ha enviado una búsqueda por curso
$curso_filtro = isset($_GET['curso']) ? $conn->real_escape_string($_GET['curso']) : '';

// Modificar la consulta para filtrar por curso si se ha proporcionado uno
$query = "
    SELECT 
        Tutores.nombre AS tutor_nombre,
        Tutores.apellido AS tutor_apellido,
        Tutores.telefono,
        Tutores.email,
        Tutores.direccion,
        Tutores.relacion,
        Estudiantes.nombre AS estudiante_nombre,
        Estudiantes.apellido AS estudiante_apellido,
        Estudiantes.curso AS estudiante_curso
    FROM 
        Tutores
    JOIN 
        Estudiantes ON Tutores.id_estudiante = Estudiantes.id_estudiante
";

if (!empty($curso_filtro)) {
    $query .= " WHERE Estudiantes.curso = '$curso_filtro'";
}

$query .= " ORDER BY Estudiantes.curso"; // Ordenar por curso

$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            color: #ff6600;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f18132;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }

        /* Estilo de la barra de navegación */
        .navbar {
            background-color: #f18132;
            overflow: hidden;
            padding: 10px;
            border-radius: 8px;
        }

        .navbar a {
            display: inline-block;
            color: #ffffff;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 17px;
            margin: 5px;
            border-radius: 4px;
        }

        .navbar a:hover {
            background-color: #ff6800;
        }

        /* Estilo del formulario de búsqueda */
        .search-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-container input[type="text"] {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-container input[type="submit"] {
            padding: 8px 16px;
            background-color: #ff7a00;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-container input[type="submit"]:hover {
            background-color: #e64a19;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación -->
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

        <!-- Formulario de búsqueda -->
        <div class="search-container">
            <form action="" method="GET">
                <input type="text" name="curso" placeholder="Buscar por curso" value="<?php echo htmlspecialchars($curso_filtro); ?>">
                <input type="submit" value="Buscar">
            </form>
        </div>

        <?php if ($result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>Tutor Nombre</th>
                    <th>Tutor Apellido</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Dirección</th>
                    <th>Relación</th>
                    <th>Estudiante Nombre</th>
                    <th>Estudiante Apellido</th>
                    <th>Curso</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['tutor_nombre']; ?></td>
                        <td><?php echo $row['tutor_apellido']; ?></td>
                        <td><?php echo $row['telefono']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['direccion']; ?></td>
                        <td><?php echo $row['relacion']; ?></td>
                        <td><?php echo $row['estudiante_nombre']; ?></td>
                        <td><?php echo $row['estudiante_apellido']; ?></td>
                        <td><?php echo $row['estudiante_curso']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron registros para el curso seleccionado.</p>
        <?php endif; ?>
    </div>

<?php
$conn->close(); 
?>
</body>
</html>
