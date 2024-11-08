<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encabezado Responsive</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #b0adab ; /* Gris más claro */
            color: BLACK;
        }

        header .logo a {
            color: white;
            text-decoration: none;
            font-size: 24px;
        }

        .navbar ul {
            list-style: none;
            display: flex;
        }

        .navbar ul li {
            margin-left: 20px;
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }

        .hamburger {
            display: none;
            font-size: 30px;
            cursor: pointer;
        }

        /* Estilo para pantallas pequeñas */
        @media (max-width: 768px) {
            .navbar ul {
                display: none;
                width: 100%;
                text-align: center;
                margin-top: 10px;
            }

            .navbar ul li {
                margin: 10px 0;
            }

            .hamburger {
                display: block;
            }

            .navbar.active ul {
                display: block;
            }
        }
    </style>
</head>
<body>
    <header>
        
        <nav class="navbar">
            <ul>
                <li><a href="fordire.php">DIRECCIÓN</a></li>
                <li><a href="forpre.php">PRECEPTORIA</a></li>
                <li><a href="forprof.php">PROFESOR</a></li>
                <li><a href="bienvenida.php">INFORMACIÓN</a></li>
                <li><a href="horarios_mañana.php">HORARIOS MAÑANA</a></li>
                <li><a href="horarios_tarde.php">HORARIOS TARDE</a></li>
            </ul>
        </nav>
        <div class="hamburger" id="hamburger">
            <span>&#9776;</span>
        </div>
    </header>

    <script>
        document.getElementById('hamburger').addEventListener('click', function() {
            document.querySelector('.navbar').classList.toggle('active');
        });
    </script>
</body>
</html>
