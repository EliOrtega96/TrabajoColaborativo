<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="contenedor-form">
		<h1>Registrar</h1>
		<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
		<input type="text" name="nombre" class="input-control"  placeholder="Usuario:">
		
		<input type="email" name="correo" class="input-control"  placeholder="Correo electronico:">
	   
		<input type="password" name="password" class="input-control"  placeholder="Contraseña:">
 
		<input type="hidden" name="id_rol" value="1">
		
		<input type="submit" value="Registrar"  name="registrar" class="log-btn">
		</form>
		<div class="registrar">
			<a href="login.php">¿Ya tienes cuenta?</a>
		</div>
		
	</div>
	
		
	








    
</body>
</html>