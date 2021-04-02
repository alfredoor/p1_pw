<?php
session_start();
	$nombresesion = $_SESSION['nombre'];
    $apellsesion = $_SESSION['apellidos'];
    
?>

<html>
<h1 style="column-span: all; text-align: center">Lista de examenes de <?php echo $nombresesion." ".$apellsesion ?></h1>
</html>

<?php 

	
    $conexion = mysqli_connect('localhost','root', '', 'universidad');
    
    $consulta = mysqli_query($conexion,"SELECT examenes.fecha, examenes.tema, examenes.asignatura FROM persona,alumno,asignaturas,temas,examenes WHERE persona.nombre='$nombresesion' && persona.apellidos='$apellsesion' && persona.dni = alumno.dni && alumno.curso=asignaturas.curso && asignaturas.id=temas.id_asig && asignaturas.nombre= examenes.asignatura && temas.num_tema=examenes.tema");
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
		
		print "<td>".$fila['fecha']."</td>";
		print "<td>".$fila['tema']."</td>";
		print "<td>".$fila['asignatura']."</td>";
		
		$fecha=$fila['fecha'];
		$asignatura=$fila['asignatura'];
		header("Location:hacerexamen.php");
	

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






