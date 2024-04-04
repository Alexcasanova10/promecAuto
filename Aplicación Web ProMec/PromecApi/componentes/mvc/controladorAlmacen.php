<?php
include 'modeloAlmacen.php';

$modelo = new Modelo();

if (isset($_POST['nombre']) && isset($_POST['cantidad']) && isset($_POST['id_Prod'])&& isset($_POST['costo'])) {
    $modelo->nombre= $_POST['nombre'];
    $modelo->cantidad= $_POST['cantidad'];
    $modelo->id_Prod = $_POST['id_Prod'];
    $modelo->costo = $_POST['costo'];
 
     if (isset($_POST['id_editar']) && !empty($_POST['id_editar'])) {
        $modelo->actualizar($_POST['id_editar']);
    } else {
        $modelo->registrar();
    }
    header('Location: ../almacen.php');
}

if (isset($_REQUEST['opcion']) && isset($_REQUEST['id_Prod'])) {
    if ($_REQUEST['opcion'] == 2) {
        $modelo->eliminar($_REQUEST['id_Prod']);
    }
}  

header('Location: ../almacen.php');
?>
