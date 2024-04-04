function validarInput(e){
    let id_Auto = document.getElementById('id_Auto').value;
    let id_Cliente= document.getElementById('id_Cliente').value;
    let modelo = document.getElementById('modelo').value; 
    let marca =document.getElementById('marca').value; 
    let propietario = document.getElementById('propietario').value; 
    let kilometraje =document.getElementById('kilometraje').value;
    let placas = document.getElementById('placas').value;
    let numero_Serie = document.getElementById('numero_Serie').value;

    if(id_Auto == ""  ||id_Cliente == ""  ||modelo == ""  ||marca == ""  ||propietario == ""  ||placas == ""  ||numero_Serie == "" ){
        alert('Existen campos vacios, favor de llenar correctamente todos los espacios');
        e.preventDefault();
        return false; 
    }else if(isNaN(id_Auto) || id_Auto.length != 5){
        alert('ID del auto debe ser de 5 digitos númericos');
        e.preventDefault();
        return false;        
    }else if(isNaN(id_Cliente) || id_Cliente.length != 5){
        alert('ID del auto debe ser de 5 digitos númericos');
        e.preventDefault();
        return false;        
    }else if (kilometraje <= 0.0 || isNaN(kilometraje)){
        alert('Favor de ingresar un kilometraje válido');
        e.preventDefault();
        return false;
    }else {
        return true;
    }
    
}