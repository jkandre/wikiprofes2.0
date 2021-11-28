<?php
    include ("conexion.php");

    $conexion=conectar();

    //SEGURIDAD DE SESIONES
    session_start();
    error_reporting(0);
    $varsesion= $_SESSION['correo'];


?>

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
    <link rel="stylesheet" href="css/index.css">

</head>
<body>
    <div class="nav container">
        <div class="logo">
            <p>wikiprofes2.0</p>
        </div>
        <!-- NO APLICA SOLO PARA EL INDEX-->
        <div class="busqueda">
            <!--<input type="text" placeholder="Busca a tu profesor...">-->
        </div>

        <div class="botones">
            <?php if($varsesion==null){?>
                <a class="btn btnLogin" href="login.php">Log In</a>
                <a class="btn btnRegistro" href="registro.php">Registrate</a>
            <?php }?>

            <?php
            if($varsesion!=null){?>
            
           <?php } ?>
        </div>
    </div>
    <div class="main">
        <!--HeroA-->
        <div class="heroA container">
            <div class="heroA_img"></div>
            <div class="heroA_text">
                <div class="heroA_content">
                    <h1>Busca referencias sobre tus profesores y materias ahora mismo.</h1>
                    <input type="text" placeholder="Ingresa el profesor o codigo de la materia">
                </div>
            </div>
        </div>
        <!--BodyA-->
        <div class="bodyA container">
            <h1>Agrega tus experiencias academicas</h1>
            <div class="bodyA_funciones">
                <div class="bodyA_funcion">
                    <h3>Comenta</h3>
                    <p>Comparte tus experiencias con la comunidad para ayudar a mas compañeros a traves de un comentario sobre algun profesor o materia</p>
                    <a class="btn" href="login.php">Comentar</a>
                </div>
                <div class="bodyA_funcion">
                    <h3>Califica a un profesor</h3>
                    <p>Los papeles se invierten. Evalua a un profesor en base a 4 puntos. Ayuda a la comunidad agregando datos de tu profesor</p>
                    <a class="btn" href="login.php">Calificar</a>
                </div>
            </div>
        </div>
        <!--BodyB-->
        <div class="bodyB container">
            <div class="bodyB_titulo">
                <h1>Registrate y comparte tu perfil</h1>
                <h2>Inicia sesion con tu perfil y se parte de nuestra comunidad</h2>
            </div>
            <div class="bodyB_funciones">
                <div class="bodyB_funcion">
                    <h3>Comenta</h3>
                    <p>Agrega tus experiencias para ayudar a las futuras generaciones y mejorar el aprendizaje</p>
                </div>
                <div class="bodyB_funcion">
                    <h3>Califica</h3>
                    <p>Evalua a tus profesores para conocer a los mejores de CUCEI</p>
                </div>
                <div class="bodyB_funcion">
                    <h3>Personaliza tu perfil</h3>
                    <p>Comparte tus datos academicos y personaliza tu perfil de estudiante.</p>
                </div>
            </div>
            <div class="bodyB_img"></div>
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
</body>
</html>