<?php
// session_start();

include ('../head/head_admin.php');

// if (!isset($_SESSION['usuario'])) {
//     header('Location: ../index.php');
//     exit();
// }
// ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<div class="container mt-5">
    
        <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">

                <form action="almacenar_datos_sensores.php" method="POST">
                    <div class="mb-3">
                        <label for="dispositivo" class="form-label">Dispositivo:</label>
                        <select id="dispositivo" name="dispositivo" class="form-select">
                            <option value="sensor_humedad_temperatura">Sensor de humedad</option>
                            <option value="sensor_humedad_temperatura">Sensor de temperatura y humedad del ambiente</option>
                            <option value="sensor_luminico">Sensor luminico</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha:</label>
                        <input type="date" id="fecha" name="fecha" class="form-control" require>
                    </div>

                    <div class="mb-3">
                        <label for="sensor" class="form-label">Sensor:</label>
                       <select id="dispositivo" name="dispositivo" class="form-select">
                            <option value="sensor_humedad_temperatura">DHT11 Humedad y temperatura del ambiente</option>
                            <option value="sensor_humedad">YL-69 Humedad de tierra</option>
                            <option value="sensor_luminico">LDR Luminico</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="area_trabajo" class="form-label">Area de trabajo:</label>
                       <select id="area_trabajo" name="area_trabajo" class="form-select">
                            <option value="Cama #1">Cama #1</option>
                            <option value="Cama #2">Cama #2</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado:</label>
                        <select id="estado" name="estado" class="form-select">
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                        </select>
                    </div>
                        <button href="almacenar_datos_sensores.php"  
                        class="btn btn-primary ">Agregar dispositivo</button>
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