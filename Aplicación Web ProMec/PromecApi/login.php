<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="styles.css">
    <title>Login || ProMec Api</title>
</head>
<body>
    <div class="login-container">
        <!-- USER: Promec10 Password: proCar12! -->
        <form class="login-form" action="mainP.php" method="post">
            <h2>Inicia Sesión</h2>
            <div class="input-container">
                <input type="text" name="user" placeholder="Usuario" id="user" >
            </div>
            <div class="input-container">
                <input type="password" name="pswd" placeholder="Contraseña" id="pswd">
            </div>
            <div class="input-container">
                <label id="check-label" for="check">Mostrar contaseña</label>
                <input type="checkbox" id="check" name="check"  onchange="checkPswd()">
            </div>
            <input id="btn" type="submit" value="Login">
        </form>

        <div class="link-container">
            <a href="../index.html">Volver</a>
        </div>
    </div>

    <script src="validacion_Log.js"></script>
    <script src="https://kit.fontawesome.com/008a89072c.js" crossorigin="anonymous"></script>
</body>
</html>