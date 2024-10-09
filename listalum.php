<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="ooo.jpeg">
    <title>Lista de Estudiantes por Curso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h2 {
            text-align: center;
            color: #ff7a00;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #ff7a00;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        /* Estilo del formulario de búsqueda */
        .search-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .search-container input[type="text"] {
            padding: 10px;
            width: 300px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }
        .search-container input[type="submit"] {
            padding: 10px 20px;
            background-color: #ff7a00;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .search-container input[type="submit"]:hover {
            background-color: #e64a19;
        }
        /* Estilo de la barra de navegación */
        .navbar {
            background-color: #ff6f00; /* Color naranja más oscuro */
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
            background-color: #e64a19;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="mateadeuP.php">Materias adeudadas</a>
        <a href="listalum.php">Alumnos</a>
        <a href="forviaje.php">Viaje</a>
        <a href="viajestu.php">Viajes Estudiantes</a>
        <a href="viajProf.php">Documentacion Viaje</a>
        <a href="inicio.php">Inicio</a>
    </div>

    <h2>Lista de Estudiantes por Curso</h2>

    <!-- Formulario de búsqueda -->
    <div class="search-container">
        <form method="GET" action="">
            <input type="text" name="buscar_curso" placeholder="Buscar curso..." value="<?php echo isset($_GET['buscar_curso']) ? $_GET['buscar_curso'] : ''; ?>">
            <input type="submit" value="Buscar">
        </form>
    </div>

   
    <?php
   include "cob.php";

    // Obtener el término de búsqueda si existe
    $buscarCurso = isset($_GET['buscar_curso']) ? $conn->real_escape_string($_GET['buscar_curso']) : '';

    // Consulta para obtener la lista de estudiantes, filtrando por curso si se ingresó un término de búsqueda
    $sql = "SELECT curso, nombre, apellido, fecha_nacimiento, direccion, telefono, email, padre, dni, turno, año 
            FROM Estudiantes 
            WHERE usr_baja IS NULL";  // Solo mostrar estudiantes que no han sido eliminados
    
    if ($buscarCurso) {
        $sql .= " AND curso LIKE '%$buscarCurso%'";
    }

    $sql .= " ORDER BY curso, apellido, nombre";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $currentCurso = '';
        while($row = $result->fetch_assoc()) {
            if ($currentCurso != $row["curso"]) {
                if ($currentCurso != '') {
                    echo "</table>"; // Cerrar la tabla anterior
                }
                $currentCurso = $row["curso"];
                echo "<h3>Curso: " . $currentCurso . "</h3>";
                echo "<table>";
                echo "<tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Padre/Madre/Tutor</th>
                        <th>DNI</th>
                        <th>Turno</th>
                        <th>Año</th>
                      </tr>";
            }
            echo "<tr>
                    <td>" . $row["nombre"] . "</td>
                    <td>" . $row["apellido"] . "</td>
                    <td>" . $row["fecha_nacimiento"] . "</td>
                    <td>" . $row["direccion"] . "</td>
                    <td>" . $row["telefono"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["padre"] . "</td>
                    <td>" . $row["dni"] . "</td>
                    <td>" . $row["turno"] . "</td>
                    <td>" . $row["año"] . "</td>
                  </tr>";
        }
        echo "</table>"; // Cerrar la última tabla
    } else {
        echo "<p>No se encontraron estudiantes en el curso buscado.</p>";
    }

    // Cerrar la conexión
    $conn->close();
    ?>

</body>
</html>

