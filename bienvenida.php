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
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        /* Estilo de la barra de navegación */
        .navbar {
            background-color: #f18132;
            width: 100%;
            padding: 10px;
            border-radius: 0 0 8px 8px;
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .navbar a {
            display: inline-block;
            color: #ffffff;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 17px;
            margin: 5px;
            border-radius: 4px;
        }

        .navbar a:hover {
            background-color: #ff6800;
        }

        .content {
            margin-top: 80px; /* Para evitar que el contenido quede debajo de la barra de navegación */
            text-align: center;
            width: 100%;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            color: #333;
        }

        a {
            display: block;
            margin: 20px auto;
            padding: 10px;
            background-color: #ff7a00;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            width: 200px;
            font-size: 18px;
        }

        a:hover {
            background-color: #e64a19;
        }

        .pdf-container {
            margin-bottom: 20px;
            width: 80%;
            max-width: 800px;
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
    </style>
</head>
<body>
    <!-- Barra de navegación fija -->
    <div class="navbar">
        <a href="inicio.php">Inicio</a>
    </div>

    <div class="content">
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
           
            <a href="escuela.pdf">Bienvenida</a>
            <a href="acuerdo.pdf">Acuerdo Educativo</a>';
        }
        ?>
    </div>
</body>
</html>
