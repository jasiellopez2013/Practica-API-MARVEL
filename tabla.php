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

  <div class=" container-fluid g-0">
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

    <!-- carrousel-->
    <div class="row d-flex justify-content-center align-items-center vh-100 g-0">
        <div class="col-8 p-1">
            <h1 class=" text-center"> Ver sucursales </h1>
            <div class="container"> 
                             <div class="row">

                <div class="col-md-8  col-12 text-start py-2 p-md-1 ">

                    <form id="" name="form3" method="post" action="buscars.php">
                      <div class="row mb-2">
                        <div class="col-md-9 col-10">
                          <input type="text" class="form-control" name="id" placeholder="Buscar sucursal" required pattern="[0-9]{1,10}" 
					   required oninput="setCustomValidity('')" title="Ingresa un número de sucursal válido." 
					   oninvalid="setCustomValidity('Campo obligatorio')">
                        </div>

                        <div class="col-md-3 col-2 g-0">
                        <button type="submit" name="Submit" value="buscar" class="btn btn-sm btn-danger p-2" id="bbusca">Buscar</button>
                        </div>
                      </div>
                    </form>
                 </div>
                 
                 <div class="col-12 col-md-4  mb-2">
                    <a href="form-s.html" class="btn btn-danger col-12"> Nuevo registro</a>
                 </div>
                </div>
              </div> 
              
              
              <?php
              
              include ("funciones.php");
 
               
                 print '<div class="d-none d-md-block table-responsive-md text-center ">';
                 print '<table class="table table-dark table-hover table-md " style="font-size:12px">';
                 print '<thead class="thead-light">';
 
                     print	'<tr>';
                     print	'<th> No. Sucursal</th>';
                     print	'<th> Nombre</th>';
                     print	'<th > Teléfono</th>';
                     print	'<th "> Correo </th>';
                     print	'<th "> Dirección </th>';
                     print	'<th "> Código Postal </th>';
                     print	'<th "> Ciudad </th>';
         
                     print	'<th> Modificar </th>';
                     print	'<th> Eliminar </th>';
 
                     print	'</tr>';
                     print	'</thead>';
                          
                     print	'<tbody>';
 
                     $filas = muestraS();
                     print '</tbody>';
                                 print '</table>';
                 print ' </div>';
 
 
         /************************** tabla sm ***********************************/
 
                 print '<div class="d-block d-md-none table-responsive-md text-center ">';
                 print '<table class="table table-dark table-hover table-md " style="font-size:12px">';
                 print '<thead class="thead-light">';
 
                     print	'<tr>';
                     print	'<th> No. Sucursal</th>';
                     print	'<th> Nombre</th>';
                     print	'<th> Modificar </th>';
                     print	'<th> Eliminar </th>';
 
                     print	'</tr>';
                     print	'</thead>';
                          
                     print	'<tbody>';
 
                     $filas = muestraSsm();
 
                     print '</tbody>';
                                 print '</table>';
                 print ' </div>';
                         ?>
                         
            </div>

        </div>
    </div>
</div>

<footer class="container text-center" id="menu3">
      <div class="row">
        <div class="col p-3 border-top border-3 border-white">
          <p class="h6">©2022 Jasiel Lopez</p>
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
