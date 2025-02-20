<?php 
include '../recursos/logic_conexion.php';
$id= $_GET['ID'];
$eliminar= "DELETE FROM tabla_sensores WHERE ID='$id'";
$elimina= $mysqli->query($eliminar);
header ("location:frm_datos_sensores.php");
$mysqli->close();
?>