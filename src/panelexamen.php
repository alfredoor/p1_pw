<?p<?php
session_start();
	$nombresesion = $_SESSION['nombre'];
    $apellsesion = $_SESSION['apellidos'];
    
?>

<html>
<h1 style="column-span: all; text-align: center">Lista de examenes de <?php echo $nombresesion." ".$apellsesion ?></h1>
</html>

<?php 

	
    $conexion = mysqli_connect('localhost','root', '777303', 'universidad');
    
    $consulta = mysqli_query($conexion,"SELECT examenes.DNI,examenes.CODEX ,examenes.FECHA, examenes.TEMA, examenes.ASIG FROM persona,alumno,asignatura,temas,examenes WHERE persona.NOMBRE='$nombresesion' && persona.APELLIDOS='$apellsesion' && persona.DNI = alumno.DNI && alumno.CURSO=asignatura.CURSOASIG && asignatura.IDASIG=temas.ID && asignatura.IDASIG= examenes.ASIG && temas.NUM_TEMA=examenes.TEMA");
    $numexam = mysqli_num_rows($consulta);
    
	if($numexam == 0)
		echo "El alumno no tiene examenes previstos";
		
	else{
		echo "<table border=1>";
		echo "<tr>";
	
	
		print "<td>"."Fecha"."</td>";
		print "<td>"."Tema"."</td>";
		print "<td>"."Asignatura"."</td>";
		
		echo "</tr>";
						
	
		for ($i=0; $i<$numexam; $i++){
	
			$fila = mysqli_fetch_array($consulta);
			echo "<tr>";
		
			print "<td>".$fila['FECHA']."</td>";
			print "<td>".$fila['TEMA']."</td>";
			print "<td>".$fila['ASIG']."</td>";
		
			$tema=$fila['TEMA'];
			$asignatura=$fila['ASIG'];
			$id_examen = $fila['CODEX'];
			$fecha = $fila['FECHA'];
			$dni = $fila['DNI'];
			
			$_SESSION['FECHA'] = $fecha;
			$_SESSION['TEMA'] = $tema;
			$_SESSION['ASIG'] = $asignatura;
			$_SESSION['CODEX'] = $id_examen;
			$_SESSION['DNI'] = $dni;

			?>
			<html>
				<th>
                	<a href="hacerexamen.php" class="doexam">Hacer examen</a>
				
            	</th>
			</html>
			<?php
	
	
		
		}
					
	
	echo "</tr>";
	}
		
	
	
?>



