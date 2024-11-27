<?php
require_once '../clientes/functions.php';

if (isset($_GET['accion']) && $_GET['accion'] === 'eliminar' && isset($_GET['id'])) {
    $count = eliminarCliente($_GET['id']);
    $mensaje = $count > 0 ? "Cliente eliminado con éxito." : "No se pudo eliminar el cliente.";
}

$clientes = obtenerClientes();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
<div class="container">
    <h1>Clientes</h1>

    <?php if (isset($mensaje)): ?>
        <div class="<?php echo $count > 0 ? 'success' : 'error'; ?>">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>

    <center><a href="nuevo.php" class="button button-agregar">Agregar Nuevo Cliente</a></center> <br>
    <center><a href="../index.php" class="button button-volver">Volver a Inicio</a></center> <br>

    <h2>Lista de Clientes</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td><?php echo htmlspecialchars($cliente['nombre']); ?></td>
            <td><?php echo htmlspecialchars($cliente['correo']); ?></td>
            <td><?php echo htmlspecialchars($cliente['telefono']); ?></td>
            <td><?php echo htmlspecialchars($cliente['direccion']); ?></td>
            <td class="actions">
                <center><a href="editar.php?id=<?php echo $cliente['_id']; ?>" class="button button-editar">Editar</a></center>
                <center><a href="index.php?accion=eliminar&id=<?php echo $cliente['_id']; ?>" class="button button-eliminar" onclick="return confirm('¿Estás seguro de que quieres eliminar este cliente?');">Eliminar</a></center>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
