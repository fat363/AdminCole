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
        /* Estilo para los botones de Editar y Eliminar */
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        .action-buttons button {
            padding: 8px 16px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: white;
            transition: background-color 0.3s ease;
        }
        .action-buttons .editar {
            background-color: #4CAF50; /* Verde */
        }
        .action-buttons .editar:hover {
            background-color: #45a049;
        }
        .action-buttons .eliminar {
            background-color: #f44336; /* Rojo */
        }
        .action-buttons .eliminar:hover {
            background-color: #e53935;
        }
        /* Estilo para los campos de texto en la tabla */
        table input[type="text"], 
        table input[type="date"], 
        table input[type="email"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }
        table input[readonly] {
            background-color: #f5f5f5;
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

    // Manejar eliminación lógica
    if (isset($_POST['eliminar'])) {
        $dniEliminar = $_POST['dni'];

        $sqlEliminar = "UPDATE Estudiantes SET usr_baja = '1', fecha_baja = NOW() WHERE dni = '$dniEliminar'";
        $conn->query($sqlEliminar);
    }

    // Manejar edición
    if (isset($_POST['editar'])) {
        $dniEditar = $_POST['dni'];
        $nuevoNombre = $_POST['nombre'];
        $nuevoApellido = $_POST['apellido'];
        $nuevaFechaNacimiento = $_POST['fecha_nacimiento'];
        $nuevaDireccion = $_POST['direccion'];
        $nuevoTelefono = $_POST['telefono'];
        $nuevoEmail = $_POST['email'];
        $nuevoPadre = $_POST['padre'];
        $nuevoTurno = $_POST['turno'];
        $nuevoAño = $_POST['año'];

        $sqlEditar = "UPDATE Estudiantes SET 
            nombre = '$nuevoNombre', 
            apellido = '$nuevoApellido', 
            fecha_nacimiento = '$nuevaFechaNacimiento', 
            direccion = '$nuevaDireccion', 
            telefono = '$nuevoTelefono', 
            email = '$nuevoEmail', 
            padre = '$nuevoPadre', 
            turno = '$nuevoTurno', 
            año = '$nuevoAño'
            WHERE dni = '$dniEditar'";
        $conn->query($sqlEditar);
    }

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
                        <th>Acciones</th>
                      </tr>";
            }
            echo "<tr>
                    <form method='POST' action=''>
                        <td><input type='text' name='nombre' value='" . $row["nombre"] . "'></td>
                        <td><input type='text' name='apellido' value='" . $row["apellido"] . "'></td>
                        <td><input type='date' name='fecha_nacimiento' value='" . $row["fecha_nacimiento"] . "'></td>
                        <td><input type='text' name='direccion' value='" . $row["direccion"] . "'></td>
                        <td><input type='text' name='telefono' value='" . $row["telefono"] . "'></td>
                        <td><input type='email' name='email' value='" . $row["email"] . "'></td>
                        <td><input type='text' name='padre' value='" . $row["padre"] . "'></td>
                        <td><input type='text' name='dni' value='" . $row["dni"] . "' readonly></td>
                        <td><input type='text' name='turno' value='" . $row["turno"] . "'></td>
                        <td><input type='text' name='año' value='" . $row["año"] . "'></td>
                        <td class='action-buttons'>
                            <button type='submit' name='editar' class='editar'>Actualizar</button>
                            <button type='submit' name='eliminar' class='eliminar'>Eliminar</button>
                        </td>
                    </form>
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
