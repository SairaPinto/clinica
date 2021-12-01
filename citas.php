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
                <a href="paginainicio.php">
                    <img class="img-barra" src="img/PintoLogoB.png" alt="Logo">
                </a>

                <nav class="navegacion">
                    <a href="#">
                        <?php echo 'User: ', $usuario;?>
                    </a>
                    <a href="#">Hacer cita</a>
                    <a href="#">Admin</a>
                    <a href="logica/logout.php">Cerrar Sesion</a>
                </nav>
            </div><!--barra-->
        </div><!--contenedor-->
    </header>
    <section class="contenedor">
        <?php
            require 'logica/conexion.php';

            $idSession=$_SESSION['usuario'];
                $sql="SELECT *
                    FROM usuarios
                    WHERE EMAIL='$idSession'";
                $res=mysqli_query($conexion,$sql);
                $num=mysqli_fetch_assoc($res);

                $query = "SELECT * from doctores where cirujano = '1'";
                $res = mysqli_query($conexion,$query);
                $doctores = mysqli_fetch_assoc($res);

        ?>
        <h1>¡Realiza tu cita!</h1>
        <div>
            <h4>Cita</h4>
            <form action="logica/hacerCita.php" method="POST">
                <div>
                    <input name="id" type="hidden" value="<?php echo $num['ID_USUARIO'];  ?>">
                </div>
                <div>
                <label>Tipo de cita</label>
                    <select name="tipo">
                        <option value="0">consulta</option>
                        <option value="1">cirugia</option>
                    </select>
                </div>
                <div>
                    <label>Doctor</label>
                    <input name="doctor" id="doctor" type="text" required>
                </div>
                <div>
                    <label>Fecha</label>
                    <input name="fecha" id="fecha" type="date" required>
                </div>
                <div>
                    <label>Hora</label>
                    <input name="hora" id="hora" type="time" required>
                </div>
                <button name="submit" type="submit" class="btn-login">Hacer cita</button>
            </form>
        </div>
    </section>

    <section class="contenedor">
        <h1>mis citas</h1>
        <?php
        $id=$num['ID_USUARIO'];
		$sql= "SELECT * FROM cita WHERE id_usuario = $id";

		$res=mysqli_query($conexion,$sql);
        $fila=mysqli_fetch_assoc($res);
        
		?>
    <div id="tabla">
	 <table>
        <thead>
                <th>Tipo</th><th>Doctor</th><th>Fecha</th><th>Hora</th><th>Usuario</th>
        </thead>
	 	<?php  
	 		do 
	 		{
	 	?>
	 	<tr>
	 		<td><?php echo $fila['tipo'] ?></td>
			<td><?php echo $fila['doctor'] ?></td>
            <td><?php echo $fila['fecha'] ?></td>
            <td><?php echo $fila['hora'] ?></td>
            <td><?php echo $fila['id_usuario'] ?></td>
	 	</tr>
	 	<?php
	 		}while($fila= mysqli_fetch_assoc($res)); 
	 	 ?>
    </section>
</body>
</html>