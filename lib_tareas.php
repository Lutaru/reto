<?php
require_once("conexion.php");

function getTareas(){

    global $conn;
    $sql = "SELECT * FROM tasks";
    $result = $conn->query($sql);

    return $result;
} 

function agregarTarea(){

    $nombre_tarea = $_POST['tarea'];
    global $conn;
    $sql = "INSERT INTO tasks (tarea) VALUES ('$nombre_tarea')";
    $result = $conn->query($sql);

    return $result;

}

function eliminarTarea($id_tarea){
    global $conn;
    $sql = "DELETE FROM tasks WHERE $id_tarea = id";
    $result = $conn->query($sql);

    return $result;
}

function actualizarEstado($id_tarea, $estado_actual){
    if ($estado_actual == "PENDIENTE") {

        $estado_nuevo = "COMPLETADA";
    }else {
        $estado_nuevo = "PENDIENTE";
    }
    /* echo $estado_nuevo;die; */
    global $conn;
    $sql = "UPDATE tasks SET estado = '$estado_nuevo' WHERE id = $id_tarea";
    $result = $conn->query($sql);

    return $result;
}
