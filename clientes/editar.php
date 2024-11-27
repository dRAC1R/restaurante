<?php
require_once '../clientes/functions.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$cliente = obtenerClientePorId($_GET['id']);

if (!$cliente) {
    header("Location: index.php?mensaje=Cliente no encontrado");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $count = editarCliente($_GET['id'], $_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['direccion']);
    if ($count > 0) {
        header("Location: index.php?mensaje=Cliente actualizado con éxito");
        exit;
    } else {
        $error = "No se pudo actualizar el cliente.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Editar Cliente</h1>

        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <label>Nombre: <input type="text" name="nombre" value="<?php echo htmlspecialchars($cliente['nombre']); ?>" required></label>
            <label>Correo: <input type="email" name="correo" value="<?php echo htmlspecialchars($cliente['correo']); ?>" required></label>
            <label>Teléfono: <input type="text" name="telefono" value="<?php echo htmlspecialchars($cliente['telefono']); ?>" required></label>
            <label>Dirección: <input type="text" name="direccion" value="<?php echo htmlspecialchars($cliente['direccion']); ?>" required></label>
            <center><input type="submit" class="button button-agregar" value="Actualizar Cliente"></center><br>
        </form>

        <center><a href="index.php" class="button button-volver">Volver a la lista de clientes</a></center>
    </div>
</body>
</html>
