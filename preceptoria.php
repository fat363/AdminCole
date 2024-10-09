<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="ooo.jpeg">
    <title>Página de Supervisor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0; /* Fondo claro */
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
        <a href="listEstu.php">Estudiantes</a>
        <a href="nuevEstu.php">Nuevos Alumnos</a>
        <a href="tutores.php">Tutores</a>
        <a href="carProf.php">Cargar Profesores</a>
        <a href="listatutor.php">Lista de Tutores</a>
        <a href="listaprof.php">Lista de Profesores</a>
        <a href="inicio.php">Inicio</a>
       
    </div>

</body>
</html>