<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturas</title>
    <link rel="stylesheet" href="../css.css">
    <link rel="stylesheet" href="compStyles.css">

</head>
<body>
    <div class="container">
        <header class="header">           
            <div class="navbar">
                <a href="../mainP.php">Inicio</a>
                <a href="servicios.php">Servicios</a>
                <div class="dropdown">
                  <button class="dropbtn">Caja      
                    <i class="fa fa-caret-down"></i>
                  </button>
                  <div class="dropdown-content">
                    <a href="pagos.php">Pagos</a>
                    <a href="facturas.php">Facturas</a>
                  </div>  
                </div> 
                <a href="almacen.php">Almacen</a>
                
                

                <div class="dropdown">
                  <button class="dropbtn">Clientes      
                    <i class="fa fa-caret-down"></i>
                  </button>
                  <div class="dropdown-content">
                    <a href="clientes.php">Cartera de clientes</a>
                    <a href="autos.php">Listado de autos</a>
                  </div>  
                </div> 





                <a href="../login.php">Cerrar Sesión</a>
            </div>
         </header>
         <div class="main-container2">          

            <div class="registro">
                <h1 class="h1">Facturación</h1>
                <form action="mvc/controladorFacturas.php" onsubmit="return confirm('¿Datos correctos?')" class="form-2" method="post">
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre" id="nombre" class="input_Text">
                    
                    <label for="apellido">Apellido: </label>
                    <input type="text" name="apellido" id="apellido" class="input_Text">
                    
                    <label for="producto">Producto: </label>
                    <input type="text" name="producto" id="producto" class="input_Text">
                    
                    <label for="descripcion">Descripcion: </label>
                    <input type="text" name="descripcion" id="descripcion" class="input_Text">
                    
                    <label for="cantidad">Cantidad: </label>
                    <input type="number" name="cantidad" id="cantidad" class="input_Text">

                    <label for="Id_Factura">Id de factura (maximo 5 dígitos númericos): </label>
                    <input type="text" name="Id_Factura" id="Id_Factura" class="input_Text">

                    <label for="fecha">Fecha: </label>
                    <input type="date" name="fecha" id="fecha" class="input_Text">

                    <label for="monto">Monto: </label>
                    <input type="text" name="monto" id="monto" class="input_Text">

                    <label for="correo">Correo: </label>
                    <input type="email" name="correo" id="correo" class="input_Text">   
                    
                    <label for="estatus">Estado de factura: </label>
                    <select name="estatus" id="estatus">
                        <option value="pagado">Pagado</option>
                        <option value="pendiente">Pendiente</option>
                        <option value="rechazado">Rechazado</option>
                    </select>
                    
                    <input type="submit" onclick="generarPDF()" value="Generar Factura" id="btn" name="btn" class="btn">         
                 </form>
            </div>
         </div> 
         
         
        <footer class="footer">
                <ul class="list-ul">
                    <li class="list-li">
                        Copyright © 2024 ProMec Auto Guadalajara
                    </li>  
                    <li class="list-li">
                        <a class="footer-link" href="../WebEmas/index.html">Developed by EMAS</a>
                    </li>
                </ul>            
        </footer>
    </div>
        

    <script src="code/validarFac.js"></script>
    <script src="https://unpkg.com/jspdf-invoice-template@1.4.0/dist/index.js"></script>
    <script>
        function generarPDF(){
             if(!validarInput(event)){
                console.log('Error de validación');
             }else{
                 let nombre = document.getElementById('nombre').value;
                 let apellido= document.getElementById('apellido').value;
                  let producto = document.getElementById('producto').value;
                  let descripcion = document.getElementById('descripcion').value;
                 let cantidad = document.getElementById('cantidad').value;
                 let Id_Factura = document.getElementById('Id_Factura').value;
                 let fecha = document.getElementById('fecha').value;
                 let monto = document.getElementById('monto').value;
                 let correo = document.getElementById('correo').value;
                 let estatus = document.getElementById('estatus').value;
                 
                 let total =  (monto * cantidad)*1.16;
 
                 
                 var props = {
                     outputType: jsPDFInvoiceTemplate.OutputType.Save,
                     returnJsPDFDocObject: true,
                     fileName: "Factura Promec #" + Id_Factura,
                     orientationLandscape: false,
                     compress: true,
                     logo: {
                         src: "../mediaApi/logo.png",
                         type: 'PNG', 
                         width: 30.00,
                         height: 30.00,
                         margin: {
                             top: 0, 
                             left: 0 
                         }
                     },
                     stamp: {
                         inAllPages: true, 
                         src: "https://raw.githubusercontent.com/edisonneza/jspdf-invoice-template/demo/images/qr_code.jpg",
                         type: 'JPG',  
                         width: 20,  
                         height: 20,
                         margin: {
                             top: 0,  
                             left: 0  
                         }
                     },
                     business: {
                         name: "Promec Auto",
                         address: "Calzada Lázaro Cárdenas 2212, Guadalajara Jalisco",
                         phone: "(+52) 338 155 5164",
                         email: "atencion@promecauto.com",
                         website: "www.promecauto.com.mx",
                     },
                     contact: {
                         label: "Factura dirigda a:",
                         name: nombre + " " + apellido,
                         address: correo
                     },
                     invoice: {
                         label: "ID Factura: ",
                         num: "#"+Id_Factura,
                         invDate: "Estado de cobro: " + estatus,
                         invGenDate: "Fecha de emisión: " + fecha,
                         headerBorder: false,
                         tableBodyBorder: false,
                         header: [
                         {
                             title: "#", 
                             style: { 
                             width: 10 
                             } 
                         }, 
                         { 
                             title: "Producto",
                             style: {
                             width: 30
                             } 
                         }, 
                         { 
                             title: "Descripción",
                             style: {
                             width: 80
                             } 
                         }, 
                         { title: "Precio"},
                         { title: "Cantidad"},
                         { title: "IVA"},
                         { title: "Total"}
                         ],
                         table: Array.from(Array(1), (item, index)=>([
                             index + 1, 
                             producto, 
                             descripcion,  
                             monto,  
                             cantidad,  
                             "16%", 
                             Math.round(total * 100) / 100  
                         ])),
                         additionalRows: [{
                             col1: 'Total:',
                             col2: '145,250.50',
                             col3: 'ALL',
                             style: {
                                 fontSize: 14 
                             }
                         },
                         {
                             col1: 'VAT:',
                             col2: '20',
                             col3: '%',
                             style: {
                                 fontSize: 10 
                             }
                         },
                         {
                             col1: 'SubTotal:',
                             col2: '116,199.90',
                             col3: 'ALL',
                             style: {
                                 fontSize: 10 
                             }
                         }],
                         invDescLabel: "Términos y condiciones",
                         invDesc: "Al confiar su vehículo al taller automotriz, usted acepta que cualquier servicio prestado está sujeto a las tarifas y condiciones establecidas por el taller. Se le informa que cualquier daño o pérdida causada a su vehículo debido a circunstancias fuera del control del taller no será responsabilidad del mismo. Así mismo, se reconoce que el pago será efectuado al momento de la entrega del vehículo.",
                     },
                     footer: {
                         text: "Promec Auto Copyright 2024",
                     },
                     pageEnable: true,
                     pageLabel: "Page ",
                  };
                 var pdfObject = jsPDFInvoiceTemplate.default(props); 
                 console.log('Object created: ', pdfObject);
             }  
        }      
    </script>
    <script src="https://kit.fontawesome.com/008a89072c.js" crossorigin="anonymous"></script>    
</body>
</html>