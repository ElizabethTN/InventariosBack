<?php

    include 'conexion.php';
    $databaseConnection->exec("SET NAMES utf8");
    // Consultar todos los datos de la tabla vehiculos
    $query = "SELECT * FROM vehiculos";
    $statement = $databaseConnection->query($query);

    // Obtener todos los resultados
    $vehiculos = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Convertir los resultados a formato JSON para enviar a la aplicación Android
    echo json_encode($vehiculos);
?>