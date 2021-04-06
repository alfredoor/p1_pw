<?php
session_start();
	$nombresesion = $_SESSION['nombre'];
    $apellsesion = $_SESSION['apellidos'];
	$tema = $_SESSION ['tema'];
	$asignatura = $_SESSION ['asignatura'];
    
?>

<?php 

			

			$conexion = mysqli_connect('localhost','root', '', 'universidad');
			
			$nota=0;
			
			$consulta1 = mysqli_query($conexion,"SELECT * FROM preguntas WHERE preguntas.tema='$tema' && preguntas.asignatura='$asignatura'");

			$consulta2 = mysqli_query($conexion,"SELECT * FROM resultados");
			
			$consulta3 = mysqli_query($conexion,"SELECT * FROM examenes");
			
			for ($i=1; $i<=2; $i++){
				$fila1 = mysqli_fetch_array($consulta1);
				$fila2 = mysqli_fetch_array($consulta2);
				$fila3 = mysqli_fetch_array($consulta3);
				
				if($fila3['CODEX']==$fila2['CODEX']){
					for ($j=1; $j<=2; $j++){
						if ($fila1['CORRECTA'] == $fila2['RESPUESTA'])
							$nota++;
						
					}
				}
				
			}
			
			print "La nota del examen es de ".$nota."/10";



?> 