<?php
include("funciones.php");

$id=$_POST["id"];
$nombre=$_POST["nom"];
$telefono=$_POST["tel"];
$mail=$_POST["cor"];
$direccion=$_POST["dir"];
$cp=$_POST["cod"];
$ciudad=$_POST["ciu"];

$resultado= actualizaS($nombre,$telefono,$mail,$direccion,$cp,$ciudad,$id);

if ($resultado>0){
    echo '<script> 
    alert("Se ha actualizado la información.."); 
    window.location.href="tabla.php"
     </script>';

}else{
    echo '<script> 
    alert("Ocurrió un error al intentar actualizar la información de la sucursal.."); 
    window.location.href="tabla.php"
     </script>';
}
?>