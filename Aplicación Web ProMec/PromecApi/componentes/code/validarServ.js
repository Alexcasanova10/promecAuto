function validarInput(e){
    let descripcion = document.getElementById('descripcion').value;
    let monto = document.getElementById('costo').value;
    let id = document.getElementById('id_OrdServ').value;
    
    let fecha = document.getElementById('fecha');
    let fechaVal = new Date(fecha.value);
    let fechaHoy = new Date();  
    
    let estatus = document.getElementById('estatus').value;
    let placas = document.getElementById('placas').value;
    
    if(descripcion == ""  || placas == ""){
        alert('Existen campos vacios, favor de llenar correctamente todos los espacios');
        e.preventDefault();
        return false;
    }else if(isNaN(id) || id.length != 5){
        alert('ID debe ser de 5 digitos númericos');
        e.preventDefault();
        return false;
        
    }else if (monto <= 0.0 || isNaN(monto)){
        alert('Favor de ingresar un monto válido');
        e.preventDefault();
        return false;
    }else if(fechaVal === '' || fechaVal <= fechaHoy){
        alert('Favor de ingresar una fecha posterior al día de hoy');
        e.preventDefault();
        return false;
    }else if(estatus == ""){
        alert('Favor de seleccionar el estado del servicio');
        e.preventDefault();
        return false;
    }else {
        return true;
    }
    
}