 
 function validarInput(e){
    let nombre = document.getElementById('nombre').value;
    let cantidad = document.getElementById('cantidad').value;
    let id_Prod = document.getElementById('id_Prod').value;
    let costo = document.getElementById('costo').value;
      

    if (nombre == ''||id_Prod == ''||costo == ''){
        alert('Existen campos vacios, favor de llenar correctamente todos los espacios');
        e.preventDefault();
        return false;
    }else  if(isNaN(id_Prod) || id_Prod.length != 5){
        alert('ID debe ser de 5 digitos númericos');
        e.preventDefault();
        return false;    
    }else  if(isNaN(cantidad) || cantidad ==0){
        alert('Ingresa una cantidad válida');
        e.preventDefault();
        return false;    
    }else if (isNaN(costo) || costo <= 0) {
        alert('Ingresa un monto válido');
        e.preventDefault();
        return false;
    }else {
        return true;
    }
    
}