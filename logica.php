<?php
require_once("lib_tareas.php");
session_start();

$operacion = $_POST['operacion'];
$estado = $_POST['estado'];
/* echo $operacion;
echo $tarea_id;
echo $estado;
die; */


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    switch ($operacion) {
        case 'agregar':
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
            break;

        case 'eliminar':
                $tarea_id = $_POST['id_tarea'];
                eliminarTarea($tarea_id);
                $_SESSION['mensaje'] = '<div class="alert alert-danger" role="alert"> La tarea ha sido eliminada!</div>';
                header("location: index.php");
                exit;
            break;

        case 'actualizar':  
                $tarea_id = $_POST['id_tarea']; 
                actualizarEstado($tarea_id,$estado);
                $_SESSION['mensaje'] = '<div class="alert alert-success" role="alert"> La tarea ha sido actualizada!</div>';
                header("location: index.php");
                exit;
        default:
            echo"<h1>error 404</h1>";
            break;
    }



    

}


    



