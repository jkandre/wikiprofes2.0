<?php
    include ("conexion.php");

    $conexion=conectar();

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
    <link rel="stylesheet" href="css/profesor.css">

</head>
<body>
    <div class="nav container">
        <div class="logo">
            <p>wikiprofes2.0</p>
        </div>
        <!-- NO APLICA SOLO PARA EL INDEX-->
        <div class="busqueda">
            <input type="text" placeholder="Busca a tu profesor...">
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
        <!--Perfil del profesor-->
        <div class="profesor container">
            <h2>MORALES RAMIREZ THELMA ISABEL</h2>
            <div class="info_datos">
                <h2>Informacion general:</h2>
                <h3>Universidad: <span>Universidad de Guadalajara</span></h3>
                <h3>Centro: <span>Centro Universitario de Ciencias Exactas e Ingenieria</span></h3>
                <h3>Materias:</h3>
                <div class="info_materias">
                    <a href="">i5899</a>
                    <a href="">i5899</a>
                    <a href="">i5899</a>
                    <a href="">i5899</a>
                    <a href="">i5899</a>
                    <a href="">i5899</a>
                    <a href="">i5899</a>
                    <a href="">i5899</a>
                    <a href="">i5899</a>
                    <a href="">i5899</a>
                    <a href="">i5899</a>
                </div>
            </div>
            <div class="info_calificaciones">
                <h2>Calificacion: <span>86% (basado en 15 evaluaciones)</span></h2>
                <div>
                    <h3>Manejo del tema:</h3><p>90%</p>
                </div>
                <div>
                    <h3>Puntualidad:</h3><p>90%</p>
                </div>
                <div>
                    <h3>Dificultad del curso:</h3><p>90%</p>
                </div>
                <div>
                    <h3>Promedio alumnos:</h3><p>90%</p>
                </div>
            </div>
        </div>
        <div class="profesor_botones container">
            <button class="btn">Evaluar al profesor</button>
            <button class="btn">Reportar error</button>
        </div>
        <div class="evaluar">
            <form action="">
                <h2>Evalua a tu profesor</h2>
                <div>
                    <p>Manejo del tema</p>
                    <div>
                        <input type="range" list="calificacionesPosibles" step="5">
                        <!--Aqui tiene que cambiar el numero-->
                        <span id="evaluacionManejo">100</span>
                    </div>
                </div>
                <div>
                    <p>Puntualidad</p>
                    <div>
                        <input type="range" list="calificacionesPosibles" step="5">
                        <span id="evaluacionPuntualidad">100</span>
                    </div>
                </div>
                <div>
                    <p>Dificultad del curso</p>
                    <div>
                        <input type="range" list="calificacionesPosibles" step="5">
                        <span id="evaluacionDificultad">100</span>
                    </div>
                </div>
                <div>
                    <p>Promedio de alumnos</p>
                    <div>
                        <input type="range" list="calificacionesPosibles" step="5">
                        <span id="evaluacionPromedio">100</span>
                    </div>
                </div>
                <button class="btn">Enviar</button>
                <datalist id="calificacionesPosibles">
                    <option value="0" label="0%">
                    <option value="5">
                    <option value="10">
                    <option value="15">
                    <option value="20">
                    <option value="25">
                    <option value="30">
                    <option value="35">
                    <option value="40">
                    <option value="45">
                    <option value="50" label="50%">
                    <option value="55">
                    <option value="60">
                    <option value="65">
                    <option value="70">
                    <option value="75">
                    <option value="80">
                    <option value="85">
                    <option value="90">
                    <option value="95">
                    <option value="100" label="100%">
                </datalist>
            </form>
        </div>
        <div class="profesor_cometarios container">
            <h3>Comentarios:</h3>
            <div class="comentario">
                <div class="meta_comentario">
                    <h3>Usuario</h3>
                    <p>04/08/2021</p>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget mi at felis euismod mattis. Pellentesque id gravida urna. Morbi imperdiet egestas mauris, eu vestibulum quam accumsan et. Donec sagittis pellentesque massa, vel fringilla ligula ornare at. Proin molestie tempus dolor nec mattis. Sed eu metus vitae mi viverra dignissim et vitae est. Proin volutpat arcu eget auctor facilisis. Nunc maximus, ex a maximus vehicula, orci ante accumsan nulla, fermentum sollicitudin risus leo ac justo.

                Sed lobortis vel ligula id vehicula. Aenean blandit odio libero, et convallis libero varius quis. Etiam feugiat augue et enim lacinia mollis. Praesent sagittis, urna.</p>
            </div>
            <div class="comentario">
                <div class="meta_comentario">
                    <h3>Usuario</h3>
                    <p>04/08/2021</p>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget mi at felis euismod mattis. Pellentesque id gravida urna. Morbi imperdiet egestas mauris, eu vestibulum quam accumsan et. Donec sagittis pellentesque massa, vel fringilla ligula ornare at. Proin molestie tempus dolor nec mattis. Sed eu metus vitae mi viverra dignissim et vitae est. Proin volutpat arcu eget auctor facilisis. Nunc maximus, ex a maximus vehicula, orci ante accumsan nulla, fermentum sollicitudin risus leo ac justo.

                Sed lobortis vel ligula id vehicula. Aenean blandit odio libero, et convallis libero varius quis. Etiam feugiat augue et enim lacinia mollis. Praesent sagittis, urna.</p>
            </div>
            <div class="comentario">
                <div class="meta_comentario">
                    <h3>Usuario</h3>
                    <p>04/08/2021</p>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget mi at felis euismod mattis. Pellentesque id gravida urna. Morbi imperdiet egestas mauris, eu vestibulum quam accumsan et. Donec sagittis pellentesque massa, vel fringilla ligula ornare at. Proin molestie tempus dolor nec mattis. Sed eu metus vitae mi viverra dignissim et vitae est. Proin volutpat arcu eget auctor facilisis. Nunc maximus, ex a maximus vehicula, orci ante accumsan nulla, fermentum sollicitudin risus leo ac justo.

                Sed lobortis vel ligula id vehicula. Aenean blandit odio libero, et convallis libero varius quis. Etiam feugiat augue et enim lacinia mollis. Praesent sagittis, urna.</p>
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
</body>
</html>