<?php
include('../head/head_user.php');

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
    <div class="container-xxl position-relative bg-white d-flex p-0">
            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Informe de Datos</h6>
                    <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card animate__animated animate__fadeIn">
                            <a href="frm_datos_humedad_suelo_usuario.php">
                                <img src="../img/1.png" class="card-img-top" alt="Humedad del suelo">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Humedad del suelo</h5>
                                <p class="card-text">Lecturas obtenidas de la humedad del suelo</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card animate__animated animate__fadeIn">
                            <a href="frm_datos_humedad_ambiente_usuario.php">
                                <img src="../img/2.png" class="card-img-top" alt="Humedad del ambiente">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Humedad del ambiente</h5>
                                <p class="card-text">Lecturas obtenidas de la humedad del ambiente</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card animate__animated animate__fadeIn">
                            <a href="frm_datos_luminosidad_usuario.php">
                                <img src="../img/3.png" class="card-img-top" alt="Luminosidad del ambiente">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Luminosidad del ambiente</h5>
                                <p class="card-text">Lecturas obtenidas de la luminosidad dentro del invernadero</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card animate__animated animate__fadeIn">
                            <a href="frm_datos_temperatura_usuario.php">
                                <img src="../img/4.png" class="card-img-top" alt="Luminosidad del ambiente">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Temperatura Ambiente</h5>
                                <p class="card-text">Lecturas obtenidas de la Temperatura del invernadero</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sale & Revenue End -->  
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