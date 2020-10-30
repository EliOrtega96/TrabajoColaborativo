<?php
    require_once('conexion.php');
    //session_start();
    $id_c = $_GET['id_cliente'];  //obtiene el id del elemento que se va a eliminar
  

   
   $contenido = "DELETE FROM cliente WHERE id_cliente='$id_c' ";   //query para eliminar 
    $conn->exec($contenido); //ejecuta el query

    header("Location: paciente.php");  //una vez eliminado redirecciona a paciente.
?>