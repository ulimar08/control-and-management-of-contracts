<?php
include "configuracion.php";

$con = configuracion();

$sql = "SELECT * FROM pagos";

$query = mysqli_query($con, $sql);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtro para Pagos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./style1.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css" />



</head>


<body>
    <div>
        <nav class="navbar navbar-dark bg-dark ">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">SERVINCREM C.A</span>
                <ul class="nav justify-content-end nav-bordered">
                    <li class="nav-item">
                        <a class="navbar-brand mb-0 h1" aria-current="page" href="../views/buscador.php">Buscador Contratos</a>

                </ul>
            </div>

        </nav>
    </div>

    <br><br><br>

    <div class="container pt-3 mb-2 p-4" id="tabla">
        <h3 class="display-6 text-center">Historial de Pagos</h3><br>

  

        <div class="container text-center " id="select">
            <div class="row g-2">
                <div class="col-md">
                    
                    <label for="payment-status-filter" class="form-label">Estados de pago:</label>
                        <select id="payment-status-filter" class="form-control-sm" >
                            <option selected value="">Todos</option>
                            <option value="Pagado">Pagado</option>
                            <option value="Rechazado">Rechazado</option>
                            <option value="Proceso de cobranza">Proceso de cobranza</option>
                            <option value="No afiliado">No afiliado</option>
                        </select>
                        
                    
                </div>

                <div class="col-md ">
                    <div class=""> 
                        <label for="min">Desde:</label>
                        <input type="date" id="min" name="min" class="form-control-sm">
                        
                    </div>
                </div>

                <div class="col-md">
                    <div class="">
                        <label for="max">Hasta:</label>
                        <input type="date" id="max" name="max" class="form-control-sm" >
                        
                    </div>
                </div>

                


            </div>

        </div>

    

        <hr class="border border-dark border-3 opacity-75">


      

        <table class="table table-bordered border-dark table-hover align-middle text-center" id="myTable">
            <thead class="table-dark border-dark">
                <tr>
                    <td style="text-align: center">ID</td>
                    <td style="text-align: center">Cedula</td>
                    <td style="text-align: center">Fecha</td>
                    <td style="text-align: center">Monto</td>
                    <td style="text-align: center">Estado de Pago</td>


                </tr>

            </thead>


            <tbody class="">
                <?php

                while ($row = mysqli_fetch_array($query)) :
                ?>
                    <tr class="">
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['id_cedula'] ?></td>
                        <td><?= $row['fecha'] ?></td>
                        <td><?= $row['monto'] ?></td>
                        <td><?= $row['estatus'] ?></td>

                    </tr>
                <?php endwhile;
                ?>
            </tbody>

        </table>


    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>



    <script>
        $(document).ready(function() {
            var table = $('#myTable').DataTable({language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json',
                },});

            // Event listener para los inputs de fecha
            $('.form-control-sm').on('change', function() {
                table.draw();
            });

            // Agregamos un filtro personalizado para filtrar por fecha
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var min = $('#min').val();
                    var max = $('#max').val();
                    var date = data[2]; // Columna de fecha en la tabla

                    if (
                        (min == "" || max == "") ||
                        (moment(date).isSameOrAfter(min) && moment(date).isSameOrBefore(max))
                    ) {
                        return true;
                    }
                    return false;
                }
            );
        });
    </script>

    <script>
        /*$(document).ready(function() {
            $('#myTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json',
                },
            });
        });*/ 
    </script>

    <script>
        $(document).ready(function() {
            var table = $('#myTable').DataTable();
            
            $('#payment-status-filter').on('change', function() {
                table.column(4).search(this.value).draw();
                
            });
        });
       
    </script>

    <script>
        
    </script>
    
</body>

</html>