<?php
session_start();
	$nombresesion = $_SESSION['nombre'];
    $apellsesion = $_SESSION['apellidos'];
    
?>

<html>
<h1 style="column-span: all; text-align: center">Examen de PW</h1>
</html>
<?php 
			$conexion = mysqli_connect('localhost','root', '', 'universidad');
	
			$consult = mysqli_query($conexion,"SELECT * FROM preguntas WHERE preguntas.tema=1 && preguntas.asignatura='PW'");
	
			for ($i=0; $i<10; $i++){
				$fil = mysqli_fetch_array($consult);
				
	
	?>
		<html>
		<form>
			<?php print $fil['enunciado']; ?>

			<input name='respuesta' type='radio' value='resp1' /> <?php print $fil['resp1']; ?>
			<input name='respuesta' type='radio' value='resp2' /> <?php print $fil['resp2']; ?>
			<input name='respuesta' type='radio' value='resp3' /> <?php print $fil['resp3']; ?>
			<input name='respuesta' type='radio' value='resp4' /> <?php print $fil['resp4']; ?>
			
			<input type='submit' value='Enviar'>
					
			
		</form>
		
		</html>
<?php }	?>	
    


