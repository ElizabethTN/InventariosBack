<?php

require_once 'conexion.php';
$databaseConnection->exec("SET NAMES utf8");

try {
    // Recibir los datos a modificar
    $numInventario = $_POST['numInventario'];
    $numSerie = $_POST['numSerie'];
    $rpeCapturador = $_POST['rpeCapturador'];
    $rpeResponsable = $_POST['rpeResponsable'];
    $fecha = $_POST['fecha'];
    $nombreZona = $_POST['nombreZona'];
    $estado = $_POST['estado'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $tipo = $_POST['tipo'];
    $numPuertos_10Mbps = $_POST['numPuertos_10Mbps'];
    $numPuertos_100Mbps = $_POST['numPuertos_100Mbps'];
    $numPuertos_1GBps = $_POST['numPuertos_1GBps'];
    $numPuertos_10GBps = $_POST['numPuertos_10GBps'];
    $numPuertos_Fibra = $_POST['numPuertos_Fibra'];
    $requiereMantenimiento = $_POST['requiereMantenimiento'];
    $descripcionMantenimiento = $_POST['descripcionMantenimiento'];

    // Preparar la consulta SQL para actualizar el registro
    $stmt = $databaseConnection->prepare("UPDATE redesdatos 
        SET numSerie = :numSerie, 
            rpeCapturador = :rpeCapturador, 
            rpeResponsable = :rpeResponsable, 
            fecha = :fecha, 
            nombreZona = :nombreZona, 
            estado = :estado, 
            marca = :marca, 
            modelo = :modelo, 
            tipo = :tipo, 
            numPuertos_10Mbps = :numPuertos_10Mbps, 
            numPuertos_100Mbps = :numPuertos_100Mbps, 
            numPuertos_1GBps = :numPuertos_1GBps, 
            numPuertos_10GBps = :numPuertos_10GBps, 
            numPuertos_Fibra = :numPuertos_Fibra, 
            requiereMantenimiento = :requiereMantenimiento, 
            descripcionMantenimiento = :descripcionMantenimiento 
        WHERE numInventario = :numInventario");

    $stmt->bindParam(':numInventario', $numInventario);
    $stmt->bindParam(':numSerie', $numSerie);
    $stmt->bindParam(':rpeCapturador', $rpeCapturador);
    $stmt->bindParam(':rpeResponsable', $rpeResponsable);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':nombreZona', $nombreZona);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':modelo', $modelo);
    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':numPuertos_10Mbps', $numPuertos_10Mbps);
    $stmt->bindParam(':numPuertos_100Mbps', $numPuertos_100Mbps);
    $stmt->bindParam(':numPuertos_1GBps', $numPuertos_1GBps);
    $stmt->bindParam(':numPuertos_10GBps', $numPuertos_10GBps);
    $stmt->bindParam(':numPuertos_Fibra', $numPuertos_Fibra);
    $stmt->bindParam(':requiereMantenimiento', $requiereMantenimiento);
    $stmt->bindParam(':descripcionMantenimiento', $descripcionMantenimiento);

    // Ejecutar la consulta
    $stmt->execute();

    // Verificar si se realizó la actualización correctamente
    if ($stmt->rowCount() > 0) {
        echo json_encode(array('mensaje' => 'Registro actualizado correctamente'));
    } else {
        echo json_encode(array('mensaje' => 'No se encontró el bien mueble o no se realizaron cambios'));
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
