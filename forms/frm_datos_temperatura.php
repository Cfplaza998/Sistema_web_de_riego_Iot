<?php
include('../head/head_admin.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container-xxl position-relative bg-white d-flex p-0">
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
                        <div class="bg-light rounded h-100 p-4">
                      <select id="selectorPaginas" onchange="irAPagina()">
                        <!--<option value="" disabled selected>Elige una opción</option>-->
                        <option value="frm_datos_humedad_suelo.php">Humedad del suelo</option>
                        <option value="frm_datos_humedad_ambiente.php">Humedad del Ambiente</option>
                        <option value="frm_datos_luminosidad.php">Luminosidad</option>
                        <option value="frm_datos_temperatura.php">Temperatura</option>
                        <!-- Agrega más opciones según sea necesario -->
                      </select>
                      
                  <script>
                    // Función para redirigir a la página seleccionada
                    function irAPagina() {
                      var selector = document.getElementById("selectorPaginas");
                      var paginaSeleccionada = selector.options[selector.selectedIndex].value;
                
                      // Almacena la selección en el almacenamiento local
                      localStorage.setItem("paginaSeleccionada", paginaSeleccionada);
                
                      // Redirige a la página seleccionada
                      if (paginaSeleccionada) {
                        window.location.href = paginaSeleccionada;
                      }
                    }
                
                    // Restaura la selección al cargar la página
                    window.onload = function() {
                      var selector = document.getElementById("selectorPaginas");
                      var paginaAlmacenada = localStorage.getItem("paginaSeleccionada");
                
                      if (paginaAlmacenada) {
                        // Busca la opción correspondiente y selecciónala
                        for (var i = 0; i < selector.options.length; i++) {
                          if (selector.options[i].value === paginaAlmacenada) {
                            selector.selectedIndex = i;
                            break;
                          }
                        }
                      }
                    };
                  </script>
                            <div class="bg-light rounded h-100 p-4">
                                <div class="mb-3">
                                    <label for="startDate" class="form-label">Fecha de inicio:</label>
                                    <input type="date" class="form-control" id="startDate">
                                </div>
                                <div class="mb-3">
                                    <label for="endDate" class="form-label">Fecha de fin:</label>
                                    <input type="date" class="form-control" id="endDate">
                                </div>
                                <button id="filterButton" class="btn btn-primary">Filtrar por fechas</button>

                                <table id="miTabla" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Fecha</th>
                                            <th>Sensor</th>
                                            <th>Temperatura</th>
                                            <!-- Agrega más columnas según tu base de datos -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

                                <a href="javascript:void(0);" onclick="exportToPDF()" class="btn btn-primary mb-2">
                                    Descargar Info
                                </a>

                            </div>

                            <!-- Scripts -->
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
                            <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
                            <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>


                             <script>
                                function exportToPDF() {
                                    var startDate = $('#startDate').val();
                                    var endDate = $('#endDate').val();
                            
                                    // Abre una nueva ventana para descargar el PDF
                                    window.open("../reportes/frm_imprimir_temperatura_ambiente.php?startDate=" + startDate + "&endDate=" + endDate);
                                }
                            
                               $(document).ready(function() {
                                    var tabla = $('#miTabla').DataTable({
                                        "ajax": {
                                            "url": "../recursos/get_info_temperatura.php",
                                            "dataSrc": ""
                                        },
                                        "columns": [
                                            { "data": "ID" },
                                            { "data": "fecha" },
                                            { "data": "sensor" },
                                            { "data": "temperatura_ambiente"},
                                            // Agrega más columnas según tu base de datos
                                        ]
                                    });

                                    // Evento de clic en el botón de búsqueda
                                    $('#searchButton').on('click', function(e) {
                                        e.preventDefault();
                                        tabla.search($('#search').val()).draw();
                                    });

                                    // Evento de clic en el botón de filtrar por fechas
                                    $('#filterButton').on('click', function() {
                                        var startDate = $('#startDate').val();
                                        var endDate = $('#endDate').val();

                                        // Filtrar por rango de fechas utilizando una función personalizada
                                        $.fn.dataTable.ext.search.push(
                                            function(settings, data, dataIndex) {
                                                var currentDate = data[1]; // La columna de fechas
                                                return (startDate === '' || endDate === '') || (moment(currentDate).isSameOrAfter(startDate) && moment(currentDate).isSameOrBefore(endDate));
                                            }
                                        );

                                        // Redibujar la tabla con el nuevo filtro
                                        tabla.draw();

                                        // Eliminar la función de búsqueda personalizada después de realizar el filtrado
                                        $.fn.dataTable.ext.search.pop();
                                    });
                                });
                            </script>

                        </div>
                    </div>
                </div>
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