<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Entrar</title>
    <link rel="icon" type="img/x-icon" href="img/favicon.ico" />

    <!-- Bootstrap core CSS -->
	<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
  <link href="css/heroes.css" rel="stylesheet">
  <!-- sweetalert2 -->
  <script src="sweetalert/sweetalert2.all.min.js"></script>
  <!-- Custom styles for this template -->
  <link href="css/product.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/signin.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

  </head>
  <body>

<header class="site-header sticky-top py-1">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Eighth navbar example">
    <div class="container">
      <a class="navbar-brand" href="#">TECHNOSISTEMAS</a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse collapse" id="navbarsExample07" style="">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.html">INICIO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="productos.html">PRODUCTOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="login.php">ENTRAR</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<main class="form-signin">
  <form method="POST" action="admin.php" autocomplete="off">
    <center>
      <img class="mb-4" src="img/usuario.png" alt="" width="200" height="200">
      <h1 class="h3 mb-3 fw-normal">Inicio de sesión</h1>
    </center>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="user">
      <label for="floatingInput">Usuario</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass">
      <label for="floatingPassword">Password</label>
    </div>

    <!-- <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button> -->
    <input type="submit" name="btn_index" value="Entrar" class="w-100 btn btn-lg btn-primary">

  </form>
</main>



<footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">© 2017–2021 TECHNOSISTEMAS</p>
</footer>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>


    <script>
    function ventana(titulo,mensaje,tipo){
      Swal.fire({
        title:titulo,
        text:mensaje,
        icon:tipo,
        confirmButtonText: 'OK'
      });
    }
    </script>

    <script>
    <?php
    session_start();
    ob_start();
    $_SESSION['iniciado'] = false;

    if (isset($_SESSION['sesion_exito'])) {

      if ($_SESSION['sesion_exito'] == 2) {
        echo "ventana('Error de inicio de sesión','Los campos SON OBLIGATORIOS','error')";
      } elseif ($_SESSION['sesion_exito'] == 3) {
        echo "ventana('Error de inicio de sesión','DATOS INCORRECTOS','error')";
      }

    }else{
      $_SESSION['sesion_exito']=0;
    }

    ?>

    </script>

  </body>
</html>
