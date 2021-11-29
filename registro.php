<!DOCTYPE html>
<html lang="en">

<?php
    if (!isset($_SESSION)){
        session_start();
    }
    $_SESSION['mensaje'] = '';
    $_SESSION['aux'] = false;
    $db = mysqli_connect('localhost', 'root', '', 'wikiprofes'); 
    if(isset($_POST['registrarse'])){
        //if(!empty($_POST['name'])&& !empty($_POST['apellido']) && !empty($_POST['correo']) && !empty($_POST['contrasena']) && !empty($_POST['contrasena2'])){
           
            $email = explode("@",$_POST['correo']);
            if(($email[1]=='alumnos.udg.mx') || ($email[1]=='ALUMNOS.UDG.MX')){
                if($_POST['contrasena'] == $_POST['contrasena2']){
                $nombre=$_POST['name'];
                $ap=$_POST['apellido'];
                $correo=$_POST['correo'];
                $contrasena=$_POST['contrasena'];
                $result=mysqli_query($db, "INSERT INTO usuarios (nombre, apellido, correo, contrasena) VALUES ('$nombre', '$ap', '$correo', '$contrasena')");
                if(!$result){
                    die("Query Failed");
                    $_SESSION['mensaje'] = "";

                }
                else{
                    $_SESSION['mensaje']='¡Registrado satisfactoriamente!';
                    $_SESSION['aux'] = true;
                }
            }
            //else{
              //  $mensaje='¡Las contraseñas no coinciden!';
            //}
        }
            //else{
              //  $mensaje='No puedes registrarte con ese correo';
            //}

        
        //}
    
    //else{
      //  $mensaje='¡Campos incompletos!';
    //}
}

   ?>




<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wikiprofes 2.0</title>
    <!--Montserrat Font-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap');
    </style>
    <!--Iconos Google-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--Iconos pq google no tiene de facebook xd-->
    <script src="https://kit.fontawesome.com/4311011c35.js" crossorigin="anonymous"></script>
    <!--Base css-->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/registro.css">

</head>
<body>
    <div class="nav container">
        <div class="logo">
            <p>wikiprofes2.0</p>
        </div>
        <div class="busqueda">
        <form action="busqueda.php"method="POST">
                        <div class="botones">
                        <input type="text" name="busqueda"  placeholder="Ingresa el profesor o codigo de la materia"> 
                            <button class="btn" name="buscarR">Buscar</button>
                        </div>
                </form>
        </div>
        <form action="login.php"method="POST">
            <div class="botones">
                <button class="btn btnLogin">Log In</button>
                </div>
                </form>
    </div>
    <div class="main">
        <div class="heroRegistro container">
            <div class="heroRegistro_text">
                <h1>Unete hoy mismo a la comunidad de recomendaciones CUCEI</h1>
            </div>
            <div class="heroRegistro_form">
                <form action="registro.php" method="post">
                    <h3>Registrate de forma gratuita</h3>
                    <div class="nombreForm">
                        <input type="text" class="input" onchange="validarNombre()" name="name"placeholder="Nombre" id="nombre" required>
                        <input type="text" class="input" onchange="validarApellido()"name="apellido" placeholder="Apellido" id="apellido" required>
                    </div>
                    <input type="email" class="input" onchange="validarAcademico()" name="correo" placeholder="Correo academico" id="mail" required>
                    <input type="password" class="input" name="contrasena" placeholder="Contraseña" id="pass1" required>
                    <input type="password" class="input" onchange="validarContra()" name="contrasena2"  placeholder="Confirmar contraseña" id="pass2" required>
                    <button class="btn button"  name="registrarse" disabled>Registrarse</button>
                    <?php 
                        if(isset($_SESSION['aux']) && $_SESSION['aux']){
                            //$_SESSION['aux'] = false;
                            header("location:index.php");
                        }
                    ?>  
                </form>
            </div>
        </div>
    </div>
    <div class="footer container">
        <div class="footer_logo">
            <p>wikiprofes2.0</p>
        </div>
        <hr>
        <div class="footer_redes">
            <p>wikiprofes2.0. 2021</p>
            <div class="redes_follow">
                <p>Follow us: </p>
                <i class="fab fa-facebook"></i>
                <i class="fab fa-instagram"></i>
            </div>
        </div>
    </div>
    <script>
        let input = document.querySelector(".input");
        let button = document.querySelector(".button");
        button.disabled = true;
        input.addEventListener("change", stateHandle);
        function stateHandle() {
            if(document.querySelector(".input").value === "") {
            button.disabled = true;
            }
            else{
            button.disabled = false;
            }
        }



        function validarAcademico(){
            let email = document.getElementById("mail");
            console.log(email.value)
            let correoRegex = /.+\@(alumnos)\.(udg)\.(mx)/;
            let resultado = correoRegex.test(email.value);
            console.log("Correo: " + resultado);
            if(resultado == true){
                return true;
            }
            else{
                alert("El correo no es institucional.")
                return false;
            }
        }
        function validarNombre(){
            let nombre = document.getElementById("nombre");
            let nombreRegex = /^[a-zA-Z][a-zA-Z ]*$/;
            let resultado = nombreRegex.test(nombre.value)
            if(resultado == false){
                alert("El nombre debe contener solo letras")
                return false;
            }
            else{
                return true;
            }
        }
        function validarApellido(){
            let apellido = document.getElementById("apellido");
            let nombreRegex = /^[a-zA-Z][a-zA-Z ]*$/;
            let resultado2 = nombreRegex.test(apellido.value)
            if(resultado2 == false){
                alert("El apellido debe contener solo letras")
                return false;
            }
            else{
                return true;
            }
        }
        function validarContra(){
            let pass1 = document.getElementById("pass1");
            let pass2 = document.getElementById("pass2");
            if(pass1.value != pass2.value){
                alert("Las contraseñas no coinciden");
                return false;
            }
            else{
                return true;
            }
        }

    </script>
</body>
</html>