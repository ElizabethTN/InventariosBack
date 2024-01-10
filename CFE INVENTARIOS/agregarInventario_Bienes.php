<?php
require_once 'conexion.php';
$databaseConnection->exec("SET NAMES utf8");

try {
    // Recibir los datos para el nuevo inventario
    $numSerie = $_POST['numSerie'];
    $rpeCapturador = strval($_POST['rpeCapturador']);
    $division =  strval( $_POST['division']);
    $zona =  strval($_POST['zona']);
    $fecha =  strval( $_POST['fecha']);
    $numActivo = (int) $_POST['numActivo'];
    $estado =  $_POST['estado'];
    $descripcion =  strval( $_POST['descripcion']);
    $adquisicion = (double)$_POST['adquisicion'];


    // Preparar la consulta SQL para insertar un nuevo registro
    $stmt = $databaseConnection->prepare("INSERT INTO bienesmuebles (numInventario, numSerie, rpeCapturador, division, zona, fecha, numActivo, estado, descripcion, adquisicion) VALUES (:numInventario, :numSerie, :rpeCapturador, :division, :zona, :fecha, :numActivo, :estado, :descripcion, :adquisicion)");
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
