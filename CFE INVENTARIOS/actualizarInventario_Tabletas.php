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
    $nombreDivision = $_POST['nombreDivision'];
    $nombreZona = $_POST['nombreZona'];
    $estado = $_POST['estado'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $tipo = $_POST['tipo'];
    $sistemaOperativo = $_POST['sistemaOperativo'];
    $tamannoPantalla = $_POST['tamannoPantalla'];
    $requiereMantenimiento = $_POST['requiereMantenimiento'];
    $descripcionMantenimiento = $_POST['descripcionMantenimiento'];

    // Preparar la consulta SQL para actualizar el registro
    $stmt = $databaseConnection->prepare("UPDATE tabletas 
        SET numSerie = :numSerie, 
            rpeCapturador = :rpeCapturador, 
            rpeResponsable = :rpeResponsable, 
            fecha = :fecha, 
            nombreDivision = :nombreDivision, 
            nombreZona = :nombreZona, 
            estado = :estado, 
            marca = :marca, 
            modelo = :modelo, 
            tipo = :tipo, 
            sistemaOperativo = :sistemaOperativo, 
            tamannoPantalla = :tamannoPantalla, 
            requiereMantenimiento = :requiereMantenimiento, 
            descripcionMantenimiento = :descripcionMantenimiento 
        WHERE numInventario = :numInventario");

    $stmt->bindParam(':numInventario', $numInventario);
    $stmt->bindParam(':numSerie', $numSerie);
    $stmt->bindParam(':rpeCapturador', $rpeCapturador);
    $stmt->bindParam(':rpeResponsable', $rpeResponsable);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':nombreDivision', $nombreDivision);
    $stmt->bindParam(':nombreZona', $nombreZona);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':modelo', $modelo);
    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':sistemaOperativo', $sistemaOperativo);
    $stmt->bindParam(':tamannoPantalla', $tamannoPantalla);
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
