<?php

require_once 'conexion.php';
$databaseConnection->exec("SET NAMES utf8");
try {
    // Recibir los datos a modificar
    $numInventario = $_POST['numInventario'];
    $numSerie = $_POST['numSerie'];
    $rpeCapturador = $_POST['rpeCapturador'];
    $division = $_POST['division'];
    $zona = $_POST['zona'];
    $fecha = $_POST['fecha'];
    $numActivo = $_POST['numActivo'];
    $estado = $_POST['estado'];
    $descripcion = $_POST['descripcion'];
    $adquisicion = $_POST['adquisicion'];

    // Preparar la consulta SQL para actualizar el registro
    $stmt = $databaseConnection->prepare("UPDATE bienesmuebles 
        SET numSerie = :numSerie, 
            rpeCapturador = :rpeCapturador, 
            division = :division, 
            zona = :zona, 
            fecha = :fecha, 
            numActivo = :numActivo, 
            estado = :estado, 
            descripcion = :descripcion, 
            adquisicion = :adquisicion 
        WHERE numInventario = :numInventario");

    $stmt->bindParam(':numInventario', $numInventario);
    $stmt->bindParam(':numSerie', $numSerie);
    $stmt->bindParam(':rpeCapturador', $rpeCapturador);
    $stmt->bindParam(':division', $division);
    $stmt->bindParam(':zona', $zona);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':numActivo', $numActivo);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':adquisicion', $adquisicion);

    // Ejecutar la consulta
    $stmt->execute();

    // Verificar si se realizó la actualización correctamente
    if ($stmt->rowCount() > 0) {
        echo json_encode(array('Registro actualizado correctamente'));
    } else {
        echo json_encode(array('No se encontró el vehículo o no se realizaron cambios'));
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>