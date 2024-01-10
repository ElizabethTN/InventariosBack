<?php

require_once 'conexion.php';
$databaseConnection->exec("SET NAMES utf8");
try {
    // Recibir los datos para el nuevo inventario
    $numSerie = $_POST['numSerie'];
    $rpeCapturador = $_POST['rpeCapturador'];
    $rpeResponsable = $_POST['rpeResponsable'];
    $fecha = $_POST['fecha'];
    $nombreDivision = $_POST['nombreDivision'];
    $nombreZona = $_POST['nombreZona'];
    $estado = $_POST['estado'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $sistemaOperativo = $_POST['sistemaOperativo'];
    $velocidad = $_POST['velocidad'];
    $ip = $_POST['ip'];
    $mac = $_POST['mac'];
    $procesador = $_POST['procesador'];
    $numProcesadores = (int) $_POST['numProcesadores'];
    $memoria =  $_POST['memoria'];
    $almacenamiento = $_POST['almacenamiento'];
    $requiereMantenimiento = $_POST['requiereMantenimiento'];
    $descripcionMantenimiento = $_POST['descripcionMantenimiento'];


    // Preparar la consulta SQL para insertar un nuevo registro
    $stmt = $databaseConnection->prepare("INSERT INTO computadoras (numSerie, rpeCapturador, rpeResponsable, fecha, nombreDivision, nombreZona, estado, marca, modelo, sistemaOperativo, velocidad, ip, mac, procesador, numProcesadores, memoria, almacenamiento, requiereMantenimiento, descripcionMantenimiento) VALUES (:numSerie, :rpeCapturador, :rpeResponsable, :fecha, :nombreDivision, :nombreZona, :estado, :marca, :modelo, :sistemaOperativo, :velocidad, :ip, :mac, :procesador, :numProcesadores, :memoria, :almacenamiento, :requiereMantenimiento, :descripcionMantenimiento)");
    $stmt->bindParam(':numSerie', $numSerie);
    $stmt->bindParam(':rpeCapturador', $rpeCapturador);
    $stmt->bindParam(':rpeResponsable', $rpeResponsable);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':nombreDivision', $nombreDivision);
    $stmt->bindParam(':nombreZona', $nombreZona);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':modelo', $modelo);
    $stmt->bindParam(':sistemaOperativo', $sistemaOperativo);
    $stmt->bindParam(':velocidad', $velocidad);
    $stmt->bindParam(':ip', $ip);
    $stmt->bindParam(':mac', $mac);
    $stmt->bindParam(':procesador', $procesador);
    $stmt->bindParam(':numProcesadores', $numProcesadores);
    $stmt->bindParam(':memoria', $memoria);
    $stmt->bindParam(':almacenamiento', $almacenamiento);
    $stmt->bindParam(':requiereMantenimiento', $requiereMantenimiento);
    $stmt->bindParam(':descripcionMantenimiento', $descripcionMantenimiento);

    // Ejecutar la consulta
    $stmt->execute();

    // Verificar si se agregó el nuevo inventario correctamente
    if ($stmt->rowCount() > 0) {
        echo json_encode(array('message'=>'Nuevo inventario agregado correctamente'));
    } else {
        echo json_encode(array('message'=>'No se pudo agregar el nuevo inventario'));
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>