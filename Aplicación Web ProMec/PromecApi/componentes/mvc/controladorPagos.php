<?php
include 'modeloPagos.php';

$modelo = new Modelo();

if (isset($_POST['id_transac']) && isset($_POST['fecha']) && isset($_POST['monto'])&& isset($_POST['tipo'])) {
    $modelo->id_transac = $_POST['id_transac'];
    $modelo->fecha = $_POST['fecha'];
    $modelo->monto = $_POST['monto'];
    $modelo->tipo = $_POST['tipo'];
     
     if (isset($_POST['id_editar']) && !empty($_POST['id_editar'])) {
         $modelo->actualizar($_POST['id_editar']);
    } 
    else {
         $modelo->registrar();
    }
    header('Location: ../pagos.php');
}

if (isset($_REQUEST['opcion']) && isset($_REQUEST['id_transac'])) {
    if ($_REQUEST['opcion'] == 2) {
        $modelo->eliminar($_REQUEST['id_transac']);
    }
}
 


header('Location: ../pagos.php');
?>