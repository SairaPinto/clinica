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
    <link rel="stylesheet" href="styles/form.css">
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

    <section class="forms-section">
        <h1 class="section-title">¡Realiza tu cita!</h1>
        <div class="forms">
            <div class="form-wrapper is-active">
            <button type="button" class="switcher switcher-login">
                Cita Consulta
                <span class="underline"></span>
            </button>
            <form class="form form-login" action="logica/hacerCita.php" method="POST">
                <div class="input-block">
                    <label>Doctor</label>
                    <input name="doctor" id="doctor" type="text" required>
                </div>
                <div class="input-block">
                    <label>Fecha</label>
                    <input name="fecha" id="fecha" type="date" required>
                </div>
                <div class="input-block">
                    <label>Hora</label>
                    <input name="hora" id="hora" type="time" required>
                </div>
                <button name="submit" type="submit" class="btn-login">Hacer cita</button>
            </form>
            </div>

            <div class="form-wrapper">
            <button type="button" class="switcher switcher-signup">
                Cita Cirugia
                <span class="underline"></span>
            </button>
            <form class="form form-signup" action="logica/hacerCita.php" method="POST">
                <div class="input-block">
                    <label for="signup-email">Doctor</label>
                    <input name="name" id="signup-email" type="text" required>
                </div>
                <div class="input-block">
                    <label for="signup-email">Fecha</label>
                    <input name="fecha" id="fecha" type="date" required>
                </div>
                <div class="input-block">
                    <label>Hora</label>
                    <input name="hora" id="hora" type="time" required>
                </div>
                <button name="submit" type="submit" class="btn-signup">Hacer Cita</button>
            </form>
            </div>
        </div>
    </section>

    <input type="datetime">

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
        const switchers = [...document.querySelectorAll('.switcher')]

        switchers.forEach(item => {
            item.addEventListener('click', function() {
                switchers.forEach(item => item.parentElement.classList.remove('is-active'))
                this.parentElement.classList.add('is-active')
            })
        })
    </script>
</body>
</html>