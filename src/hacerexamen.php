<?php
session_start();
	$nombresesion = $_SESSION['nombre'];
    $apellsesion = $_SESSION['apellidos'];
	$tema = $_SESSION['TEMA'];
	$asignatura = $_SESSION['ASIG'];
	$cod_examen = $_SESSION['CODEX'];
	$fecha = $_SESSION['FECHA'] ;
	$dni = $_SESSION['DNI'];
    
?>

<html>
<h1 style="column-span: all; text-align: center">Examen del tema <?php print $tema; ?> de <?php print $asignatura; ?></h1>
</html>
<?php 
			
			$conexion = mysqli_connect('localhost','root', '777303', 'universidad');
	
			$consult = mysqli_query($conexion,"SELECT * FROM preguntas WHERE preguntas.TEMA='$tema' && preguntas.IDASIG='$asignatura'");
			$Nfilas = mysqli_num_rows ($consult);
			echo $asignatura;
			for ($i=1; $i<=$Nfilas; $i++){
				$fil = mysqli_fetch_array($consult);
				
				
	
	?>
		<html>
		<form method='post' action='corregirexamen.php'>
			<?php print "Pregunta "."$i."." ".$fil['ENUNCIADO']; ?> <br><br>

			<br><input name='respuesta1' type='radio' value='resp1' /> <?php print $fil['RESP1']; ?>
			<br><input name='respuesta1' type='radio' value='resp2' /> <?php print $fil['RESP2']; ?>
			<br><input name='respuesta1' type='radio' value='resp3' /> <?php print $fil['RESP3']; ?>
			<br><input name='respuesta1' type='radio' value='resp4' /> <?php print $fil['RESP4']; ?>
			
			<br><br>
			
			<?php }$_SESSION['IDPREG'] = $fil['IDPREG']; ?>


			<br><br><input type='submit' value='Enviar'>
			
		</form>
		

		
		</html>

    
