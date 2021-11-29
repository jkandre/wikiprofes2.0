<?php
    function conectar(){
        $baseDatos="wikiprofes";
        $usuario="root";
        $contrasena="";
        $servidor="localhost";

        $db = mysqli_connect($servidor, $usuario, $contrasena, $baseDatos);

        return $db;
    }
?>