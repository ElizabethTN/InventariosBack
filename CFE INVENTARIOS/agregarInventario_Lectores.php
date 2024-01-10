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
    $tipo = $_POST['tipo'];

    // Preparar la consulta SQL para insertar un nuevo registro
    $stmt = $databaseConnection->prepare("INSERT INTO lectoresopticos (numSerie, rpeCapturador, rpeResponsable, fecha, nombreDivision, nombreZona, estado, marca, modelo, tipo) VALUES (:numSerie, :rpeCapturador, :rpeResponsable, :fecha, :nombreDivision, :nombreZona, :estado, :marca, :modelo, :tipo)");
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

    // Ejecutar la consulta
    $stmt->execute();

    // Verificar si se agregó correctamente
    if ($stmt->rowCount() > 0) {
        echo json_encode(array('mensaje' => 'Nuevo lector óptico agregado correctamente'));
    } else {
        echo json_encode(array('mensaje' => 'No se pudo agregar el nuevo lector óptico'));
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
