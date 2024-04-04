//validar formulario

let btn = document.getElementById('btn');

function checkPswd(){
    let passInput = document.getElementById('pswd');
    let check = document.getElementById('check');
    if(check.checked){
        passInput.type = "text";
    }else {
        passInput.type = "password";
    }
}


btn.addEventListener("click", event =>{ 
    let user = document.getElementById('user').value;
    let pswd = document.getElementById('pswd').value;

    if (user !== "Promec10" || pswd !== "proCar12!") {
        alert("Usuario o contraseña incorrectos. Favor de verificar los datos.");
        event.preventDefault(); 
    }else {
        alert("Ingreso exitoso");
    }
}) 







