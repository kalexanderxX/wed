<?php 

if (!empty($_POST["btnregistrar"])) {

    If (!empty($_POST["nombre"]) and !empty($_POST["Apellido"]) and !empty($_POST["cedula"]) and !empty($_POST["Fecha"]) and !empty($_POST["correo"])){
        $id=$_POST["id"];
        $nombre=$_POST["nombre"];
        $Apellido=$_POST["Apellido"];
        $cedula=$_POST["cedula"];
        $Fecha=$_POST["Fecha"];
        $correo=$_POST["correo"];
        $sql = $conexion->query("UPDATE personas SET nombre='$nombre', apellido='$Apellido', cedula='$cedula', fecha_nacimiento='$fecha', correo='$correo' WHERE id=$id");       
         if ($sql==1) {
            header("location:index.php");

        }  else {
            echo "<div class= 'alert alert-danger'> error </div>";

        }


    }else{
        echo "<div class= 'alert alert-warning'> campos vacios </div>";
    }

}

?>