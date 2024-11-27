<?php
require_once '../config/database.php';

function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

// Añadir un producto
function añadirProducto($nombre, $precio, $descripcion, $categoria) {
    global $productosCollection;
    if (!$productosCollection) {
        die("Error: Colección de productos no está disponible.");
    }
    $resultado = $productosCollection->insertOne([
        'nombre' => sanitizeInput($nombre),
        'precio' => (float) $precio,
        'descripcion' => sanitizeInput($descripcion),
        'categoria' => sanitizeInput($categoria),
        'disponible' => true
    ]);
    return $resultado->getInsertedId();
}

// Editar un producto
function editarProducto($id_, $nombre, $precio, $descripcion, $categoria, $disponible) {
    global $productosCollection;
    if (!$productosCollection) {
        die("Error: Colección de productos no está disponible.");
    }
    $resultado = $productosCollection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectId($id_)],
        ['$set' => [
            'nombre' => sanitizeInput($nombre),
            'precio' => (float) $precio,
            'descripcion' => sanitizeInput($descripcion),
            'categoria' => sanitizeInput($categoria),
            'disponible' => (bool) $disponible
        ]]
    );
    return $resultado->getModifiedCount();
}

// Eliminar un producto
function eliminarProducto($id_) {
    global $productosCollection;
    if (!$productosCollection) {
        die("Error: Colección de productos no está disponible.");
    }
    $resultado = $productosCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id_)]);
    return $resultado->getDeletedCount();
}

// Obtener todos los productos
function obtenerProductos() {
    global $productosCollection;
    if (!$productosCollection) {
        die("Error: Colección de productos no está disponible.");
    }
    return $productosCollection->find();
}

// Obtener un producto por ID
function obtenerProductoPorId($id) {
    global $productosCollection;
    if (!$productosCollection) {
        die("Error: Colección de productos no está disponible.");
    }
    return $productosCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
}
?>
