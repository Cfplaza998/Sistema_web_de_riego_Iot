<?php
session_start();

// if (!isset($_SESSION['usuario'])) {
//     header('Location: ../index.php');
//     exit();
// }

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>SmartIrrigation - Inicio</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">

    <script defer src="../recursos/highlight-nav.js"></script>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">

<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
    <a href="#" class="navbar-brand mx-4 mb-3">
    <!-- Reemplazar el icono con una imagen de tu logo -->
    <img src="../img/logo.png" alt="Logo" class="logo-img" style="width: 190px;">
    <h3 class="text-primary"></h3>
    </a>

        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="../img/user.png" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <?php echo $_SESSION['usuario']; ?>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="../forms_user/frm_monitoreo_usuario.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Monitoreo</a>
            <div class="nav-item dropdown">
                <a href="../forms_user/frm_datos_invernadero_usuario.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Informes</a>
            </div>
            <a href="../forms_user/frm_datos_sensores_usuario.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Sensores</a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
        <!-- Content Start -->
        <div class="content">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
        <a href="head_user.php" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"></i></h2>
        </a>
        <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa fa-bars"></i>
        </a>
        <form class="d-none d-md-flex ms-4">
            <input class="form-control border-0" type="search" placeholder="Search">
        </form>
        <div class="navbar-nav align-items-center ms-auto">
            <div class="nav-item dropdown">
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img class="rounded-circle me-lg-2" src="../img/user.png" alt="" style="width: 40px; height: 40px;">
                    <?php echo $_SESSION['usuario']; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <a href="../recursos/logic_logout.php" class="dropdown-item">Cerrar Sesion</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->   
</body>