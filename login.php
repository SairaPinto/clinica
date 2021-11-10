<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/form.css">
</head>

<body>
    <header class="site-header">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img class="img-barra" src="img/PintoLogoB.png" alt="Logo">
                </a>

                <nav class="navegacion">
                    <a href="about.html">Sobre Nosotros</a>
                </nav>
            </div><!--barra-->
        </div><!--contenedor-->
    </header>

    <main>
        <section class="forms-section">
            <h1 class="section-title">Bienvenido</h1>
            <div class="forms">
              <div class="form-wrapper is-active">
                <button type="button" class="switcher switcher-login">
                  Login
                  <span class="underline"></span>
                </button>
                <form class="form form-login" action="" method="POST">
                  <fieldset>
                    <legend>Please, enter your email and password for login.</legend>
                    <div class="input-block">
                      <label for="login-email">E-mail</label>
                      <input name="email" id="login-email" type="email" required>
                    </div>
                    <div class="input-block">
                      <label for="login-password">Password</label>
                      <input name="password" id="login-password" type="password" required>
                    </div>
                  </fieldset>
                  <button name="submit" type="submit" class="btn-login">Login</button>
                </form>
              </div>

              <?php
              include ("DBconnection.php");
              if(isset($_POST['submit'])){
                $email= $_POST['email'];
                $contra= $_POST['password'];
                
                $query= "select * from usuarios where email ='$email'";
                $result=mysqli_query($conexion,$query);
                if($result==false)
                  echo '</br> Error en query';
                else{
                  if(mysqli_num_rows($result)==0){
                    echo '</br> <p>no se encontró ningun usuario con ese email</p>';
                  }else{
                    $consulta=mysqli_fetch_array($result);
                    if ($consulta['contrasenia']!=$contra)
                      echo '</br> <p>contraseña incorrecta</p>';
                    else{
                      $_SESSION["usuario"]=$email;
                      $_SESSION["nombre"]=$nombre;
                      header("Location: indexProyecto.php");
                    }
                  }
                }
              }
              mysqli_close($conexion);
              ?>

              <div class="form-wrapper">
                <button type="button" class="switcher switcher-signup">
                  Sign Up
                  <span class="underline"></span>
                </button>
                <form class="form form-signup">
                  <fieldset>
                    <legend>Please, enter your email, password and password confirmation for sign up.</legend>
                    <div class="input-block">
                        <label for="signup-email">Nombre</label>
                        <input id="signup-email" type="text" required>
                      </div>
                    <div class="input-block">
                      <label for="signup-email">E-mail</label>
                      <input id="signup-email" type="email" required>
                    </div>
                    <div class="input-block">
                      <label for="signup-password">Password</label>
                      <input id="signup-password" type="password" required>
                    </div>
                    <div class="input-block">
                      <label for="signup-password-confirm">Confirm password</label>
                      <input id="signup-password-confirm" type="password" required>
                    </div>
                  </fieldset>
                  <button type="submit" class="btn-signup">Continue</button>
                </form>
              </div>
            </div>
          </section>
          <div><br> </div>
    </main>

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