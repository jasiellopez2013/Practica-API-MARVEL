<?php

function mostraG(){

$ts=1;
$privaKey="cbb2bb98ef9efaa3b672287fb38fc8aef601ae08";
$publicKey="017ad209a62b511aa89ad051f2503944";
$hash=md5($ts.$privaKey.$publicKey);

$data = json_decode( file_get_contents("https://gateway.marvel.com:443/v1/public/comics?limit=52&orderBy=title&ts=1&apikey=017ad209a62b511aa89ad051f2503944&hash=$hash",true));

//&orderBy=title
$resultado= $data->data->results;

for($i=0;$i<count($resultado);$i++){
    
  $path=$resultado[$i]->thumbnail->path;
  $ext= $resultado[$i]->thumbnail->extension;
  $nombre=$resultado[$i]->title;
  $vol= strripos($nombre, "Vol.");
  if($vol===false){
    $vol=" ";
  }else {
    $vol= substr($nombre, $vol);
  }

  
  $img=$path.".".$ext;
  $id=$resultado[$i]->id;
  $dummy= strripos($path, "image_not_available");



  if($dummy===false){
    $img=$img;
  }else {
    $img="img/dummy.png";
  }

  echo '<div class="col-12 col-lg-3 " > ';
  echo '<div class="card m-1">';
  echo '  <a href="informa.php?id='.$id.'" class="btn " >';
  echo '    <img src="'.$img.'" class="card-img-top " alt="..." />';
  echo '  </a>';
  echo '  <div class="card-body text-center barra">';
  echo '   <small> <p class="text-black">'.$nombre.'</p></small>';
  echo '    <small><p class="card-text text-black">Volumen: '.$vol.'</p></small>';

  echo '  </div>';
  echo '</div>';
  echo '</div>';


    
}
}

?>




