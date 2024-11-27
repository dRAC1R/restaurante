<?php
require_once '../productos/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = añadirProducto($_POST['nombre'], $_POST['precio'], $_POST['descripcion'], $_POST['categoria']);
    if ($id) {
        header("Location: index.php?mensaje=Producto creado con éxito");
        exit;
    } else {
        $error = "No se pudo crear el producto.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Producto</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Agregar Nuevo Producto</h1>

        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <label>Nombre: <input type="text" name="nombre" required></label>
            <label>Precio: <input type="number" step="0.01" name="precio" required></label>
            <label>Descripción: <textarea name="descripcion" required></textarea></label>
            <label>Categoría: <input type="text" name="categoria" required></label>
            <center><input type="submit" class="button button-agregar" value="Crear Producto"><br>
        </form>

        <a href="index.php" class="button button-volver">Volver a la lista de productos</a></center>
    </div>
</body>
</html>
