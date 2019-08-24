<?php require_once 'includes/header.php';?>
<?php
function mostrarError($error, $field){
  if(isset($error[$field]) && !empty($field)){
    $alerta='<div class="alert alert-danger">'.$error[$field].'</div>';
  }else{
    $alerta='';
  }
  return $alerta;
}
function setValueField($error,$field, $textarea=false){
  if(isset($error) && count($error)>=1 && isset($_POST[$field])){
    if($textarea != false){
      echo $_POST[$field];
    }else{
      echo "value='{$_POST[$field]}'";
    }
  }
}
$error=array();
if(isset($_POST["submit"])){
  if(!empty($_POST["documento"])){
 $nombre_validador=true;
 }else{
 $nombre_validador=false;
 $error["documento"]="El Documento no es válido";
 }
 if(!empty($_POST["nombre"]) && strlen($_POST["nombre"]<=20) && !is_numeric($_POST["nombre"]) && !preg_match("/[0-9]/", $_POST["nombre"])){
$nombre_validador=true;
}else{
$nombre_validador=false;
$error["nombre"]="El nombre no es válido";
}
  if(!empty($_POST["apellido"])){
      $apellidos_validador=true;
     }else{
     $apellidos_validador=false;
       $error["apellido"]="Los apellidos no son válidos";
        }
        if(!empty($_POST["instrumento"])&& !is_numeric($_POST["instrumento"]) && !preg_match("/[0-9]/", $_POST["instrumento"])){
            $apellidos_validador=true;
           }else{
           $apellidos_validador=false;
             $error["instrumento"]="El instrumento No es valido";
              }

              if(!empty($_POST["direccion"])){
                  $apellidos_validador=true;
                 }else{
                 $apellidos_validador=false;
                   $error["direccion"]="La Direccion Es Invalida";
                 }
  if(!empty($_POST["acudiente"]) && strlen($_POST["acudiente"]<=20) && !is_numeric($_POST["nombre"]) && !preg_match("/[0-9]/", $_POST["acudiente"])){
                  $nombre_validador=true;
                  }else{
                  $nombre_validador=false;
                  $error["acudiente"]="El nombre no es válido";
                }
    if(!empty($_POST["telefono"])){
                                  $nombre_validador=true;
                                  }else{
                                  $nombre_validador=false;
                                  $error["telefono"]="El Telefono no es válido";
                                  }
      //Crear una carpeta nuevo código
      $image=null;
      if(isset($_FILES["foto"]) && !empty($_FILES["foto"]["tmp_name"])){
        if(!is_dir("uploads")){
          $dir = mkdir("uploads", 0777, true);

        }else{
          $dir=true;
        }
        if($dir){
          $filename= time()."-".$_FILES["foto"]["name"]; //concatenar función tiempo con el nombre de imagen
          $muf=move_uploaded_file($_FILES["foto"]["tmp_name"], "uploads/".$filename); //mover el fichero utilizando esta función
          $image=$filename;
          if($muf){
            $image_upload=true;
          }else{
            $image_upload=false;
            $error["foto"]= "La imagen no se ha subido";
          }
        }
      }
        //var_dump($_FILES["image"]);
        //die();
    //Insertar Usuarios en la base de Datos
    if(count($error)==0){
      $sql= "INSERT INTO sinfonica VALUES(NULL, '{$_POST["documento"]}', '{$_POST["nombre"]}', '{$_POST["apellido"]}', '{$_POST["instrumento"]}', '{$_POST["direccion"]}', '{$_POST["acudiente"]}', '{$_POST["telefono"]}', '{$image}');"; //colocar image
      $insert_user=mysqli_query($db, $sql);
    }else{
      $insert_user=false;
    }


}
?>
<h1>Crear Usuarios</h1>
<?php if(isset($_POST["submit"]) && count($error)==0 && $insert_user !=false){?>
  <div class="alert alert-success">
    El usuario se ha creado correctamente !!
  </div>
<?php } ?>
<form action="crear.php" method="POST" enctype="multipart/form-data">
  <label for="documento">Documento:
  <input type="text" name="documento" class="form-control" <?php setValueField($error, "documento");?>/>
  <?php echo mostrarError($error, "documento");?>
  </label>
  </br></br>
    <label for="nombre">Nombre:
    <input type="text" name="nombre" class="form-control" <?php setValueField($error, "nombre");?>/>
    <?php echo mostrarError($error, "nombre");?>
    </label>
    </br></br>
    <label for="apellido">Apellidos:
        <input type="text" name="apellido" class="form-control" <?php setValueField($error, "apellido");?>/>
        <?php echo mostrarError($error, "apellido");?>
    </label>
    </br></br>
    <label for="instrumento">Instrumento:
        <input type="text" name="instrumento" class="form-control" <?php setValueField($error, "instrumento");?>/>
        <?php echo mostrarError($error, "instrumento");?>
    </label>
    </br></br>
    <label for="direccion">Direccion:
        <input type="text" name="direccion" class="form-control" <?php setValueField($error, "direccion");?>/>
        <?php echo mostrarError($error, "direccion");?>
    </label>
    </br></br>
    <label for="acudiente">Acudiente:
        <input type="text" name="acudiente" class="form-control" <?php setValueField($error, "acudiente");?>/>
        <?php echo mostrarError($error, "acudiente");?>
    </label>
    </br></br>
  </br></br>
  <label for="telefono">Telefono:
      <input type="text" name="telefono" class="form-control" <?php setValueField($error, "telefono");?>/>
      <?php echo mostrarError($error, "telefono");?>
  </label>
  </br></br>

    <input type="submit" value="Enviar" name="submit" class="btn btn-success"/>
</form>
<?php require_once 'includes/footer.php'; ?>
