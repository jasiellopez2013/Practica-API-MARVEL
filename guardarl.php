<?php
include("conexion.php");

$contador=$_POST['contador'];
$id_sucursal=$_POST['select'];
//echo $contador;
error_reporting(0);

for($i=0;$i<$contador;$i++){
$cadena='ck'.$i;
$id_comic=$_POST[$cadena];

if(isset($id_comic)){

//echo "la variable chk".$cadena."esta definida con un valor de ".$chk." <br>";
   
     $sql="SELECT bandera FROM comic WHERE id_Sucursal=? AND id_Comic=?";
     $stmt=$conexion->prepare($sql);
     $stmt->bind_param("ii",$id_sucursal,$id_comic);
     $stmt->execute();
    
 
     $stmt->bind_result($col1);
     $stmt->store_result();
     $filas=$stmt->num_rows;

     if($filas>0){
//echo "actualiza <br>";




     }else{
         //echo "inserta <br>";
         $sql="INSERT INTO comic (id_Sucursal,id_Comic,bandera) VALUES (?,?,?)";
         $stmt= $conexion->prepare($sql);
         $bandera=1;
         $stmt->bind_param("iii",$id_sucursal,$id_comic,$bandera);
         $stmt->execute();
         
         if($stmt->affected_rows > 0)
         {
  //       echo "datos insertados";  
     
         }else{
    //     echo "no se insertaron los datos algo fallo"; 
         }
         
     
        }


}else{
//echo "la variable chk no esta definida <br>";
}

echo '<script> 
alert("Registro exitoso"); 
window.location.href="index.html"
 </script>';

}
