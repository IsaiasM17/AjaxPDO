<?php 

$usuario = "root";
$password = "";

try {
    $conexion = new PDO("mysql:host=localhost;dbname=crud_usuariosajax", $usuario, $password);
    //echo "Conexión exitosa a la base de datos";
    
    // Puedes realizar operaciones con la base de datos aquí
} catch (PDOException $e) {
    echo "Error de conexión a la base de datos: " . $e->getMessage();
}

?>