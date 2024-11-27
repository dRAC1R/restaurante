<?php
require_once '../productos/functions.php';

if (isset($_GET['accion']) && $_GET['accion'] === 'eliminar' && isset($_GET['id'])) {
    $count = eliminarProducto($_GET['id']);
    $mensaje = $count > 0 ? "Producto eliminado con éxito." : "No se pudo eliminar el producto.";
}

$productos = obtenerProductos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
<div class="container">
    <h1>Productos</h1>

    <?php if (isset($mensaje)): ?>
        <div class="<?php echo $count > 0 ? 'success' : 'error'; ?>">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>

    <center><a href="nuevo.php" class="button button-agregar">Agregar Nuevo Producto</a></center><br>
    <center><a href="../index.php" class="button button-volver">Volver a Inicio</a></center><br>

    <h2>Lista de Productos</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>Categoría</th>
            <th>Disponible</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
            <td><?php echo htmlspecialchars(number_format($producto['precio'], 2)); ?></td>
            <td><?php echo htmlspecialchars($producto['descripcion']); ?></td>
            <td><?php echo htmlspecialchars($producto['categoria']); ?></td>
            <td><?php echo $producto['disponible'] ? 'Sí' : 'No'; ?></td>
            <td class="actions">
                <center><a href="editar.php?id=<?php echo $producto['_id']; ?>" class="button button-editar">Editar</a></center>
                <center><a href="index.php?accion=eliminar&id=<?php echo $producto['_id']; ?>" class="button button-eliminar" onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?');">Eliminar</a></center>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
