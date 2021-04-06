<?php
session_start();
include './conexion.php';
if(!isset($_SESSION['carrito2']))
  {header("Location: ./index.php");}
  $arreglo  = $_SESSION['carrito2'];

$password="";

if(isset($_POST['c_account_password'])){
    if($_POST['c_account_password']!=""){
        $nombre= $_POST['nombre'];
        $id_usuario = $conexion->insert_id;
        $fecha = date('Y-m-d h:m:s');
    }
}

$resultado=$conexion->query("SELECT EXISTS (SELECT * FROM cursos WHERE nombre='$nombre');");
$row=mysqli_fetch_row($resultado);

    if ($row[0]=="1") {
            header("Location: ../admin/cursos.php?successdup");
    }else{
      $conexion->query("insert into cursos
          (nombre,descripcion,duracion,fecha_inicio,fecha_creacion) values
          (
              '".($nombre)."',
              '".$_POST['descripcion']."',
              '".$_POST['duracion']."',
              '".$_POST['fecha_inicio']."',
              '$fecha'
          )   ")or die($conexion->error);
          header("Location: ../admin/cursos.php?success");
    }
?>
