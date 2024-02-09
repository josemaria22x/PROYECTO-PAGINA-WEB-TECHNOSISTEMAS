<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Base de Datos</title>
    <link rel="icon" type="img/x-icon" href="img/favicon.ico" />

    <!-- Theme style -->
    <link rel="stylesheet" href="css/adminlte.min.css">
    <!-- Bootstrap core CSS -->
	<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
  <link href="css/heroes.css" rel="stylesheet">
  <!-- sweetalert2 -->
  <script src="sweetalert/sweetalert2.all.min.js"></script>
  <!-- Custom styles for this template -->
  <link href="css/product.css" rel="stylesheet">
  <!-- DATATABLES -->
  <link rel="stylesheet" href="datatables/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="datatables/plugins/responsive-2.2.3/css/responsive.bootstrap4.min.css">

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

    <script type="text/javascript">
    function ventana(){
      Swal.fire({
        title:'Bienvenido a nuestra página',
        text:'Inicio sesión de manera correcta',
        icon:'success',
        confirmButtonText: 'OK'
      });
    }
    </script>

    <?php
      session_start();
      ob_start();

      if (isset($_POST['btn_index']) || $_SESSION['iniciado'] == false) {

        $_SESSION['sesion_exito'] = 0;

        $user = $_POST['user'];
        $pass = $_POST['pass'];

        if ($user=="" || $pass=="") {
          $_SESSION['sesion_exito'] = 2; #2 - Error de campos vacios
        }else {
          $_SESSION['sesion_exito'] = 3; #3 - Datos incorrectos
          include("abrir_conexion.php");

          $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db2 WHERE user = '$user' AND pass = '$pass'");
          while ($consulta = mysqli_fetch_array($resultados)) {
            $_SESSION['sesion_exito'] = 1; #1 - Inicio sesion
            $_SESSION['iniciado'] = true;
            echo "<script>ventana();</script>";
          }

          include("cerrar_conexion.php");
        }

        if ($_SESSION['sesion_exito']<>1) {
          header('Location:login.php');
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
            <a class="nav-link" href="cerrar_sesion.php">SALIR</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<main>

  <div class="px-4 py-5 my-5 text-center">
    <h1 class="display-5 fw-bold">Base de datos</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Bienvenido a la base de datos de TECHNOSISTEMAS, en donde podrá consultar las ventas del día, productos, nuevos clientes, entre otros.</p>
    </div>
    <a class="btn btn btn-danger" href="cerrar_sesion.php" role="button">CERRAR SESIÓN</a>
  </div>
  <div class="b-example-divider"></div>

  <!-- ///////////////////////////////////////////////////// -->
  <!-- /////////////////Tabla de Clientes///////////////////// -->
  <!-- ///////////////////////////////////////////////////// -->

  <div class="px-4 py-5 my-5 text-center">
    <h2 class="display-5">Tabla de Clientes</h2>
  </div>

  <div class="row">
    <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="card card-info">

          <div class="card-header">
            <h3 class="card-title">CLIENTES REGISTRADOS EN LA BASE DE DATOS</h3>
          </div>
          <div class="card-body">

          <table class="table table-striped data">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>DPI</th>
                <th>Fecha de nacimiento</th>
                <th>Dirección</th>
                <th>Genero</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <!-- //////////////////////// CUERPO DE MI TABLA ///////////////////////////////// -->
            <tbody>
            <?php
              include("abrir_conexion.php");
              $resultado = mysqli_query($conexion,"SELECT * FROM $tabla_db1");
              while ($consulta = mysqli_fetch_array($resultado)) {
                echo "<tr>
                        <td>".$consulta['idCliente']."</td>
                        <td>".$consulta['nombres']."</td>
                        <td>".$consulta['apellidos']."</td>
                        <td>".$consulta['dpi']."</td>
                        <td>".$consulta['fecha_nac']."</td>
                        <td>".$consulta['direccion']."</td>
                        <td>".$consulta['genero']."</td>
                        <td>
                          <button type=\"button\" name=\"button\" class=\"btn btn-warning btn-xs btn-flat\" onclick=\"editarCliente(".$consulta['idCliente'].")\" id=\"cl".$consulta['idCliente']."\">
                            <i class=\"fas fa-edit\"><img src=\"img/edit.png\" alt=\"Editar\"></i>
                          </button>
                          <button type=\"button\" name=\"button\" class=\"btn btn-danger btn-xs btn-flat\" onclick=\"eliminarCliente(".$consulta['idCliente'].")\">
                            <i class=\"fas fa-trash-alt\"><img src=\"img/del.png\" alt=\"Eliminar\"></i>
                          </button>
                      </td>
                    </tr>";
              }
              include("cerrar_conexion.php");
            ?>

            </tbody>
          </table>
          </div>

          <div class="card-footer">
            Tabla clientes
          </div>

          <div class="card-body row">

            <div class="col-xs-12 col-sm-1 col-md-2 col-lg-3"></div>

            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6" id="areaEditarCliente">

            </div>

            <div class="col-xs-12 col-sm-1 col-md-2 col-lg-3"></div>

          </div>

        </div>
      </div>
    <div class="col-md-1"></div>
  </div>

  <div class="b-example-divider"></div>

    <!-- ///////////////////////////////////////////////////// -->
  <!-- /////////////////Tabla de Productos///////////////////// -->
    <!-- ///////////////////////////////////////////////////// -->

  <div class="px-4 py-5 my-5 text-center">
    <h2 class="display-5">Tabla de Productos</h2>
  </div>

<div class="row">
  <div class="col-md-1"></div>

    <div class="col-md-10">

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">PRODUCTOS REGISTRADOS EN LA BASE DE DATOS</h3>
        </div>

        <div class="card-body">

          <table class="table table-striped data">
          <thead>
            <tr>
              <th>Id Producto</th>
              <th>Id Categoría</th>
              <th>Nombre del producto</th>
              <th>Precio del producto</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <!-- //////////////////////// CUERPO DE MI TABLA ///////////////////////////////// -->
          <tbody>
          <?php
            include("abrir_conexion.php");
            $resultado = mysqli_query($conexion,"SELECT * FROM $tabla_db3");
            while ($consulta = mysqli_fetch_array($resultado)) {
              echo "<tr>
                      <td>".$consulta['idProducto']."</td>
                      <td>".$consulta['idCategoria']."</td>
                      <td>".$consulta['nombre']."</td>
                      <td>".$consulta['precio']."</td>
                      <td>
                        <button type=\"button\" name=\"button\" class=\"btn btn-warning btn-xs btn-flat\" onclick=\"editarProducto(".$consulta['idProducto'].")\" id=\"pr".$consulta['idProducto']."\">
                          <i class=\"fas fa-edit\"><img src=\"img/edit.png\" alt=\"Editar\"></i>
                        </button>
                        <button type=\"button\" name=\"button\" class=\"btn btn-danger btn-xs btn-flat\" onclick=\"eliminarProducto(".$consulta['idProducto'].")\">
                          <i class=\"fas fa-trash-alt\"><img src=\"img/del.png\" alt=\"Eliminar\"></i>
                        </button>
                    </td>
                    </tr>";
            }
            include("cerrar_conexion.php");
          ?>
          </tbody>
      </table>

    </div>

    <div class="card-footer">
      Tabla productos
    </div>

    <div class="card-body row">

      <div class="col-xs-12 col-sm-1 col-md-2 col-lg-3"></div>

      <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6" id="areaEditarProducto">

      </div>

      <div class="col-xs-12 col-sm-1 col-md-2 col-lg-3"></div>

    </div>

    </div>
  </div>

  <div class="col-md-1"></div>
</div>

<!-- ///////////////////////////////////////////////////// -->
<!-- /////////////////Tabla de categorias///////////////////// -->
<!-- ///////////////////////////////////////////////////// -->

<div class="row">
  <div class="col-md-1"></div>

  <div class="col-md-10">

    <div class="card card-danger">
      <div class="card-header">
        <h3 class="card-title">CATEGORÍAS REGISTRADAS EN LA BASE DE DATOS</h3>
      </div>
      <div class="card-body">

        <table class="table table-striped data">
          <thead>
            <tr>
              <th>Id Categoría</th>
              <th>Nombre Categoría</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <!-- //////////////////////// CUERPO DE MI TABLA ///////////////////////////////// -->
          <tbody>
          <?php
            include("abrir_conexion.php");
            $resultado = mysqli_query($conexion,"SELECT * FROM $tabla_db6");
            while ($consulta = mysqli_fetch_array($resultado)) {
              echo "<tr>
                      <td>".$consulta['idCategoria']."</td>
                      <td>".$consulta['nombre']."</td>
                      <td>
                        <button type=\"button\" name=\"button\" class=\"btn btn-warning btn-xs btn-flat\" onclick=\"editarCategoria(".$consulta['idCategoria'].")\" id=\"ca".$consulta['idCategoria']."\">
                          <i class=\"fas fa-edit\"><img src=\"img/edit.png\" alt=\"Editar\"></i>
                        </button>
                        <button type=\"button\" name=\"button\" class=\"btn btn-danger btn-xs btn-flat\" onclick=\"eliminarCategoria(".$consulta['idCategoria'].")\">
                          <i class=\"fas fa-trash-alt\"><img src=\"img/del.png\" alt=\"Eliminar\"></i>
                        </button>
                    </td>
                    </tr>";
            }
            include("cerrar_conexion.php");
          ?>
          </tbody>
        </table>

      </div>
        <div class="card-footer">
          Tabla Categorías
        </div>

        <div class="card-body row">

          <div class="col-xs-12 col-sm-1 col-md-2 col-lg-3"></div>

          <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6" id="areaEditarCategoria">

          </div>

          <div class="col-xs-12 col-sm-1 col-md-2 col-lg-3"></div>

        </div>

      </div>
    </div>

    <div class="col-md-1\"></div>
  </div>

<div class="b-example-divider"></div>

  <!-- ///////////////////////////////////////////////////// -->
  <!-- /////////////////Tabla de ventas///////////////////// -->
  <!-- ///////////////////////////////////////////////////// -->

  <div class="px-4 py-5 my-5 text-center">
    <h2 class="display-5">Tabla de Ventas</h2>
  </div>

<div class="row">
  <div class="col-md-1"></div>

    <div class="col-md-10">

    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">VENTAS REGISTRADAS EN LA BASE DE DATOS</h3>
      </div>
      <div class="card-body">

        <table class="table table-striped data">
          <thead>
            <tr>
              <th>Id Venta</th>
              <th>Id Cliente</th>
              <th>Id Producto</th>
              <th>Fecha de venta</th>
              <th>Cantidad</th>
              <th>Precio</th>
              <th>Total</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <!-- //////////////////////// CUERPO DE MI TABLA ///////////////////////////////// -->
          <tbody>
          <?php
            include("abrir_conexion.php");
            $resultado = mysqli_query($conexion,"SELECT * FROM $tabla_db5");
            while ($consulta = mysqli_fetch_array($resultado)) {
              echo "<tr>
                      <td>".$consulta['idVenta']."</td>
                      <td>".$consulta['idCliente']."</td>
                      <td>".$consulta['idProducto']."</td>
                      <td>".$consulta['fecha_venta']."</td>
                      <td>".$consulta['cantidad']."</td>
                      <td>".$consulta['precio']."</td>
                      <td>".$consulta['total']."</td>
                      <td>
                        <button type=\"button\" name=\"button\" class=\"btn btn-warning btn-xs btn-flat\" onclick=\"editarVenta(".$consulta['idVenta'].")\" id=\"ve".$consulta['idVenta']."\">
                          <i class=\"fas fa-edit\"><img src=\"img/edit.png\" alt=\"Editar\"></i>
                        </button>
                        <button type=\"button\" name=\"button\" class=\"btn btn-danger btn-xs btn-flat\" onclick=\"eliminarVenta(".$consulta['idVenta'].")\">
                          <i class=\"fas fa-trash-alt\"><img src=\"img/del.png\" alt=\"Eliminar\"></i>
                        </button>
                    </td>
                    </tr>";
            }
            include("cerrar_conexion.php");
          ?>
          </tbody>
        </table>

        </div>
        <div class="card-footer">
          Tabla ventas
        </div>

        <div class="card-body row">

          <div class="col-xs-12 col-sm-1 col-md-2 col-lg-3"></div>

          <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6" id="areaEditarVenta">

          </div>

          <div class="col-xs-12 col-sm-1 col-md-2 col-lg-3"></div>

        </div>

      </div>
    </div>

    <div class="col-md-1"></div>
  </div>


</main>

<footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">© 2017–2021 TECHNOSISTEMAS</p>
</footer>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="assets/dist/js/jquery-3.4.1.slim.min.js"></script>


    <!-- DATATABLES -->
    <!-- <link rel="stylesheet" href="datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="datatables/plugins/responsive-2.2.3/css/responsive.bootstrap4.min.css"> -->
    <script src="datatables/js/jquery.dataTables.js"></script>
    <script src="datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="datatables/plugins/responsive-2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="datatables/plugins/responsive-2.2.3/js/responsive.bootstrap4.min.js"></script>


    <script type="text/javascript">

    var editando = false;
    function editarCliente(id){
      if (editando==false) {
        editando = true;

        var botonPresionado = document.getElementById('cl'+id);
        var columna = botonPresionado.parentNode;
        var fila = columna.parentNode;
        var padre = fila.parentNode;
        var vector = fila.children;

        var id = vector[0].textContent;
        var nombres = vector[1].textContent;
        var apellidos = vector[2].textContent;
        var dpi = vector[3].textContent;
        var fecha_nac = vector[4].textContent;
        var direccion = vector[5].textContent;
        var genero = vector[6].textContent;

        ////////////////////////////////////////////////////////////////
        /////////////// CREAMOS EL TITULO DEL FORMULARIO ///////////////
        ////////////////////////////////////////////////////////////////

        // 1.	Crear el contenedor
        var contenedorTitulo = document.createElement('div');
        contenedorTitulo.setAttribute('class','py-5 text-center');
        contenedorTitulo.innerHTML = '<h2>Actualizando registro</h2>';

        ////////////////////////////////////////////////////////////////
        ///////////// CREAMOS LA ESTRUCTURA DEL FORMULARIO /////////////
        ////////////////////////////////////////////////////////////////

        // 1.	Crear el formulario (form)
        var formulario = document.createElement('form');
        formulario.setAttribute('action','modificarRegistro.php');
        formulario.setAttribute('method','POST');
        formulario.setAttribute('autocomplete','off');

        // 2.	Crear las contenedores (div)
        var c1 = document.createElement('div');
        c1.setAttribute('class','form-group');
        var c2 = document.createElement('div');
        c2.setAttribute('class','form-group');
        var c3 = document.createElement('div');
        c3.setAttribute('class','form-group');
        var c4 = document.createElement('div');
        c4.setAttribute('class','form-group');
        var c5 = document.createElement('div');
        c5.setAttribute('class','form-group');
        var c6 = document.createElement('div');
        c6.setAttribute('class','form-group');
        var c7 = document.createElement('div');
        c7.setAttribute('class','form-group');
        var c8 = document.createElement('div');
        c8.setAttribute('class','form-group');

        // 3. Crear los labels y añadirlos a los contenedores
        var l1 = document.createElement('label');
        l1.textContent = 'ID';
        var l2 = document.createElement('label');
        l2.textContent = 'Nombres';
        l2.setAttribute('for','nombres');
        var l3 = document.createElement('label');
        l3.textContent = 'Apellidos';
        l3.setAttribute('for','apellidos');
        var l4 = document.createElement('label');
        l4.textContent = 'DPI';
        l4.setAttribute('for','dpi');
        var l5 = document.createElement('label');
        l5.textContent = 'Fecha de nacimiento';
        l5.setAttribute('for','fecha_nac');
        var l6 = document.createElement('label');
        l6.textContent = 'Dirección';
        l6.setAttribute('for','direccion');
        var l7 = document.createElement('label');
        l7.textContent = 'Genero';
        l7.setAttribute('for','genero');

        c1.appendChild(l1);
        c2.appendChild(l2);
        c3.appendChild(l3);
        c4.appendChild(l4);
        c5.appendChild(l5);
        c6.appendChild(l6);
        c7.appendChild(l7);

        // 4.	Crear los input (input)
        var i1 = document.createElement('input');
        i1.setAttribute('type','text');
        i1.setAttribute('class','form-control');
        // i1.setAttribute('disabled','');
        i1.setAttribute('readonly','');
        i1.setAttribute('value',id);
        i1.setAttribute('name','id');

        var i2 = document.createElement('input');
        i2.setAttribute('type','text');
        i2.setAttribute('class','form-control');
        i2.setAttribute('value',nombres);
        i2.setAttribute('id','nombres');
        i2.setAttribute('name','nombres');


        var i3 = document.createElement('input');
        i3.setAttribute('type','text');
        i3.setAttribute('class','form-control');
        i3.setAttribute('value',apellidos);
        i3.setAttribute('id','apellidos');
        i3.setAttribute('name','apellidos');

        var i4 = document.createElement('input');
        i4.setAttribute('type','text');
        i4.setAttribute('class','form-control');
        i4.setAttribute('value',dpi);
        i4.setAttribute('id','dpi');
        i4.setAttribute('name','dpi');

        var i5 = document.createElement('input');
        i5.setAttribute('type','text');
        i5.setAttribute('class','form-control');
        i5.setAttribute('value',fecha_nac);
        i5.setAttribute('id','fecha_nac');
        i5.setAttribute('name','fecha_nac');

        var i6 = document.createElement('input');
        i6.setAttribute('type','text');
        i6.setAttribute('class','form-control');
        i6.setAttribute('value',direccion);
        i6.setAttribute('id','direccion');
        i6.setAttribute('name','direccion');

        var i7 = document.createElement('input');
        i7.setAttribute('type','text');
        i7.setAttribute('class','form-control');
        i7.setAttribute('value',genero);
        i7.setAttribute('id','genero');
        i7.setAttribute('name','genero');

        var i8 = document.createElement('input');
        i8.setAttribute('type','submit');
        i8.setAttribute('class','btn btn-success');
        i8.setAttribute('value','Actualizar');
        i8.setAttribute('name','btnActualizarCliente');

        // 5. Añadir los input a las columnas
        c1.appendChild(i1);
        c2.appendChild(i2);
        c3.appendChild(i3);
        c4.appendChild(i4);
        c5.appendChild(i5);
        c6.appendChild(i6);
        c7.appendChild(i7);
        c8.appendChild(i8);

        // 6. Añadir los contenedores al formulario
        formulario.appendChild(c1);
        formulario.appendChild(c2);
        formulario.appendChild(c3);
        formulario.appendChild(c4);
        formulario.appendChild(c5);
        formulario.appendChild(c6);
        formulario.appendChild(c7);
        formulario.appendChild(c8);

        var t1 = document.getElementById('areaEditarCliente');

        t1.appendChild(contenedorTitulo);
        t1.appendChild(formulario);


        // Agregando evento al formulario
        formulario.addEventListener('submit', function(){
          editando = false;
        });

      }


    }

    function eliminarCliente(id){
      if (editando==false) {
        editando = true;

        var botonPresionado = document.getElementById('cl'+id);
        var columna = botonPresionado.parentNode;
        var fila = columna.parentNode;
        var padre = fila.parentNode;
        var vector = fila.children;

        var id = vector[0].textContent;
        var nombres = vector[1].textContent;
        var apellidos = vector[2].textContent;
        var dpi = vector[3].textContent;
        var fecha_nac = vector[4].textContent;
        var direccion = vector[5].textContent;
        var genero = vector[6].textContent;

        ////////////////////////////////////////////////////////////////
        /////////////// CREAMOS EL TITULO DEL FORMULARIO ///////////////
        ////////////////////////////////////////////////////////////////

        // 1.	Crear el contenedor
        var contenedorTitulo = document.createElement('div');
        contenedorTitulo.setAttribute('class','py-5 text-center');
        contenedorTitulo.innerHTML = '<h2>Eliminando registro</h2>';

        ////////////////////////////////////////////////////////////////
        ///////////// CREAMOS LA ESTRUCTURA DEL FORMULARIO /////////////
        ////////////////////////////////////////////////////////////////

        // 1.	Crear el formulario (form)
        var formulario = document.createElement('form');
        formulario.setAttribute('action','modificarRegistro.php');
        formulario.setAttribute('method','POST');
        formulario.setAttribute('autocomplete','off');

        // 2.	Crear las contenedores (div)
        var c1 = document.createElement('div');
        c1.setAttribute('class','form-group');
        var c2 = document.createElement('div');
        c2.setAttribute('class','form-group');
        var c3 = document.createElement('div');
        c3.setAttribute('class','form-group');
        var c4 = document.createElement('div');
        c4.setAttribute('class','form-group');
        var c5 = document.createElement('div');
        c5.setAttribute('class','form-group');
        var c6 = document.createElement('div');
        c6.setAttribute('class','form-group');
        var c7 = document.createElement('div');
        c7.setAttribute('class','form-group');
        var c8 = document.createElement('div');
        c8.setAttribute('class','form-group');

        // 3. Crear los labels y añadirlos a los contenedores
        var l1 = document.createElement('label');
        l1.textContent = 'ID';
        var l2 = document.createElement('label');
        l2.textContent = 'Nombres';
        l2.setAttribute('for','nombres');
        var l3 = document.createElement('label');
        l3.textContent = 'Apellidos';
        l3.setAttribute('for','apellidos');
        var l4 = document.createElement('label');
        l4.textContent = 'DPI';
        l4.setAttribute('for','dpi');
        var l5 = document.createElement('label');
        l5.textContent = 'Fecha de nacimiento';
        l5.setAttribute('for','fecha_nac');
        var l6 = document.createElement('label');
        l6.textContent = 'Dirección';
        l6.setAttribute('for','direccion');
        var l7 = document.createElement('label');
        l7.textContent = 'Genero';
        l7.setAttribute('for','genero');

        c1.appendChild(l1);
        c2.appendChild(l2);
        c3.appendChild(l3);
        c4.appendChild(l4);
        c5.appendChild(l5);
        c6.appendChild(l6);
        c7.appendChild(l7);

        // 4.	Crear los input (input)
        var i1 = document.createElement('input');
        i1.setAttribute('type','text');
        i1.setAttribute('class','form-control');
        // i1.setAttribute('disabled','');
        i1.setAttribute('readonly','');
        i1.setAttribute('value',id);
        i1.setAttribute('name','id');

        var i2 = document.createElement('input');
        i2.setAttribute('type','text');
        i2.setAttribute('class','form-control');
        i2.setAttribute('value',nombres);
        i2.setAttribute('id','nombres');
        i2.setAttribute('name','nombres');


        var i3 = document.createElement('input');
        i3.setAttribute('type','text');
        i3.setAttribute('class','form-control');
        i3.setAttribute('value',apellidos);
        i3.setAttribute('id','apellidos');
        i3.setAttribute('name','apellidos');

        var i4 = document.createElement('input');
        i4.setAttribute('type','text');
        i4.setAttribute('class','form-control');
        i4.setAttribute('value',dpi);
        i4.setAttribute('id','dpi');
        i4.setAttribute('name','dpi');

        var i5 = document.createElement('input');
        i5.setAttribute('type','text');
        i5.setAttribute('class','form-control');
        i5.setAttribute('value',fecha_nac);
        i5.setAttribute('id','fecha_nac');
        i5.setAttribute('name','fecha_nac');

        var i6 = document.createElement('input');
        i6.setAttribute('type','text');
        i6.setAttribute('class','form-control');
        i6.setAttribute('value',direccion);
        i6.setAttribute('id','direccion');
        i6.setAttribute('name','direccion');

        var i7 = document.createElement('input');
        i7.setAttribute('type','text');
        i7.setAttribute('class','form-control');
        i7.setAttribute('value',genero);
        i7.setAttribute('id','genero');
        i7.setAttribute('name','genero');

        var i8 = document.createElement('input');
        i8.setAttribute('type','submit');
        i8.setAttribute('class','btn btn-danger');
        i8.setAttribute('value','Eliminar');
        i8.setAttribute('name','btnEliminarCliente');

        // 5. Añadir los input a las columnas
        c1.appendChild(i1);
        c2.appendChild(i2);
        c3.appendChild(i3);
        c4.appendChild(i4);
        c5.appendChild(i5);
        c6.appendChild(i6);
        c7.appendChild(i7);
        c8.appendChild(i8);

        // 6. Añadir los contenedores al formulario
        formulario.appendChild(c1);
        formulario.appendChild(c2);
        formulario.appendChild(c3);
        formulario.appendChild(c4);
        formulario.appendChild(c5);
        formulario.appendChild(c6);
        formulario.appendChild(c7);
        formulario.appendChild(c8);

        var t1 = document.getElementById('areaEditarCliente');

        t1.appendChild(contenedorTitulo);
        t1.appendChild(formulario);


        // Agregando evento al formulario
        formulario.addEventListener('submit', function(){
          editando = false;
        });

      }
    }

    function editarProducto(id){
      if (editando==false) {
        editando = true;

        var botonPresionado = document.getElementById('pr'+id);
        var columna = botonPresionado.parentNode;
        var fila = columna.parentNode;
        var padre = fila.parentNode;
        var vector = fila.children;

        var id = vector[0].textContent;
        var idCategoria = vector[1].textContent;
        var nombreProducto = vector[2].textContent;
        var precioProducto = vector[3].textContent;

        ////////////////////////////////////////////////////////////////
        /////////////// CREAMOS EL TITULO DEL FORMULARIO ///////////////
        ////////////////////////////////////////////////////////////////

        // 1.	Crear el contenedor
        var contenedorTitulo = document.createElement('div');
        contenedorTitulo.setAttribute('class','py-5 text-center');
        contenedorTitulo.innerHTML = '<h2>Actualizando registro</h2>';

        ////////////////////////////////////////////////////////////////
        ///////////// CREAMOS LA ESTRUCTURA DEL FORMULARIO /////////////
        ////////////////////////////////////////////////////////////////

        // 1.	Crear el formulario (form)
        var formulario = document.createElement('form');
        formulario.setAttribute('action','modificarRegistro.php');
        formulario.setAttribute('method','POST');
        formulario.setAttribute('autocomplete','off');

        // 2.	Crear las contenedores (div)
        var c1 = document.createElement('div');
        c1.setAttribute('class','form-group');
        var c2 = document.createElement('div');
        c2.setAttribute('class','form-group');
        var c3 = document.createElement('div');
        c3.setAttribute('class','form-group');
        var c4 = document.createElement('div');
        c4.setAttribute('class','form-group');
        var c8 = document.createElement('div');
        c8.setAttribute('class','form-group');

        // 3. Crear los labels y añadirlos a los contenedores
        var l1 = document.createElement('label');
        l1.textContent = 'ID';
        var l2 = document.createElement('label');
        l2.textContent = 'Id categoría';
        l2.setAttribute('for','idCategoria');
        var l3 = document.createElement('label');
        l3.textContent = 'Nombre del producto';
        l3.setAttribute('for','nombreProd');
        var l4 = document.createElement('label');
        l4.textContent = 'Precio del producto';
        l4.setAttribute('for','precioProd');

        c1.appendChild(l1);
        c2.appendChild(l2);
        c3.appendChild(l3);
        c4.appendChild(l4);


        // 4.	Crear los input (input)
        var i1 = document.createElement('input');
        i1.setAttribute('type','text');
        i1.setAttribute('class','form-control');
        i1.setAttribute('readonly','');
        i1.setAttribute('value',id);
        i1.setAttribute('name','id');

        var i2 = document.createElement('input');
        i2.setAttribute('type','text');
        i2.setAttribute('class','form-control');
        i2.setAttribute('value',idCategoria);
        i2.setAttribute('id','idCategoria');
        i2.setAttribute('name','idCategoria');


        var i3 = document.createElement('input');
        i3.setAttribute('type','text');
        i3.setAttribute('class','form-control');
        i3.setAttribute('value',nombreProducto);
        i3.setAttribute('id','nombreProd');
        i3.setAttribute('name','nombreProd');

        var i4 = document.createElement('input');
        i4.setAttribute('type','text');
        i4.setAttribute('class','form-control');
        i4.setAttribute('value',precioProducto);
        i4.setAttribute('id','precioProd');
        i4.setAttribute('name','precioProd');

        var i8 = document.createElement('input');
        i8.setAttribute('type','submit');
        i8.setAttribute('class','btn btn-success');
        i8.setAttribute('value','Actualizar');
        i8.setAttribute('name','btnActualizarProducto');

        // 5. Añadir los input a las columnas
        c1.appendChild(i1);
        c2.appendChild(i2);
        c3.appendChild(i3);
        c4.appendChild(i4);
        c8.appendChild(i8);

        // 6. Añadir los contenedores al formulario
        formulario.appendChild(c1);
        formulario.appendChild(c2);
        formulario.appendChild(c3);
        formulario.appendChild(c4);
        formulario.appendChild(c8);

        var t1 = document.getElementById('areaEditarProducto');

        t1.appendChild(contenedorTitulo);
        t1.appendChild(formulario);


        // Agregando evento al formulario
        formulario.addEventListener('submit', function(){
          editando = false;
        });

      }

    }

    function eliminarProducto(id){
      if (editando==false) {
        editando = true;

        var botonPresionado = document.getElementById('pr'+id);
        var columna = botonPresionado.parentNode;
        var fila = columna.parentNode;
        var padre = fila.parentNode;
        var vector = fila.children;

        var id = vector[0].textContent;
        var idCategoria = vector[1].textContent;
        var nombreProducto = vector[2].textContent;
        var precioProducto = vector[3].textContent;

        ////////////////////////////////////////////////////////////////
        /////////////// CREAMOS EL TITULO DEL FORMULARIO ///////////////
        ////////////////////////////////////////////////////////////////

        // 1.	Crear el contenedor
        var contenedorTitulo = document.createElement('div');
        contenedorTitulo.setAttribute('class','py-5 text-center');
        contenedorTitulo.innerHTML = '<h2>Eliminando registro</h2>';

        ////////////////////////////////////////////////////////////////
        ///////////// CREAMOS LA ESTRUCTURA DEL FORMULARIO /////////////
        ////////////////////////////////////////////////////////////////

        // 1.	Crear el formulario (form)
        var formulario = document.createElement('form');
        formulario.setAttribute('action','modificarRegistro.php');
        formulario.setAttribute('method','POST');
        formulario.setAttribute('autocomplete','off');

        // 2.	Crear las contenedores (div)
        var c1 = document.createElement('div');
        c1.setAttribute('class','form-group');
        var c2 = document.createElement('div');
        c2.setAttribute('class','form-group');
        var c3 = document.createElement('div');
        c3.setAttribute('class','form-group');
        var c4 = document.createElement('div');
        c4.setAttribute('class','form-group');
        var c8 = document.createElement('div');
        c8.setAttribute('class','form-group');

        // 3. Crear los labels y añadirlos a los contenedores
        var l1 = document.createElement('label');
        l1.textContent = 'ID';
        var l2 = document.createElement('label');
        l2.textContent = 'Id categoría';
        l2.setAttribute('for','idCategoria');
        var l3 = document.createElement('label');
        l3.textContent = 'Nombre del producto';
        l3.setAttribute('for','nombreProd');
        var l4 = document.createElement('label');
        l4.textContent = 'Precio del producto';
        l4.setAttribute('for','precioProd');

        c1.appendChild(l1);
        c2.appendChild(l2);
        c3.appendChild(l3);
        c4.appendChild(l4);


        // 4.	Crear los input (input)
        var i1 = document.createElement('input');
        i1.setAttribute('type','text');
        i1.setAttribute('class','form-control');
        i1.setAttribute('readonly','');
        i1.setAttribute('value',id);
        i1.setAttribute('name','id');

        var i2 = document.createElement('input');
        i2.setAttribute('type','text');
        i2.setAttribute('class','form-control');
        i2.setAttribute('value',idCategoria);
        i2.setAttribute('id','idCategoria');
        i2.setAttribute('name','idCategoria');


        var i3 = document.createElement('input');
        i3.setAttribute('type','text');
        i3.setAttribute('class','form-control');
        i3.setAttribute('value',nombreProducto);
        i3.setAttribute('id','nombreProd');
        i3.setAttribute('name','nombreProd');

        var i4 = document.createElement('input');
        i4.setAttribute('type','text');
        i4.setAttribute('class','form-control');
        i4.setAttribute('value',precioProducto);
        i4.setAttribute('id','precioProd');
        i4.setAttribute('name','precioProd');

        var i8 = document.createElement('input');
        i8.setAttribute('type','submit');
        i8.setAttribute('class','btn btn-danger');
        i8.setAttribute('value','Eliminar');
        i8.setAttribute('name','btnEliminarProducto');

        // 5. Añadir los input a las columnas
        c1.appendChild(i1);
        c2.appendChild(i2);
        c3.appendChild(i3);
        c4.appendChild(i4);
        c8.appendChild(i8);

        // 6. Añadir los contenedores al formulario
        formulario.appendChild(c1);
        formulario.appendChild(c2);
        formulario.appendChild(c3);
        formulario.appendChild(c4);
        formulario.appendChild(c8);

        var t1 = document.getElementById('areaEditarProducto');

        t1.appendChild(contenedorTitulo);
        t1.appendChild(formulario);


        // Agregando evento al formulario
        formulario.addEventListener('submit', function(){
          editando = false;
        });

      }

    }

    function editarCategoria(id){
      if (editando==false) {
        editando = true;

        var botonPresionado = document.getElementById('ca'+id);
        var columna = botonPresionado.parentNode;
        var fila = columna.parentNode;
        var padre = fila.parentNode;
        var vector = fila.children;

        var id = vector[0].textContent;
        var nombreCategoria = vector[1].textContent;

        ////////////////////////////////////////////////////////////////
        /////////////// CREAMOS EL TITULO DEL FORMULARIO ///////////////
        ////////////////////////////////////////////////////////////////

        // 1.	Crear el contenedor
        var contenedorTitulo = document.createElement('div');
        contenedorTitulo.setAttribute('class','py-5 text-center');
        contenedorTitulo.innerHTML = '<h2>Actualizando registro</h2>';

        ////////////////////////////////////////////////////////////////
        ///////////// CREAMOS LA ESTRUCTURA DEL FORMULARIO /////////////
        ////////////////////////////////////////////////////////////////

        // 1.	Crear el formulario (form)
        var formulario = document.createElement('form');
        formulario.setAttribute('action','modificarRegistro.php');
        formulario.setAttribute('method','POST');
        formulario.setAttribute('autocomplete','off');

        // 2.	Crear las contenedores (div)
        var c1 = document.createElement('div');
        c1.setAttribute('class','form-group');
        var c2 = document.createElement('div');
        c2.setAttribute('class','form-group');
        var c8 = document.createElement('div');
        c8.setAttribute('class','form-group');

        // 3. Crear los labels y añadirlos a los contenedores
        var l1 = document.createElement('label');
        l1.textContent = 'ID';
        var l2 = document.createElement('label');
        l2.textContent = 'Nombre categoría';
        l2.setAttribute('for','nombreCategoria');

        c1.appendChild(l1);
        c2.appendChild(l2);

        // 4.	Crear los input (input)
        var i1 = document.createElement('input');
        i1.setAttribute('type','text');
        i1.setAttribute('class','form-control');
        i1.setAttribute('readonly','');
        i1.setAttribute('value',id);
        i1.setAttribute('name','id');

        var i2 = document.createElement('input');
        i2.setAttribute('type','text');
        i2.setAttribute('class','form-control');
        i2.setAttribute('value',nombreCategoria);
        i2.setAttribute('id','nombreCategoria');
        i2.setAttribute('name','nombreCategoria');

        var i8 = document.createElement('input');
        i8.setAttribute('type','submit');
        i8.setAttribute('class','btn btn-success');
        i8.setAttribute('value','Actualizar');
        i8.setAttribute('name','btnActualizarCategoria');

        // 5. Añadir los input a las columnas
        c1.appendChild(i1);
        c2.appendChild(i2);
        c8.appendChild(i8);

        // 6. Añadir los contenedores al formulario
        formulario.appendChild(c1);
        formulario.appendChild(c2);
        formulario.appendChild(c8);

        var t1 = document.getElementById('areaEditarCategoria');

        t1.appendChild(contenedorTitulo);
        t1.appendChild(formulario);


        // Agregando evento al formulario
        formulario.addEventListener('submit', function(){
          editando = false;
        });

      }

    }

    function eliminarCategoria(id){
      if (editando==false) {
        editando = true;

        var botonPresionado = document.getElementById('ca'+id);
        var columna = botonPresionado.parentNode;
        var fila = columna.parentNode;
        var padre = fila.parentNode;
        var vector = fila.children;

        var id = vector[0].textContent;
        var nombreCategoria = vector[1].textContent;

        ////////////////////////////////////////////////////////////////
        /////////////// CREAMOS EL TITULO DEL FORMULARIO ///////////////
        ////////////////////////////////////////////////////////////////

        // 1.	Crear el contenedor
        var contenedorTitulo = document.createElement('div');
        contenedorTitulo.setAttribute('class','py-5 text-center');
        contenedorTitulo.innerHTML = '<h2>Eliminando registro</h2>';

        ////////////////////////////////////////////////////////////////
        ///////////// CREAMOS LA ESTRUCTURA DEL FORMULARIO /////////////
        ////////////////////////////////////////////////////////////////

        // 1.	Crear el formulario (form)
        var formulario = document.createElement('form');
        formulario.setAttribute('action','modificarRegistro.php');
        formulario.setAttribute('method','POST');
        formulario.setAttribute('autocomplete','off');

        // 2.	Crear las contenedores (div)
        var c1 = document.createElement('div');
        c1.setAttribute('class','form-group');
        var c2 = document.createElement('div');
        c2.setAttribute('class','form-group');
        var c8 = document.createElement('div');
        c8.setAttribute('class','form-group');

        // 3. Crear los labels y añadirlos a los contenedores
        var l1 = document.createElement('label');
        l1.textContent = 'ID';
        var l2 = document.createElement('label');
        l2.textContent = 'Nombre categoría';
        l2.setAttribute('for','nombreCategoria');

        c1.appendChild(l1);
        c2.appendChild(l2);

        // 4.	Crear los input (input)
        var i1 = document.createElement('input');
        i1.setAttribute('type','text');
        i1.setAttribute('class','form-control');
        i1.setAttribute('readonly','');
        i1.setAttribute('value',id);
        i1.setAttribute('name','id');

        var i2 = document.createElement('input');
        i2.setAttribute('type','text');
        i2.setAttribute('class','form-control');
        i2.setAttribute('value',nombreCategoria);
        i2.setAttribute('id','nombreCategoria');
        i2.setAttribute('name','nombreCategoria');

        var i8 = document.createElement('input');
        i8.setAttribute('type','submit');
        i8.setAttribute('class','btn btn-danger');
        i8.setAttribute('value','Eliminar');
        i8.setAttribute('name','btnEliminarCategoria');

        // 5. Añadir los input a las columnas
        c1.appendChild(i1);
        c2.appendChild(i2);
        c8.appendChild(i8);

        // 6. Añadir los contenedores al formulario
        formulario.appendChild(c1);
        formulario.appendChild(c2);
        formulario.appendChild(c8);

        var t1 = document.getElementById('areaEditarCategoria');

        t1.appendChild(contenedorTitulo);
        t1.appendChild(formulario);


        // Agregando evento al formulario
        formulario.addEventListener('submit', function(){
          editando = false;
        });

      }

    }

    function editarVenta(id){
      if (editando==false) {
        editando = true;

        var botonPresionado = document.getElementById('ve'+id);
        var columna = botonPresionado.parentNode;
        var fila = columna.parentNode;
        var padre = fila.parentNode;
        var vector = fila.children;

        var id = vector[0].textContent;
        var idCliente = vector[1].textContent;
        var idProducto = vector[2].textContent;
        var fecha_venta = vector[3].textContent;
        var cantidad = vector[4].textContent;
        var precio = vector[5].textContent;
        var total = vector[6].textContent;

        ////////////////////////////////////////////////////////////////
        /////////////// CREAMOS EL TITULO DEL FORMULARIO ///////////////
        ////////////////////////////////////////////////////////////////

        // 1.	Crear el contenedor
        var contenedorTitulo = document.createElement('div');
        contenedorTitulo.setAttribute('class','py-5 text-center');
        contenedorTitulo.innerHTML = '<h2>Actualizando registro</h2>';

        ////////////////////////////////////////////////////////////////
        ///////////// CREAMOS LA ESTRUCTURA DEL FORMULARIO /////////////
        ////////////////////////////////////////////////////////////////

        // 1.	Crear el formulario (form)
        var formulario = document.createElement('form');
        formulario.setAttribute('action','modificarRegistro.php');
        formulario.setAttribute('method','POST');
        formulario.setAttribute('autocomplete','off');

        // 2.	Crear las contenedores (div)
        var c1 = document.createElement('div');
        c1.setAttribute('class','form-group');
        var c2 = document.createElement('div');
        c2.setAttribute('class','form-group');
        var c3 = document.createElement('div');
        c3.setAttribute('class','form-group');
        var c4 = document.createElement('div');
        c4.setAttribute('class','form-group');
        var c5 = document.createElement('div');
        c5.setAttribute('class','form-group');
        var c6 = document.createElement('div');
        c6.setAttribute('class','form-group');
        var c7 = document.createElement('div');
        c7.setAttribute('class','form-group');
        var c8 = document.createElement('div');
        c8.setAttribute('class','form-group');

        // 3. Crear los labels y añadirlos a los contenedores
        var l1 = document.createElement('label');
        l1.textContent = 'ID';
        var l2 = document.createElement('label');
        l2.textContent = 'Id cliente';
        l2.setAttribute('for','idCliente');
        var l3 = document.createElement('label');
        l3.textContent = 'Id producto';
        l3.setAttribute('for','idProducto');
        var l4 = document.createElement('label');
        l4.textContent = 'Fecha de venta';
        l4.setAttribute('for','fecha_venta');
        var l5 = document.createElement('label');
        l5.textContent = 'Cantidad';
        l5.setAttribute('for','cantidad');
        var l6 = document.createElement('label');
        l6.textContent = 'Precio';
        l6.setAttribute('for','precio');
        var l7 = document.createElement('label');
        l7.textContent = 'Total';
        l7.setAttribute('for','total');

        c1.appendChild(l1);
        c2.appendChild(l2);
        c3.appendChild(l3);
        c4.appendChild(l4);
        c5.appendChild(l5);
        c6.appendChild(l6);
        c7.appendChild(l7);

        // 4.	Crear los input (input)
        var i1 = document.createElement('input');
        i1.setAttribute('type','text');
        i1.setAttribute('class','form-control');
        i1.setAttribute('readonly','');
        i1.setAttribute('value',id);
        i1.setAttribute('name','id');

        var i2 = document.createElement('input');
        i2.setAttribute('type','text');
        i2.setAttribute('class','form-control');
        i2.setAttribute('value',idCliente);
        i2.setAttribute('id','idCliente');
        i2.setAttribute('name','idCliente');


        var i3 = document.createElement('input');
        i3.setAttribute('type','text');
        i3.setAttribute('class','form-control');
        i3.setAttribute('value',idProducto);
        i3.setAttribute('id','idProducto');
        i3.setAttribute('name','idProducto');

        var i4 = document.createElement('input');
        i4.setAttribute('type','text');
        i4.setAttribute('class','form-control');
        i4.setAttribute('value',fecha_venta);
        i4.setAttribute('id','fecha_venta');
        i4.setAttribute('name','fecha_venta');

        var i5 = document.createElement('input');
        i5.setAttribute('type','text');
        i5.setAttribute('class','form-control');
        i5.setAttribute('value',cantidad);
        i5.setAttribute('id','cantidad');
        i5.setAttribute('name','cantidad');

        var i6 = document.createElement('input');
        i6.setAttribute('type','text');
        i6.setAttribute('class','form-control');
        i6.setAttribute('value',precio);
        i6.setAttribute('id','precio');
        i6.setAttribute('name','precio');

        var i7 = document.createElement('input');
        i7.setAttribute('type','text');
        i7.setAttribute('class','form-control');
        i7.setAttribute('value',total);
        i7.setAttribute('id','total');
        i7.setAttribute('name','total');

        var i8 = document.createElement('input');
        i8.setAttribute('type','submit');
        i8.setAttribute('class','btn btn-success');
        i8.setAttribute('value','Actualizar');
        i8.setAttribute('name','btnActualizarVenta');

        // 5. Añadir los input a las columnas
        c1.appendChild(i1);
        c2.appendChild(i2);
        c3.appendChild(i3);
        c4.appendChild(i4);
        c5.appendChild(i5);
        c6.appendChild(i6);
        c7.appendChild(i7);
        c8.appendChild(i8);

        // 6. Añadir los contenedores al formulario
        formulario.appendChild(c1);
        formulario.appendChild(c2);
        formulario.appendChild(c3);
        formulario.appendChild(c4);
        formulario.appendChild(c5);
        formulario.appendChild(c6);
        formulario.appendChild(c7);
        formulario.appendChild(c8);

        var t1 = document.getElementById('areaEditarVenta');

        t1.appendChild(contenedorTitulo);
        t1.appendChild(formulario);


        // Agregando evento al formulario
        formulario.addEventListener('submit', function(){
          editando = false;
        });

      }


    }

    function eliminarVenta(id){
      if (editando==false) {
        editando = true;

        var botonPresionado = document.getElementById('ve'+id);
        var columna = botonPresionado.parentNode;
        var fila = columna.parentNode;
        var padre = fila.parentNode;
        var vector = fila.children;

        var id = vector[0].textContent;
        var idCliente = vector[1].textContent;
        var idProducto = vector[2].textContent;
        var fecha_venta = vector[3].textContent;
        var cantidad = vector[4].textContent;
        var precio = vector[5].textContent;
        var total = vector[6].textContent;

        ////////////////////////////////////////////////////////////////
        /////////////// CREAMOS EL TITULO DEL FORMULARIO ///////////////
        ////////////////////////////////////////////////////////////////

        // 1.	Crear el contenedor
        var contenedorTitulo = document.createElement('div');
        contenedorTitulo.setAttribute('class','py-5 text-center');
        contenedorTitulo.innerHTML = '<h2>Eliminando registro</h2>';

        ////////////////////////////////////////////////////////////////
        ///////////// CREAMOS LA ESTRUCTURA DEL FORMULARIO /////////////
        ////////////////////////////////////////////////////////////////

        // 1.	Crear el formulario (form)
        var formulario = document.createElement('form');
        formulario.setAttribute('action','modificarRegistro.php');
        formulario.setAttribute('method','POST');
        formulario.setAttribute('autocomplete','off');

        // 2.	Crear las contenedores (div)
        var c1 = document.createElement('div');
        c1.setAttribute('class','form-group');
        var c2 = document.createElement('div');
        c2.setAttribute('class','form-group');
        var c3 = document.createElement('div');
        c3.setAttribute('class','form-group');
        var c4 = document.createElement('div');
        c4.setAttribute('class','form-group');
        var c5 = document.createElement('div');
        c5.setAttribute('class','form-group');
        var c6 = document.createElement('div');
        c6.setAttribute('class','form-group');
        var c7 = document.createElement('div');
        c7.setAttribute('class','form-group');
        var c8 = document.createElement('div');
        c8.setAttribute('class','form-group');

        // 3. Crear los labels y añadirlos a los contenedores
        var l1 = document.createElement('label');
        l1.textContent = 'ID';
        var l2 = document.createElement('label');
        l2.textContent = 'Id cliente';
        l2.setAttribute('for','idCliente');
        var l3 = document.createElement('label');
        l3.textContent = 'Id producto';
        l3.setAttribute('for','idProducto');
        var l4 = document.createElement('label');
        l4.textContent = 'Fecha de venta';
        l4.setAttribute('for','fecha_venta');
        var l5 = document.createElement('label');
        l5.textContent = 'Cantidad';
        l5.setAttribute('for','cantidad');
        var l6 = document.createElement('label');
        l6.textContent = 'Precio';
        l6.setAttribute('for','precio');
        var l7 = document.createElement('label');
        l7.textContent = 'Total';
        l7.setAttribute('for','total');

        c1.appendChild(l1);
        c2.appendChild(l2);
        c3.appendChild(l3);
        c4.appendChild(l4);
        c5.appendChild(l5);
        c6.appendChild(l6);
        c7.appendChild(l7);

        // 4.	Crear los input (input)
        var i1 = document.createElement('input');
        i1.setAttribute('type','text');
        i1.setAttribute('class','form-control');
        i1.setAttribute('readonly','');
        i1.setAttribute('value',id);
        i1.setAttribute('name','id');

        var i2 = document.createElement('input');
        i2.setAttribute('type','text');
        i2.setAttribute('class','form-control');
        i2.setAttribute('value',idCliente);
        i2.setAttribute('id','idCliente');
        i2.setAttribute('name','idCliente');


        var i3 = document.createElement('input');
        i3.setAttribute('type','text');
        i3.setAttribute('class','form-control');
        i3.setAttribute('value',idProducto);
        i3.setAttribute('id','idProducto');
        i3.setAttribute('name','idProducto');

        var i4 = document.createElement('input');
        i4.setAttribute('type','text');
        i4.setAttribute('class','form-control');
        i4.setAttribute('value',fecha_venta);
        i4.setAttribute('id','fecha_venta');
        i4.setAttribute('name','fecha_venta');

        var i5 = document.createElement('input');
        i5.setAttribute('type','text');
        i5.setAttribute('class','form-control');
        i5.setAttribute('value',cantidad);
        i5.setAttribute('id','cantidad');
        i5.setAttribute('name','cantidad');

        var i6 = document.createElement('input');
        i6.setAttribute('type','text');
        i6.setAttribute('class','form-control');
        i6.setAttribute('value',precio);
        i6.setAttribute('id','precio');
        i6.setAttribute('name','precio');

        var i7 = document.createElement('input');
        i7.setAttribute('type','text');
        i7.setAttribute('class','form-control');
        i7.setAttribute('value',total);
        i7.setAttribute('id','total');
        i7.setAttribute('name','total');

        var i8 = document.createElement('input');
        i8.setAttribute('type','submit');
        i8.setAttribute('class','btn btn-danger');
        i8.setAttribute('value','Eliminar');
        i8.setAttribute('name','btnEliminarVenta');

        // 5. Añadir los input a las columnas
        c1.appendChild(i1);
        c2.appendChild(i2);
        c3.appendChild(i3);
        c4.appendChild(i4);
        c5.appendChild(i5);
        c6.appendChild(i6);
        c7.appendChild(i7);
        c8.appendChild(i8);

        // 6. Añadir los contenedores al formulario
        formulario.appendChild(c1);
        formulario.appendChild(c2);
        formulario.appendChild(c3);
        formulario.appendChild(c4);
        formulario.appendChild(c5);
        formulario.appendChild(c6);
        formulario.appendChild(c7);
        formulario.appendChild(c8);

        var t1 = document.getElementById('areaEditarVenta');

        t1.appendChild(contenedorTitulo);
        t1.appendChild(formulario);


        // Agregando evento al formulario
        formulario.addEventListener('submit', function(){
          editando = false;
        });

      }


    }


    $(document).ready(function(){
      $('.data').DataTable({
        responsive: true,
        autoWidth: false
      });

    });

    </script>

  </body>
</html>
