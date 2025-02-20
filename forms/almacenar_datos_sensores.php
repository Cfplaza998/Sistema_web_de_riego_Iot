<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "u562010244_admin";
$password = "Cfplaza2018*";
$dbname = "u562010244_bd_smart_irrig";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Procesamiento del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los valores enviados por el formulario
    $fecha = $conn->real_escape_string($_POST["fecha"]);
    $sensor = $conn->real_escape_string($_POST["sensor"]);
    $area_trabajo = $conn->real_escape_string($_POST["area_trabajo"]);
    $estado = $conn->real_escape_string($_POST["estado"]);

    // Preparar la consulta SQL para insertar los datos en la tabla
    $sql = "INSERT INTO tabla_sensores (fecha, sensor, area_trabajo, estado) VALUES ('$fecha', '$sensor', '$area_trabajo', '$estado')";

    if ($conn->query($sql) === TRUE) {
        // Mostrar notificación en el navegador
        echo "<script>alert('El sensor se ha agregado correctamente.');</script>";
        // Redireccionar a la página del formulario después de 2 segundos
        echo "<script>setTimeout(function() { window.location.href = 'frm_crear_sensor.php'; }, 1000);</script>";
    } else {
        echo "Error al agregar el sensor: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
