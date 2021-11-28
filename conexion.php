<?php
    function conectar(){
        $baseDatos="wikiprofes2.0";
        $usuario="root";
        $contrasena="";
        $servidor="localhost";

        $db = mysqli_connect($servidor, $usuario, $contrasena, $baseDatos);

        return $db;
    }
?>