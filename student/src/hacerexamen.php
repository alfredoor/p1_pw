<?php
session_start();
	$nombresesion = $_SESSION['nombre'];
    $apellsesion = $_SESSION['apellidos'];
    
?>

<html>
<h1 style="column-span: all; text-align: center">Lista de examenes de <?php echo $nombresesion." ".$apellsesion ?></h1>
</html>

<?php 

include('panelexamen.php');

	print $_POST['fecha'];
    $conexion = mysqli_connect('localhost','root', '', 'universidad');
	
	$consulta = mysqli_query($conexion,"SELECT examenes.fecha, examenes.tema, examenes.asignatura FROM persona,alumno,asignaturas,temas,examenes WHERE persona.nombre='$nombresesion' && persona.apellidos='$apellsesion' && persona.dni = alumno.dni && alumno.curso=asignaturas.curso && asignaturas.id=temas.id_asig && asignaturas.nombre= examenes.asignatura && temas.num_tema=examenes.tema");
    $numexam = mysqli_num_rows($consulta);
	
	
	
	for ($i=0; $i<$numexam; $i++){
		$fila = mysqli_fetch_array($consulta);
		if($fila['asignatura']=='PW'){
			$asig = $fila['asignatura'];
			$tema = $fila['tema'];
			
		}
	}
		
	
		$consulta = mysqli_query($conexion,"SELECT * from preguntas where preguntas.tema=$tema && preguntas.asignaturas=$asig");
		
		for ($i=0; $i<10; $i++){
		$fila = mysqli_fetch_array($consulta);
		?>
		<html>
		<form mthod='post' action='hacerexamen.php'>
			<?php echo $fila['enunciado']; ?>
			<input name='respuesta' type='radio' value='resp1' /> <?php echo $fila["resp1"]; ?>
			<input name='respuesta' type='radio' value='resp2' /> <?php echo $fila["resp2"]; ?>
			<input name='respuesta' type='radio' value='resp3' /> <?php echo $fila["resp3"]; ?>
			<input name='respuesta' type='radio' value='resp4' /> <?php echo $fila["resp4"]; ?>
			
			<input type='submit' value='Enviar'>
		</form>
		
		</html>
		<?php
	}
    
		
	
?>   
    


