<?php
   include "cob.php";

// Inhabilitar un preceptor
if (isset($_POST['inhabilitar'])) {
    $id_preceptor = $_POST['id_preceptor'];
    $sql = "UPDATE preceptores SET activo = 0 WHERE id_preceptor = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_preceptor);
    $stmt->execute();
    $stmt->close();
}

// Rehabilitar un preceptor
if (isset($_POST['rehabilitar'])) {
    $id_preceptor = $_POST['id_preceptor'];
    $sql = "UPDATE preceptores SET activo = 1 WHERE id_preceptor = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_preceptor);
    $stmt->execute();
    $stmt->close();
}

// Obtener la lista de preceptores
$sql = "SELECT id_preceptor, nombre_usuario, activo FROM preceptores";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="ooo.jpeg">
    <title>Administrar Preceptores</title>
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
            margin-bottom: 20px;
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
        <a href="autoriDire.php">Ver viajes</a>
        <a href="carPrec.php">Preceptores</a>
        <a href="listaprecep.php">Lista de Preceptores</a>
        <a href="EstuViaj.php">Estudiantes por Viaje </a>
        <a href="listalum2.php">Alumnos</a>
        <a href="inicio.php">inicio</a>
       
    </div>

    <h2>Administrar Preceptores</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre de Usuario</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['nombre_usuario']); ?></td>
                        <td><?php echo $row['activo'] ? 'Activo' : 'Inactivo'; ?></td>
                        <td>
                            <?php if ($row['activo']): ?>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="id_preceptor" value="<?php echo $row['id_preceptor']; ?>">
                                    <button type="submit" name="inhabilitar" class="btn-toggle">Inhabilitar</button>
                                </form>
                            <?php else: ?>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="id_preceptor" value="<?php echo $row['id_preceptor']; ?>">
                                    <button type="submit" name="rehabilitar" class="btn-toggle inactive">Rehabilitar</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No hay preceptores disponibles.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
