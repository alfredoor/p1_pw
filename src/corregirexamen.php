<?php
session_start();
	$nombresesion = $_SESSION['nombre'];
    $apellsesion = $_SESSION['apellidos'];
	$tema = $_SESSION['TEMA'];
	$asignatura = $_SESSION['ASIG'];
	$cod_examen= $_SESSION['CODEX'];
	$fecha = $_SESSION['FECHA'] ;
	$dni = $_SESSION['DNI'];
	$idpreg = $_SESSION['IDPREG'];

?>

<?php 

	$conexion = mysqli_connect('localhost','root', '777303', 'universidad');
	
	$consult = mysqli_query($conexion,"SELECT * FROM preguntas WHERE preguntas.TEMA='$tema' && preguntas.IDASIG='$asignatura'");
	$Nfilas = mysqli_num_rows($consult);

	
		for ($i = 0 ; $i<=$Nfilas; $i++){
		$fil = mysqli_fetch_array($consult);

		
			
		
		if ($fil['IDPREG'] == $idpreg && $_POST['respuesta1'] == $fil['RESP']  ){
			
			mysqli_query($conexion,"INSERT INTO examenes (CODEX,FECHA,DNI,IDPREG,RESP,ASIG,TEMA) VALUES 
														 ('$cod_examen','$fecha','$dni','$idpreg','Bien','$asignatura','$tema')");
		}
		if ($fil['IDPREG'] == $idpreg && $_POST['respuesta1'] != $fil['RESP'] ){
			echo $_POST['respuesta1'];
		echo $fil['RESP'];
			mysqli_query($conexion,"INSERT INTO examenes (CODEX,FECHA,DNI,IDPREG,RESP,ASIG,TEMA) VALUES 
														 ('$cod_examen','$fecha','$dni','$idpreg','Mal','$asignatura','$tema')");
		}
		}	
	
	

		mysqli_close($consult);
	
		





?> 
