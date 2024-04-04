<?php
include 'modeloServicios.php';

$modelo = new Modelo();

if (isset($_POST['descripcion']) && isset($_POST['costo']) && isset($_POST['id_OrdServ'])&& isset($_POST['fecha'])&& isset($_POST['estatus'])&& isset($_POST['placas'])) {
    $modelo-> descripcion= $_POST['descripcion'];
    $modelo->costo = $_POST['costo'];
    $modelo->id_OrdServ = $_POST['id_OrdServ'];
    $modelo->fecha = $_POST['fecha'];
    $modelo->estatus = $_POST['estatus'];
    $modelo->placas = $_POST['placas'];
 

     if (isset($_POST['id_editar']) && !empty($_POST['id_editar'])) {
         $modelo->actualizar($_POST['id_editar']);
    } else {
         $modelo->registrar();
    }
    header('Location: ../servicios.php');
}

if (isset($_REQUEST['opcion']) && isset($_REQUEST['id_OrdServ'])) {
    if ($_REQUEST['opcion'] == 2) {
        $modelo->eliminar($_REQUEST['id_OrdServ']);
    }
}  

header('Location: ../servicios.php');
?>
