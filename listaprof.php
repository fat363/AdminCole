<?php
include "cob.php";

// Habilitar/Inhabilitar profesor
if (isset($_POST['toggle_status'])) {
    $id_profesor = $_POST['id_profesor'];
    $nuevo_estado = $_POST['estado'] == '1' ? '0' : '1'; // Cambia el estado

    // Actualiza el estado del profesor
    $sql = "UPDATE profesor SET activo = '$nuevo_estado' WHERE id_profesor = '$id_profesor'";
    if ($conn->query($sql) === TRUE) {
      
    } else {
        echo "Error: " . $conn->error;
    }
}

// Obtener lista de profesores
$sql = "SELECT id_profesor, nombre_usuario, activo FROM profesor"; // Mantener la selección del id_profesor
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="ooo.jpeg">
    <title>Gestión de Profesores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f18132;
            color: white;
        }
        .btn-toggle {
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-toggle.inactive {
            background-color: #dc3545;
        }
        .btn-toggle:hover {
            background-color: #0056b3;
        }
        .btn-toggle.inactive:hover {
            background-color: #c82333;
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


    <h2>Lista de Profesores</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre de Usuario</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['nombre_usuario']); ?></td>
                        <td><?php echo $row['activo'] == '1' ? 'Activo' : 'Inhabilitado'; ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="id_profesor" value="<?php echo $row['id_profesor']; ?>">
                                <input type="hidden" name="estado" value="<?php echo $row['activo']; ?>">
                                <button type="submit" name="toggle_status" class="btn-toggle <?php echo $row['activo'] == '1' ? '' : 'inactive'; ?>">
                                    <?php echo $row['activo'] == '1' ? 'Inhabilitar' : 'Rehabilitar'; ?>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No se encontraron profesores.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>

<?php
$conn->close();
?>
