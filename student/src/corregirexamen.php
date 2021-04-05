<?php
session_start();
	$nombresesion = $_SESSION['nombre'];
    $apellsesion = $_SESSION['apellidos'];
	$tema = $_SESSION ['tema'];
	$asignatura = $_SESSION ['asignatura'];
    
?>

<?php 

	$conexion = mysqli_connect('localhost','root', '', 'universidad');
	
	$consult = mysqli_query($conexion,"SELECT * FROM preguntas WHERE preguntas.tema='$tema' && preguntas.asignatura='$asignatura'");
	
	$nota=0;
	
	for ($i=1; $i<=10; $i++){
		$fil = mysqli_fetch_array($consult);
		
		if ($_POST['respuesta1'] == $fil['CORRECTA'])
			$nota++;		
		
		}
				
	print "La nota final del examen es ".$nota."/10";





?> 
