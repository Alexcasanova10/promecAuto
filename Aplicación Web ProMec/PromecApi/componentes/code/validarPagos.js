 
 function validarInput(e){
    let id = document.getElementById('id_transac').value;

    let fecha = document.getElementById('fecha');
    let fechaVal = new Date(fecha.value);
    let fechaHoy = new Date();  
 
    let monto = document.getElementById('monto').value;
    let tipo = document.getElementById('tipo').value;
     
    if(isNaN(id) || id.length != 5){
        alert('ID debe ser de 5 digitos númericos');
        e.preventDefault();
        return false;    
    }else if (monto <= 0.0 || isNaN(monto)){
        alert('Favor de ingresar un monto válido en decimales');
        e.preventDefault();
        return false;
    }else if(fechaVal === '' || fechaVal <= fechaHoy){
        alert('Favor de ingresar una fecha posterior al día de hoy');
        e.preventDefault();
        return false;
    }else if(tipo == ""){
        alert('Favor de seleccionar el tipo de pago en caja');
        e.preventDefault();
        return false;
    }else {
        return true;
    }
    
}