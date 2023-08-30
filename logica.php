<?php
require_once("lib_tareas.php");
session_start();
$tarea_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $nombre_tarea = trim($_POST['tarea']);

    //insertar
    if (empty($nombre_tarea)) {
        $_SESSION['mensaje'] = '<div class="alert alert-warning" role="alert"> El campo esta vacio!</div>';
        header("location: index.php");
        exit;
    }else {
        agregarTarea();
        $_SESSION['mensaje'] = '<div class="alert alert-success" role="alert"> La tarea ha sido agregada correctamente!</div>';
        header("location: index.php");
        exit;
    }

}

if ($tarea_id) {

    eliminarTarea($tarea_id);
    $_SESSION['mensaje'] = '<div class="alert alert-danger" role="alert"> La tarea ha sido eliminada!</div>';
    header("location: index.php");
    exit;
}
    



