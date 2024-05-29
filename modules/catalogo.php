<?php
include 'config/bd.php';
$conexion = BD::crearInstancia();

$productos = $conexion->query("SELECT * FROM productos")->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Catálogo de Productos</h2>

<table>
    <tr>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?php echo $producto['nombre']; ?></td>
            <td><?php echo $producto['precio']; ?></td>
            <td><?php echo $producto['stock']; ?></td>
            <td>
                <form method="post" action="index.php?module=carrito">
                    <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $producto['nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $producto['precio']; ?>">
                    <label>Cantidad:</label><input type="number" name="cantidad" value="1" min="1" max="<?php echo $producto['stock']; ?>">
                    <button type="submit">Agregar al Carrito</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
