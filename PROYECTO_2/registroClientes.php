<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Solicitud de compra</title>
    <link rel="icon" type="img/x-icon" href="img/favicon.ico" />

    <!-- Bootstrap core CSS -->
  	<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/adminlte.min.css">
    <!-- sweetalert2 -->
    <script src="sweetalert/sweetalert2.all.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="css/product.css" rel="stylesheet">

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

    <?php

    session_start();
    ob_start();

    if (isset($_POST['botonCompra'])) {

        // DATOS PARA LA TABLA CLIENTE
        $nombres = (isset($_POST['nombres'])) ? $_POST['nombres'] : '';
        $apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : '';
        $dpi = (isset($_POST['dpi'])) ? $_POST['dpi'] : '';
        $fecha_nac = (isset($_POST['fecha_nac'])) ? $_POST['fecha_nac'] : '';
        $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
        $genero = (isset($_POST['genero'])) ? $_POST['genero'] : '';

        // DATO PARA LA TABLA VENTA
        $cantidad = (isset($_POST['cant'])) ? $_POST['cant'] : '';


        // La primera condición se cumple cuando están todos los datos rellenados
        if (!($nombres==''||$apellidos==''||$dpi==''||$fecha_nac==''||$direccion==''||$genero==''||$cantidad=='') && $_SESSION['idProducto'] != 0) {

          $array = explode("/",$fecha_nac);
          $fecha_nac2 = $array[2].'-'.$array[1].'-'.$array[0];

          include("abrir_conexion.php");
          //SE INSERTAN LOS DATOS DEL CLIENTE EN LA BASE DE DATOS
          $conexion->query("INSERT INTO $tabla_db1 (nombres,apellidos,dpi,fecha_nac,direccion,genero) VALUES ('$nombres','$apellidos','$dpi','$fecha_nac2','$direccion','$genero')");

          // DATOS PARA LA TABLA VENTA
          $idCliente = 0;
          $idProducto = $_SESSION['idProducto'];
          $precio = $_SESSION['precioProducto'];
          $total = $precio*$cantidad;

          $resultado = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE dpi = '$dpi'");
          while($consulta = mysqli_fetch_array($resultado))
          {
            $idCliente = $consulta['idCliente'];
          }

          //SE INSERTAN LOS DATOS DE LA VENTA EN LA BASE DE DATOS
          $conexion->query("INSERT INTO $tabla_db5 (idCliente,idProducto,fecha_venta,cantidad,precio,total) VALUES ('$idCliente','$idProducto',curdate(),'$cantidad','$precio','$total')");

          include("cerrar_conexion.php");

          echo "<script> ventana('Compra exitosa','Sus datos han sido procesados de manera correcta','success'); </script>";

        }else{
          echo "<script> ventana('Compra NO exitosa','Sus datos NO han sido procesados de manera correcta','error'); </script>";
        }

    }else{

      $_SESSION['idProducto'] = 0;
      $_SESSION['nombreProducto'] = '----------';
      $_SESSION['categoriaProducto'] = '----------';
      $_SESSION['precioProducto'] = '0.00';

      if(isset($_POST['btn1'])){
        //Verifico que el boton "btn1" fue oprimido
        $_SESSION['idProducto'] = 1;
      }elseif (isset($_POST['btn2'])){
        //Verifico que el boton "btn2" fue oprimido
        $_SESSION['idProducto'] = 2;
      }elseif (isset($_POST['btn3'])){
        //Verifico que el boton "btn3" fue oprimido
        $_SESSION['idProducto'] = 3;
      }elseif (isset($_POST['btn4'])){
        //Verifico que el boton "btn4" fue oprimido
        $_SESSION['idProducto'] = 4;
      }elseif (isset($_POST['btn5'])){
        //Verifico que el boton "btn5" fue oprimido
        $_SESSION['idProducto'] = 5;
      }elseif (isset($_POST['btn6'])){
        //Verifico que el boton "btn6" fue oprimido
        $_SESSION['idProducto'] = 6;
      }elseif (isset($_POST['btn7'])){
        //Verifico que el boton "btn7" fue oprimido
        $_SESSION['idProducto'] = 7;
      }elseif (isset($_POST['btn8'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 8;
      }elseif (isset($_POST['btn9'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 9;
      }elseif (isset($_POST['btn10'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 10;
      }elseif (isset($_POST['btn11'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 11;
      }elseif (isset($_POST['btn12'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 12;
      }elseif (isset($_POST['btn13'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 13;
      }elseif (isset($_POST['btn14'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 14;
      }elseif (isset($_POST['btn15'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 15;
      }elseif (isset($_POST['btn16'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 16;
      }elseif (isset($_POST['btn17'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 17;
      }elseif (isset($_POST['btn18'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 18;
      }elseif (isset($_POST['btn19'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 19;
      }elseif (isset($_POST['btn20'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 20;
      }elseif (isset($_POST['btn21'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 21;
      }elseif (isset($_POST['btn22'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 22;
      }elseif (isset($_POST['btn23'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 23;
      }elseif (isset($_POST['btn24'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 24;
      }elseif (isset($_POST['btn25'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 25;
      }elseif (isset($_POST['btn26'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 26;
      }elseif (isset($_POST['btn27'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 27;
      }elseif (isset($_POST['btn28'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 28;
      }elseif (isset($_POST['btn29'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 29;
      }elseif (isset($_POST['btn30'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 30;
      }elseif (isset($_POST['btn31'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 31;
      }elseif (isset($_POST['btn32'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 32;
      }elseif (isset($_POST['btn33'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 33;
      }elseif (isset($_POST['btn24'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 24;
      }elseif (isset($_POST['btn35'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 35;
      }elseif (isset($_POST['btn36'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 36;
      }elseif (isset($_POST['btn37'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 37;
      }elseif (isset($_POST['btn38'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 38;
      }elseif (isset($_POST['btn39'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 39;
      }elseif (isset($_POST['btn40'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 40;
      }elseif (isset($_POST['btn41'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 41;
      }elseif (isset($_POST['btn42'])){
        //Verifico que el boton "btn8" fue oprimido
        $_SESSION['idProducto'] = 42;
      }

      if ($_SESSION['idProducto'] != 0) {
        $idProducto = $_SESSION['idProducto'];
        $idCategoria = 0;
        include("abrir_conexion.php");

        // Primera consulta
        $resultado = mysqli_query($conexion,"SELECT * FROM $tabla_db3 WHERE idProducto = '$idProducto'");
        while($consulta = mysqli_fetch_array($resultado))
        {
          $idCategoria = $consulta['idCategoria'];
          $_SESSION['nombreProducto'] = $consulta['nombre'];
          $_SESSION['precioProducto'] = $consulta['precio'];
        }

        // Segunda consulta
        $resultado_dos = mysqli_query($conexion,"SELECT * FROM $tabla_db4 WHERE idCategoria = '$idCategoria'");
        while($consulta = mysqli_fetch_array($resultado_dos))
        {
          $_SESSION['categoriaProducto'] = $consulta['nombre'];
        }

        include("cerrar_conexion.php");
      }

    }


    ?>

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
            <a class="nav-link" href="login.php">ENTRAR</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
</header>



<main class="container">

    <div class="py-5 text-center">
      <h1>Solicitud de compra</h1>
    </div>

    <form action="registroClientes.php" method="POST" autocomplete="off">
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Datos del cliente</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->


            <div class="card-body">

              <div class="form-group">
                <label for="nombres">Nombres</label>
                <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Digite sus nombres" required="">
              </div>

              <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Digite sus apellidos" required="">
              </div>

              <div class="form-group">
                <label for="dpi">DPI</label>
                <input type="text" class="form-control" id="dpi" name="dpi" placeholder="XXXX XXXXX XXXX" required="">
              </div>

              <div class="form-group">
                <label>Fecha de nacimiento</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input name="fecha_nac" id="fecha_nac" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" required="">
                </div>
              </div>

              <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Digite su Dirección" required="">
              </div>

              <div class="form-group">
                <label>Genero</label>
                <select class="form-control form-select" name="genero" required="">
                  <option>Masculino</option>
                  <option>Femenino</option>
                </select>
              </div>

            </div>

          </div>

        </div>

        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">

        <div class="">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Detalles de la compra</span>
            <!-- <span class="badge bg-primary rounded-pill">3</span> -->
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Nombre del producto</h6>
                <small class="text-muted"><?php echo $_SESSION['nombreProducto']; ?></small>
              </div>
            </li>

            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Categoría</h6>
                <small class="text-muted"><?php echo $_SESSION['categoriaProducto']; ?></small>
              </div>
            </li>

            <li class="list-group-item d-flex justify-content-between bg-light">
              <div>
                <h6 class="my-0 text-success">Precio</h6>
                <small class="text-muted">Q</small>
                <small class="text-muted" id="precio"><?php echo $_SESSION['precioProducto']; ?></small>
              </div>
            </li>

          </ul>

          <div class="card p-2">
            <div class="input-group">
              <input id="cant" name="cant" type="text" class="form-control" placeholder="Cantidad" required>
              <button type="button" class="btn btn-secondary" id="generarT">Generar total</button>
            </div>
          </div>

          <div class="card p-2">
            <div class="list-group-item d-flex justify-content-between">
              <span>Total</span>

              <strong id="total">$0.00</strong>
            </div>
          </div>
        </div>

      </div>

      <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
    </div>

    <div class="card">

      <div class="card-footer">
        <center>
          <input type="submit" name="botonCompra" value="Solicitar compra" class="btn-lg btn btn-primary">
          <a class="btn-lg btn btn-danger" href="productos.html" role="button">Regresar</a>
        </center>
      </div>

    </div>

    </form>

</main>



<footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">© 2017–2021 TECHNOSISTEMAS</p>
</footer>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/dist/js/jquery-3.4.1.slim.min.js"></script>
    <script src="js/jquery.inputmask.bundle.min.js"></script>

<script>
  $(function () {
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

  })

  function generarTotal(){
    var elementPrecio = document.getElementById('precio');
    var precio = parseFloat(elementPrecio.innerText);
    var cantidad = parseInt(document.getElementById('cant').value);

    if (isNaN(cantidad)) {
      ventana('Error de campos vasillos','Digite la cantidad','error');
    }else{
      var total = precio * cantidad;
      var etiquetaTotal = document.getElementById('total');
      etiquetaTotal.innerText = "$"+total;
    }
  }

  var boton = document.getElementById('generarT');

  boton.addEventListener('click',generarTotal);

</script>

  </body>
</html>
