<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="ooo.jpeg">
    <title>Selección de PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        a {
            display: block;
            margin: 20px;
            padding: 10px;
            background-color: #ff7a00;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            width: 200px;
            margin: 0 auto 20px;
            font-size: 18px;
        }
        a:hover {
            background-color: #e64a19;
        }
        .pdf-container {
            margin-bottom: 20px;
        }
        iframe {
            width: 100%;
            height: 500px;
            border: none;
        }
        .autorizacion {
            margin-top: 20px;
            font-size: 18px;
        }
        .btn-imprimir {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #ff7a00;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }
        .btn-imprimir:hover {
            background-color: #e64a19;
        }
          /* Estilo de la barra de navegación */
        .navbar {
            background-color: #f18132; /* Color naranja */
            overflow: hidden;
            padding: 10px;
            border-radius: 8px;
            display: flex; /* Usar flexbox para el diseño */
            justify-content: flex-start; /* Alinear los botones a la izquierda */
            align-items: center; /* Centra verticalmente los botones */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Sombra sutil */
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
            transition: background-color 0.3s, transform 0.2s; /* Efecto de transición */
        }

        /* Cambiar el color al pasar el ratón por encima */
        .navbar a:hover {
            background-color: #ff6800; /* Color al pasar el mouse */
            transform: translateY(-2px); /* Efecto de desplazamiento */
            cursor: pointer; /* Cambiar el cursor al pasar el ratón */
        }

        /* Efecto activo para el botón seleccionado */
        .navbar a.active {
            background-color: #e64a19; /* Color diferente para el botón activo */
        }
    </style>
</head>
<body>
     <!-- Barra de navegación centrada -->
    <div class="navbar">
        <a href="autoviaj.php">Permiso de Viajes</a>

        <a href="inicio.php">Inicio</a>
       
    </div>
<?php
// Verificar si se ha seleccionado un archivo PDF
if (isset($_GET['file'])) {
    $pdf_file = $_GET['file'];

    // Verificar que el archivo existe
    if (file_exists($pdf_file)) {
        echo '<div class="pdf-container">
                <iframe src="' . htmlspecialchars($pdf_file) . '"></iframe>
              </div>';

        echo '<div class="autorizacion">
                <p>Autorizo la impresión de este documento para su uso correspondiente.</p>
              </div>';

        echo '<a href="#" class="btn-imprimir" onclick="window.print();">Imprimir</a>';
    } else {
        echo '<p>Archivo no encontrado.</p>';
    }
} else {
    echo '<h1>Seleccione el PDF que Desea Descargar</h1>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
          <a href="ficha_medica.pdf">Ficha Medica</a>
          <a href="traslado_de_menores.pdf">Traslado de Menores</a>
          <a href="AUTORIZACION PARA VIAJE EDUCATIVO.pdf">Autorizacion de Padres para Viajes</a>';
}
?>

</body>
</html>