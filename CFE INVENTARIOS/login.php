<?php
include 'conexion.php'; // Incluye tu archivo de conexión a la base de datos

// Obtener datos del POST
$rpe = $_POST['rpe'];
$password = $_POST['contrasenna'];


try {
    // Consulta SQL para verificar el RPE
    $stmtRPE = $databaseConnection->prepare("SELECT * FROM usuarios WHERE rpe = :rpe");
    $stmtRPE->bindParam(':rpe', $rpe);
    $stmtRPE->execute();

    // Consulta SQL para verificar la contraseña
    $stmtPassword = $databaseConnection->prepare("SELECT * FROM usuarios WHERE rpe = :rpe AND contrasenna = :contrasenna");
    $stmtPassword->bindParam(':rpe', $rpe);
    $stmtPassword->bindParam(':contrasenna', $password);
    $stmtPassword->execute();

    $rpeCorrecto = $stmtRPE->rowCount() > 0;
    $passwordCorrecto = $stmtPassword->rowCount() > 0;

    if ($rpeCorrecto && $passwordCorrecto) {
        // Usuario autenticado correctamente
        echo json_encode(array("message" => "Login exitoso"));
    } elseif ($rpeCorrecto && !$passwordCorrecto) {
        // Contraseña incorrecta
        echo json_encode(array("message" => "Contraseña incorrecta"));
    } elseif (!$rpeCorrecto && $passwordCorrecto) {
        // RPE incorrecto
        echo json_encode(array("message" => "RPE incorrecto"));
    } else {
        // Usuario no autenticado
        echo json_encode(array("message" => "Error en las credenciales"));
    }
} catch (PDOException $e) {
    // Manejo de errores en la consulta
    echo json_encode(array("message" => "Error en la consulta: " . $e->getMessage()));
}
?>
