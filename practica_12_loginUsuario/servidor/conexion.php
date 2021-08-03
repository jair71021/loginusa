
<?php
    function conexion() {
        $servidor = "localhost";
        $usuario = "root";
        $password = "";
        $db = "registrousuario";

        $conexion = mysqli_connect($servidor, $usuario, $password, $db);

        return $conexion;
    }
?>