<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Comics</title>
    <link rel="shortcut icon" href="img/ico.ico">
    <link rel="icon" type="image/png" href="img/ico.ico"/>
    <link rel="stylesheet" href="sass/custom.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Inline+One&display=swap"
      rel="stylesheet"
    />
  </head>
  <body class="bg-dark">
    <div class="container-fluid g-0">
      <!--menu-->
      <nav
        class="navbar navbar-expand-sm navbar-dark bg-black text-white sticky-top"
      >
        <div class="container p-1 text-s">
          <!--Nombre/logo-->
          <a href="#" class="navbar-brand">
            <img src="img/comic.png" class="img-fluid" id="logo" alt=""
          /></a>

          <!--Boton-->
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavbar"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <!--Links-->
          <div
            class="collapse navbar-collapse justify-content-end"
            id="collapsibleNavbar"
          >
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" href="index.html">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="tabla.php">Sucursales</a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Cómics
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="grid.php">Catálogo</a></li>
                  <li><a class="dropdown-item" href="lista.php">Alta Cómics</a></li>
                </ul>
              </li>

            </ul>
          </div>
        </div>
      </nav>

      <!--Contenido-->

      <div class="row d-flex justify-content-center align-items-center vh-100">
        <h1 class="text-center">Galería de Cómics</h1>

        <div class="col-8 p-1">
          <div class="row">

          <?php
          include("gridback.php");
          echo mostraG();
          ?>



          </div>
        </div>
      </div>
    

    </div>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
