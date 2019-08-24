<?php
session_start();
require_once 'includes/connect.php';
if(!isset($_SESSION["logged"])){

	if(isset($_GET["id"])){
		$id = $_GET["id"];
		$delete = mysqli_query($db, "DELETE FROM sinfonica WHERE id_Sinfonica = {$id}");
	}
}
header("Location: index.php");
?>
