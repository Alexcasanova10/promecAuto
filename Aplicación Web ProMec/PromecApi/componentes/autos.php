<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autos</title>
    <link rel="stylesheet" href="../css.css">
    <link rel="stylesheet" href="compStyles2.css">

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

         <div class="main-container-2">                    
            <div class="tablas-registro">

                <h1 class="h1">Parque vehicular</h1>
                 
                <div class="table-container">
                    <div class="btn-container">
                        <h2 class="h2">Buscar por placas:</h2>
                        <div class="divo">
                            <?php
                                include 'mvc/modeloAutos.php';
                                    $modelo = new Modelo();
                                    $datos = $modelo->consultar();
                                    $fila = mysqli_fetch_array($datos);
                                    echo "<button class=\"btn-find\" onclick='verRegistro(" . $fila['Id_Auto'] . ", \"" . $fila['Id_Cliente'] . "\", \"" . $fila['Modelo'] . "\", \"" . $fila['Marca'] . "\", \"" . $fila['Propietario'] . "\", \"" . $fila['Kilometros'] . "\", \"" . $fila['Placas'] . "\", \"" . $fila['Numero_Serie'] . "\")'>#".$fila['Placas']."</button>";
                                    
                                    while ($fila = mysqli_fetch_array($datos)) {
                                        echo "<button class=\"btn-find\" onclick='verRegistro(" . $fila['Id_Auto'] . ", \"" . $fila['Id_Cliente'] . "\", \"" . $fila['Modelo'] . "\", \"" . $fila['Marca'] . "\", \"" . $fila['Propietario'] . "\", \"" . $fila['Kilometros'] . "\", \"" . $fila['Placas'] . "\", \"" . $fila['Numero_Serie'] . "\")'>#".$fila['Placas']."</button>";
                                    }
                            ?>
                        </div>
                    </div>
                    <form action="mvc/controladorAutos.php"  onsubmit ="return confirm('¿Datos correctos?')" method="post">            
                        <table class="table" border="1">
                            <thead>
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Propietario</th>
                                <th>Kilometraje</th>
                                <th>Placas</th>
                                <th>ID Auto</th>
                                <th>ID Cliente</th>
                                <th>Numero de Serie</th>                                
                                <th>Guardar</th>                                
                                <th>Eliminar</th>
                                <th>Editar</th>
                            </thead>
                            <tbody>
                          
                            <tr>
                                <td class="td"><input id="modelo" type="text" name="modelo" class="input_Text-2"></td>
                                <td class="td"><input id="marca" type="text" name="marca" class="input_Text-2"></td>
                                <td class="td"><input id="propietario" type="text" name="propietario" class="input_Text-2"></td>
                                <td class="td"><input id="kilometraje" type="number" min="10" name="kilometraje" class="input_Text-2"></td>                
                                <td class="td"><input id="placas" type="text" name="placas" class="input_Text-2"></td>
                                <td class="td">
                                    <input type="text" id="id_Auto" name="id_Auto" class="input_Text-2">
                                    <input type="hidden" id="id_editar" name="id_editar">
                                </td>
                                <td class="td"><input type="text" id="id_Cliente" name="id_Cliente" class="input_Text-2"></td>
                                <td class="td"><input type="text" id="numero_Serie" name="numero_Serie" class="input_Text-2"></td>
                                <td>
                                    <button class="btn-table" style="display: block;" onclick="validarInput(event)" id="btn" type="submit"><i class="fa fa-solid fa-check"></i></button>
                                    <button type="submit" id="boton_actualizar" onclick="validarInput(event)"  style="display: none;" >Actualizar</button>
                                </td>

                                <td><a href=""><i class="fa fa-solid fa-x"></i></a></td=>
                                
                            </tr>
                                <?php
                                    $modelo = new Modelo();
                                    $datos = $modelo->consultar();
                                    while ($fila = mysqli_fetch_array($datos)) {
                                        echo "<tr>
                                                <td class=\"td\">" . $fila['Modelo'] . "</td>
                                                <td class=\"td\">" . $fila['Marca'] . "</td>
                                                <td class=\"td\">" . $fila['Propietario'] . "</td>
                                                <td class=\"td\">" . $fila['Kilometros'] . "</td>  
                                                <td class=\"td\">" . $fila['Placas'] . "</td>
                                                <td class=\"td\">" . $fila['Id_Auto'] . "</td>
                                                <td class=\"td\">" . $fila['Id_Cliente'] . "</td>
                                                <td class=\"td\">" . $fila['Numero_Serie'] . "</td>  
                                                <td>
                                                <button disabled class=\"btn-table\" type=\"submit\"><i class=\"fa\" fa-solid\" fa-check\">✓</i></button>
                                                </td>
                                                <td><a href='mvc/controladorAutos.php?Id_Auto=" . $fila['Id_Auto'] . "&opcion=2'><i class=\"fa\"fa-solid\" fa-x\">x</i></a>
                                                </td>
                                                <td>
                                                <a href='#'  onclick='editarRegistro(" . $fila['Id_Auto'] . ", \"" . $fila['Id_Cliente'] . "\", \"" . $fila['Modelo'] . "\", \"" . $fila['Marca'] . "\", \"" . $fila['Propietario'] . "\", \"" . $fila['Kilometros'] . "\", \"" . $fila['Placas'] . "\", \"" . $fila['Numero_Serie'] . "\")'><i class=\"fa\" fa-solid\" fa-pen-to-square\">📝</i></a>
                                                </td>                    
                                        </tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            
            </div> 
        </div>
         
        <footer class="footer footer2">
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
    
      function editarRegistro(id_Auto,id_Cliente,modelo,marca,propietario,kilometraje,placas,numero_Serie) {
            document.getElementById('id_editar').value = id_Auto;
            document.getElementById('id_Cliente').value = id_Cliente;
            document.getElementById('modelo').value = modelo; 
            document.getElementById('marca').value = marca; 
            document.getElementById('propietario').value = propietario; 
            document.getElementById('kilometraje').value = kilometraje;
            document.getElementById('placas').value = placas;
            document.getElementById('numero_Serie').value = numero_Serie;

            document.getElementById('btn').style.display = 'none';
            document.getElementById('boton_actualizar').style.display = 'block';
        }

      function verRegistro(id_Auto,id_Cliente,modelo,marca,propietario,kilometraje,placas,numero_Serie) {
            document.getElementById('id_Auto').value = id_Auto;
            document.getElementById('id_Cliente').value = id_Cliente;
            document.getElementById('modelo').value = modelo; 
            document.getElementById('marca').value = marca; 
            document.getElementById('propietario').value = propietario; 
            document.getElementById('kilometraje').value = kilometraje;
            document.getElementById('placas').value = placas;
            document.getElementById('numero_Serie').value = numero_Serie;

                  
            let btn = document.getElementById('btn'); 
            btn.disabled = true;

        } 

</script>
<script src="code/validarAutos.js"></script>    
<script src="https://kit.fontawesome.com/008a89072c.js" crossorigin="anonymous"></script>    
</body>
</html>