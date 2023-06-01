<?php
include "views/configuracion.php";

$con = configuracion();
session_start();
$_SESSION['usuario']= $usuario;
$usuario = $_POST["usuario"];
$contraseña = $_POST["contraseña"];



$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' and contraseña='$contraseña'";

$query = mysqli_query($con, $sql);

$nr= mysqli_fetch_array($query);


if($nr['id_rol'] == 1){  //administrador
    
    header ("location:busquedayregistro.php");

} else
    if( $nr['id_rol'] == 2){
    header("location:views/colaborador/buscadorColab.php");

} else

    if ($nr['id_rol'] == 3) {
        
    header("location:views/lector/buscadorLec.php");
        
}else{
    
    header("location:login.php");
    
}


?>