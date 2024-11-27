<?php
require_once '../config/database.php';

function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

// Añadir un cliente
function añadirCliente($nombre, $correo, $telefono, $direccion) {
    global $clientsCollection;
    $resultado = $clientsCollection->insertOne([
        'nombre' => sanitizeInput($nombre),
        'correo' => sanitizeInput($correo),
        'telefono' => sanitizeInput($telefono),
        'direccion' => sanitizeInput($direccion)
    ]);
    return $resultado->getInsertedId();
}

// Editar un cliente
function editarCliente($id_, $nombre, $correo, $telefono, $direccion) {
    global $clientsCollection;
    $resultado = $clientsCollection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectId($id_)],
        ['$set' => [
            'nombre' => sanitizeInput($nombre),
            'correo' => sanitizeInput($correo),
            'telefono' => sanitizeInput($telefono),
            'direccion' => sanitizeInput($direccion)
        ]]
    );
    return $resultado->getModifiedCount();
}

// Eliminar un cliente
function eliminarCliente($id_) {
    global $clientsCollection;
    $resultado = $clientsCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id_)]);
    return $resultado->getDeletedCount();
}

// Obtener todos los clientes
function obtenerClientes() {
    global $clientsCollection;
    return $clientsCollection->find();
}

// Obtener un cliente por ID
function obtenerClientePorId($id) {
    global $clientsCollection;
    return $clientsCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
}
?>
