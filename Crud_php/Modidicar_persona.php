<?php
include "modelo/conexion.php";
$id = $_GET["ID"];

$sql = $conexion->query("select * from personas where id=$id ")

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <form class="col-4 p-3 m-auto" method="POST">
        <h3 Class="text-center text-secondary">Modificar personas</h3>
        <input type="hidden" name="id" value="<?= $_GET ["ID"]?>">
        <?php
        include "controlador/modificar_persona.php";

        while ($datos = $sql->fetch_object()) { ?>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre de la persona</label>
                <input type="text" class="form-control" name="nombre" value="<?= $datos->nombre ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellido de la persona</label>
                <input type="text" class="form-control" name="Apellido"value="<?= $datos->apellido  ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cedula de la persona</label>
                <input type="text" class="form-control" name="cedula"value="<?= $datos->cedula ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" name="Fecha"value="<?= $datos->fecha_nacimiento ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo</label>
                <input type="text" class="form-control" name="correo"value="<?= $datos->correo ?>">
            </div>

        <?php }
        ?>


        <button type="submit" class="btn btn-primary" name="btnregistrar" value="Okey">Modificar Persona</button>
    </form>
</body>

</html>