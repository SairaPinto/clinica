<?php
session_start();
$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
</head>

<body>
    <header class="site-header inicio">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="#">
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

    <section class="contenedor seccion">
        <h2 class="fw-300 centrar-texto">¡Cuida tu salud!</h2>
        <div>
            <div class="icono">
                <img class="rotar" src="" id="imagen">
                <h4>Nuestros Valores</h4>
                <h5 class="fw-300">Somos un centro medico comprometido con la calidad y la
                     seguridad que con humanismo y pasión e​n servir​, 
                     satisfacemos las necesidades y expectativas de nuestros clientes.</h5>
            </div>
        </div>
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
    
    <script>
        /**
         * Array con las imagenes y enlaces que se iran mostrando en la web
         */
        var imagenes=new Array(
            ['img/d1.jpg'],
            ['img/hospital.jpg'],
            ['img/d2.png'],
            ['img/d3.jpg']
        );
        var contador=0;
     
        /**
         * Funcion para cambiar la imagen y link
         */
        function rotarImagenes()
        {
            // cambiamos la imagen y la url
            contador++
            document.getElementById("imagen").src=imagenes[contador%imagenes.length][0];
        }
        /**
         * Función que se ejecuta una vez cargada la página
         */
        onload=function()
        {
            // Cargamos una imagen aleatoria
            rotarImagenes();
            // Indicamos que cada 5 segundos cambie la imagen
            setInterval(rotarImagenes,4000);
        }
    </script>
</body>
</html>