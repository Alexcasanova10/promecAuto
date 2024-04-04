 
 function validarInput(e){
    let nombre = document.getElementById('nombre').value;
    let apellido = document.getElementById('apellido').value;
    let id_Cliente = document.getElementById('id_Cliente').value;
    let direccion = document.getElementById('direccion').value;
    let telefono = document.getElementById('telefono').value;
    let correo = document.getElementById('correo').value;
    
    if (nombre == ''||apellido == ''||direccion == ''){
        alert('Existen campos vacios, favor de llenar correctamente todos los espacios');
        e.preventDefault();
        return false;
    }else  if(isNaN(id_Cliente) || id_Cliente.length != 5){
        alert('ID debe ser de 5 digitos númericos');
        e.preventDefault();
        return false;    
    }else if (telefono.length != 10 || isNaN(telefono)) {
        alert('El teléfono debe tener 10 dígitos numéricos');
        e.preventDefault();
        return false;
    }else if (!correo.includes('@') || !correo.includes('.com')) {
        alert('El correo debe incluir @ y .com');
        e.preventDefault();
        return false;
    }else {
        return true;
    }
    
}