<?php
require_once 'conexion.php';
$databaseConnection->exec("SET NAMES utf8");

try {
    // Recibir los datos para el nuevo inventario
    $numSerie = $_POST['numSerie'];
    $rpeCapturador = strval($_POST['rpeCapturador']);
    $rpeResponsable = strval($_POST['rpeResponsable']);
    $fecha = strval($_POST['fecha']);
    $nombreDivision = strval($_POST['nombreDivision']);
    $nombreZona = strval($_POST['nombreZona']);
    $estado = $_POST['estado'];
    $marca = strval($_POST['marca']);
    $modelo = strval($_POST['modelo']);
    $tipo = strval($_POST['tipo']);
    $sistemaOperativo = strval($_POST['sistemaOperativo']);
    $tamannoPantalla = strval($_POST['tamannoPantalla']);
    $requiereMantenimiento = $_POST['requiereMantenimiento'];
    $descripcionMantenimiento = strval($_POST['descripcionMantenimiento']);

    // Preparar la consulta SQL para insertar un nuevo registro
    $stmt = $databaseConnection->prepare("INSERT INTO tabletas (numSerie, rpeCapturador, rpeResponsable, fecha, nombreDivision, nombreZona, estado, marca, modelo, tipo, sistemaOperativo, tamannoPantalla, requiereMantenimiento, descripcionMantenimiento) VALUES (:numSerie, :rpeCapturador, :rpeResponsable, :fecha, :nombreDivision, :nombreZona, :estado, :marca, :modelo, :tipo, :sistemaOperativo, :tamannoPantalla, :requiereMantenimiento, :descripcionMantenimiento)");
    
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

    // Verificar si se agregó el nuevo inventario correctamente
    if ($stmt->rowCount() > 0) {
        echo json_encode(array('message'=>'Nuevo inventario agregado correctamente'));
    } else {
        echo json_encode(array('message'=>'No se pudo agregar el nuevo inventario'));
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>