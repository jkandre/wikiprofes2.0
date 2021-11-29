<?php
    
    include ("formularios.php");
    $conexion = mysqli_connect('localhost', 'root', '', 'wikiprofes');
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
    <link rel="stylesheet" href="css/busqueda.css">
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
                <form action="login.php"method="POST">
                <div class="form-group">
                    <button class="btn btnLogin">Log In</button>
                    </div>
                </form>
            <form action="registro.php"method="POST">
                <div class="form-group">
                    <button class="btn btnRegistro">Registrate</button>
                    </div>

                    </form>
            <?php }?>

            <?php
            if($varsesion!=null){?>
                 <div class="logo">
                <h1>Bienvenido: </h1><pre> <?php echo($varsesion)?>
                </div>
    
                <form action="cerrar_sesion.php"method="POST">
                <div class="form-group">
                    <button class="btn btnRegistro">Cerrar Sesion</button>
                    </div>
                
                </form>
           <?php } ?>
        </div>
    </div>

    <div class="main">
        <div class="resultados container">
            <form name="formBusqueda" action="#" method="post">
                <input type="text" onchange="validarNombre()" placeholder="Ingresa el profesor o codigo de la materia" name="busqueda">
            </form>
            <h2>Resultados de la busqueda: </h2>
            <div class="resultados_profesores">
                <?php 
                    if(isset($_POST['busqueda']))
                    {
                        $busq =$_POST['busqueda'];
                        $query=mysqli_query($conexion, "SELECT * FROM profesores WHERE nombre LIKE '%$busq%'");
                        if(mysqli_num_rows($query)>0){
                            while($row=mysqli_fetch_array($query))
                            {?>
                                <button class="resultados_profesor">
                                    <div class="profesor_detalles">
                                        <div class="profesor_nombre">
                                            <h3>Profesor: </h3>
                                            <p><?php echo $row['nombre']  ?></p>
                                        </div>
                                        <div class="profesor_materia">
                                            <h3>Materias</h3>
                                            <div>
                                                <a href="#">i5898</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profesor_puntaje">
                                        <div>
                                            <h3>Manejo del tema: </h3>
                                            <p>100%</p>
                                        </div>
                                        <div>
                                            <h3>Puntualidad: </h3>
                                            <p>100%</p>
                                        </div>
                                        <div>
                                            <h3>Dificultad del curso: </h3>
                                            <p>70%</p>
                                        </div>
                                        <div>
                                            <h3>Promedio: </h3>
                                            <p>100%</p>
                                        </div>
                                    </div>
                                </button>
                        <?php }}} ?>
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
        function validarNombre(){
            let nombre = document.getElementById("busqueda");
            let nombreRegex = /^[a-zA-Z][a-zA-Z ]*$/;
            let resultado = nombreRegex.test(nombre.value)
            if(resultado == false){
                alert("El nombre debe contener solo letras")
            }
        }
    </script>
</body>
</html>