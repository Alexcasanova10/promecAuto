<?php
include 'modeloFacturas.php';

$modelo = new Modelo();

if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['producto'])&& isset($_POST['descripcion'])&& isset($_POST['cantidad'])&& isset($_POST['Id_Factura'])&& isset($_POST['fecha'])&& isset($_POST['monto'])&& isset($_POST['correo'])&& isset($_POST['estatus'])) {
    $modelo->nombre = $_POST['nombre'];
    $modelo->apellido = $_POST['apellido'];
    $modelo->producto = $_POST['producto'];
    $modelo->descripcion = $_POST['descripcion'];
    $modelo->cantidad = $_POST['cantidad'];
    $modelo->Id_Factura = $_POST['Id_Factura'];
    $modelo->fecha = $_POST['fecha'];
    $modelo->monto = $_POST['monto'];
    $modelo->correo = $_POST['correo'];
    $modelo->estatus = $_POST['estatus'];
    if(isset($_POST['Id_Factura'])){
        $modelo->registrar();
    }
}
    /*if (isset($_POST['Id_Factura']) && !empty($_POST['Id_Factura'])) {
            echo 'owo';
    }else{  
    }*/

    // header('Location: ../facturas.php');

header('Location: ../facturas.php');
?>







