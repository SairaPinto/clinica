<?php
require 'conexion.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT COUNT(*) AS contar FROM usuarios WHERE EMAIL = '$email' AND PASSW = '$password'";
$result = mysqli_query($conexion,$query);
$array = mysqli_fetch_array($result);

if($array['contar'] > 0){
    $_SESSION['usuario']=$email;
    header("Location: ../paginainicio.php");
}else{
    echo "Datos incorrectos";
}

$sql = "SELECT ROL FROM usuarios WHERE EMAIL = '$email'";
$result = mysqli_query($conexion,$sql);
$rol = mysqli_fetch_array($result);
echo $rol['ROL'];
$_SESSION['rol']= $rol['ROL'];

?>