<?php 
include '../recursos/logic_conexion.php';
$id= $_GET['codigo_usuario'];
$eliminar= "DELETE FROM tabla_usuarios WHERE codigo_usuario='$id'";
$elimina= $mysqli->query($eliminar);
header ("location:frm_tabla_usuarios.php");
$mysqli->close();
?>