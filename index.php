<?php
include 'includes/header.php';

if (isset($_GET['module'])) {
    $module = $_GET['module'];
} else {
    $module = 'home';
}

if ($module == 'home') {
    echo '
    <div class="button-container">
        <a href="index.php?module=inventario" class="module-button">Inventario</a>
        <a href="index.php?module=ventas" class="module-button">Ventas</a>
        <a href="index.php?module=catalogo" class="module-button">Catálogo</a>
        <a href="index.php?module=carrito" class="module-button">Carrito</a>
        <a href="login.html" class="module-button">Iniciar Sesión</a>
    </div>';
} else {
    switch ($module) {
        case 'inventario':
            include 'modules/inventario.php';
            break;
        case 'ventas':
            include 'modules/ventas.php';
            break;
        case 'catalogo':
            include 'modules/catalogo.php';
            break;
        case 'carrito':
            include 'modules/carrito.php';
            break;
        default:
            echo '<h1>Bienvenido a la aplicación de gestión</h1>';
            echo '<p>Seleccione un módulo del menú.</p>';
    }
}

include 'includes/footer.php';
?>

