<?php
    // Datos de conexión a la base de datos
    $hostInventarios = "localhost:3306";
    $userInventarios = "root";
    $passwordInventarios = "Canelo432?";
    $databaseInventarios = "inventarios";

    try 
    {
        // Conexión a la base de datos
        $databaseConnection = new PDO("mysql:host=$hostInventarios;dbname=$databaseInventarios", $userInventarios, $passwordInventarios);
        $databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Conexión exitosa";
    } catch (PDOException $e) 
        {
            //echo "Error de conexión: " . $e->getMessage();
        }
?>
