<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
<nav class="navbar navbar-expand-lg" style="background-color:#b3b6b7;">
  <div class="container-fluid">

    
   </body>
    </button> 
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <div class="dropdown">
          <button class="nav-link" href="forDire.php"> DIRECCION </button>
            <div class="dropdown-content">
              <a class="nav-link" href="fordire.php" href="#">Directora</a>
            </div>
        </div>

        <div class="dropdown">
        <button>PRECEPTORIA</button>
          <div class="dropdown-content">
              <a class="nav-link" href="forpre.php" href="#">Preceptoras</a>
          </div>
        </div>

        

        <div class="dropdown">
        <button>PROFESOR</button>
          <div class="dropdown-content">
              <a class="nav-link" href="forprof.php" href="#">Profesores</a>
          </div>
        </div>

        <div class="dropdown">
        <button>ALUMNOS</button>
          <div class="dropdown-content">
              <a class="nav-link" href="foralum.php" href="#"> Alumnos </a>
          </div>
        </div>

        <div class="dropdown">
        <button>INFORMACIÓN</button>
          <div class="dropdown-content">
              <a class="nav-link" href="bienvenida.php" href="#">información</a>
          </div>
        </div>

          <div class="dropdown">
        <button>HORARIOS</button>
          <div class="dropdown-content">
              <a class="nav-link" href="horarios_mañana.php" href="#">Horarios Mañana</a>
              <a class="nav-link" href="horarios_tarde.php" href="#">Horarios Tarde</a>
          </div>
          </div>

        </div>
      </ul>
    </div>
  </div>
</nav> 

<style>

body {
    margin: 0;
    height: 100vh;
}

#corner-button {
    position: fixed; /* Fija el botón en la pantalla */
    top: 10px; /* Distancia desde la parte superior */
    left: 10px; /* Distancia desde la parte izquierda */
    padding: 10px 20px; /* Espaciado interno del botón */
    background-color: #3498db; /* Color de fondo del botón para volver al inicio*/
    color: white; /* Color del texto */
    border: none; /* Sin borde */
    border-radius: 5px; /* Bordes redondeados */
    cursor: pointer; /* Cambia el cursor al pasar por encima */
    font-size: 16px; /* Tamaño de fuente */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3); /* Sombra */
    z-index: 1000; /* Asegura que el botón esté sobre otros elementos */
}

/*opciones de botes */
.dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown button {
            background-color: #b3b6b7;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .dropdown button:hover {
            background-color: #b3b6b7;
        }
</style>