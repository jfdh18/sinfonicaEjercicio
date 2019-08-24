<?php require_once("includes/header.php")?>
<?php
function mostrarError($error, $field){
  if(isset($error[$field]) && !empty($field)){
    $alerta='<div class="alert alert-danger">'.$error[$field].'</div>';
  }else{
    $alerta='';
  }
  return $alerta;
}
function setValueField($datos,$field, $textarea=false){
  if(isset($datos) && count($datos)>=1){
    if($textarea != false){
      echo $datos[$field];
    }else{
      echo "value='{$datos[$field]}'";
    }
  }
}
//Buscar Usuario
if(!isset($_GET["id"]) || empty($_GET["id"]) || !is_numeric($_GET["id"])){
  header("location:index.php");
  }
$id=$_GET["id"];
$user_query=mysqli_query($db, "SELECT * FROM sinfonica WHERE id_Sinfonica={$id}");
$user=mysqli_fetch_assoc($user_query);
if(!isset($user["id_Sinfonica"]) || empty($user["id_Sinfonica"])){
  header("location:index.php");
}
//Validar usuario
$error=array();
if(isset($_POST["submit"])){
  if(!empty($_POST["documento"]) && strlen($_POST["documento"]<=20) && is_numeric($_POST["documento"])){
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
  if(!empty($_POST["apellido"])&& !is_numeric($_POST["apellido"]) && !preg_match("/[0-9]/", $_POST["apellido"])){
      $apellidos_validador=true;
     }else{
     $apellidos_validador=false;
       $error["apellido"]="El apellido no es válido";
        }
        if(!empty($_POST["instrumento"])&& !is_numeric($_POST["instrumento"]) && !preg_match("/[0-9]/", $_POST["instrumento"])){
            $apellidos_validador=true;
           }else{
           $apellidos_validador=false;
             $error["instrumento"]="El Instrumento No es Valido";
              }
              if(!empty($_POST["direccion"])){
             $nombre_validador=true;
             }else{
             $nombre_validador=false;
             $error["direccion"]="Digite La Direccion";
             }
        //colocar entre comentarios par activar la actualización
     //if(!empty($_POST["password"]) && strlen($_POST["password"]>=6)){
       //$email_validador=true;
      //}else{
      //$email_validador=false;
       //$error["password"]="Introduzca una contraseña de más de seis caracteres";
        //}
        //nuevo código
        if(!empty($_POST["acudiente"]) && strlen($_POST["acudiente"]<=20) && !is_numeric($_POST["acudiente"]) && !preg_match("/[0-9]/", $_POST["acudiente"])){
        $nombre_validador=true;
        }else{
        $nombre_validador=false;
        $error["acudiente"]="El nombre no es válido";
        }

        if(!empty($_POST["telefono"]) && strlen($_POST["telefono"]<=10) && is_numeric($_POST["telefono"])){
       $nombre_validador=true;
       }else{
       $nombre_validador=false;
       $error["telefono"]="El Telefono No Es Valido no es válido";
       }


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
          //var_dump($_FILES["image"]);
          //die();
  	 	}
    //Actualizar Usuarios en la base de Datos
    if(count($error)==0){
      $sql= "UPDATE sinfonica set id_Sinfonica='{$_POST["documento"]}',"
      . "apellidos= '{$_POST["nombre"]}',"
      . "apellidos= '{$_POST["apellido"]}',"
      . "apellidos= '{$_POST["instrumento"]}',"
      . "apellidos= '{$_POST["direccion"]}',"
      . "apellidos= '{$_POST["acudiente"]}',"
      . "apellidos= '{$_POST["telefono"]}',"


     //Código nuevo
     if(isset($_FILES["foto"]) && !empty($_FILES["foto"]["tmp_name"])){
       $sql.= "foto='{$image}', ";
    }

      if($update_user){
        $user_query=mysqli_query($db, "SELECT * FROM sinfonica WHERE sinfonica={$id}");
        $user=mysqli_fetch_assoc($user_query);
      }
    }else{
      $update_user=false;
    }
}
?>
<h2>Editar Usuario <?php echo $user["id_Sinfonica"]."-".$user["nombre"]." ".$user["apellido"];?></h2>
<?php if(isset($_POST["submit"]) && count($error)==0 && $update_user !=false){?>
  <div class="alert alert-success">
    El usuario se ha actualizado correctamente !!
  </div>
<?php }elseif(isset($_POST["submit"])){?>
  <div class="alert alert-danger">
    El usuario NO se ha actualizado correctamente !!
  </div>
<?php } ?>
<form action="" method="POST" enctype="multipart/form-data">

<label for="documento">Documento:
    <input type="text" name="documento" class="form-control" <?php setValueField($user, "documento");?>/>
    <?php echo mostrarError($error, "documento");?>
</label>
</br></br>
    <label for="nombre">Nombre:
    <input type="text" name="nombre" class="form-control" <?php setValueField($user, "nombre");?>/>
    <?php echo mostrarError($error, "nombre");?>
    </label>
    </br></br>
    <label for="apellido">Apellidos:
        <input type="text" name="apellido" class="form-control" <?php setValueField($user, "apellido");?>/>
        <?php echo mostrarError($error, "apellidos");?>
    </label>
  </br></br>
      <label for="instrumento">Instrumento:
      <input type="text" name="instrumento" class="form-control" <?php setValueField($user, "instrumento");?>/>
      <?php echo mostrarError($error, "instrumento");?>
      </label>

    </br></br>
        <label for="direccion">Direccion:
        <input type="text" name="direccion" class="form-control" <?php setValueField($user, "direccion");?>/>
        <?php echo mostrarError($error, "direccion");?>
        </label>

      </br></br>
          <label for="acudiente">Acudiente:
          <input type="text" name="acudiente" class="form-control" <?php setValueField($user, "acudiente");?>/>
          <?php echo mostrarError($error, "instrumento");?>
          </label>

        </br></br>
            <label for="telefono">Telefono:
            <input type="text" name="telefono" class="form-control" <?php setValueField($user, "telefono");?>/>
            <?php echo mostrarError($error, "telefono");?>
            </label>

    </br></br>
    <label for="foto">
      <?php if($user["foto"] != null){?>
        Imagen de Perfil: <img src="uploads/<?php echo $user["foto"] ?>" width="100"/><br/>
      <?php } ?>
        Actualizar Imagen de Perfil:
        <input type="file" name="foto" class="form-control"/>
        <!--Nuevo Código-->

    </label>


    </br></br>
    <input type="submit" value="Enviar" name="submit" class="btn btn-success"/>
</form>
<?php require_once("includes/footer.php")?>
