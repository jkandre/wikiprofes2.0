<!DOCTYPE html>
<html lang="en">
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
            <input type="text" placeholder="Busca a tu profesor...">
        </div>
        <div class="botones">
            <?php if($varsesion==null){?>
                <a class="btn btnLogin" href="login.php">Log In</a>
            <?php }?>

            <?php
            if($varsesion!=null){?>
            
           <?php } ?>
        </div>
    </div>
    <div class="main">
        <div class="heroRegistro container">
            <div class="heroRegistro_text">
                <h1>Unete hoy mismo a la comunidad de recomendaciones CUCEI</h1>
            </div>
            <div class="heroRegistro_form">
                <form action="" method="post">
                    <h3>Registrate de forma gratuita</h3>
                    <div class="nombreForm">
                        <input type="text" onchange="validarNombre()" placeholder="Nombre" id="nombre" required>
                        <input type="text" onchange="validarApellido()" placeholder="Apellido" id="apellido" required>
                    </div>
                    <input type="email" onchange="validarAcademico()" placeholder="Correo academico" id="mail" required>
                    <input type="password" placeholder="Contraseña" id="pass1" required>
                    <input type="password" onchange="validarContra()"" placeholder="Confirmar contraseña" id="pass2" required>
                    <button class="btn">Registrarse</button>
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
        function validarAcademico(){
            let email = document.getElementById("mail");
            console.log(email.value)
            let correoRegex = /.+\@(alumnos)\.(udg)\.(mx)/;
            let resultado = correoRegex.test(email.value);
            console.log("Correo: " + resultado);
            if(resultado == true){
                return true
            }
            else{
                alert("El correo no es institucional.")
            }
        }
        function validarNombre(){
            let nombre = document.getElementById("nombre");
            let nombreRegex = /^[a-zA-Z][a-zA-Z ]*$/;
            let resultado = nombreRegex.test(nombre.value)
            if(resultado == false){
                alert("El nombre debe contener solo letras")
            }
        }
        function validarApellido(){
            let apellido = document.getElementById("apellido");
            let nombreRegex = /^[a-zA-Z][a-zA-Z ]*$/;
            let resultado2 = nombreRegex.test(apellido.value)
            if(resultado2 == false){
                alert("El apellido debe contener solo letras")
            }
        }
        function validarContra(){
            let pass1 = document.getElementById("pass1");
            let pass2 = document.getElementById("pass2");
            if(pass1.value != pass2.value){
                alert("Las contraseñas no coinciden");
            }
            else{
                return true;
            }
        }
    </script>
</body>
</html>