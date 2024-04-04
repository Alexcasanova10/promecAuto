<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacen</title>
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

                <h1 class="h1">Listado de productos</h1>
                         
                
                <div class="table-container">
                    <div class="btn-container">
                        <h2 class="h2">Buscar por ID:</h2>
                        <div class="divo">
                            <?php
                                include 'mvc/modeloAlmacen.php';
                                    $modelo = new Modelo();
                                    $datos = $modelo->consultar();
                                    $fila = mysqli_fetch_array($datos);
                                    echo "<button class=\"btn-find\" onclick='verRegistro(" . $fila['id_Prod'] . ", \"" . $fila['nombre'] . "\", \"" . $fila['cantidad'] . "\", \"" . $fila['Monto'] . "\")'>#".$fila['id_Prod']."</button>";
                                    
                                    while ($fila = mysqli_fetch_array($datos)) {
                                        echo "<button class=\"btn-find\" onclick='verRegistro(" . $fila['id_Prod'] . ", \"" . $fila['nombre'] . "\", \"" . $fila['cantidad'] . "\", \"" . $fila['Monto'] . "\")'>#".$fila['id_Prod']."</button>";
                                    }
                            ?>
                        </div>
                    </div>
                    <form action="mvc/controladorAlmacen.php"  onsubmit ="return confirm('¿Datos correctos?')" method="post">            
                        <table class="table" border="1">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>ID Producto</th>
                                    <th>Monto</th>
                                    <th>Guardar</th>                                
                                    <th>Eliminar</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                          
                                <tr>
                                    <td class="td"><input type="text"  id="nombre" name="nombre" class="input_Text-2"></td>
                                    <td class="td"><input type="number"id="cantidad" name="cantidad" class="input_Text-2"></td>
                                    <td class="td">
                                        <input type="text"  id="id_Prod" name="id_Prod" class="input_Text-2">
                                        <input type="hidden" id="id_editar" name="id_editar">
                                    </td>
                                    <td class="td"><input type="text"  id="costo" name="costo" class="input_Text-2"></td>
                                    <td>

                                    <button class="btn-table" style="display: block;" onclick="validarInput(event)" id="btn" type="submit"><i class="fa fa-solid fa-check"></i></button>
                                    <button type="submit" id="boton_actualizar" onclick="validarInput(event)"  style="display: none;" ><i id="check" style="display: none;"  class="fa fa-solid fa-check"></button>
                                        
                                    </td>

                                    <td><a href=""><i class="fa fa-solid fa-x"></i></a></td>
                                </tr>
                                <?php
                                    $modelo = new Modelo();
                                    $datos = $modelo->consultar();
                                    while ($fila = mysqli_fetch_array($datos)) {
                                        echo "<tr>
                                                <td class=\"td\">" . $fila['nombre'] . "</td>
                                                <td class=\"td\">" . $fila['cantidad'] . "</td>
                                                <td class=\"td\">" . $fila['id_Prod'] . "</td>
                                                <td class=\"td\">" . $fila['Monto'] . "</td>  
                                                <td >
                                                <button id=\"btn\" disabled class=\"btn-table\" type=\"submit\"><i class=\"fa\" fa-solid\" fa-check\">✓</i></button>
                                                </td>
                                                <td><a href='mvc/controladorAlmacen.php?id_Prod=" . $fila['id_Prod'] . "&opcion=2'><i class=\"fa\"fa-solid\" fa-x\">x</i></a>
                                                </td>
                                                <td>
                                                <a href='#' onclick='editarRegistro(" . $fila['id_Prod'] . ", \"" . $fila['nombre'] . "\", \"" . $fila['cantidad'] . "\", \"" . $fila['Monto'] . "\")'><i class=\"fa\" fa-solid\" fa-pen-to-square\">📝</i></a>
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
      function editarRegistro(id_Prod,nombre,cantidad,costo) {
            document.getElementById('id_editar').value = id_Prod;
            document.getElementById('nombre').value =nombre;
            document.getElementById('cantidad').value =cantidad ;
            document.getElementById('costo').value = costo; 

            document.getElementById('btn').style.display = 'none';
            document.getElementById('boton_actualizar').style.display = 'block';

            document.getElementById('check').style.display = 'block';
        }


        function verRegistro(id_Prod,nombre,cantidad,costo) {
            document.getElementById('id_Prod').value = id_Prod;
            document.getElementById('nombre').value =nombre ;
            document.getElementById('cantidad').value = cantidad;
            document.getElementById('costo').value = costo; 
                  
            let btn = document.getElementById('btn'); 
            btn.disabled = true;
           
        }
</script>
<script src="code/validarAlma.js"></script>    
<script src="https://kit.fontawesome.com/008a89072c.js" crossorigin="anonymous"></script>    
</body>
</html>