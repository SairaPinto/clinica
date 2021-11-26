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

<body>
    <header class="site-header">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.php">
                    <img class="img-barra" src="img/PintoLogoB.png" alt="Logo">
                </a>

                <nav class="navegacion">
                    <a href="#">
                        <?php echo 'User: ', $usuario;?>
                    </a>
                    <a href="#">Mis datos</a>
                    <a href="#">Hacer cita</a>
                    <a href="#">Admin</a>
                    <a href="logica/logout.php">Cerrar Sesion</a>
                </nav>
            </div><!--barra-->
        </div><!--contenedor-->
    </header>

    <section>

        <table>
            <tr>
                <td>id</td>
                <td>horas</td>
                <td>doctor</td>
                <td>paciente</td>
            </tr>
            <?php
                require 'logica/conexion.php';
                $result = mysqli_query($conexion, "SELECT * FROM horarios");
                while($mostrar = mysqli_fetch_array($result)){
            ?>
                    <tr>
                        <td><?php echo $mostrar['id'] ?></td>
                        <td><?php echo $mostrar['horas'] ?></td>
                        <td><?php echo $mostrar['doctor'] ?></td>
                        <td><?php echo $mostrar['paciente'] ?></td>
                    </tr>
            <?php
                }
            ?>
        </table>
        <form action="logica/hacercita.php" method="POST">
            <input type="text" id="idCita">
            <button name="submit" type="submit" class="btn-login">hacer cita</button>
        </form>

    </section>

    <footer class="site-footer seccion">
        <div class="contenedor contenedor-footer">
            <p class="copyright">Saira Pinto Huizar</p>
            <p class="copyright">Programacion para internet</p>
            <p class="copyright">Seccion D15</p>
            <p class="copyright">Ingenieria Informatica</p>
            <p class="copyright">CUCEI</p>
        </div>
    </footer>
</body>
</html>