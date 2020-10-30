<?php
    session_start();
    $id_user=$_SESSION['id_usuario'];
    require_once('conexion.php'); //incluye en archivo conexion DB

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="icomoon/style.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Index</title>

    
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
    
<div id="menu">
        <ul>
            <li class="active"><a href="admin.php">Inicio</a></li>
            <li><a href="paciente.php">Pacientes</a></li>
            <li><a href="#servicio">Dietas</a></li>
            <li><a href="#servicio">Historial</a></li>
            <li><a href="#servicio">Citas</a></li>
            <li class="item-r"><a href="cerrarsesion.php">Cerrar Sesion</a></li>
            <li class="item-r"><a href="#"><?php echo $_SESSION['nombre'];?></a></li>
            <li ><a href=""><span class="icon-envelop"> </span> </a></li>
         </ul>
    </div>
  

</body>