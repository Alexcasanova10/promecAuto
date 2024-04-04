<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProMec Auto</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <?php
      $usuario = "Promec10";
      $contrasena = "proCar12!";
      session_start();
     ?>   
     <div class="container">
        <header class="header">           
          <div class="navbar">
            <a href="#" onclick="recargar()">Inicio</a>
            <a href="componentes/servicios.php">Servicios</a>
            <div class="dropdown">
              <button class="dropbtn">Caja      
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                <a href="componentes/pagos.php">Pagos</a>
                <a href="componentes/facturas.php">Facturas</a>
              </div>  
            </div> 
            <a href="componentes/almacen.php">Almacen</a>
            
            <div class="dropdown">
              <button class="dropbtn">Clientes      
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                <a href="componentes/clientes.php">Cartera de clientes</a>
                <a href="componentes/autos.php">Listado de autos</a>
              </div>  
            </div> 
            <a href="login.php">Cerrar Sesión</a>
        </div>
         </header>

        <main class="main">
            <div class="acerca-container">
                 <?php echo "<h1 class='h1' style=\"color:#bd0900;\" > Bienvenido " . $usuario . "</h1>"; ?>
                
                <hr>
                <p class="p">
                  ¡Descubre ProMec Auto, tu aliado en el mundo de la mecánica automotriz! Revoluciona la manera en que los talleres gestionan sus operaciones diarias. Desde el seguimiento de las citas y el inventario de piezas hasta la gestion de servicios. ProMec Auto simplifica cada aspecto de la gestión del taller, permitiéndote enfocarte en brindar un servicio excepcional.
                </p>
            </div>

            <div class="pic-container"></div>
        </main>



         <div class="activities">
            <div class="feature-holder">
              <div class="feature-block">
                <i class="fa fa-solid fa-car"></i>
                <div class="block-detail">
                  <h3 class="feature-h3">Automatización</h3>
                </div>
              </div>
              <div class="feature-block">
                <div class="block-detail">
                  <i class="fa fa-solid fa-dollar-sign"></i>
                  <h3 class="feature-h3">Control Financiero</h3>
                </div>
              </div>
              <div class="feature-block">
                <div class="block-detail">
                  <i class="fa fa-solid fa-warehouse"></i>
                  <h3 class="feature-h3">Inventario</h3>
                </div>
              </div>
              <div class="feature-block">
                <i class="fa fa-solid fa-person-chalkboard"></i>
                <div class="block-detail">
                  <h3 class="feature-h3">Espacio de trabajo</h3>
                </div>
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
        function recargar(){
            location.reload();
        }
    </script>



    <script src="https://kit.fontawesome.com/008a89072c.js" crossorigin="anonymous"></script>
</body>
</html>