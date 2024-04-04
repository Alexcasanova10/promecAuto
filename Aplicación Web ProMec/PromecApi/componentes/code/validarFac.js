function validarInput(e){
    let nombre = document.getElementById('nombre').value;
    let apellido= document.getElementById('apellido').value;
    let producto = document.getElementById('producto').value;
    let descripcion = document.getElementById('descripcion').value;
    let cantidad = document.getElementById('cantidad').value;
    let Id_Factura = document.getElementById('Id_Factura').value;
   
    let fecha = document.getElementById('fecha');
    let fechaVal = new Date(fecha.value);
    let fechaHoy = new Date();  

    let monto = document.getElementById('monto').value;
    let correo = document.getElementById('correo').value;
    let estatus = document.getElementById('estatus').value;
    
    if(nombre ==""||apellido ==""||producto==""|| descripcion == ""){
        alert('Existen campos vacios, favor de llenar correctamente todos los espacios');
        e.preventDefault();
        return false;
    }else if(cantidad <= 0){
        alert('Ingresa una cantidad válida');
        e.preventDefault();
        return false;
    }else if(isNaN(Id_Factura) || Id_Factura.length != 5){
        alert('ID debe ser de 5 digitos númericos');
        e.preventDefault();
        return false;        
    }else if(fechaVal === '' || fechaVal <= fechaHoy){
        alert('Favor de ingresar una fecha posterior al día de hoy');
        e.preventDefault();
        return false;
    }else if (monto <= 0.0 || isNaN(monto)){
        alert('Favor de ingresar un monto válido');
        e.preventDefault();
        return false;
    }else if(!correo.includes('@') || !correo.includes('.com')) {
        alert('El correo debe incluir @ y .com');
        e.preventDefault();
        return false;
    }else if(estatus == ""){
        alert('Favor de seleccionar el estado del servicio');
        e.preventDefault();
        return false;
    }else{
        return true;
    }
}
