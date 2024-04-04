<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios</title>
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
                <form action="mvc/controladorServicios.php"  class="form" method="post" onsubmit ="return confirm('¿Datos correctos?')">
                    <h1 class="h1">Orden de Servicio</h1>
                   
                   
                    <label for="descripcion">Descripción: </label>
                    <input type="text" name="descripcion" id="descripcion" class="input_Text">
                    
                    <label for="costo">Monto: </label>
                    <input type="text" name="costo" id="costo" class="input_Text">

                    <input type="hidden" id="id_editar" name="id_editar">

                    <label for="id_OrdServ">Id de servicio (maximo 5 dígitos númericos): </label>
                    <input type="text" name="id_OrdServ" id="id_OrdServ" class="input_Text">

                    <label for="fecha">Fecha: </label>
                    <input type="date" required name="fecha" id="fecha" class="input_Text">
                    
                    <label for="estatus">Status: </label>
                    <select name="estatus" id="estatus">
                        <option value="activo" class="option">Activo</option>
                        <option value="inactivo" class="option">Inactivo</option>
                        <option value="finalizado" class="option">Finalizado</option>
                    </select>

                    <label for="id_Auto">Placas de vehículo: </label>
                    <input type="text" name="placas" id="placas" class="input_Text">   
                    
                    <input type="submit" value="Registrar" style="display: block;" onclick="validarInput(event)"  id="btn" name="btn" class="btn">
                     
                    <input type="submit" id="boton_actualizar" onclick="validarInput(event)" class="btn" style="display: none;" value="Actualizar">


                </form>
            </div>
                              
            <div class="tablas-registro cartera-clientes">
                <h1 class="h1">Listado de servicios</h1>

                <div class="btn-container">
                    <h2 class="h2">Buscar por ID:</h2>
                    <div class="divo">
                    <?php
                        include 'mvc/modeloServicios.php';
                            $modelo = new Modelo();
                            $datos = $modelo->consultar();
                            $fila = mysqli_fetch_array($datos);
                            echo "<button class=\"btn-find\" onclick='verRegistro(" . $fila['Id_OrdServ'] . ", \"" . $fila['descripcion'] . "\", \"" . $fila['monto'] . "\", \"" . $fila['Fecha'] . "\",\"" . $fila['Estatus'] . "\",\"" . $fila['Placas']."\")'>#".$fila['Id_OrdServ']."</button>";
                            
                            while ($fila = mysqli_fetch_array($datos)) {
                                echo "<button class=\"btn-find\" onclick='verRegistro(" . $fila['Id_OrdServ'] . ", \"" . $fila['descripcion'] . "\", \"" . $fila['monto'] . "\", \"" . $fila['Fecha'] . "\",\"" . $fila['Estatus'] . "\",\"" . $fila['Placas']."\")'>#".$fila['Id_OrdServ']."</button>";
                            }
                    ?>
                    </div>
                </div>



                <div class="table-container">
                    
                <table class="table" border="1">
                        <thead>
                            <tr>
                                <th>Id de Servicio</th>
                                <th>Descripción</th>
                                <th>Monto</th>
                                <th>Fecha</th>
                                <th>Status</th>
                                <th>Placas</th>
                                <th>Eliminar</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            
                            $modelo = new Modelo();
                            $datos = $modelo->consultar();
                            while ($fila = mysqli_fetch_array($datos)) {
                                echo "<tr>
                                        <td class=\"td\">" . $fila['Id_OrdServ'] . "</td>
                                        <td class=\"td\">" . $fila['descripcion'] . "</td>
                                        <td class=\"td\">" . $fila['monto'] . "</td>
                                        <td class=\"td\">" . $fila['Fecha'] . "</td>
                                        <td class=\"td\">" . $fila['Estatus'] . "</td>
                                        <td class=\"td\">" . $fila['Placas'] . "</td> 
                                        <td><a href='mvc/controladorServicios.php?id_OrdServ=" . $fila['Id_OrdServ'] . "&opcion=2'><i class=\"fa\"fa-solid\" fa-x\">x</i></a>
                                        </td>
                                        <td>
                                        <a href='#' onclick='editarRegistro(" . $fila['Id_OrdServ'] . ", \"" . $fila['descripcion'] . "\", \"" . $fila['monto'] . "\", \"" . $fila['Fecha'] . "\",\"" . $fila['Estatus'] . "\",\"" . $fila['Placas']."\")'><i class=\"fa\" fa-solid\" fa-pen-to-square\">📝</i></a>
 
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
         function editarRegistro(id_OrdServ,descripcion,costo,fecha,estatus,placas) {
            document.getElementById('id_editar').value = id_OrdServ;
            document.getElementById('descripcion').value =descripcion ;
            document.getElementById('costo').value = costo;
            document.getElementById('fecha').value = fecha;
            document.getElementById('estatus').value = estatus;
            document.getElementById('placas').value =placas;

            document.getElementById('btn').style.display = 'none';
            document.getElementById('boton_actualizar').style.display = 'block';
        }

        function verRegistro(id_OrdServ,descripcion , costo,fecha,estatus,placas) {
            document.getElementById('id_OrdServ').value = id_OrdServ;
            document.getElementById('descripcion').value =descripcion ;
            document.getElementById('costo').value = costo;
            document.getElementById('fecha').value = fecha;
            document.getElementById('estatus').value = estatus;
            document.getElementById('placas').value =placas;   
                  
            let btn = document.getElementById('btn'); 
            btn.disabled = true;
         
        }
 

    </script>

    <script src="code/validarServ.js"></script>
<script src="https://kit.fontawesome.com/008a89072c.js" crossorigin="anonymous"></script>    
</body>
</html>