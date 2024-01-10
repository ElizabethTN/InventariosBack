<?php
    require_once 'conexion.php';
    $databaseConnection->exec("SET NAMES utf8");
    
    try {
        // Recibir los datos para el nuevo inventario de impresoras
        $numSerie = $_POST['numSerie'];
        $rpeCapturador = $_POST['rpeCapturador'];
        $rpeResponsable = $_POST['rpeResponsable'];
        $fecha = $_POST['fecha'];
        $nombreDivision = $_POST['nombreDivision'];
        $nombreZona = $_POST['nombreZona'];
        $estado = $_POST['estado'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $velocidad = $_POST['velocidad'];
        $requiereMantenimiento = $_POST['requiereMantenimiento'];
        $descripcionMantenimiento = $_POST['descripcionMantenimiento'];

        // Preparar la consulta SQL para insertar un nuevo registro de impresora
        $stmt = $databaseConnection->prepare("INSERT INTO impresoras (numSerie, rpeCapturador, rpeResponsable, fecha, nombreDivision, nombreZona, estado, marca, modelo, velocidad, requiereMantenimiento, descripcionMantenimiento) VALUES (:numSerie, :rpeCapturador, :rpeResponsable, :fecha, :nombreDivision, :nombreZona, :estado, :marca, :modelo, :velocidad, :requiereMantenimiento, :descripcionMantenimiento)");
        $stmt->bindParam(':numSerie', $numSerie);
        $stmt->bindParam(':rpeCapturador', $rpeCapturador);
        $stmt->bindParam(':rpeResponsable', $rpeResponsable);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':nombreDivision', $nombreDivision);
        $stmt->bindParam(':nombreZona', $nombreZona);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':velocidad', $velocidad);
        $stmt->bindParam(':requiereMantenimiento', $requiereMantenimiento);
        $stmt->bindParam(':descripcionMantenimiento', $descripcionMantenimiento);

        // Ejecutar la consulta
        $stmt->execute();

        // Verificar si se agregó la nueva impresora correctamente
        if ($stmt->rowCount() > 0) {
            echo json_encode(array('mensaje' => 'Nueva impresora agregada correctamente'));
        } else {
            echo json_encode(array('mensaje' => 'No se pudo agregar la nueva impresora'));
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>