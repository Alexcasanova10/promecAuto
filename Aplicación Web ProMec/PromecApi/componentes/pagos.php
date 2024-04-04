<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos</title>
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

         <div class="main-container">      

            <div class="registro">
                <form action="mvc/controladorPagos.php"  class="form" method="post"  onsubmit ="return confirm('¿Datos correctos?')">
                    <h1 class="h1">Registrar pago en caja</h1>
                    <label for="id_transac">ID (No mayor a 5 dígitos): </label>
                    
                    <input type="hidden" id="id_editar" name="id_editar">
                    <input type="text" name="id_transac" id="id_transac" class="input_Text">


                    <label for="fecha">Fecha: </label>
                    <input type="date" required name="fecha" id="fecha" class="input_Text">

                    <label for="monto">Monto: </label>
                    <input type="text" name="monto" id="monto" class="input_Text">
                    

                    <label for="tipo">Tipo: </label>
                    <select class="select" name="tipo" id="tipo">
                        <option name="ingreso" class="option" value="ingreso">Ingreso</option>
                        <option name="egreso" class="option" value="egreso">Egreso</option>
                    </select>
                    
                    <input type="submit" value="Agregar" onclick="validarInput(event)" id="btn" name="btn" class="btn">
                    <input type="submit" id="boton_actualizar" onclick="validarInput(event)" class="btn" style="display: none;" value="Actualizar">

                </form>
            </div>
                              
            <div class="tablas-registro cartera-clientes">
                <h1 class="h1">Caja</h1>                
          
                <div class="table-container">
                    <table class="table" style="width: 100%" border="1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Monto</th>
                                <th>Tipo</th>
                                <th>Eliminar</th>
                                <th>Edita</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'mvc/modeloPagos.php';
                            $modelo = new Modelo();
                            $datos = $modelo->consultar();
                            while ($fila = mysqli_fetch_array($datos)) {
                                echo "<tr>
                                        <td class=\"td\">" . $fila['id_Transac'] . "</td>
                                        <td class=\"td\">" . $fila['Fecha'] . "</td>
                                        <td class=\"td\">" . $fila['Monto'] . "</td>
                                        <td class=\"td\">" . $fila['tipo'] . "</td>
                                        <td><a href='mvc/controladorPagos.php?id_transac=" . $fila['id_Transac'] . "&opcion=2'><i class=\"fa\"fa-solid\" fa-x\">x</i></a>
                                        </td>
                                        <td>
                                        <a href='#' onclick='editarRegistro(" . $fila['id_Transac'] . ", \"" . $fila['Fecha'] . "\", \"" . $fila['Monto'] . "\", \"" . $fila['tipo']."\")'><i class=\"fa\" fa-solid\" fa-pen-to-square\">📝</i></a>
                                        </td>                    
                                </tr>";
                            }


                            ?>
                        </tbody>
                    </table>
                </div>
            
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
    <script>
         function editarRegistro(id_transac,fecha,monto,tipo) {
            document.getElementById('id_editar').value = id_transac;
            document.getElementById('fecha').value =fecha ;
            document.getElementById('monto').value = monto;
            document.getElementById('tipo').value = tipo; 

            document.getElementById('btn').style.display = 'none';
            document.getElementById('boton_actualizar').style.display = 'block';
        }



    </script>












    <script src="code/validarPagos.js"></script>
<script src="https://kit.fontawesome.com/008a89072c.js" crossorigin="anonymous"></script>    
</body>
</html>