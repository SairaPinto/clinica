<?php
require 'conexion.php';
session_start();

$tipo =  $_POST['tipo'];
$doctor = $_POST['doctor'];
$fecha = $_POST['fecha'];
$id = $_POST['id'];
$hora = $_POST['hora'];

$query = "SELECT COUNT(*) AS contar FROM cita WHERE fecha = '$fecha' && hora = '$hora' && doctor = '$doctor'";
$result = mysqli_query($conexion,$query);
$array = mysqli_fetch_array($result);

if($array['contar'] == 0){
    $query = "INSERT INTO `cita` (`id_cita`, `fecha`, `doctor`, `tipo`, `id_usuario`, `hora`)
    VALUES (NULL, '$fecha', '$doctor', '$tipo', $id, '$hora');";
    mysqli_free_result($result);
    $result=mysqli_query($conexion,$query);
    if($result == false){
        echo $query;
        echo '</br>No logro realizarse la query</br>';
    }
    else{
        header("Location: ../citas.php");
    }
}else{
    echo "</br>fecha ya esta en uso</br>";
}

?>