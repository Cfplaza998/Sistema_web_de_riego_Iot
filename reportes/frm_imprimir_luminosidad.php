<?php
// Incluye la clase FPDF
require('../fpdf/fpdf.php');

// Verifica que se proporcionen las fechas
if (isset($_GET['startDate']) && isset($_GET['endDate'])) {
    // Obtén las fechas filtradas desde la URL (ajusta la validación según tus necesidades)
    $startDate = $_GET['startDate'];
    $endDate = $_GET['endDate'];

    // Conecta a tu base de datos (ajusta los detalles según tu configuración)
    $servername = "localhost";
    $username = "u562010244_admin";
    $password = "Cfplaza2018*";
    $dbname = "u562010244_bd_smart_irrig";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Realiza la consulta SQL para obtener los datos filtrados
    $sql = "SELECT ID, fecha, sensor, luminosidad FROM tabla_datos_luminosidad WHERE fecha BETWEEN '$startDate' AND '$endDate'";
    $result = $conn->query($sql);

    // Configuración del PDF
    class PDF extends FPDF
    {
        function Header()
        {
            // Logo
            $this->Image('logo (2).png', 0, 0, 220);
            $this->SetFont("Arial", "B", 16);
            // título
            $this->Cell(50);
            $this->SetFillColor(71, 221, 53 );
            $this->SetTextColor(0, 0, 0);
            $this->SetX(60);
            $this->Cell(100, 80, utf8_decode("Reporte de Luminosidad"), 0, 0, "C", 0);

            // Fecha
            $this->SetFont("Arial", "B", 12);
            $this->SetX(160);
            $this->SetY(60);
            $this->Cell(35, 10, "Fecha: " . date("d/m/Y"), 0, 1, "C");

            // Salto de línea
            $this->Ln(5);
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(20, 10, 'ID', 1, 0, 'C', 1);
            $this->Cell(50, 10, 'Fecha', 1, 0, 'C', 1);
            $this->Cell(50, 10, 'Sensor', 1, 0, 'C', 1);
            $this->Cell(70, 10, 'Luminosidad del Ambiente', 1, 0, 'C', 1);
            $this->Ln();
        }

        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 12);
            $this->Cell(0, 10, utf8_decode('Página') . $this->PageNo(), 0, 0, 'R');
        }
    }
    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);

    // Crea la tabla en el PDF
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(20, 10, $row['ID'], 1);
        $pdf->Cell(50, 10, $row['fecha'], 1);
        $pdf->Cell(50, 10, $row['sensor'], 1);
        $pdf->Cell(70, 10, $row['luminosidad'], 1);
        $pdf->Ln();
    }

    // Guarda el archivo PDF en el servidor o envía al navegador
    ob_clean();  // Limpiar el búfer de salida
    header('Content-Type: application/pdf');
    $pdf->Output();
    exit();

    // Cierra la conexión a la base de datos
    $conn->close();
} else {
    // Si no se proporcionan las fechas, redirige o muestra un mensaje de error
    header('Location: ../ruta_a_tu_pagina_de_error.php');
    exit();
}
?>
