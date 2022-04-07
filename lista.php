<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Comics</title>
    <link rel="shortcut icon" href="img/ico.ico">
    <link rel="icon" type="image/png" href="img/ico.ico" />
    <link rel="stylesheet" href="sass/custom.css" >
    <link
      href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Inline+One&display=swap"
      rel="stylesheet"
    />
  </head>
  <body class="bg-dark">
    <div class="container-fluid g-0 ">
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

      <!-- contenido -->
      <div class="row d-flex justify-content-center align-items-center ">
        <h1 class="text-center">Cómics</h1>

        <div class="col-8 p-1">
            
          <div class="row ">
            <form action="guardarl.php" method="post">

             <?php
               include("funciones.php");
               echo selectS();
               ?>
   <div class="row">
           <?php
                $ts=3;
                $privaKey="cbb2bb98ef9efaa3b672287fb38fc8aef601ae08";
                $publicKey="017ad209a62b511aa89ad051f2503944";
                $hash=md5($ts.$privaKey.$publicKey);
                
                $data = json_decode( file_get_contents("https://gateway.marvel.com:443/v1/public/comics?limit=52&orderBy=title&ts=3&apikey=017ad209a62b511aa89ad051f2503944&hash=$hash",true));

                $resultado= $data->data->results;
                $contador=0;
                for($i=0;$i<count($resultado);$i++){
                  $contador=$contador+1;
                  $path=$resultado[$i]->thumbnail->path;
                  $ext= $resultado[$i]->thumbnail->extension;
                 $img=$path.".".$ext;
                 $nombre=$resultado[$i]->title;
                $id=$resultado[$i]->id; 
                $dummy= strripos($path, "image_not_available");



                               if($dummy===false){
                         $img=$img;
                   }else {
                    $img="img/dummy.png";
                  }
                
  echo '<div class="col-8 col-lg-4 " > ';
  echo '<div class="card m-1">';
  echo '    <img src="'.$img.'" class="card-img-top " alt="..." />';
  echo '  <div class="card-body text-center barra">';
  echo '   <small> <p class="text-black">'.$nombre.'</p></small>';
  echo '  </div>';
  echo '</div>';
  echo '</div>';

  echo '<div class="col-2 col-lg-2 " > ';
  echo ' <div class="form-check">';
  echo '   <input class="form-check-input bg-danger" type="checkbox"
        value="'.$id.'" id="ck1" name="ck'.$i.'"/>';
echo ' </div>';
  echo '</div>';

                 }

                echo '<input type="hidden" name="contador" value="'.$contador.'">';

              ?>

          
</div>        
           

<div class="mb-3 col-12 text-center p-4 pb-2">

<button type="submit" class="btn btn-danger col-12">Enviar</button>

</div>

            </form>           
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

