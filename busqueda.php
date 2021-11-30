<?php
    
    include ("formularios.php");
    $conexion = mysqli_connect('localhost', 'root', '', 'wikiprofes');
     //SEGURIDAD DE SESIONES
    session_start();
    error_reporting(0);
    $varsesion= $_SESSION['nombre'];

     

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
            <a href="index.php">wikiprofes2.0</a>
        </div>
        <!-- NO APLICA SOLO PARA EL INDEX-->
        <div class="busqueda">
            <!--<input type="text" placeholder="Busca a tu profesor...">-->
        </div>
        <div class="botones">
            <?php if($varsesion==null){ ?>
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

            <?php if($varsesion!=null){ ?>
                 <div class="user">
                    <h1>Bienvenido/a: <?php echo($varsesion)?></h1>
                </div>
    
                <form action="cerrar_sesion.php"method="POST">
                    <div class="form-group">
                        <button class="cerrarSesion"><i class="fas fa-sign-out-alt"></i></button>
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
                        $query=mysqli_query($conexion, "SELECT p.idprofesor,p.nombre,m.materia,e.manejoTema,e.puntualidad,e.dificultad,e.promedioAlumnos from profesores as p join materias as m on p.idprofesor=m.idprofesor join evaluaciones as e on p.idprofesor=e.idprofesor WHERE p.nombre LIKE '%$busq%' or m.materia LIKE '%$busq%';");
                        if(mysqli_num_rows($query)>0){
                            while($row=mysqli_fetch_array($query))
                            {?>
                                 <a href="profesor.php?id=<?php echo $row['idprofesor']?>" style="text-decoration:none" class="resultados_profesor" > 
                                
                    
                                    <div class="profesor_detalles">
                                        <div class="profesor_nombre">
                                            <h3>Profesor: </h3>
                                            <p><?php echo $row['nombre']  ?></p>
                                        </div>
                                        <div class="profesor_materia">
                                            <h3>Materias</h3>
                                            <div>
                                            <p><?php echo $row['materia']  ?></p>
                                               <!-- <a href="#">i5898</a>  -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profesor_puntaje">
                                        <div>
                                            <h3>Manejo del tema: </h3>
                                            <p><?php echo $row['manejoTema']  ?></p> <p>%</p>
                                        </div>
                                        <div>
                                            <h3>Puntualidad: </h3>
                                            <p><?php echo $row['puntualidad']  ?></p> <p>%</p>
                                        </div>
                                        <div>
                                            <h3>Dificultad del curso: </h3>
                                            <p><?php echo $row['dificultad']  ?></p> <p>%</p>
                                        </div>
                                        <div>
                                            <h3>Promedio: </h3>
                                            <p><?php echo $row['promedioAlumnos']  ?></p> <p>%</p>
                                        </div>
                                    </div>
                                    
                                   
                                
                                </a>
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