<?php
include 'modeloClientes.php';

$modelo = new Modelo();

if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['id_Cliente'])&& isset($_POST['direccion'])&& isset($_POST['telefono'])&& isset($_POST['correo'])) {
    $modelo->nombre = $_POST['nombre'];
    $modelo->apellido = $_POST['apellido'];
    $modelo->id_Cliente = $_POST['id_Cliente'];
    $modelo->direccion = $_POST['direccion'];
    $modelo->telefono = $_POST['telefono'];
    $modelo->correo = $_POST['correo'];
    
    

     if (isset($_POST['id_editar']) && !empty($_POST['id_editar'])) {
        // Actualizar registro
        $modelo->actualizar($_POST['id_editar']);
    } else {
        // Registrar nuevo registro
        $modelo->registrar();
    }
    header('Location: ../clientes.php');
}

if (isset($_REQUEST['opcion']) && isset($_REQUEST['id_Cliente'])) {
    if ($_REQUEST['opcion'] == 2) {
        $modelo->eliminar($_REQUEST['id_Cliente']);
    }
}  

header('Location: ../clientes.php');
?>
