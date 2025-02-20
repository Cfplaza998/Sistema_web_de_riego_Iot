<?php
include('../head/head_admin.php');
$mysqli= new mysqli("localhost", "u562010244_admin", "Cfplaza2018*", "u562010244_bd_smart_irrig");

// if (!isset($_SESSION['usuario'])) {
//     header('Location: ../index.php');
//     exit();
// }

$mensaje="";
$id = $_GET['codigo_usuario'];
$Rol = "SELECT * FROM tabla_cargo";
$guardar = $mysqli->query($Rol);
$m="SELECT * FROM tabla_usuarios WHERE codigo_usuario = '$id'";
$modificar = $mysqli->query($m);
$dato = $modificar->fetch_array();
if(isset($_POST['modificar'])){
	$id = $_POST['id'];
	$mensaje="";
	$Apellido = $mysqli->real_escape_string($_POST['Apellido']);
	$Nombre = $mysqli->real_escape_string($_POST['Nombre']);
	$Alia = $mysqli->real_escape_string($_POST['email']);
	$Clave = $mysqli->real_escape_string($_POST['password']);
	$Rol = $mysqli->real_escape_string($_POST['Rol']);

	$actualiza = "UPDATE tabla_usuarios SET usuario_apellido = '$Apellido', usuario_nombre ='$Nombre', usuario_correo='$Alia', usuario_clave ='$Clave', tipo_cargo = '$Rol' WHERE codigo_usuario ='$id'";
	$actualizar = $mysqli->query($actualiza);
	header("location:frm_crear_user.php");
	if ($actualizar>0){

        $mensaje.="<div class='alert alert-primary text-success text-center' role='alert'> Tu registro se modifico con exito</div>";
    }
    else{
    $mensaje.="<h3 class='text-success'> Tu registro no se modifico con exito</h3>";
    }	
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->

    <script type="text/javascript">
        function confirmDelete() {
            var respuesta = confirm("¿Estás seguro de eliminar a este usuario?");
            if (respuesta == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>

</head>
<body>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Usuarios Registrados</h6>
                <!--<div class="container mb-3">-->
                <!--    <div class="d-grid gap-2 container mb-3">-->
                <!--        <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">-->
                <!--            <div class="d-grid gap-2">-->
                <!--                <input type="text" name="buscar" class="form-control" placeholder="Búsqueda por Apellido">-->
                <!--                <input type="submit" name="buscando" value="Buscar" class="btn btn-outline-success btn-rounded mb-3">-->
                <!--            </div>-->
                <!--        </form>-->
                <!--    </div>-->
                <!--</div>-->
                <?php echo $mensaje; ?>
                <div class="container">
                	<form class="row g-3 mt-3 border border-primary border-2 form-control form-control-lg fw-bold" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                		<input type="hidden" name="id" value="<?php echo $dato['codigo_usuario']; ?>">
                	<div class="col-12">
                		<label for="Apellido" class="form-label">Apellido</label>
                		<input type="text" name="Apellido" class="form-control" id="Apellido" value="<?php echo $dato['usuario_apellido']; ?>" placeholder="Apellido">
                	</div>
                	<div class="col-12">
                		<label for="Nombre" class="form-label">Nombre</label>
                		<input type="text" name="Nombre" class="form-control" id="Nombre" value="<?php echo $dato['usuario_nombre']; ?>" placeholder="Nombre">
                	</div>
                	<div class="col-12">
                		<label for="email" class="form-label">Correo Electronico</label>
                		<input type="text" name="email" class="form-control" id="email" value="<?php echo $dato['usuario_correo']; ?>" placeholder="Correo Electronico">
                	</div>
                	<div class="col-12">
                		<label for="password" class="form-label">Contraseña</label>
                		<input type="password" name="password" class="form-control" id="password" value="<?php echo $dato['usuario_clave']; ?>" placeholder="Contraseña">
                	</div>
                	<select class="form-select " aria-label="Default select example" name="Rol">
                		<option value="">Seleccione un rol</option>
                			<?php while($row = $guardar->fetch_assoc()){?>
                			<option value="<?php echo $row['id']; ?>"> <?php echo $row['tipo_cargo']; ?></option>
                			<?php } ?>
                	</select>
                	<div class="d-grid gap-2">
                		<button type="button post" name="modificar" class="btn btn-outline-warning btn-rounded fa-x5, fa-lg"> <i class="fa-solid fa-pen-to-square"></i>&nbsp;Modificar</button>
                	</div>
                	<div class="d-grid gap-2">
                		<a href="frm_tabla_usuarios.php" class="btn_cerrar btn btn-outline-info btn-rounded mb-3">Cerrar</a>
            </div>
        </div>
    </div>
</div>
<br>

    <!-- Footer Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded-top p-4">
            <div class="row">
                <div class="col-12 col-sm-6 text-center text-sm-start">
                    &copy; <a href="#">smartIrrigationec.com</a>, Proyecto de Titulacion UAE 2023-2024 
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
    
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/chart/chart.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>
</html>