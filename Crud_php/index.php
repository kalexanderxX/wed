<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD en PHP y MySQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7c4ee50034.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }

        .header {
            background-color: #162b4e;
            color: #ffffff;
            padding: 20px 0;
        }

        .container-fluid {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .form-control {
            border-radius: 5px;
            border-color: #ced4da;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .table thead {
            background-color: #007bff;
            color: #ffffff;
        }

        .table tbody tr:nth-child(odd) {
            background-color: #f8f9fa;
        }

        .table tbody tr:nth-child(even) {
            background-color: #ffffff;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }

        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            width: 300px;
        }
    </style>
</head>

<body>
    <div class="header text-center">
        <h1>The Gaming House</h1>
    </div>

    <?php 
    include "modelo/conexion.php";
    include "controlador/Eliminar_personas.php";
    ?>

    <div class="container-fluid row mx-auto mt-4">
        <form class="col-md-6 p-4 mx-auto bg-light rounded" method="post">
            <h3 class="text-center text-secondary mb-4">Registro de personas</h3>
            <?php include "controlador/registro_persona.php"; ?>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la persona</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido de la persona</label>
                <input type="text" class="form-control" id="apellido" name="Apellido">
            </div>
            <div class="mb-3">
                <label for="cedula" class="form-label">Cedula de la persona</label>
                <input type="text" class="form-control" id="cedula" name="cedula">
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="fecha" name="Fecha">
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo">
            </div>
            <button type="submit" class="btn btn-primary w-100" name="btnregistrar" value="Okey">Registrar</button>
        </form>

        <div class="col-md-6 p-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Cedula</th>
                        <th scope="col">Fecha de nac</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "modelo/conexion.php";
                    $sql = $conexion->query("SELECT * FROM personas");
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?= $datos->id ?></td>
                            <td><?= $datos->nombre ?></td>
                            <td><?= $datos->apellido ?></td>
                            <td><?= $datos->cedula ?></td>
                            <td><?= $datos->fecha_nacimiento ?></td>
                            <td><?= $datos->correo ?></td>
                            <td>
                                <a href="Modidicar_persona.php?ID=<?= $datos->id ?>" class="btn btn-warning"><i class="fa-solid fa-pen-fancy"></i></a>
                                <a onclick="return eliminar()" href="index.php?id=<?= $datos->id ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function eliminar() {
            var respuesta = confirm("¿Estás seguro que quieres borrar?");
            return respuesta;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

