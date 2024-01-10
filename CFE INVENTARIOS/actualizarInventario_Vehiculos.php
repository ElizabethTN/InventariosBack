<?php

require_once 'conexion.php';
$databaseConnection->exec("SET NAMES utf8");

try {
    // Recibir los datos a modificar
    $numInventario = $_POST['numInventario'];
    $numSerie = $_POST['numSerie'];
    $rpeCapturador = $_POST['rpeCapturador'];
    $fecha = $_POST['fecha'];
    $nombreDivision = $_POST['nombreDivision'];
    $nombreZona = $_POST['nombreZona'];
    $estado = $_POST['estado'];
    $numActivo = $_POST['numActivo'];
    $numEconomico = $_POST['numEconomico'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $anno = $_POST['anno'];
    $color = $_POST['color'];
    $adquisicion = $_POST['adquisicion'];

    // Preparar la consulta SQL para actualizar el registro
    $stmt = $databaseConnection->prepare("UPDATE vehiculos 
        SET numSerie = :numSerie, 
            rpeCapturador = :rpeCapturador, 
            fecha = :fecha, 
            nombreDivision = :nombreDivision, 
            nombreZona = :nombreZona, 
            estado = :estado, 
            numActivo = :numActivo, 
            numEconomico = :numEconomico, 
            marca = :marca, 
            modelo = :modelo, 
            anno = :anno, 
            color = :color, 
            adquisicion = :adquisicion 
        WHERE numInventario = :numInventario");

    $stmt->bindParam(':numInventario', $numInventario);
    $stmt->bindParam(':numSerie', $numSerie);
    $stmt->bindParam(':rpeCapturador', $rpeCapturador);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':nombreDivision', $nombreDivision);
    $stmt->bindParam(':nombreZona', $nombreZona);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':numActivo', $numActivo);
    $stmt->bindParam(':numEconomico', $numEconomico);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':modelo', $modelo);
    $stmt->bindParam(':anno', $anno);
    $stmt->bindParam(':color', $color);
    $stmt->bindParam(':adquisicion', $adquisicion);

    // Ejecutar la consulta
    $stmt->execute();

    // Verificar si se realizó la actualización correctamente
    if ($stmt->rowCount() > 0) {
        echo json_encode(array('mensaje' => 'Registro actualizado correctamente'));
    } else {
        echo json_encode(array('mensaje' => 'No se encontró el vehículo o no se realizaron cambios'));
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
