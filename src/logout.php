<?php
/**********************************************************************************************************************
 * Este script tan solo tiene que destruir la sesión y volver a la página principal.
 * 
 * UN USUARIO NO LOGEADO NO PUEDE ACCEDER A ESTE SCRIPT.
 */

/**********************************************************************************************************************
 * Lógica del programa
 */
session_start();

if (!$_SESSION || !isset($_SESSION['usuario'])) {
    header('location: index.php');
    exit();
}

session_destroy();

/*********************************************************************************************************************
 * Salida HTML
 */

echo "<h1>Galería de imágenes</h1>";
if ($usuario == null) {
    echo <<<END
        <ul>
            <li><strong>Home</strong></li>
            <li><a href="filter.php">Filtrar imágenes</a></li>
            <li><a href="signup.php">Regístrate</a></li>
        </ul>
    END;
} else {
    return <<<END
        <ul>
            <li><strong>Home</strong></li>
            <li><a href="add.php">Añadir imagen</a></li>
            <li><a href="filter.php">Filtrar imágenes</a></li>
        </ul>
    END;
}

echo '<p>Has cerrado sesión</p>';