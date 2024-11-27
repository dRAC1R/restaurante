<?php
require_once __DIR__ . '/../vendor/autoload.php';
$mongoClient = new MongoDB\Client("mongodb+srv://proyecto1:comando1234@cluster0.fkqkl.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0");
$database = $mongoClient->selectDatabase('restaurante');
$clientsCollection = $database->clientes;
$productosCollection = $database->productos;
$pedidosCollection = $database->pedidos;

?>