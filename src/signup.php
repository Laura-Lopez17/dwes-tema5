<?php
/*********************************************************************************************************************
 * Este script realiza el registro del usuario vía el POST del formulario que hay debajo, en la vista.
 * 
 * Cuando llegue POST hay que validarlo y si todo fue bien insertar en la base de datos el usuario.
 * 
 * Requisitos del POST:
 * - El nombre de usuario no tiene que estar vacío y NO PUEDE EXISTIR UN USUARIO CON ESE NOMBRE EN LA BASE DE DATOS.
 * - La contraseña tiene que ser, al menos, de 8 caracteres.
 * - Las contraseñas tiene que coincidir.
 * 
 * La contraseña la tienes que guardar en la base de datos cifrada mediante el algoritmo BCRYPT.
 * 
 * UN USUARIO LOGEADO NO PUEDE ACCEDER A ESTE SCRIPT.
 */

/**********************************************************************************************************************
 * Lógica del 7programa
 * 
 * Tareas a realizar:
 * - TODO: tienes que realizar toda la lógica de este script
 */


/*********************************************************************************************************************
 * Salida HTML
 * 
 * Tareas a realizar en la vista:
 * - TODO: los errores que se produzcan tienen que aparecer debajo de los campos.
 * - TODO: cuando hay errores en el formulario se debe mantener el valor del nombre de usuario en el campo
 *         correspondiente.
 */


session_start();

$usuario = $_SESSION && isset($_SESSION['usuario']) ? htmlspecialchars($_SESSION['usuario']) : null;

$mysqli = new mysqli("db", "dwes", "dwes", "dwes", 3306);
if ($mysqli->connect_errno) {
    echo "Error fatal: No ha sido posible conectarse a la base de datos.";
    exit();
}

if($_POST) {
    $usuario = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $clave = isset($_POST['clave']) ? $_POST['clave'] : '';
    $repite_clave = isset($_POST['repite_clave']) ? $_POST['repite_clave'] : '';

    
}

?>
<h1>Regístrate</h1>

<form action="signup.php" method="post">
    <p>
        <label for="nombre">Nombre de usuario</label>
        <input type="text" name="nombre" id="nombre">
    </p>
    <p>
        <label for="clave">Contraseña</label>
        <input type="password" name="clave" id="clave">
    </p>
    <p>
        <label for="repite_clave">Repite la contraseña</label>
        <input type="password" name="repite_clave" id="repite_clave">
    </p>
    <p>
        <input type="submit" value="Regístrate">
    </p>
</form>
