<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
    
    </style>
    
</head>
<body>
   <div class="contenedor-form">
       <h1>Iniciar Sesion</h1>
       <form action="logueo.php" method="post">
       <input  type="text" name="nombre" class="input-control"  placeholder="Usuario:">
      
       <input  type="password" name="password" class="input-control"  placeholder="Contraseña:">
       <?php
       if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
       {
          echo "<div style='color:red'>Usuario y/o contraseña invalido </div>";
       }else
       if (isset($_GET["error_usr"]) == 'login') {
        echo "<div style='color:red'>El nombre de usuario no existe  </div>";
           # code...
       }
     ?>
       
       <input type="submit" value="Iniciar Sesion"  name="registrar" class="log-btn">
       </form>
       <div class="registrar">
           <a href="registro.php">Registrar</a>
       </div>
       
   </div>
    
</body>
</html>