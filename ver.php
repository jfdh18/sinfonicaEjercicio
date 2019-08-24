<?php require_once 'includes/header.php';?>
<?php
if(!isset($_GET["id"]) || empty($_GET["id"]) || !is_numeric($_GET["id"])){
  header("location:index.php");
}
$id= $_GET["id"];
$user_query = mysqli_query($db, "SELECT * FROM sinfonica WHERE id_Sinfonica = {$id}");
$user=mysqli_fetch_assoc($user_query);
if(!isset($user["id_Sinfonica"]) || empty($user["id_Sinfonica"])){
  header("location:index.php");
}
?>
<!--Nuevo codigo-->
<?php if($user["foto"] != null){?>
<div class="col-lg-5">
      <img src="uploads/<?php echo $user["foto"] ?>" width="100"/>
    <?php } ?>
  </div>
<div class="col-lg-7">
<h3>Usuario: <strong><?php echo $user["nombre"]." ".$user["apellido"];?></strong></h3>
<p>Datos:</p>
<p>Instrumento: <?php echo $user["instrumento"];?></p>
<p>Direccion: <?php echo $user["direccion"];?></p>
</div>
<div class="clerfix"></div>
<!--<a href="index.php" class="btn btn-success">Volver al listado</a>-->
<?php require_once 'includes/footer.php';?>
