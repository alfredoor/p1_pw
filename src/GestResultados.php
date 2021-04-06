<?php 
session_start();
    $nombresesion = $_SESSION['nombre'];
    $apellsesion = $_SESSION['apellidos'];
    $fotosesion = $_SESSION['foto'];
    $dni= $_SESSION['dni'];

    if($nombresesion ==null || $apellsesion==null){
        echo "no hay autorizacion";
        die();
    }
    $nopass = '';
 ?>



<!DOCTYPE html>
<html>
<head>
    <meta content="charset=utf-8" />
    <title>PanelResultados</title>
    <link href="../templates/panelprofesor.css" rel="stylesheet" type="text/css">

</head>
<body>
    <h1 style="column-span: all; text-align: center">Panel de control de resultados: <?php echo $nombresesion." ".$apellsesion ?></h1>
    <br></br>
 

    <h1 style="column-span: all; text-align: center">Notas:</h1>

    <?php

        $conexionpreguntas = mysqli_connect('localhost','root', '777303', 'universidad'); //HAY QUE AÑADIR CONTRASEÑA EN CASO QUE LA TENGAIS EN VUESTRA BBDD
        if (mysqli_connect_errno()) {
            printf("Conexión fallida: %s\n", mysqli_connect_error());
            die();
        }
        $idasig = $_POST['asignatura'];
        $consulta = mysqli_query($conexionpreguntas, "SELECT * FROM examenes WHERE ASIG = '$idasig' ORDER BY CODEX ");
        $Nfilas = mysqli_num_rows($consulta);
        $fila = mysqli_fetch_array($consulta); 
        $resulB = 0;
        $resulM = 0;
        $preguntas = 0;
        $aprobados = 0;
        $suspensos = 0;
        $notables = 0;
        $sobresalientes= 0;
         
        $codex = $fila ['CODEX'];
        $dni = $fila['DNI'];
        $alums = 0;
        $media=0;
    

        for ($i = 0 ; $i < $Nfilas ; $i++){
            
            if ($i==0){
                echo "
                <table class=\"encabezado\" > 
                   <tr bgcolor=#A5A5A5>
                   <th>IDEXAMEN</th>
                   <th>ALUMNO</th>
                   <th>BIEN / TOTAL PREGUNTAS</th>
                   <th>NOTA SOBRE 10</th>

   
                   </tr>";            
   
               }
            
            
            if ($fila['CODEX'] != $codex || $i == $Nfilas-1){
                $notaT = ($resulB * 10 )/ $preguntas;
                $notaT = round($notaT,2);
                $media+=$notaT;
                $alums++;
                $media = $media/$alums;
                if ($notaT < 5) $suspensos++;
                if ($notaT >= 5) {
                    if ($notaT >= 7){
                        if ($notaT >= 8) {$sobresalientes++;}else {$notables++;}
                    }else {$aprobados++;}
                }
                echo
                "<tr class=\"filas\" >
                <th bgcolor = #BBBBBB > ".$codex." </th>
                <th> ".$dni." </th>
                <th> ".$resulB."/".$preguntas." </th>
                <th> ".$notaT." </th>
                </tr>

                <h2 style=column-span: all; text-align: center>Nota media de ".$codex.": ".$media."</h2>
                <h3 style=column-span: all; text-align: center>Suspensos: ".$suspensos."  Aprobados: ".$aprobados."  Notables: ".$notables."   Sobresalientes: ".$sobresalientes."</h3>
                ";
                $preguntas=0;
                $resulB = 0;
                $resulM = 0;
                $codex = $fila ['CODEX'];
                $dni = $fila['DNI'];
                $suspensos= 0;
                $aprobados=0;
                $notables=0;
                $sobresalientes=0;
                $alums = 0;
                $media = 0;
            }
            if ($fila['RESP'] == 'Bien'){
                ($resulB++);
            }else {$resulM+=1;}
            $preguntas+=1;
            $fila = mysqli_fetch_array($consulta); 
            if($fila['CODEX'] == $codex && $fila['DNI'] != $dni){
                $notaT = ($resulB * 10 )/ $preguntas;
                $notaT = round($notaT,2);
                $media+=$notaT;
                $alums++;
                $media = $media/$alums;
                if ($notaT < 5) $suspensos++;
                if ($notaT >= 5) {
                    if ($notaT >= 7){
                        if ($notaT >= 8) {$sobresalientes++;}else {$notables++;}
                    }else {$aprobados++;}
                }
                echo
                "<tr class=\"filas\" >
                <th bgcolor = #BBBBBB > ".$codex." </th>
                <th> ".$dni." </th>
                <th> ".$resulB."/".$preguntas." </th>
                <th> ".$notaT." </th>
                </tr>";
                $preguntas=0;
                $resulB = 0;
                $resulM = 0;
                $dni = $fila['DNI'];
        
            }

        }

        echo "
        </table>
        <br>
        <br>
        <br>
        <br>
        
        
        <form action=\"./panelprofesor.php\" >
        <input type=\"submit\" value=\"Volver\" />
        </form>";
        
    ?>
</body>
</html>

