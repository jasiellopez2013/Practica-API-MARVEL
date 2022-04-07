<?php
include("funciones.php");

$col1=$_POST["id"];

$resultado= eliminaS($col1);

if ($resultado>0){
    echo '<script> 
    alert("Se ha eliminado el registro."); 
    window.location.href="tabla.php"
     </script>';

}else{
    echo '<script> 
    alert("No se ha podido eliminar él registró al contener información relacionada."); 
    window.location.href="tabla.php"
     </script>';
}

?>