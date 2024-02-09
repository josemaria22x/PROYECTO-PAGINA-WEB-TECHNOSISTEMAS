<?php

////////////////////////////////////////////////////////////////////////
// MODIFICACIÓN Y ELIMINACIÓN DE REGISTROS DE LA TABLA: CLIENTE ////////
////////////////////////////////////////////////////////////////////////

if (isset($_POST['btnActualizarCliente'])) {

    $id = $_POST['id'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $dpi = $_POST['dpi'];
    $fecha_nac = $_POST['fecha_nac'];
    $direccion = $_POST['direccion'];
    $genero = $_POST['genero'];

    include("abrir_conexion.php");

    //ACTUALIZAR
    $_UPDATE_SQL = "UPDATE $tabla_db1 Set
    nombres='$nombres',
    apellidos='$apellidos',
    dpi='$dpi',
    fecha_nac='$fecha_nac',
    direccion='$direccion',
    genero='$genero'

    WHERE idCliente='$id'";

    mysqli_query($conexion,$_UPDATE_SQL);

    include("cerrar_conexion.php");
  }

  if (isset($_POST['btnEliminarCliente'])) {
    $id = $_POST['id'];

    include("abrir_conexion.php");
    //ELIMINAR
    $_DELETE_SQL =  "DELETE FROM $tabla_db1 WHERE idCliente='$id'";
    mysqli_query($conexion,$_DELETE_SQL);
    include("cerrar_conexion.php");
  }

  ////////////////////////////////////////////////////////////////////////
  // MODIFICACIÓN Y ELIMINACIÓN DE REGISTROS DE LA TABLA: PRODUCTO ///////
  ////////////////////////////////////////////////////////////////////////

  if (isset($_POST['btnActualizarProducto'])) {

      $id = $_POST['id'];
      $idCategoria= $_POST['idCategoria'];
      $nombreProd = $_POST['nombreProd'];
      $precioProd = $_POST['precioProd'];

      include("abrir_conexion.php");

      //ACTUALIZAR
      $_UPDATE_SQL = "UPDATE $tabla_db3 Set
      idCategoria='$idCategoria',
      nombre='$nombreProd',
      precio='$precioProd'

      WHERE idProducto='$id'";

      mysqli_query($conexion,$_UPDATE_SQL);

      include("cerrar_conexion.php");
    }

    if (isset($_POST['btnEliminarProducto'])){
      $id = $_POST['id'];

      include("abrir_conexion.php");
      //ELIMINAR
      $_DELETE_SQL =  "DELETE FROM $tabla_db3 WHERE idProducto='$id'";
      mysqli_query($conexion,$_DELETE_SQL);
      include("cerrar_conexion.php");
    }

    ////////////////////////////////////////////////////////////////////////
    // MODIFICACIÓN Y ELIMINACIÓN DE REGISTROS DE LA TABLA: CATEGORÍA //////
    ////////////////////////////////////////////////////////////////////////

    if (isset($_POST['btnActualizarCategoria'])){
      $id = $_POST['id'];
      $nombreCategoria= $_POST['nombreCategoria'];

      include("abrir_conexion.php");

      //ACTUALIZAR
      $_UPDATE_SQL = "UPDATE $tabla_db4 Set
      nombre='$nombreCategoria'

      WHERE idCategoria='$id'";

      mysqli_query($conexion,$_UPDATE_SQL);

      include("cerrar_conexion.php");
    }

    if (isset($_POST['btnEliminarCategoria'])){
      $id = $_POST['id'];

      include("abrir_conexion.php");
      //ELIMINAR
      $_DELETE_SQL =  "DELETE FROM $tabla_db4 WHERE idCategoria='$id'";
      mysqli_query($conexion,$_DELETE_SQL);
      include("cerrar_conexion.php");
    }

    ////////////////////////////////////////////////////////////////////////
    // MODIFICACIÓN Y ELIMINACIÓN DE REGISTROS DE LA TABLA: VENTA //////////
    ////////////////////////////////////////////////////////////////////////

    if (isset($_POST['btnActualizarVenta'])) {

        $id = $_POST['id'];
        $idCliente = $_POST['idCliente'];
        $idProducto = $_POST['idProducto'];
        $fecha_venta = $_POST['fecha_venta'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $total = $precio * $cantidad;

        include("abrir_conexion.php");

        //ACTUALIZAR
        $_UPDATE_SQL = "UPDATE $tabla_db5 Set
        idCliente ='$idCliente',
        idProducto ='$idProducto',
        fecha_venta ='$fecha_venta',
        cantidad ='$cantidad',
        precio ='$precio',
        total ='$total'

        WHERE idVenta='$id'";

        mysqli_query($conexion,$_UPDATE_SQL);

        include("cerrar_conexion.php");
      }

      if (isset($_POST['btnEliminarVenta'])) {
        $id = $_POST['id'];

        include("abrir_conexion.php");
        //ELIMINAR
        $_DELETE_SQL =  "DELETE FROM $tabla_db5 WHERE idVenta='$id'";
        mysqli_query($conexion,$_DELETE_SQL);
        include("cerrar_conexion.php");
      }


  header('Location:admin.php');
?>
