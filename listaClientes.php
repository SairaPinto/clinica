<?php
session_start();
$usuario = $_SESSION['usuario'];

if(!isset($usuario)){
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cita</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
</head>
<style>
    #tabla{
        margin: auto;
        margin-top: 40px;
        width: 100%;
    }
    .rounded{
        background:white;
        text-align: left;
        border-collapse: collapse;
        border-spacing: 10;
        border-radius: 25px;
        -moz-border-radius: 15px;
        -webkit-border-radius: 15px;
        width: 75%;
    }
    th, td{
        padding: 15px;
    }
    thead{
        background: #2997c3;
    }
    tr:nth-child(even){
        background-color: #ddd;
    }
</style>
<body>
    <?php include "logica/headerOthers.php"; ?>
    <?php require 'logica/conexion.php'; ?>
    <section class="contenedor">
        <h1>Mis citas</h1>
        <?php
            $sql= "SELECT * FROM usuarios WHERE ROL = '1'";

            $res=mysqli_query($conexion,$sql);
            $fila=mysqli_fetch_assoc($res);
		?>
        <div id="tabla">
            <table align=center class="rounded">
                <thead>
                        <th>Id Usuario</th><th>Nombre</th><th>Mail</th>
                </thead>
                <?php  
                    do 
                    {
                ?>
                <tr>
                    <td><?php echo $fila['ID_USUARIO']; ?></td>
                    <td><?php echo $fila['NAME']; ?></td>
                    <td><?php echo $fila['EMAIL']; ?></td>
                </tr>
                <?php
                    }while($fila= mysqli_fetch_assoc($res)); 
                ?>
            </table>
        </div>
        <br> <br> <br> <br>
    </section>
</body>
</html>