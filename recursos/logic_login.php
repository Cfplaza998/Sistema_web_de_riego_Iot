<?php
// Incluir el archivo de conexión
include('logic_conexion.php');


$user=$_POST['text'];
$pass=$_POST['password'];

session_start();
$_SESSION['usuario']=$user;


$query=mysqli_query($conn, "SELECT * FROM tabla_usuarios WHERE usuario_nombre='".$user."'and usuario_clave='".$pass."'");

$nr=mysqli_fetch_array($query);
$nr1=mysqli_num_rows($query);

if ($nr1==1)
{
	if ($nr['tipo_cargo']==1)
	{
		echo '
		<script> 
		alert("Esta ingresando como Administrador");
		location.href="../forms_admin/frm_monitoreo_admin.php";
		</script>
		';	
	}
	else if($nr['tipo_cargo']==2)
	{
		echo '
		<script> 
		alert("Esta ingresando como Usuario");
		location.href="../forms_user/frm_monitoreo_usuario.php";
		</script>
		';
	}
}
else if($nr1==0)
{
	echo '
	<script> 
	alert("Usuario o contraseña incorrecta");
	location.href="../index.php";
	</script>
	';
}
