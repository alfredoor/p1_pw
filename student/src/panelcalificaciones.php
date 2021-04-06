<?p<?php
session_start();
	$nombresesion = $_SESSION['nombre'];
    $apellsesion = $_SESSION['apellidos'];
    
?>

<html>
<h1 style="column-span: all; text-align: center">Lista de calificaciones de <?php echo $nombresesion." ".$apellsesion ?></h1>
</html>

<?php 

	
    $conexion = mysqli_connect('localhost','root', '', 'universidad');
    
    $consulta = mysqli_query($conexion,"SELECT persona.dni FROM persona WHERE persona.nombre='$nombresesion' && persona.apellidos='$apellsesion'");
	
    $numdni = mysqli_num_rows($consulta);
	
	
	$fila = mysqli_fetch_array($consulta);
	
	$dni = $fila['dni'];
	
	$consulta2 = mysqli_query($conexion,"SELECT * FROM examenes");
	$numpreg = mysqli_num_rows($consulta2);
	
	for ($i=1;$i<=10;$i++){
		$fila2 = mysqli_fetch_array($consulta2);
		
		print "Examen ".$fila2['CODEX']."\n";
		
		$codigo = $fila2['CODEX'];
		$nota = 0;
		
		for ($j=1;$j<=10;$j++){
						
			if ($codigo = $fila2['CODEX'] && $dni = $fila2['DNI']){
				if ($fila2['RESP']=='Bien')
					$nota++;
			}
		}
		
		print $nota."/10";
		
		?> <h> <br><br></h> <?php
		
		
		
		
	}
    
	
		
	
	
?>
