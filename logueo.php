<?php
    require_once('conexion.php');

    if(!empty($_POST)){  //valida que el formulario se haya enviado con datos
        $nombre = $_POST['nombre'];
        $pass = $_POST['password'];
       // $md5=MD5($pass);
        $sql = $conn->prepare("SELECT * FROM usuario WHERE nombre ='$nombre' AND password ='$pass'"); //query para obtener usuario con correo y contraseña ingresados en formulario login.php
        $sql->execute();
        $result = $sql->fetch();
        
       if($result>0){ //si el resultado del query anterior es >0 (que el usuario y contraseña ingresados en el formulario login.php existan) entonces hace lo siguiente.
            session_start(); //crea una sesion
           $_SESSION['id_usuario']=$result['id_usuario'];  // se asigna a la variable $_SESSION['id'] el id de la persona que se loguea
           $_SESSION['nombre']=$result['nombre']; // 
           $_SESSION['correo']=$result['correo'];// se asigna a la variable $_SESSION['correo'] el correo de la persona que se loguea
    
            $_SESSION['logueado'] = TRUE;
            $_SESSION['rol'] = $result['id_rol']; //se asigna el rol con el que inicia session

            switch($_SESSION['rol']){
                case 1:
                    header('location: admin.php');
                break;
    
                case 2: 
                    header('location: index.php');
                break;
               
    
                default:
            }
            
        }
          else{ //si el correo y contraseña ingresados en el formulario de login.php no son validos hace lo siguiente
            $md5=MD5($pass); 
            //valida que exista correo ingresado
            $sql2 = $conn->prepare("SELECT * FROM usuario WHERE nombre ='$nombre'");
            $sql2->execute();

              //compara correo y contraseña si no conicinden manda que la contraseña es incorrecta
            $sql3 = $conn->prepare("SELECT * FROM usuario WHERE nombre ='$nombre' AND password ='$pass'");
            $sql3->execute();   
            
            
            $sql4 = $conn->prepare("SELECT * FROM usuario WHERE password ='$pass'");
            $sql4->execute();

            $result2 = $sql2->fetch(); // valida si existe el correo ingresado en el formulario login.php

            $result3 = $sql3->fetch(); // valida si existe el correo y contraseña ingresados en el formulario login.php

            $result4 = $sql4->fetch();

              if($result2>0) //valida que exista correo ingresado, si existe hace lo siguiente 
              {

                if($result3<1)  //valida correo y contraseña si no conicinden manda que la contraseña es incorrecta
                {
                    header('Location: login.php?fallo=true'); //redirecciona a login.php con mensaje de error de validacion contraseña incorrecta
                
                }
            }
            else  // si usuario y contraseña ingresados en login.php no existen manda mensaje de error
            {
                header('Location: login.php?error_usr=login'); // rediecciona a login.php con mensaje de erro usuario y/o contraseña incorrectos
            }     
        }  
    }
?>