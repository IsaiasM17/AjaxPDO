<?php

include("../conn/conexion.php");
include("../funciones/funciones.php");

if(isset($_POST["id_usuario"])) {
    
    $imagen = obtener_nombre_imagen($_POST["id_usuario"]);
    if($imagen != "") {
        unlink("../img/" . $imagen);
    }

    $stmt = $conexion->prepare("DELETE FROM usuarios WHERE id = :id");

    $resultado = $stmt->execute(
        array(

            ':id'    => $_POST["id_usuario"]
        )
    );

    if(!empty($resultado)) {
        echo 'Registro Borrado';
    } else {
        echo 'Error al Borrar registro';
    }
}

?>