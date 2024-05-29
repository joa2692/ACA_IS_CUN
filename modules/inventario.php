<?php
include_once 'config/bd.php';
$conexion = BD::crearInstancia();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] == 'add') {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];

        $sql = "INSERT INTO productos (nombre, precio, stock) VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$nombre, $precio, $stock]);
    } elseif ($_POST['action'] == 'edit') {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];

        $sql = "UPDATE productos SET nombre=?, precio=?, stock=? WHERE id=?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$nombre, $precio, $stock, $id]);
    }
}

$productos = $conexion->query("SELECT * FROM productos")->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Inventario</h2>

<h3>Registrar Producto</h3>
<form method="post">
    <input type="hidden" name="action" value="add">
    <label>Nombre:</label><input type="text" name="nombre">
    <label>Precio:</label><input type="text" name="precio">
    <label>Stock:</label><input type="text" name="stock">
    <button type="submit">Agregar Producto</button>
</form>

<h3>Listado de Productos</h3>
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
                <form method="post" style="display:inline;">
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                    <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>">
                    <input type="text" name="precio" value="<?php echo $producto['precio']; ?>">
                    <input type="text" name="stock" value="<?php echo $producto['stock']; ?>">
                    <button type="submit">Modificar</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
