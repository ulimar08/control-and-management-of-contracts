<?php

include "configuracion.php";

$con = configuracion();

$id_usuario = $_GET['id'];
$id = $_GET['id'];
$id_cedula = $_GET['id'];





$sql = "SELECT * FROM datoscontratante WHERE id='$id' ";

$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

$sql1 = "SELECT datoscontratante.id, datoscontratante.cedulaC, pagos.fecha, pagos.monto, pagos.estatus
FROM datoscontratante
LEFT JOIN pagos ON datoscontratante.cedulaC = pagos.id_cedula WHERE datoscontratante.id = '$id'";

$result = $con->query($sql1);



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PAGOS</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="pagos.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
</head>

<body>
  <h1 class="principal">SERVINCREM C.A</h1>
  <div class="container" id="container1">
    <h2 class="titulo text-center">Registro de Pago</h2>
    <form action="insert_pagos.php" method="POST">

    <div class="mb-3">
        <input type="hidden" class="form-control" placeholder="Cedula" aria-label="Cedula" name="id_usuario" value="<?= $row['id']   ?>">
      </div>

      <div class="mb-3">
        <input type="hidden" class="form-control" placeholder="Cedula" aria-label="Cedula" name="id_cedula" value="<?= $row['cedulaC']   ?>">
      </div>
      <div class="mb-3">
        <label for="fecha" class="form-label">Fecha</label>
        <input type="date" class="form-control" aria-describedby="fecha" name="fecha" />
      </div>

      <div class="mb-3">
        <label for="Monto" class="form-label">Monto</label>
        <input type="Monto" class="form-control" name="monto" />
      </div>
      <br>

      <div class="mb-3">
        <select class="form-select" aria-label="Default select example" name="estatus">
          <option selected>Estado de Pago</option>
          <option value="Pagado">Pagado</option>
          <option value="Rechazado">Rechazado</option>
          <option value="Proceso de Cobranza">Proceso de Cobranza</option>
          <option value="No Afiliado">No Afiliado</option>
        </select>

      </div>
      <button type="submit" class="btn btn-primary">Registrar</button>
      <button type="button"   class="btn btn-primary" onclick="mostrarTabla()">Mostrar Historial</button>


    </form>
    
  </div>
<br><br>
  
<br><br>
  <div class="container bg-light pt-3 mb-2 p-4 rounded-2" id="mi-tabla">
    <h3 class="text-center">Historial de Pagos </h3>
    <table class="table table-light table-bordered border-dark table-hover align-middle text-center table-responsive" style="border-radius: 5px; border-collapse: collapse; overflow: hidden;">
      <thead class="table-dark border-dark">
        <tr>
          <th style="text-align: center" hidden>ID</th>
          <th style="text-align: center" hidden>Cedula</th>
          <th style="text-align: center ; width:30%">Fecha</th>
          <th style="text-align: center ; width:30%">Monto</th>
          <th style="text-align: center; width:30%" >Estado de Pago</th>
        </tr>
      </thead>

      <tbody class="table-group-divider">
       
        
         
          <?php
           if ($result->num_rows > 0) {
            while ($row1 = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td hidden>" . $row1["id"] . "</td>";
              echo "<td hidden>" . $row1["cedulaC"] . "</td>";
              if ($row1["fecha"] !== null) {
                echo "<td>" . $row1["fecha"] . "</td>";
              } else {
                echo "<td>No hay registro de pagos</td>";
              }
              if ($row1["monto"] !== null) {
                echo "<td>" . $row1["monto"] . "</td>";
              } else {
                echo "<td>No hay registro de pagos</td>";
              }
              if ($row1["estatus"] !== null) {
                echo "<td>" . $row1["estatus"] . "</td>";
              } else {
                echo "<td>No hay registro de pagos</td>";
              }
              echo "</tr>";
            }
          } 
        
          ?>
         
      
      </tbody>
      
    </table>
  </div>


  <script>
    function ocultarTabla() {
      var tabla = document.getElementById("mi-tabla");
      tabla.style.display = "none";
    }
  </script>

  <script>
    function mostrarTabla() {
      var tabla = document.getElementById("mi-tabla");
      tabla.style.display = "block";
    }
  </script>

<script>
  // Selecciona el formulario y agrega un event listener al evento 'submit'
  const form = document.querySelector('form');
  form.addEventListener('submit', (event) => {
    // Previene el comportamiento por defecto del formulario
    event.preventDefault();
    // Envía el formulario utilizando fetch API
    fetch(form.action, {
      method: form.method,
      body: new FormData(form)
    })
    // Si el envío del formulario fue exitoso, muestra una alerta de éxito
    .then(response => {
      if (response.ok) {
        Swal.fire({
          title: 'Pago registrado con exito!',
          icon: 'success',
          confirmButtonText: 'OK'
        }).then(() => {
          location.reload(); // Actualiza la página después de cerrar la alerta
        });
      }
    });
  });
</script>

</body>

</html>