<?php
include "configuracion.php";

$con = configuracion();

        //datos contratante¨
        $id = null;
        $cedulaC = $_POST ["cedulaC"];  
        $nombresC = $_POST ["nombresC"];
        $apellidosC = $_POST ["apellidosC"]; 
        $telefonoC = $_POST ["telefonoC"];
        $edadC = $_POST ["edadC"];
        

        //datos cargas familiares

        //  #1

        $nombresF1 = $_POST ["nombresF1"];
        $apellidosF1 = $_POST ["apellidosF1"];
        $cedulaF1 = $_POST ["cedulaF1"];   
        $edadF1 = $_POST ["edadF1"];
        $parentescoF1 = $_POST ["parentescoF1"];
        $servicioF1 = $_POST ["servicioF1"];

         //  #2

        $nombresF2 = $_POST ["nombresF2"];
        $apellidosF2 = $_POST ["apellidosF2"];
        $cedulaF2 = $_POST ["cedulaF2"];   
        $edadF2 = $_POST ["edadF2"];
        $parentescoF2 = $_POST ["parentescoF2"];
        $servicioF2 = $_POST ["servicioF2"];

          //  #3

        $nombresF3 = $_POST ["nombresF3"];
        $apellidosF3 = $_POST ["apellidosF3"];
        $cedulaF3 = $_POST ["cedulaF3"];   
        $edadF3 = $_POST ["edadF3"];
        $parentescoF3 = $_POST ["parentescoF3"];
        $servicioF3 = $_POST ["servicioF3"];
        

        // # 4

        $nombresF4 = $_POST ["nombresF4"];
        $apellidosF4 = $_POST ["apellidosF4"];
        $cedulaF4 = $_POST ["cedulaF4"];   
        $edadF4 = $_POST ["edadF4"];
        $parentescoF4 = $_POST ["parentescoF4"];
        $servicioF4 = $_POST ["servicioF4"];

        // # 5
        $nombresF5 = $_POST ["nombresF5"];
        $apellidosF5 = $_POST ["apellidosF5"];
        $cedulaF5 = $_POST ["cedulaF5"];   
        $edadF5 = $_POST ["edadF5"];
        $parentescoF5 = $_POST ["parentescoF5"];
        $servicioF5 = $_POST ["servicioF5"];

        // # 6

        $nombresF6 = $_POST ["nombresF6"];
        $apellidosF6 = $_POST ["apellidosF6"];
        $cedulaF6 = $_POST ["cedulaF6"];   
        $edadF6 = $_POST ["edadF6"];
        $parentescoF6 = $_POST ["parentescoF6"];
        $servicioF6 = $_POST ["servicioF6"];


        // # 7

        $nombresF7 = $_POST ["nombresF7"];
        $apellidosF7 = $_POST ["apellidosF7"];
        $cedulaF7 = $_POST ["cedulaF7"];   
        $edadF7 = $_POST ["edadF7"];
        $parentescoF7 = $_POST ["parentescoF7"];
        $servicioF7 = $_POST ["servicioF7"];

        $datosPago = $_POST ["datosPago"];



        $sql = "INSERT INTO datoscontratante VALUES ('$id','$cedulaC', '$nombresC', '$apellidosC', '$telefonoC', '$edadC', 
        '$nombresF1', '$apellidosF1', '$cedulaF1', '$edadF1', '$parentescoF1','$servicioF1',
        '$nombresF2', '$apellidosF2', '$cedulaF2', '$edadF2', '$parentescoF2','$servicioF2',
        '$nombresF3', '$apellidosF3', '$cedulaF3', '$edadF3', '$parentescoF3','$servicioF3',
        '$nombresF4', '$apellidosF4', '$cedulaF4', '$edadF4', '$parentescoF4','$servicioF4',
        '$nombresF5', '$apellidosF5', '$cedulaF5', '$edadF5', '$parentescoF5','$servicioF5',
        '$nombresF6', '$apellidosF6', '$cedulaF6', '$edadF6', '$parentescoF6','$servicioF6',
        '$nombresF7', '$apellidosF7', '$cedulaF7', '$edadF7', '$parentescoF7','$servicioF7','$datosPago')";

        $query = mysqli_query($con, $sql);

        if ($query==1) {
            header("location: buscador.php");
        } 
    
        

        


        
?>