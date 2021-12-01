<?php
$usuario = $_SESSION['usuario'];
$rol = $_SESSION['rol'];

echo $usuario;

echo $rol;

?>
<header class="site-header inicio">
    <div class="contenedor contenido-header">
        <div class="barra">
            <a href="paginainicio.php">
                <img class="img-barra" src="img/PintoLogoB.png" alt="Logo">
            </a>

            <nav class="navegacion">
                <a href="#">
                    <?php echo 'User: ', $usuario;?>
                </a>
                <?php
                    if($rol == 1){
                        echo "<a href='citas.php'>Hacer cita</a>";
                    }else if($rol == 0){
                        echo "<a href='admin.php'>Admin</a>";
                        echo "<a href='listaDoctores.php'>Doctores</a>";
                        echo "<a href='listaClientes.php'>Clientes</a>";
                    }
                ?>
                <a href="logica/logout.php">Cerrar Sesion</a>
            </nav>
        </div><!--barra-->  
        
    </div><!--contenedor-->
</header>