<?php
  //Credenciales
  $host = "localhost";
  $usuariodb = "Bernabe";
  $clavedb = "12345";
  $basededatos = "technosistemas";

  //Tablas
  $tabla_db1 = "cliente";
  $tabla_db2 = "usuario";
  $tabla_db3 = "producto";
  $tabla_db4 = "categoria";
  $tabla_db5 = "venta";
  $tabla_db6 = "categoria";

  //No me muestra errores
  error_reporting(0);

  $conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);

  if ($conexion->connect_errno) {
    echo "Nuestro sitio experimenta fallos";
    exit();
  }
?>
