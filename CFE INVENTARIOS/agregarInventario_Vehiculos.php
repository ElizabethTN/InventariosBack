<?php

    require_once 'conexion.php';
    $databaseConnection->exec("SET NAMES utf8");
        try 
        {
            // Recibir los datos para el nuevo inventario (puedes cambiar esto según tu implementación)
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

            // Preparar la consulta SQL para insertar un nuevo registro
            $stmt = $databaseConnection->prepare("INSERT INTO vehiculos (numSerie, rpeCapturador, fecha, nombreDivision, nombreZona, estado, numActivo, numEconomico, marca, modelo, anno, color, adquisicion) VALUES (:numSerie, :rpeCapturador, :fecha, :nombreDivision, :nombreZona, :estado, :numActivo, :numEconomico, :marca, :modelo, :anno, :color, :adquisicion)");
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

            // Verificar si se agregó el nuevo inventario correctamente
            if ($stmt->rowCount() > 0) 
            {
                echo json_encode(array('mensaje' => 'Nuevo inventario agregado correctamente'));
            } else 
                {
                    echo json_encode(array('mensaje' => 'No se pudo agregar el nuevo inventario'));
                }
        } catch(PDOException $e) 
            {
                echo "Error: " . $e->getMessage();
            }
?>
