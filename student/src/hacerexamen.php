<?php<?php
session_start();
	$nombresesion = $_SESSION['nombre'];
    $apellsesion = $_SESSION['apellidos'];
	$tema = $_SESSION ['tema'];
	$asignatura = $_SESSION ['asignatura'];
    
?>

<html>
<h1 style="column-span: all; text-align: center">Examen del tema <?php print $tema; ?> de <?php print $asignatura; ?></h1>
</html>
<?php 

			
			$conexion = mysqli_connect('localhost','root', '', 'universidad');
	
			$consult = mysqli_query($conexion,"SELECT * FROM preguntas WHERE preguntas.tema=1 && preguntas.asignatura='PW'");
	
			for ($i=1; $i<=10; $i++){
				$fil = mysqli_fetch_array($consult);
				
	
	?>
		<html>
		<form method='post' action='corregirexamen.php'>
			<?php print "Pregunta "."$i."." ".$fil['ENUNCIADO']; ?> <br><br>

			<br><input name='respuesta1' type='radio' value='<?php $fil['RESP1'] ?>' /> <?php print $fil['RESP1']; ?>
			<br><input name='respuesta1' type='radio' value='<?php $fil['RESP2'] ?>' /> <?php print $fil['RESP2']; ?>
			<br><input name='respuesta1' type='radio' value='<?php $fil['RESP3'] ?>' /> <?php print $fil['RESP3']; ?>
			<br><input name='respuesta1' type='radio' value='<?php $fil['RESP4'] ?>' /> <?php print $fil['RESP4']; ?>
			
			<br><br>
			
			<?php } ?>


			<br><br><input type='submit' value='Enviar'>
			
		</form>
		
		</html>

    

    
		
	