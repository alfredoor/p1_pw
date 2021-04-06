<?php
session_start();
	$nombresesion = $_SESSION['nombre'];
    $apellsesion = $_SESSION['apellidos'];
	$tema = $_SESSION ['tema'];
	$asignatura = $_SESSION ['asignatura'];
	$nota = $_SESSION ['nota'];
    
?>

<html>
<h1 style="column-span: all; text-align: center">Examen del tema <?php print $tema; ?> de <?php print $asignatura; ?></h1>
</html>

<?php 

			$conexion = mysqli_connect('localhost','root', '', 'universidad');
			
			$respuesta = $_POST['respuesta'];
						
			
			$consulte = mysqli_query($conexion,"INSERT INTO resultados VALUES ('4','44565443R','2','$respuesta')");

			
			$consult = mysqli_query($conexion,"SELECT * FROM preguntas WHERE preguntas.tema='$tema' && preguntas.asignatura='$asignatura'");
	
			
				
	
	?>
		<html>
		<form method='post' action='pregunta3.php'>
			<?php 
			for($i=1;$i<=10;$i++){
				
					$fil = mysqli_fetch_array($consult);
			
					print "Pregunta "."$i."." ".$fil['ENUNCIADO']; ?> <br><br>

					<br><input name='respuesta' type='radio' value='resp1' /> <?php print $fil['RESP1']; ?>
					<br><input name='respuesta' type='radio' value='resp2' /> <?php print $fil['RESP2']; ?>
					<br><input name='respuesta' type='radio' value='resp3' /> <?php print $fil['RESP3']; ?>
					<br><input name='respuesta' type='radio' value='resp4' /> <?php print $fil['RESP4']; ?>
			
				<br><br><input type='submit' value='Enviar'>
			
			<?php 
				
			}
			
			
			
		
		
		 ?>

	</form>
		
		</html>
	



 