<?php
require 'conexion.php';
session_start();

$name = $_POST['name'];
$email = $_POST['email2'];
$password = $_POST['passw'];

$query = "SELECT COUNT(*) AS contar FROM usuarios WHERE EMAIL = '$email'";
$result = mysqli_query($conexion,$query);
$array = mysqli_fetch_array($result);

if($array['contar'] == 0){
    $query = "INSERT INTO usuarios (ID_USUARIO, NAME, EMAIL, PASSW) VALUES (NULL, '$name', '$email', '$password')";
    mysqli_free_result($result);
    $result=mysqli_query($conexion,$query);
    if($result == false){
        echo $query;
        echo '</br>No logro realizarse la query</br>';
    }
    else{
        header("Location: ../login.php");
    }
}else{
    echo "</br>Correo ya esta registrado</br>";
}

?>