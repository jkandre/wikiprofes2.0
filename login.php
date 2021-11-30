<!DOCTYPE html>
<html lang="en">
<?php
    $conexion = mysqli_connect('localhost', 'root', '', 'wikiprofes');

    session_start();
    error_reporting(0);
    $varsesion= $_SESSION['nombre'];
    if($varsesion!=null){
        header("Location: index.php");
    } 

    if(isset($_POST['login'])){
    
        if(!empty($_POST['correo'])&& !empty($_POST['contrasena']) ){
    
    
        $correo=$_POST['correo'];
        $contrasena=$_POST['contrasena'];
        session_start();
       
    
        $consulta="SELECT * from usuarios where correo='$correo' and contrasena='$contrasena'";
        $result=mysqli_query($conexion, $consulta);
        $nombre="";
            
       // $filas=mysqli_num_rows($result);
           
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_array($result))
            {
                $nombre= $row['nombre'];
            }
            $_SESSION['nombre']=$nombre;
            header("Location: index.php");
        }
            
            /*if($filas){
                $_SESSION['nombre']=$correo;
               header("Location: index.php");
        
            if(!$result){
                die("Query Failed");
             }
            }*/
        else{
            $mensaje='Correo/contraseña incorrectos';
        }   
    
        mysqli_free_result($result);
        mysqli_close($conexion);
        
        }
    
    else{
        $mensaje='¡Campos incompletos!';
    }
    
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
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="nav container">
        <div class="logo">
            <a href="index.php">wikiprofes2.0</a>
        </div>
        <div class="busqueda">
        <form name="formBusqueda" action="busqueda.php" method="post">
                <input type="text" onchange="validarNombre()" placeholder="Ingresa el profesor o codigo de la materia" name="busqueda">
        </form>
        </div>
        <form action="registro.php"method="POST">
            <div class="botones">
                <button class="btn btnRegistro">Registrate</button>
                </div>
        </form>
    </div>
    <div class="main">
        <div class="heroLogin container">
            <div class="heroLogin_form">
                <form action="login.php" method="post">
                    <h3>Inicia sesion</h3>
                    <input type="email" onchange="validarAcademico()" name="correo" placeholder="Correo academico" id="correo">
                    <input type="password"name="contrasena" placeholder="Contraseña" id="password">
                    <button class="btn"name="login">Ingresar</button>
                    <?php
                if(!empty($mensaje)):?>
                <p><?= $mensaje ?></p>
                <?php endif;?>
                </form>
            </div>
            <div class="heroLogin_text">
                <h1>Inicia sesion para compartir recomendaciones</h1>
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
    </script>
</body>
</html>