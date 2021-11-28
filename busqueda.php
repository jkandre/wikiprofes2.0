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
                <a class="btn btnLogin" href="login.php">Log In</a>
                <a class="btn btnRegistro" href="registro.php">Registrate</a>
            <?php }?>

            <?php
            if($varsesion!=null){?>
            
           <?php } ?>
        </div>
    </div>

    <div class="main">
        <div class="resultados container">
            <form action="" method="post">
            <input type="text" onchange="validarNombre()" placeholder="Ingresa el profesor o codigo de la materia" name="busqueda">
            </form>
            <h2>Resultados de la busqueda: </h2>
            <div class="resultados_profesores">
                <?php 
                    $result=null;
                    $consulta="SELECT *from maestros";

                ?>
                <button class="resultados_profesor">
                    <div class="profesor_detalles">
                        <div class="profesor_nombre">
                            <h3>Profesor: </h3>
                            <p>MORALES RAMIREZ THELMA ISABEL</p>
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
                <button class="resultados_profesor">
                    <div class="profesor_detalles">
                        <div class="profesor_nombre">
                            <h3>Profesor: </h3>
                            <p>MUÑOZ GOMEZ LUIS ALBERTO</p>
                        </div>
                        <div class="profesor_materia">
                            <h3>Materias</h3>
                            <div>
                                <a href="#">i5898</a>
                                <a href="#">i5899</a>
                            </div>
                        </div>
                    </div>
                    <div class="profesor_puntaje">
                        <div>
                            <h3>Manejo del tema: </h3>
                            <p>70%</p>
                        </div>
                        <div>
                            <h3>Puntualidad: </h3>
                            <p>60%</p>
                        </div>
                        <div>
                            <h3>Dificultad del curso: </h3>
                            <p>90%</p>
                        </div>
                        <div>
                            <h3>Promedio: </h3>
                            <p>80%</p>
                        </div>
                    </div>
                </button>
                <button class="resultados_profesor">
                    <div class="profesor_detalles">
                        <div class="profesor_nombre">
                            <h3>Profesor: </h3>
                            <p>HERRERA LUJAN ZOILA LILIANA</p>
                        </div>
                        <div class="profesor_materia">
                            <h3>Materias</h3>
                            <div>
                                <a href="#">i5898</a>
                                <a href="#">i5693</a>
                            </div>
                        </div>
                    </div>
                    <div class="profesor_puntaje">
                        <div>
                            <h3>Manejo del tema: </h3>
                            <p>70%</p>
                        </div>
                        <div>
                            <h3>Puntualidad: </h3>
                            <p>50%</p>
                        </div>
                        <div>
                            <h3>Dificultad del curso: </h3>
                            <p>90%</p>
                        </div>
                        <div>
                            <h3>Promedio: </h3>
                            <p>70%</p>
                        </div>
                    </div>
                </button>
                <button class="resultados_profesor">
                    <div class="profesor_detalles">
                        <div class="profesor_nombre">
                            <h3>Profesor: </h3>
                            <p>CUELLAR HERNANDEZ FRANCISCO </p>
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
                            <p>90%</p>
                        </div>
                        <div>
                            <h3>Puntualidad: </h3>
                            <p>80%</p>
                        </div>
                        <div>
                            <h3>Dificultad del curso: </h3>
                            <p>80%</p>
                        </div>
                        <div>
                            <h3>Promedio: </h3>
                            <p>90%</p>
                        </div>
                    </div>
                </button>
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
            let nombre = document.getElementById("nombre");
            let nombreRegex = /^[a-zA-Z][a-zA-Z ]*$/;
            let resultado = nombreRegex.test(nombre.value)
            if(resultado == false){
                alert("El nombre debe contener solo letras")
            }
        }
    </script>
</body>
</html>