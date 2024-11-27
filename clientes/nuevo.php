<?php
require_once '../clientes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = añadirCliente($_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['direccion']);
    if ($id) {
        header("Location: index.php?mensaje=Cliente creado con éxito");
        exit;
    } else {
        $error = "No se pudo crear el cliente.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Cliente</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Agregar Nuevo Cliente</h1>

        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <label>Nombre: <input type="text" name="nombre" required></label>
            <label>Correo: <input type="email" name="correo" required></label>
            <label>Teléfono: <input type="text" name="telefono" required></label>
            <label>Dirección: <input type="text" name="direccion" required></label>
            <center><input type="submit" class="button button-agregar" value="Crear Cliente"></center><br>
        </form>

        <center><a href="index.php" class="button button-volver">Volver a la lista de clientes</a></center>
    </div>
</body>
</html>
