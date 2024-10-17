<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Materias</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
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
        tr:nth-child(even) {
            background-color: #f2f2f2;
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
        <a href="carmateP.php">Materias</a>
        <a href="listaMates.php">Lista de Materias</a>
        <a href="listEstu.php">Estudiantes</a>
        <a href="nuevEstu.php">Nuevos Alumnos</a>
        <a href="tutores.php">Tutores</a>
        <a href="carProf.php">Cargar Profesores</a>
        <a href="listatutor.php">Lista de Tutores</a>
        <a href="listaprof.php">Lista de Profesores</a>
        <a href="inicio.php">Inicio</a>
       
    </div>


<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Año</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Conectar a la base de datos
        include "cob.php"; // Asegúrate de que cob.php tenga la configuración correcta de la conexión a la base de datos

        // Consulta para obtener las materias
        $sql = "SELECT nombre, descripcion, año FROM Materias";
        $result = $conn->query($sql);

        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            // Mostrar cada fila de resultados
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['descripcion'] . "</td>";
                echo "<td>" . $row['año'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No hay materias disponibles.</td></tr>";
        }

        // Cerrar la conexión
        $conn->close();
        ?>
    </tbody>
</table>

</body>
</html>
