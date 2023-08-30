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