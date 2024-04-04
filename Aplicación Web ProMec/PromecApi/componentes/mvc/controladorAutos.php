<?php
include 'modeloAutos.php';



$modelo = new Modelo();

if (isset($_POST['modelo']) && isset($_POST['marca']) && isset($_POST['propietario'])&& isset($_POST['kilometraje'])&& isset($_POST['placas'])&& isset($_POST['id_Auto'])&& isset($_POST['id_Cliente'])&& isset($_POST['numero_Serie'])){
    $modelo->modelo = $_POST['modelo'];
    $modelo->marca = $_POST['marca'];
    $modelo->propietario = $_POST['propietario'];
    $modelo->kilometraje = $_POST['kilometraje'];
    $modelo->placas = $_POST['placas'];
    $modelo->id_Auto = $_POST['id_Auto'];
    $modelo->id_Cliente = $_POST['id_Cliente'];
    $modelo-> numero_Serie= $_POST['numero_Serie'];
    
 

     if (isset($_POST['id_editar']) && !empty($_POST['id_editar'])) {
        $modelo->actualizar($_POST['id_editar']);
    } else {
        $modelo->registrar();
    }
    header('Location: ../autos.php');
}

if (isset($_REQUEST['opcion']) && isset($_REQUEST['Id_Auto'])) {
    if ($_REQUEST['opcion'] == 2) {
        $modelo->eliminar($_REQUEST['Id_Auto']);
    }
}  

header('Location: ../autos.php');
?>
