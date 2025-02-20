<?php
include('../head/head_user.php');
include('../recursos/logic_conexion.php');

$where = "";
if (!empty($_POST)) {
    $valor = $_POST['buscar'];
    if (!empty($valor)) {
        $where = "WHERE tabla_sensores LIKE '%$valor%'";
    }
}

$sql = "SELECT d.ID, d.fecha, d.sensor, d.area_trabajo, d.estado FROM tabla_sensores AS d $where";
$resultado = $mysqli->query($sql);

// Verificar si la consulta se ejecutó correctamente
if (!$resultado) {
    die("Error en la consulta: " . $mysqli->error);
}

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
                <h6 class="mb-4">Sensores Registrados</h6>
                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                    <?php if ($resultado->num_rows > 0) { ?>
                        <table class="table table-hover table-bordered border-primary">
                            <div class="table-responsive">
                                <table class="table">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Fecha de Ingreso</th>
                                    <th scope="col">Modelo de Sensor</th>
                                    <th scope="col">Area de Trabajo</th>
                                    <th scope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $resultado->fetch_assoc()) { ?>
                                    <tr class="text-center">
                                        <td><?php echo $row['ID']; ?></td>
                                        <td><?php echo $row['fecha']; ?></td>
                                        <td><?php echo $row['sensor']; ?></td>
                                        <td><?php echo $row['area_trabajo']; ?></td>
                                        <td><?php echo $row['estado']; ?></td>
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