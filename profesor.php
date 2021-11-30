<?php
    
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
    <link rel="stylesheet" href="css/profesor.css">

</head>
<body>
    <div class="nav container">
        <div class="logo">
            <a href="index.php">wikiprofes2.0</a>
        </div>
        <!-- NO APLICA SOLO PARA EL INDEX-->
        <div class="busqueda">
        <form name="formBusqueda" action="busqueda.php" method="post">
            <input type="text"  placeholder="Ingresa el profesor o codigo de la materia" name="busqueda">
        </form>
        </div>
        <div class="botones">
            <?php if($varsesion==null){?>
                <a class="btn btnLogin" href="login.php">Log In</a>
                <a class="btn btnRegistro" href="registro.php">Registrate</a>
            <?php }?>

            <?php
            if($varsesion!=null){?>
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
        <!--Perfil del profesor-->
        <div class="profesor container">

       <?php if(isset($_GET['id'])){
        $id = $_GET['id'];
       
	    $result=mysqli_query($conexion, "SELECT p.idprofesor,p.nombre,m.materia,e.manejoTema,e.puntualidad,e.dificultad,e.promedioAlumnos from profesores as p join materias as m on p.idprofesor=m.idprofesor join evaluaciones as e on p.idprofesor=e.idprofesor  WHERE p.idprofesor = $id");

        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_array($result);
            $nombre= $row['nombre'];
            $materia= $row['materia'];
            $mt= $row['manejoTema'];
            $puntualidad = $row['puntualidad'];
            $dificultad= $row['dificultad'];
            $pA=$row['promedioAlumnos'];
            $calificacion= round(($mt + $puntualidad + $pA) / 3) ;
        ?>

            <h2><?php echo $nombre ?></h2>
            <div class="info_datos">
                <h2>Informacion general:</h2>
                <h3>Universidad: <span>Universidad de Guadalajara</span></h3>
                <h3>Centro: <span>Centro Universitario de Ciencias Exactas e Ingenieria</span></h3>
                <h3>Materias:</h3>
                <div class="info_materias">
                    <p><?php echo $materia ?></p>
                </div>
            </div>
            <div class="info_calificaciones">
              <!--  <h2>Calificacion: <span>86% (basado en 15 evaluaciones)</span></h2>  -->
                <h2>Calificacion: <span> <?php echo  "$calificacion %"?>  </span></h2>  
                <div>
                    <h3>Manejo del tema:</h3> <p><?php echo  $mt ?></p> <p>%</p>
                </div>
                <div>
                    <h3>Puntualidad:</h3> <p><?php echo  $puntualidad ?></p> <p>%</p>
                </div>
                <div>
                    <h3>Dificultad del curso:</h3> <p><?php echo $dificultad  ?></p> <p>%</p>
                </div>
                <div>
                    <h3>Promedio alumnos:</h3> <p><?php echo  $pA ?></p> <p>%</p>
                </div>
            </div>
            
        <?php }} ?>
        
        </div>
        <div class="profesor_botones container">
            <?php if($varsesion!=null){ ?>
                <button class="btn" onclick="evaluarProfesor()">Evaluar al profesor</button>
            <?php } ?>   
            <?php if($varsesion==null){ ?>
                <a class="btn" href="login.php">Evaluar al profesor</a>
            <?php } ?>  
            <button class="btn">Reportar error</button>
        </div>
        <div class="evaluar" id="modalEvaluacion">
            <form action="">
                <h2>Evalua a tu profesor</h2>
                <i class="fas fa-times" id="equisModal"></i>
                
                <div>
                    <p>Manejo del tema</p>
                    <div>
                        <input type="range" list="calificacionesPosibles" step="5" oninput="manejo(this.value)" onchange="manejo(this.value)">
                        <!--Aqui tiene que cambiar el numero-->
                        <span id="evaluacionManejo">50</span>
                    </div>
                </div>
                <div>
                    <p>Puntualidad</p>
                    <div>
                        <input type="range" list="calificacionesPosibles" step="5" oninput="puntualidad(this.value)" onchange="puntualidad(this.value)">
                        <span id="evaluacionPuntualidad">50</span>
                    </div>
                </div>
                <div>
                    <p>Dificultad del curso</p>
                    <div>
                        <input type="range" list="calificacionesPosibles" step="5" oninput="dificultad(this.value)" onchange="dificultad(this.value)">
                        <span id="evaluacionDificultad">50</span>
                    </div>
                </div>
                <div>
                    <p>Promedio de alumnos</p>
                    <div>
                        <input type="range" list="calificacionesPosibles" step="5" oninput="promedio(this.value)" onchange="promedio(this.value)">
                        <span id="evaluacionPromedio">50</span>
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
            <?php if(isset($_GET['id'])){
                $id = $_GET['id'];
	            $result=mysqli_query($conexion, "SELECT u.idUsuario,u.nombre,c.idprofesor,c.comentario,c.fecha from usuarios as u join comentarios as c on u.idUsuario=c.idUsuario where c.idprofesor= $id");
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result))
                    {  ?>
                        <div class="comentario">
                            <div class="meta_comentario">
                                <h3><?php echo $row['nombre']  ?></h3>
                                <p><?php echo $row['fecha']  ?></p>
                            </div>
                            <p><?php echo $row['comentario']  ?></p>
                        </div>
                    <?php }}} ?>
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
        function cerrarModal(){
            document.getElementById("modalEvaluacion").setAttribute("style","width:0vw");
        }

        document.getElementById("equisModal").addEventListener('click', function() {
            cerrarModal();
        });
        

        function evaluarProfesor(){
            document.getElementById("modalEvaluacion").setAttribute("style","width:100vw");
        }

        function manejo(newVal){
            document.getElementById("evaluacionManejo").innerHTML=newVal;
        }

        function puntualidad(newVal){
            document.getElementById("evaluacionPuntualidad").innerHTML=newVal;
        }

        function dificultad(newVal){
            document.getElementById("evaluacionDificultad").innerHTML=newVal;
        }

        function promedio(newVal){
            document.getElementById("evaluacionPromedio").innerHTML=newVal;
        }

    </script>
</body>
</html>