<?php
include('funciones.php');
/*1 funcion incertar sucursales*/

$nombre=$_POST["nom"];
$telefono=$_POST["tel"];
$mail=$_POST["cor"];
$direccion=$_POST["dir"];
$cp=$_POST["cod"];
$ciudad=$_POST["ciu"];

$resul=insertarS($nombre, $telefono, $mail, $direccion, $cp, $ciudad);

if ($resul==1) {
    echo '<script> 
    alert("Sucursal agregada correctamente."); 
    window.location.href="tabla.php"
     </script>';

}else{
    echo '<script> 
    alert("Ocurrió un error al intentar registrar la sucursal."); 
    window.location.href="tabla.php"
     </script>';
}

?>