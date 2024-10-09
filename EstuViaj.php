<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "preceptoria";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener lista de viajes con destino
$viajes = [];
$result = $conn->query("SELECT DISTINCT v.id_viaje, v.destino FROM Viajes v JOIN Viajes_Estudiantes ve ON v.id_viaje = ve.id_viaje");
while ($row = $result->fetch_assoc()) {
    $viajes[] = $row;
}

// Si se ha enviado un viaje para buscar estudiantes
$estudiantes = [];
if (isset($_POST['id_viaje'])) {
    $id_viaje = $_POST['id_viaje'];
    
    $stmt = $conn->prepare("
        SELECT e.id_estudiante, e.nombre, e.apellido, e.fecha_nacimiento, e.direccion, e.telefono, e.email
        FROM Estudiantes e
        JOIN Viajes_Estudiantes ve ON e.id_estudiante = ve.id_estudiante
        WHERE ve.id_viaje = ?
    ");
    $stmt->bind_param("i", $id_viaje);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $estudiantes[] = $row;
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="ooo.jpeg">
    <title>Listado de Estudiantes por Viaje</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            background-color: #f18132;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 10px 0;
            text-align: center;
            z-index: 1000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .navbar a {
            display: inline-block;
            color: #ffffff;
            text-align: center;
            padding: 12px 20px;
            text-decoration: none;
            font-size: 16px;
            margin: 0 10px;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .navbar a:hover {
            background-color: #ff6800;
            transform: scale(1.05);
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 900px;
            margin: 100px auto 20px auto;
            background: linear-gradient(to bottom, #ffffff, #f9f9f9);
            text-align: center;
        }

        h2 {
            color: #f18132;
            border-bottom: 2px solid #f18132;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        label {
            font-weight: 500;
            margin-bottom: 5px;
            display: block;
        }

        select, input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #f18132;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #f18132;
            color: white;
            cursor: pointer;
            border: none;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #e64a19;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f18132;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        footer {
            background-color: #333;
            color: #ffffff;
            text-align: center;
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
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
    <div class="form-container">
        <h2>Listado de Estudiantes por Viaje</h2>
        <form method="post">
            <label for="id_viaje">Selecciona un viaje:</label>
            <select id="id_viaje" name="id_viaje" required>
                <option value="">Seleccione un viaje</option>
                <?php foreach ($viajes as $viaje): ?>
                    <option value="<?php echo htmlspecialchars($viaje['id_viaje']); ?>">
                        <?php echo htmlspecialchars($viaje['destino']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Mostrar Estudiantes">
        </form>

        <?php if (!empty($estudiantes)): ?>
            <h3>Estudiantes del Viaje a <?php echo htmlspecialchars($viaje['destino']); ?></h3>
            <table>
                <thead>
                    <tr>
                        <th>Numero de Estudiante</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($estudiantes as $estudiante): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($estudiante['id_estudiante']); ?></td>
                            <td><?php echo htmlspecialchars($estudiante['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($estudiante['apellido']); ?></td>
                            <td><?php echo htmlspecialchars($estudiante['fecha_nacimiento']); ?></td>
                            <td><?php echo htmlspecialchars($estudiante['direccion']); ?></td>
                            <td><?php echo htmlspecialchars($estudiante['telefono']); ?></td>
                            <td><?php echo htmlspecialchars($estudiante['email']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

</body>
</html>
