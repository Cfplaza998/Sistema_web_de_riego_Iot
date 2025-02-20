<?php
include('../head/head_admin.php');
$mysqli = new mysqli("localhost", "u562010244_admin", "Cfplaza2018*", "u562010244_bd_smart_irrig");

$mensaje = "";
$id = isset($_GET['ID']) ? $_GET['ID'] : '';
$sensores = "SELECT * FROM tabla_sensores";
$guardar = $mysqli->query($sensores);
$m = "SELECT * FROM tabla_sensores WHERE ID = '$id'";
$modificar = $mysqli->query($m);
$dato = $modificar->fetch_array();

if (isset($_POST['modificar'])) {   
    $id = isset($_POST['ID']) ? $_POST['ID'] : '';
    $mensaje = "";
    $fecha = $mysqli->real_escape_string($_POST['fecha']);
    $sensor = $mysqli->real_escape_string($_POST['sensor']);
    $area_trabajo = $mysqli->real_escape_string($_POST['area_trabajo']);
    $estado = $mysqli->real_escape_string($_POST['estado']);

    $actualiza = "UPDATE tabla_sensores SET fecha = '$fecha', sensor ='$sensor', area_trabajo='$area_trabajo', estado ='$estado' WHERE ID ='$id'";
    $actualizar = $mysqli->query($actualiza);
    
    if ($actualizar > 0) {
        $mensaje .= "<div class='alert alert-primary text-success text-center' role='alert'> Tu registro se modificó con éxito</div>";
    } else {
        $mensaje .= "<h3 class='text-success'> Tu registro no se modificó con éxito</h3>";
    }

    // ob_start(); // Inicia el búfer de salida
    // header("location:frm_modificar_sensores.php");
    // ob_end_flush(); // Envia el búfer y limpia
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- ... (tus metadatos y enlaces a estilos) ... -->
</head>

<body>
    <div class="container mt-5">
        <header class="pb-3 mb-4 border-bottom">
            <!-- ... (tu encabezado HTML) ... -->
        </header>
        <main>
            <br>
            <?php echo $mensaje; ?>
            <div class="container">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="ID" value="<?php echo isset($dato['ID']) ? $dato['ID'] : ''; ?>">
                    <div class="col-12">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="text" name="fecha" class="form-control" id="fecha" value="<?php echo isset($dato['fecha']) ? $dato['fecha'] : ''; ?>" placeholder="Fecha">
                    </div>
                    <div class="col-12">
                        <label for="sensor" class="form-label">Sensor</label>
                        <select id="sensor" name="sensor" class="form-select" value="<?php echo isset($dato['sensor']) ? $dato['sensor'] : ''; ?>" placeholder="Sensor">
                            <option value="DHT11">Sensor de humedad del ambiente</option>
                            <option value="DHT11">Sensor de temperatura del ambiente</option>
                            <option value="LDR">Sensor luminico</option>
                            <option value="YL-69">Sensor de Tierra</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="area_trabajo" class="form-label">Área de Trabajo</label>
                        <select id="area_trabajo" name="area_trabajo" class="form-select" value="<?php echo isset($dato['area_trabajo']) ? $dato['area_trabajo'] : ''; ?>" placeholder="Área de Trabajo">
                            <option value="Cama #1">Cama #1</option>
                            <option value="Cama #2">Cama #2</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="estado" class="form-label">Estado</label>
                        <select id="estado" name="estado" class="form-select" value="<?php echo isset($dato['estado']) ? $dato['estado'] : ''; ?>" placeholder="Estado">
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                    <br>
                    <div class="d-grid gap-2">
                        <button type="submit" name="modificar" class="btn btn-outline-warning btn-rounded fa-x5, fa-lg"> <i class="fa-solid fa-pen-to-square"></i>&nbsp;Modificar</button>
                    </div>
                    <br>
                    <div class="d-grid gap-2">
                        <a href="frm_datos_sensores.php" class="btn_cerrar btn btn-outline-info btn-rounded mb-3">Cerrar</a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>

</html>
