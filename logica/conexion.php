<?php

$servidor = '127.0.0.1';
$bd= 'hospital';
$usuario='root';
$password='';

$conexion= mysqli_connect($servidor,$usuario,$password);
if(!$conexion){
    exit("error al conectarse a mySql: ".mysqli_connect_error());
}
$db_selected = mysqli_select_db($conexion,$bd);
if(!$db_selected){
    exit("error al abrir la base de datos: ".mysqli_connect_error());
}

?>