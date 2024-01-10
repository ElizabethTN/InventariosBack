<?php

    include 'conexion.php';

    // Consultar todos los datos de la tabla computadoras
    $query = "SELECT * FROM computadoras";
    $statement = $databaseConnection->query($query);

    // Obtener todos los resultados
    $computadoras = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Convertir los resultados a formato JSON para enviar a la aplicación Android
    echo json_encode($computadoras);
?>