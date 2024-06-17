<?php
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) && !empty($_POST["Apellido"]) && !empty($_POST["cedula"]) && !empty($_POST["Fecha"]) && !empty($_POST["correo"])) {

        $nombre = $_POST["nombre"];
        $apellido = $_POST["Apellido"];
        $cedula = $_POST["cedula"];
        $fecha_nacimiento = $_POST["Fecha"];
        $correo = $_POST["correo"];

        
        $sql = "INSERT INTO personas (nombre, Apellido, cedula, fecha_nacimiento, correo) 
                VALUES ('$nombre', '$apellido', '$cedula', '$fecha_nacimiento', '$correo')";

        if ($conexion->query($sql) === TRUE) {
            echo '<div class="alert alert-success">Persona registrada correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">Error al registrar la persona: ' . $conexion->error . '</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Algunos de los campos están vacíos</div>';
    }
}