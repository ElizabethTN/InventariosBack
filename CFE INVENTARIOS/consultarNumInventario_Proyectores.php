<?php

require_once 'conexion.php';
$databaseConnection->exec("SET NAMES utf8");
    try
    {
        // Recibir el número de inventario a consultar
        $numInventario = $_GET['numInventario'];

        // Preparar la consulta SQL
        $stmt = $databaseConnection->prepare("SELECT * FROM proyectores WHERE numInventario = :numInventario");
        $stmt->bindParam(':numInventario', $numInventario);
        $stmt->execute();

        // Obtener el resultado de la consulta
        $vehiculo = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si se encontró un resultado
        if ($vehiculo) {
            // Convertir el resultado a formato JSON
            $json_resultado = json_encode($vehiculo);
            echo $json_resultado; // Devolver el resultado en formato JSON
        } else {
            // Si no se encontró el vehículo
            echo json_encode(array('mensaje' => 'Vehículo no encontrado'));
        }
    } 
    catch(PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
        }
?>