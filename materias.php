<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="ooo.jpeg">
    <title>Materias</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #ff6600;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e2e2e2;
        }
    </style>
</head>
<body>
   
<?php
   include "cob.php";

    // Consulta SQL
    $sql = "SELECT nombre, descripcion FROM Materias";
    $result = $conn->query($sql);

    // Mostrar los resultados
    if ($result->num_rows > 0) {
        echo "<table><tr><th>Nombre</th><th>Descripción</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["nombre"]. "</td><td>" . $row["descripcion"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No se encontraron materias.</p>";
    }

    $conn->close();
    ?>
</body>
</html>
