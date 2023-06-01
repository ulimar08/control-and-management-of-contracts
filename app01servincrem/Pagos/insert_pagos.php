<?php

include "configuracion.php";

$con = configuracion();
        $id_usuario = $_POST["id_usuario"];
        $id=null;
        $id_cedula = $_POST["id_cedula"];
        $fecha = $_POST ["fecha"];
        $monto = $_POST ["monto"]; 
        $estatus = $_POST ["estatus"];
        
        $sql = "INSERT INTO pagos VALUES ('$id','$id_cedula','$fecha', '$monto', '$estatus')";
        
        $query = mysqli_query($con, $sql);

        if ($query==1) {
            
            header("Location: ./pagos.php?id=" . $id_usuario);
            
            exit;
        } 

?>