<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
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
                <form action="mvc/controladorClientes.php"  class="form" onsubmit="return confirm('¿Datos correctos?')"  method="post">
                    <h1 class="h1">Formulario de registro</h1>
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre" id="nombre" class="input_Text">
                    
                    <label for="apellido">Apellido: </label>
                    <input type="text" name="apellido" id="apellido" class="input_Text">

                    <input type="hidden" id="id_editar" name="id_editar">

                    <label for="id_Cliente">Id de cliente (maximo 5 dígitos númericos): </label>
                    <input type="text" name="id_Cliente" id="id_Cliente" class="input_Text">

                    <label for="direccion">Direccion: (Sólo calle, colonia y  Num Ext): </label>
                    <input type="text" name="direccion" id="direccion" class="input_Text">

                    <label for="telefono">Teléfono: </label>
                    <input type="text" name="telefono" id="telefono" class="input_Text">
                    
                    <label for="correo">Correo: </label>
                    <input type="email" name="correo" id="correo" class="input_Text">   
                    
                    <input type="submit" onclick="validarInput(event)"  style="display: block;"  value="Registrar" id="btn" name="btn" class="btn">

                    <input type="submit" id="boton_actualizar" onclick="validarInput(event)" class="btn" style="display: none;" value="Actualizar">


                </form>
            </div>
                              
            <div class="tablas-registro cartera-clientes">
                <h1 class="h1">Cartera de clientes</h1>
                
                <div class="btn-container">
                    <h2 class="h2">Listado: </h2>
                    <div class="divo">
                    <?php
                        include 'mvc/modeloClientes.php';
                            $modelo = new Modelo();
                            $datos = $modelo->consultar();
                            $fila = mysqli_fetch_array($datos);
                            echo "<button class=\"btn-find\" onclick='verRegistro(" . $fila['Id_Cliente'] . ", \"" . $fila['Nombre'] . "\", \"" . $fila['Apellido'] . "\", \"" . $fila['Direccion'] . "\",\"" . $fila['Telefono'] . "\",\"" . $fila['Correo']."\")'>".$fila['Nombre']." ".$fila['Apellido']."</button>";
                            while ($fila = mysqli_fetch_array($datos)) {
                                echo "<button class=\"btn-find\" onclick='verRegistro(" . $fila['Id_Cliente'] . ", \"" . $fila['Nombre'] . "\", \"" . $fila['Apellido'] . "\", \"" . $fila['Direccion'] . "\",\"" . $fila['Telefono'] . "\",\"" . $fila['Correo']."\")'> ".$fila['Nombre']." ".$fila['Apellido']."</button>";
                            }
                    ?>
                    </div>
                </div>


                <div class="table-container" >
                    <table class="table" style="width: 100%" border="1">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>ID</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Correo</th>
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
                                        <td class=\"td\">" . $fila['Nombre'] . "</td>
                                        <td class=\"td\">" . $fila['Apellido'] . "</td>
                                        <td class=\"td\">" . $fila['Id_Cliente'] . "</td>
                                        <td class=\"td\">" . $fila['Direccion'] . "</td>
                                        <td class=\"td\">" . $fila['Telefono'] . "</td>
                                        <td class=\"td\">" . $fila['Correo'] . "</td> 
                                        <td><a href='mvc/controladorClientes.php?id_Cliente=" . $fila['Id_Cliente'] . "&opcion=2'><i class=\"fa\"fa-solid\" fa-x\">x</i></a>
                                        </td>
                                        <td>
                                        <a href='#' onclick='editarRegistro(" . $fila['Id_Cliente'] . ", \"" . $fila['Nombre'] . "\", \"" . $fila['Apellido'] . "\", \"" . $fila['Direccion'] . "\",\"" . $fila['Telefono'] . "\",\"" . $fila['Correo']."\")'><i class=\"fa\" fa-solid\" fa-pen-to-square\">📝</i></a>

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

    <script src="code/validarClientes.js"></script>
    
    <script>

    function editarRegistro(id_Cliente,nombre,apellido,direccion,telefono,correo) {
            document.getElementById('id_editar').value = id_Cliente;
            document.getElementById('nombre').value =nombre ;
            document.getElementById('apellido').value = apellido;
            document.getElementById('direccion').value = direccion;
            document.getElementById('telefono').value = telefono;
            document.getElementById('correo').value =correo;

            document.getElementById('btn').style.display = 'none';
            document.getElementById('boton_actualizar').style.display = 'block';
        }

        function verRegistro(id_Cliente,nombre,apellido,direccion,telefono,correo,e) {
            document.getElementById('id_Cliente').value = id_Cliente;
            document.getElementById('nombre').value =nombre ;
            document.getElementById('apellido').value = apellido;
            document.getElementById('direccion').value = direccion;
            document.getElementById('telefono').value = telefono;
            document.getElementById('correo').value =correo;
            
            let btn = document.getElementById('btn'); 
            btn.disabled = true;

        }








    </script>


    



    <script src="https://kit.fontawesome.com/008a89072c.js" crossorigin="anonymous"></script>    
</body>
</html>