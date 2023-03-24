<?php
include("conexao.php");
	session_start();
	$id = $_GET['id'];
	$sql2     = "delete from animais where cod_animais='$id'";
	$qry2     = mysqli_query($conexao,$sql2);
	header("Location:perfil.php");
					
	
?>
