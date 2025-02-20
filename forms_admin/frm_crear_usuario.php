<?php
include ('../head/head_admin.php');
include ('../recursos/logic_conexion.php');

error_reporting(2);
$mysqli= new mysqli("localhost", "root", "", "bd_sistema_cobros");
$Rol = "SELECT * FROM tabla_usuarios";
$guardar = $mysqli->query($Rol);
  $mensaje ="";

if (isset($_POST['registrar'])) {
  $mensaje ="";
  $Apellido = $mysqli->real_escape_string($_POST['Apellido']);
  $Nombre = $mysqli->real_escape_string($_POST['Nombre']);
  $Alia = $mysqli->real_escape_string($_POST['email']);
  $Clave = $mysqli->real_escape_string($_POST['password']);
  if (!isset($_POST['ChkEstado']))
    {
      $estado='I';
    }
  else
    {

    $estado='A';
    }
  $Rol = $mysqli->real_escape_string($_POST['Rol']);

  if (isset($Apellido)&&!empty($Apellido)&&isset($Nombre)&&!empty($Nombre)&&isset($Alia)&&!empty($Alia)&&isset($Clave)&&!empty($Clave)){
    
    $sql= " INSERT INTO tabla_usuarios (usuario_apellido, usuario_nombre, usuario_correo, usuario_clave, usuario_estado, tipo_cargo) Values ('$Apellido','$Nombre','$Alia','$Clave','$estado', '$Rol')";
    $resultado=$mysqli->query($sql);

      if ($resultado>0){

        $mensaje.="<div class='alert alert-primary text-success text-center' role='alert'> Tu registro se realizo con exito</div>";
      }
      else{
      $mensaje.="<h3 class='text-success'> Tu registro no se realizo con exito</h3>";
      }
    }else{
    echo '
      <script> 
      alert("LLene todos los campos");
      location.href="register.php";
      </script>
    ';
    
  } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->





<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Registro de Usuarios</h6>
                
                <!-- Mensaje que avisa que se creo correctamente el usuario -->
                <?php echo $mensaje; ?>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="Apellido" name="Apellido"
                            placeholder="Apellidos" required>
                        <label for="floatingInput">Apellidos</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="Nombre" name="Nombre"
                            placeholder="Nombres" required>
                        <label for="floatingInput">Nombres</label>
                    </div>
                    <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="name@example.com" required>
                                <label for="floatingInput">Correo</label>
                            </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Contraseña" required>
                        <label for="floatingInput">Contraseña</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect"
                            aria-label="Floating label select example" name="Rol">
                            <?php while ($row = $guardar->fetch_assoc()) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['tipo_cargo']; ?></option>
                            <?php } ?>
                        </select>
                        <label for="floatingSelect">Seleccione el rol que ejecutara el nuevo perfil</label>
                    </div>
                    <legend class="col-form-label col-sm-2 pt-0" >Estado</legend>
                        <div class="col-sm-10">
                            <div class="form-check" id="ChkEstado" name="ChkEstado">
                                <input class="form-check-input" type="radio">
                                <label class="form-check-label" for="gridRadios1">
                                    Activo
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio">
                                <label class="form-check-label" for="gridRadios2">
                                    Inactivo
                                </label>
                            </div>
                        </div>
                    <button type="submit" name="registrar" class="btn btn-primary mb-2">Crear Cuenta</button>
                </form>
            </div>
        </div>
    </div>
</div>
    
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