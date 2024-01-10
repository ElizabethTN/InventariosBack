<?php

include 'conexion.php';
$databaseConnection->exec("SET NAMES utf8");

// Consultar todos los datos de la tabla multifuncionales
$query = "SELECT * FROM tabletas";
$statement = $databaseConnection->query($query);

// Obtener todos los resultados
$multifuncionales = $statement->fetchAll(PDO::FETCH_ASSOC);

// Verificar si hay algún error en la codificación JSON
$jsonData = json_encode($multifuncionales);

if ($jsonData === false) {
    // Manejar el error de codificación JSON de manera específica
    $jsonError = json_last_error_msg();
    echo "Error al codificar a JSON: $jsonError";
} else {
    // Imprimir los resultados codificados en JSON
    echo $jsonData;
}

?>