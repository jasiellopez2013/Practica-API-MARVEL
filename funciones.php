<?php



/*1 funcion incertar sucursales*/
function insertarS($nombre, $telefono, $mail, $direccion, $cp, $ciudad){

    include('conexion.php');
    $sql="INSERT INTO sucursales (id_Sucursal,nombre,telefono,mail,direccion,cp,ciudad) VALUES (?,?,?,?,?,?,?)";

    $stmt= $conexion->prepare($sql);
    $id=" ";
    
    $stmt->bind_param("issssis",$id,$nombre,$telefono,$mail,$direccion,$cp,$ciudad);
    
    
    $stmt->execute();
    
    if($stmt->affected_rows > 0)
    {
    return 1;  

    }else{
    return 0;  
    }
    
      
}

/*2 funcion tabla */

function muestraS(){
    include("conexion.php");
     
    $sql="select * from sucursales";
    $stmt=$conexion->prepare($sql);
    $stmt->execute();

    $stmt->bind_result($col1, $col2, $col3, $col4, $col5, $col6, $col7);
    $stmt->store_result();
    $filas=$stmt->num_rows;

   

    
    if($filas>0){
        
        while($stmt->fetch()){
            print '<tr>';
            print '<td>'.$col1.'</td>';
            print '<td>'.$col2.'</td>';

            print '<td ">'.$col3.'</td>';
            print '<td ">'.$col4.'</td>';
            print '<td ">'.$col5.'</td>';
            print '<td ">'.$col6.'</td>';
            print '<td ">'.$col7.'</td>';

            print '<td>';
            print  '<form id="form3" name="form3" method="post" action="buscars.php">';
            print ' <input type="hidden" name="id" value="'.$col1.'" />';
            print '<button type="submit" name="Submit" value="Modifica" class="btn id="button3" />
                          <img src="img/editar.png"" width="25px" height="25px" alt="x" /> </button>';
            print '</form>';
            print '</td>';

            print '<td>';
            print  '<form id="form2" name="form2" method="post" action="eliminar.php">';
            print ' <input type="hidden" name="id" value="'.$col1.'" />';						 
            print '	<button  type="submit" name="Submit" class="btn  "id="button2" />
                         <img src="img/eliminar.png" width="25px" height="25px" alt="x" /> </button>';
            print '</form>';
            print '</td>';			
            
    
            print '</tr>';
        }

    } else {
        echo "sin registros";
    }
}

/* 3 funcion tabla ms */

function muestraSsm(){
    include("conexion.php");
     
    $sql="select id_Sucursal, nombre  from sucursales";
    $stmt=$conexion->prepare($sql);
    $stmt->execute();

    $stmt->bind_result($col1, $col2);
    $stmt->store_result();
    $filas=$stmt->num_rows;
    
    if($filas>0){
        
        while($stmt->fetch()){
            print '<tr>';
            print '<td>'.$col1.'</td>';
            print '<td>'.$col2.'</td>';

            print '<td>';
            print  '<form id="form3" name="form3" method="post" action="buscars.php">';
            print ' <input type="hidden" name="id" value="'.$col1.'" />';
            print '<button type="submit" name="Submit" value="Modifica" class="btn id="button3" />
                          <img src="img/editar.png"" width="25px" height="25px" alt="x" /> </button>';
            print '</form>';
            print '</td>';

            print '<td>';
            print  '<form id="form2" name="form2" method="post" action="eliminar.php">';
            print ' <input type="hidden" name="id" value="'.$col1.'" />';						 
            print '	<button  type="submit" name="eli" class="btn  "id="eli" />
                         <img src="img/eliminar.png" width="25px" height="25px" alt="x" /> </button>';
            print '</form>';
            print '</td>';			
            
    
            print '</tr>';
        }

    } else {
        echo "sin registros";
    }
}

/* 4 funcion eliminar */
function eliminaS($col1){

    include('conexion.php');

$sql="DELETE FROM sucursales WHERE id_Sucursal=?";
    
    $stmt= $conexion->prepare($sql);

    $stmt->bind_param("i",$col1);
    
    
$stmt->execute();

if($stmt->affected_rows > 0)
{
$count = $conexion -> affected_rows;
return $count;  

}else{
    return 0;  
}
    //return $resultado;    
}

/*5 Funcion editar  */

function editarS($col1){
    include('conexion.php');
      
    $sql="select * from sucursales WHERE id_Sucursal=?";
    $stmt=$conexion->prepare($sql);
    $stmt->bind_param("i",$col1);

    $stmt->execute();

    $stmt->bind_result($col1,$col2, $col3, $col4, $col5, $col6, $col7);
    $stmt->store_result();
     $filas=$stmt->num_rows;

    if($filas>0){
        while($stmt->fetch()){

        echo '<div class="mb-3 col-12">';
        echo    '<label for="nom" class="form-label">Nombre de la sucursal:</label>';
        echo    '<input type="text" class="form-control" id="nom" name="nom" value="'.$col2.'" disabled 
                  placeholder="Ejem. Insurgentes Sur"
                        maxlength="50" pattern="[A-ZÁÉÍÓÚÑa-záéíóúñ0-9]+" required oninput="setCustomValidity("")" 
                        title="Solo se aceptan números y letras" oninvalid="setCustomValidity("Ingresa el nombre de la sucursal")">';
        echo  '</div>';

        echo '<div class="mb-3 col-12 col-md-6">';
        echo '<label for="tel" class="form-label">Teléfono:</label>';
        echo '<input type="text" class="form-control" id="tel" name="tel" value="'.$col3.'" disabled
        placeholder="Ejem. 7220003312"
        maxlength="10" pattern="[0-9]{10}" required oninput="setCustomValidity("")" 
        title="Solo se aceptan números" oninvalid="setCustomValidity("Ingresa el número teléfonico")">';
        echo '</div>';
        echo '<div class="mb-3 col-12 col-md-6">';
        echo '  <label for="cor" class="form-label">Correo:</label>';
        echo '  <input type="email" class="form-control" id="cor" name="cor" value="'.$col4.'" disabled
        maxlength="50" 
        placeholder="Ejem. xxxx@xxx.xxx" required oninput="setCustomValidity("")" 
        title="Solo se aceptan números" oninvalid="setCustomValidity("Ingresa un correo electrónico válido")">';
        echo '</div>';
      
        echo '<div class="mb-3 col-12 col-md-6">';
        echo '  <label for="dir" class="form-label">Dirección:</label>';
        echo '  <input type="text" class="form-control" id="dir" name="dir" value="'.$col5.'" disabled
        placeholder="Ejem. Insurgentes Sur #202"
        maxlength="50" pattern="[A-ZÁÉÍÓÚÑa-záéíóúñ0-9#\]+" required oninput="setCustomValidity("")" 
        title="Solo se aceptan números y letras" oninvalid="setCustomValidity("Ingresa una dirección")"
        >';
        echo '</div>';
      
        echo '<div class="mb-3 col-12 col-md-3">';
        echo '  <label for="cod" class="form-label">Codigo postal:</label>';
        echo '  <input type="text" class="form-control" id="cod" name="cod" value="'.$col6.'" disabled
        placeholder="Ejem. 06000"
        maxlength="5" pattern="[0-9]{5}" required oninput="setCustomValidity("")" 
        title="Solo se aceptan números" oninvalid="setCustomValidity("Ingresa el código postal")"
        >';
        echo '</div>';
      
        echo '<div class="mb-3 col-12 col-md-3">';
        echo '  <label for="ciu" class="form-label">Ciudad:</label>';
        echo '  <input type="text" class="form-control" id="ciu" name="ciu" value="'.$col7.'" disabled
        placeholder="Ejem. Ciudad de México"
        maxlength="30" pattern="[A-ZÁÉÍÓÚÑa-záéíóúñ]+" required oninput="setCustomValidity("")" 
        title="Solo se aceptan letras" oninvalid="setCustomValidity("Ingresa el nombre de la ciudad")"       
        >';
        echo '</div>';

        }
    }else{

        echo '<script> 
    alert("No existe ningún registro con el No. de sucursal '.$col1.'"); 
    window.location.href="tabla.php"
     </script>';
    }

}

/*6 Funcion actualizar */
function actualizaS($nombre,$telefono,$mail,$direccion,$cp,$ciudad,$id){
    include('conexion.php');
    
    $sql="UPDATE sucursales SET nombre=? ,telefono=? ,mail=? ,direccion=? ,cp=? ,ciudad=?  WHERE id_Sucursal=?";

    $stmt= $conexion->prepare($sql);
  
    
    $stmt->bind_param("ssssisi",$nombre,$telefono,$mail,$direccion,$cp,$ciudad,$id);
    
    
    $stmt->execute();
    
    if($stmt->affected_rows > 0)
    {
    return 1;  

    }else{
    return 0;  
    }
    

}

/***********  Select  ********** */


function selectS(){
    include("conexion.php");
     
     $sql="select id_Sucursal,nombre from sucursales";
     $stmt=$conexion->prepare($sql);
     $stmt->execute();
 
     $stmt->bind_result($col1, $col2);
     $stmt->store_result();
     $filas=$stmt->num_rows;
 
     

    if($filas>0){
        echo '<div class="row">';
        echo '<div class="col-9 col-md-3  p-1 mb-2">';
echo '<select class="form-select bg-black text-white" name="select" required>';
echo '<option value="">Seleccione una opción</option>';
        while($stmt->fetch()){

echo '<option value="'.$col1.'">'.$col2.'</option>';

        }

        echo  '</select>';
echo  '</div>';
echo  '</div>';
}else{
    echo "algo fallo";
}
}

function verTiendas($id_comic){
    include('conexion.php');
  
    $sql="select id_Sucursal from comic WHERE id_Comic=? AND bandera=?";
    $stmt=$conexion->prepare($sql);
    $id_comic=$id_comic;
    $bandera=1;
    $stmt->bind_param("ii",$id_comic,$bandera);
    
    $stmt->execute();
    
    $stmt->bind_result($col1);
    $stmt->store_result();
     $filas=$stmt->num_rows;
  
     echo '<div class="mb-3 col-12 ">';
     echo '  <label for="ciu" class="form-label">Disponible en sucursales: </label>';
     echo '<br>';
     //echo $filas;
     if($filas>0){
      while($stmt->fetch()){
        $id_sucursal=$col1;
    
        
        $sql = "select sucursales.nombre from sucursales inner join comic on sucursales.id_Sucursal=comic.id_Sucursal WHERE comic.id_Sucursal=$id_sucursal and comic.id_Comic=$id_comic and comic.bandera=$bandera";
    $result = $conexion->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
       
  echo '<h5>'.$row["nombre"].'  '.'</h5>';
  echo '</div>';

        
      }
    } else {
      echo '<div class="mb-3 col-12 ">';
      echo '  <label for="ciu" class="form-label">Sucursales disponible: </label>';
      echo '<small>     </small>';
      echo '</div>';
    }
        }
     }else{
      echo '<div class="mb-3 col-12 ">';
      echo '  <label for="ciu" class="form-label">Sucursales disponible: </label>';
      echo '<small>     </small>';
      echo '</div>';
     }
    
  
  }
?>