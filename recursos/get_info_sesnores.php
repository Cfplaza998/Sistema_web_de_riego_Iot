<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "*";
$dbname = "bd_smart_irrig";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener datos
$sql = "SELECT * FROM tabla_sensores";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Devuelve los datos en formato JSON
echo json_encode($data);

$conn->close();
?>
