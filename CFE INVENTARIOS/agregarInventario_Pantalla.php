<?php

require_once 'conexion.php';
$databaseConnection->exec("SET NAMES utf8");

try {
    // Recibir los datos para el nuevo registro
    $numSerie = $_POST['numSerie'];
    $rpeCapturador = $_POST['rpeCapturador'];
    $rpeResponsable = $_POST['rpeResponsable'];
    $fecha = $_POST['fecha'];
    $nombreDivision = $_POST['nombreDivision'];
    $nombreZona = $_POST['nombreZona'];
    $estado = $_POST['estado'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $tamannoPantalla = $_POST['tamannoPantalla'];
    $tipoPantalla = $_POST['tipoPantalla'];
    $requiereMantenimiento = $_POST['requiereMantenimiento'];
    $descripcionMantenimiento = $_POST['descripcionMantenimiento'];

    // Preparar la consulta SQL para insertar un nuevo registro
    $stmt = $databaseConnection->prepare("INSERT INTO pantalla (numSerie, rpeCapturador, rpeResponsable, fecha, nombreDivision, nombreZona, estado, marca, modelo, tamannoPantalla, tipoPantalla, requiereMantenimiento, descripcionMantenimiento) VALUES (:numSerie, :rpeCapturador, :rpeResponsable, :fecha, :nombreDivision, :nombreZona, :estado, :marca, :modelo, :tamannoPantalla, :tipoPantalla, :requiereMantenimiento, :descripcionMantenimiento)");
    $stmt->bindParam(':numSerie', $numSerie);
    $stmt->bindParam(':rpeCapturador', $rpeCapturador);
    $stmt->bindParam(':rpeResponsable', $rpeResponsable);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':nombreDivision', $nombreDivision);
    $stmt->bindParam(':nombreZona', $nombreZona);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':modelo', $modelo);
    $stmt->bindParam(':tamannoPantalla', $tamannoPantalla);
    $stmt->bindParam(':tipoPantalla', $tipoPantalla);
    $stmt->bindParam(':requiereMantenimiento', $requiereMantenimiento);
    $stmt->bindParam(':descripcionMantenimiento', $descripcionMantenimiento);

    // Ejecutar la consulta
    $stmt->execute();

    // Verificar si se agregó el nuevo registro correctamente
    if ($stmt->rowCount() > 0) {
        echo json_encode(array('mensaje' => 'Nuevo registro agregado correctamente'));
    } else {
        echo json_encode(array('mensaje' => 'No se pudo agregar el nuevo registro'));
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>