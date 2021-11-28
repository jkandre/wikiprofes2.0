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
    <link rel="stylesheet" href="css/login.css">
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
                <a class="btn btnRegistro" href="registro.php">Registrate</a>
            <?php }?>

            <?php
            if($varsesion!=null){?>
            
           <?php } ?>
        </div>
    </div>

    <div class="main">
        <div class="heroLogin container">
            <div class="heroLogin_form">
                <form action="" method="post">
                    <h3>Inicia sesion</h3>
                    <input type="text" placeholder="Correo academico" required>
                    <input type="password" placeholder="Contraseña" required>
                    <button class="btn">Ingresar</button>
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
</body>
</html>