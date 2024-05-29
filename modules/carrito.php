<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $producto = [
        'id' => $id,
        'nombre' => $nombre,
        'precio' => $precio,
        'cantidad' => $cantidad
    ];

    // Verifica si el producto ya está en el carrito
    $encontrado = false;
    foreach ($_SESSION['carrito'] as &$item) {
        if ($item['id'] == $id) {
            $item['cantidad'] += $cantidad;
            $encontrado = true;
            break;
        }
    }
    if (!$encontrado) {
        $_SESSION['carrito'][] = $producto;
    }
}

$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];
?>

<h2>Carrito de Compras</h2>

<?php if (count($carrito) > 0): ?>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
        <?php $total = 0; ?>
        <?php foreach ($carrito as $item): ?>
            <tr>
                <td><?php echo htmlspecialchars($item['nombre']); ?></td>
                <td><?php echo htmlspecialchars($item['precio']); ?></td>
                <td><?php echo htmlspecialchars($item['cantidad']); ?></td>
                <td><?php echo htmlspecialchars($item['precio'] * $item['cantidad']); ?></td>
            </tr>
            <?php $total += $item['precio'] * $item['cantidad']; ?>
        <?php endforeach; ?>
        <tr>
            <td colspan="3">Total a Pagar</td>
            <td><?php echo $total; ?></td>
        </tr>
    </table>

    <form method="post" action="index.php?module=confirmar_compra">
        <button type="submit">Confirmar Compra</button>
    </form>
<?php else: ?>
    <p>El carrito está vacío.</p>
<?php endif; ?>
