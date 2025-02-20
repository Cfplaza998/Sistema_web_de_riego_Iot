<?php
include('../head/head_admin.php');
include('../recursos/logic_conexion.php');

// if(!isset($_SESSION['usuario'])) {
//     header('Location: ../index.php');
//     exit();
// }

$where = "";
if (!empty($_POST)) {
    $valor = $_POST['buscar'];
    if (!empty($valor)) {
        $where = "WHERE usuario_apellido LIKE '%$valor%'"; 
    }
}

$sql = "SELECT a.codigo_usuario, a.usuario_apellido, a.usuario_nombre, a.usuario_correo, a.tipo_cargo, g.tipo_cargo FROM tabla_usuarios AS a INNER JOIN tabla_cargo AS g ON a.tipo_cargo=g.id $where";
$resultado = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
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
                <h6 class="mb-4">Usuarios Registrados</h6>
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center">
                        <form class="d-flex" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="form-group me-2">
                                <input type="text" name="buscar" class="form-control" placeholder="Búsqueda por Apellido">
                            </div>
                            <div class="form-group me-3">
                                <input type="submit" name="buscando" value="Buscar" class="btn btn-outline-success btn-rounded">
                            </div>
                            <div class="form-group me-2">
                                <a href="frm_crear_usuario.php" class="btn btn-outline-secondary btn-rounded">
                                    <i></i> &nbsp;Crear Nuevo Usuario
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                        <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4"/>
                                    </svg>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>



                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                    <?php if ($resultado->num_rows > 0) { ?>
                        <table class="table table-hover table-bordered border-primary">
                            <div class="table-responsive">
                                <table class="table">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Cargo</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $resultado->fetch_assoc()) { ?>
                                    <tr class="text-center">
                                        <td><?php echo $row['codigo_usuario']; ?></td>
                                        <td><?php echo $row['usuario_nombre']; ?></td>
                                        <td><?php echo $row['usuario_apellido']; ?></td>
                                        <td><?php echo $row['usuario_correo']; ?></td>
                                        <td><?php echo $row['tipo_cargo']; ?></td>
                                        <td> 
                                            <a href="frm_editar_usuarios.php?codigo_usuario=<?php echo $row['codigo_usuario']; ?>" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pen-fill"></i>                                                
                                            </a>
                                            <a href="log_eliminar_usuario.php?codigo_usuario=<?php echo $row['codigo_usuario']; ?>" onclick="return confirmDelete()" class="btn btn-danger btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
                                                    <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z"/>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <div class="text-danger text-center">
                            <p>No se encontraron datos en la consulta</p>
                        </div>
                    <?php } ?>
                </div>
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