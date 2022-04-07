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

    <!-- contenedor -->

    <div class="row d-flex justify-content-center align-items-center vh-100 g-0">
        <div class="col-8 p-1">
        <div class="row d-flex justify-content-end">
          <div class="col-2">
          <a href="grid.php" class="btn btn-danger col-12 m-2 ">Regresar</a>
          </div>
        </div>
<?php

     include("funciones.php");

$id=$_GET['id'];
$ts="1";
$privaKey="cbb2bb98ef9efaa3b672287fb38fc8aef601ae08";
$publicKey="017ad209a62b511aa89ad051f2503944";
$hash=md5($ts.$privaKey.$publicKey);

$data = json_decode( file_get_contents("https://gateway.marvel.com:443/v1/public/comics/".$id."?limit=52&orderBy=title&ts=1&apikey=017ad209a62b511aa89ad051f2503944&hash=$hash",true));


//&orderBy=title
$resultado= $data->data->results;

for($i=0;$i<count($resultado);$i++){
  $nombre=$resultado[$i]->title;
 //echo $nombre;   
  $path=$resultado[$i]->thumbnail->path;
  $ext= $resultado[$i]->thumbnail->extension;
  $vol= strripos($nombre, "Vol.");

  $vol= strripos($nombre, "Vol.");
  if($vol===false){
    $vol=" ";
  }else {
    $vol= substr($nombre, $vol);
  }
  
  $img=$path.".".$ext;
  $id=$resultado[$i]->id;
  //echo $vol;
  $dummy= strripos($path, "image_not_available");
  $fecha=$resultado[$i]->dates[1]->date;
  $fecha=substr($fecha,0,10);
  $paginas=$resultado[$i]->pageCount;
  $desc=$resultado[$i]->description;
 // echo $fecha;
  //echo $paginas;
  //echo $desc;



  if($dummy===false){
    $img=$img;
  }else {
    $img="img/dummy.png";}
  }
echo '<div class="row">';
echo  ' <div class="col-5">';
echo      '<img src="'.$img.'" alt="" class="col-12">';
echo    '</div>';

echo '<div class="col-7">';
echo '<div class="row">';
echo '<div class="mb-3 col-12">';
echo '<label for="nom" class="form-label">Título: </label>';
echo '<small>'.$nombre.'</small>';
echo '</div>';

echo '<div class="mb-3 col-12 ">';
echo '  <label for="tel" class="form-label">Volumen: </label>';
echo '<small>'.$vol.'</small>';
echo '</div>';

echo '<div class="mb-3 col-12 ">';
echo '  <label for="cor" class="form-label">Fecha y Hora de lanzamiento: </label>';
echo '<small>'."  ".$fecha.'</small>';
echo '</div>';

echo '<div class="mb-3 col-12">';
echo '  <label for="dir" class="form-label">Numero de Páginas:</label>';
echo ' <small>'.$paginas.'</small>';
echo '</div>';

echo '<div class="mb-3 col-12 ">';
echo '  <label for="cod" class="form-label">Descripcion: </label>';
echo '<small>'.$desc.'</small>';
echo '</div>';


/*funcion ver tiendas*/

verTiendas($id);

echo '</div>';
echo '</div>';
echo '</div>';
?>

        



                <div class="row mt-3">
<h5>Personajes</h5>
                <?php
       $id=$_GET['id'];
        //$id=71400;
        $ts=5;
        $privaKey="cbb2bb98ef9efaa3b672287fb38fc8aef601ae08";
        $publicKey="017ad209a62b511aa89ad051f2503944";
        $hash=md5($ts.$privaKey.$publicKey);
        
        $data = json_decode( file_get_contents("https://gateway.marvel.com:443/v1/public/comics/".$id."/"."characters"."?ts=5&apikey=017ad209a62b511aa89ad051f2503944&hash=$hash",true));


        //&orderBy=title
        $resultado= $data->data->results;
 

        for($i=0;$i<count($resultado);$i++){
          $nombre=$resultado[$i]-> name;
          $path=$resultado[$i]->thumbnail->path;
          $ext= $resultado[$i]->thumbnail->extension;
          $img=$path.".".$ext;

          $dummy= strripos($path, "image_not_available");



          if($dummy===false){
            $img=$img;
          }else {
            $img="img/dummy2.png";
          }

        echo '  <div class="col-12 col-lg-2 ">';
        echo '<div class="card m-1  " >';
        echo '    <img src="'.$img.'" class="card-img-top " alt="..."  " />';
        echo '  <div class="card-body text-center per d-flex align-items-center">';
        echo '    <p class="text-black">'.$nombre.'</p>';
        echo '  </div>';
        echo '  </div>';
        echo '  </div>';


        }
        
        ?>
                  </div>


       
        </div>
    </div>




</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>