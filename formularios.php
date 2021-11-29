<?php
    function enviarLogin(){
        include_once("conexion.php");
        $conexion=conectar();

        $correo =$_POST['correo'];
        $pass =$_POST['pass'];
        
        $query=mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena='$pass'");

        if(mysqli_num_rows($query)>0){
            //Aqui pasamos las variables de sesion
            $url = 'index.php';
            header("Location: $url");
        }else{
            $url = 'login.php';
            header("Location: $url");
        }
    }

    if(isset($_POST['enviarLogBtn']))
    {
        enviarLogin();
    } 


?>