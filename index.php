<?php
include_once("lib_tareas.php");
session_start();

$tareas = getTareas();
$mensaje = $_SESSION['mensaje'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://kit.fontawesome.com/3604450a20.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
</head>

<body>

    <h1>Tasks</h1>

    <div class="container">
        <br>

        <div class="row">
            <div class="col-mb">
                <form action="logica.php" method="POST">
                    <div class="mb-3">
                        <?php if($mensaje): ?>
                        <?php echo $mensaje ?>
                        <?php unset($_SESSION['mensaje']) ?>
                        <?php endif; ?>
                        <h2>Agregar tarea</h2>
                        <input type="text" class="form-control" name="tarea" required>
                    </div>
                    <button name="operacion" value="agregar" type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>

            <div class="col">
                <h2>Tareas</h2>

                <div class="table-responsive">
                    <table class=" table table-dark ">

                        <thead>

                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Operaciones</th>
                            </tr>
                            
                        </thead>
                        <tbody>

                            <?php foreach($tareas as $datos): ?>
                            <form action="logica.php" method="post">
                                <?php $alert = $datos['estado'] == "PENDIENTE" ? "warning" : "success" ?>

                                <input type="hidden" name="id_tarea" value="<?= $datos['id'] ?>">
                                <input type="hidden" name="estado" value="<?= $datos['estado'] ?>">

                                <tr>
                                    <td><?= $datos['id'] ?></td>
                                    <td><?= $datos['tarea'] ?></td>
                                    <td><div class="alert alert-<?= $alert ?>" role="alert"><?= $datos['estado']?></div></td>
                                    <td>
                                        <button class="btn btn-success" name="operacion" value="actualizar"
                                            type="submit">Estado</button>
                                        <button class="btn btn-danger" name="operacion" value="eliminar"
                                            type="submit">Eliminar</button>
                                    </td>
                                </tr>
                            </form>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>




</body>

</html>