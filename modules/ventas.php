<?php
include 'config/bd.php';
$conexion = BD::crearInstancia();

// Aquí manejarías las acciones relacionadas con las ventas, como listar ventas y actualizar el stock después de una venta.

$ventas = $conexion->query("SELECT * FROM ventas")->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Ventas</h2>

<h3>Listado de Ventas</h3>
<table>
    <tr>
        <th>ID Venta</th>
        <th>ID Producto</th>
        <th>Cantidad</th>
        <th>Fecha</th>
    </tr>
    <?php foreach ($ventas as $venta): ?>
        <tr>
            <td><?php echo $venta['id']; ?></td>
            <td><?php echo $venta['id_producto']; ?></td>
            <td><?php echo $venta['cantidad']; ?></td>
            <td><?php echo $venta['fecha']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
