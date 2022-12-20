<?php
/**********************************************************************************************************************
 * Este programa, a través del formulario que tienes que hacer debajo, en el área de la vista, realiza el inicio de
 * sesión del usuario verificando que ese usuario con esa contraseña existe en la base de datos.
 * 
 * Para mantener iniciada la sesión dentrás que usar la $_SESSION de PHP.
 * 
 * En el formulario se deben indicar los errores ("Usuario y/o contraseña no válido") cuando corresponda.
 * 
 * Dicho formulario enviará los datos por POST.
 * 
 * Cuando el usuario se haya logeado correctamente y hayas iniciado la sesión, redirige al usuario a la
 * página principal.
 * 
 * UN USUARIO LOGEADO NO PUEDE ACCEDER A ESTE SCRIPT.
 */

/**********************************************************************************************************************
 * Lógica del programa
 * 
 * Tareas a realizar:
 * - TODO: tienes que realizar toda la lógica de este script
 */

 session_start();

 if (isset($_SESSION['usuario'])) {
     header('location: index.php');
     exit();
 }
  
 if($_POST) {
     $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
     $clave = isset($_POST['clave']) ? $_POST['clave'] : '';
 
     $esOk = loginUsuario($usuario,$clave);
     if ($esOk){
         $_SESSION['usuario'] = $usuario;
         header('location: index.php');
         exit();
     }
 
 }

 
/*********************************************************************************************************************
 * Salida HTML
 * 
 * Tareas a realizar en la vista:
 * - TODO: añadir el menú.
 * - TODO: formulario con nombre de usuario y contraseña.
 */

 echo "<h1>Galería de imágenes</h1>";

    echo <<<END
        <ul>
            <li><strong>Home</strong></li>
            <li><a href="filter.php">Filtrar imágenes</a></li>
            <li><a href="signup.php">Regístrate</a></li>
        </ul>
    END;

?>

<html>
<body>
<main>
        <h2>Inicia sesión</h2>

        <?php
        if ($_POST){
            echo "<p>ERROR: Usuario y/o contraseña no validos</p>";
        }
        ?>

        <form action="login.php" method="post">
            <p>
                <label for="usuario">Nombre de usuario</label><br>
                <input type="text" name="usuario" id="usuario" value="<?php echo $_POST && isset($_POST['usuario']) ? $_POST['usuario'] : '';?>">
            </p>
            <p>
                <label for="clave">Contraseña</label><br>
                <input type="password" name="clave" id="clave">
            </p>
            <p>
                <input type="submit" value="Inicia sesión">
            </p>
        </form>
    </main>
</body>
</html>