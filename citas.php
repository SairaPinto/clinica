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
        padding: 1.5rem;
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

    <section class="contenedor">
        <?php
            require 'logica/conexion.php';

            $idSession=$_SESSION['usuario'];
                $sql="SELECT *
                    FROM usuarios
                    WHERE EMAIL='$idSession'";
                $res=mysqli_query($conexion,$sql);
                $num=mysqli_fetch_assoc($res);

                

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
                <?php
                    $sql= "SELECT * FROM doctores";

                    $res=mysqli_query($conexion,$sql);
                    $fila=mysqli_fetch_assoc($res);
                ?>
                    <label>Doctor</label>
                    <select name="doctor">
                        <?php  
                            do{ ?>
                            <option value="<?php echo $fila['id_doctor'] ?>">
                                <?php echo $fila['name']."-"; echo $fila['especialidad'];?>
                            </option>
                        <?php
                            }while($fila= mysqli_fetch_assoc($res)); 
                        ?>
                    </select>
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
        <h1>Mis citas</h1>
        <?php
        $id=$num['ID_USUARIO'];
		$sql= "SELECT * FROM cita WHERE id_usuario = $id";

		$res=mysqli_query($conexion,$sql);
        $fila=mysqli_fetch_assoc($res);
        
		?>
        <div id="tabla">
        <table class="rounded">
            <thead>
                    <th>Tipo</th><th>Doctor</th><th>Fecha</th><th>Hora</th><th>Usuario</th>
            </thead>
            <?php  
                do 
                {
            ?>
            <tr>
                <td><?php
                    echo $fila['tipo'] == 0 ? "Consulta" : "Cirugia";
                ?></td>
                <td><?php 
                    $id = $fila['doctor'];
                    $query= "SELECT * FROM doctores WHERE id_doctor = $id";
                    $result=mysqli_query($conexion,$query);

                    $id=mysqli_fetch_assoc($result);
                    echo $id['name'];
                ?></td>
                <td><?php echo $fila['fecha'] ?></td>
                <td><?php echo $fila['hora'] ?></td>
                <td><?php 
                    $id = $fila['id_usuario'];
                    $query= "SELECT * FROM usuarios WHERE ID_USUARIO = $id";
                    $result=mysqli_query($conexion,$query);

                    $id=mysqli_fetch_assoc($result);
                    echo $id['NAME'];
                ?></td>
            </tr>
            <?php
                }while($fila= mysqli_fetch_assoc($res)); 
            ?>
          </table>
        </div>
    </section>
    <br> <br> <br>

    <script>
        function ocultar(){
            var tipo = document.getElementById("tipo").value;
            if(tipo == 0){
                document.getElementById("cirugia").style.display = "none";
            }else{
                document.getElementById("consulta").style.display = "none";
            }
        }
    </script>
</body>
</html>