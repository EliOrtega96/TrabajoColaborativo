<?php
    
    require_once('menu.php');
    require("conexion.php");
  if(!empty($_POST)and !empty($_FILES)){
      $nombre =$_POST['nombre'];
      $correo =$_POST['correo'];
      $direccion =$_POST['direccion'];
      $telefono =$_POST['telefono'];
      $edad =$_POST['edad'];
      $peso =$_POST['peso'];
      $estatura =$_POST['estatura'];
      $img = $_FILES['archivo']['name'];  
      $ruta = $_FILES['archivo']['tmp_name'];
      $destino = "img/".$img;
      copy($ruta,$destino);
      

      $queryUser = "INSERT INTO cliente (foto,nombre,correo,direccion,telefono,edad,peso,estatura) VALUES('$img','$nombre','$correo', '$direccion','$telefono','$edad', '$peso', '$estatura')";  //query para registrar 
      $conn->exec($queryUser);
      header('Location:paciente.php'); 
      
    }
  
    $query = $conn->prepare("SELECT * FROM cliente ");   //lee todos los usuarios de la tabla usuario
    $query->execute(); //ejecuta el query

?>

<!DOCTYPE html>
  <html lang="es">
    <head>
        <title> Registro </title>
    </head>
     
  
    <h2>Administrador </h2>
            <button style="margin-left:250px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Registrar Paciente</button><br><br>

           <div class="container"> 
   <div class="row">
   <table style="width: 100%;"> <!-- tabla de usuarios registrados -->
            <thead>
                <tr>
                    <td>#</td>
                    <td>Foto</td>
                    <td>Nombre</td>
                    <td>Correo</td>
                    <td>Direccion</td>
                    <td>Telefono</td>
                    <td>Edad</td>
                    <td>Peso</td>
                    <td>Estatura</td>
                    <td></td>
                    <td></td>
                   
                </tr>   
            </thead>
            <?php 
                        while($res = $query->fetch()) 
                        {  
                            $img = $res['foto'];
                             
                            echo "<tr>";
                            echo "<td>".$res['id_cliente']."</td>";   
                            echo "<td>"."<img src='img/$img' >"."</td>";
                            echo "<td>".$res['nombre']."</td>";
                            echo "<td>".$res['correo']."</td>";
                            echo "<td>".$res['direccion']."</td>";
                            echo "<td>".$res['telefono']."</td>";
                            echo "<td>".$res['edad']."</td>";
                            echo "<td>".$res['peso']."</td>";
                            echo "<td>".$res['estatura']."</td>";
                            
                            echo "<td><a href='eliminarPaciente.php?id_cliente=$res[id_cliente]' onClick=\"return confirm('Seguro que deseas eliminarlo?')\"> <button type='button' class='btn btn-danger'>Eliminar</button></a></td>";
                            echo "<td> <a href='actualizarDatos.php?id=$res[id_cliente]' ><button type='button' class='btn btn-success'>Actualizar</button></td>";		
                            
                        }
                ?>     
          </table>
        
      </div> 
              
            <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Registrar Paciente</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nombre"  placeholder="Nombre">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Correo</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="correo" placeholder="Correo">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Direccion</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="direccion" placeholder="Direccion">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Telefono</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="telefono" placeholder="Telefono">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Edad</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="edad" placeholder="edad">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Peso</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="peso" placeholder="peso">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Estatura</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="estatura" placeholder="estatura">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Foto</label>
    <div class="col-sm-10">
      <input type="file"  name="archivo" placeholder="Foto">
    </div>
    
  </div>
  <div class="form-group row">
    <div class="col-sm-12">
      <button type="submit" class="btn btn-primary col-sm-12">Crear</button>
    </div>
  </div>
</form>
        </div> 
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

      </body>
</html>

