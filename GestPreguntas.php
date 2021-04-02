<?php 
session_start();
    $nombresesion = $_SESSION['nombre'];
    $apellsesion = $_SESSION['apellidos'];
    $fotosesion = $_SESSION['foto'];

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
    <title>PanelPreguntas</title>
    <link href="../templates/panelprofesor.css" rel="stylesheet" type="text/css">

</head>
<body>
    <h1 style="column-span: all; text-align: center">Panel de control de preguntas: <?php echo $nombresesion." ".$apellsesion ?></h1>
    <br></br>
    
    <form method="POST" enctype="multipart/form-data" action="./CRUD/crearpregunta.php">
        <table style="text-align: center;">
            <tr>
                <th>
                <input type="text" name="enunciado"  value="" placeholder="Enunciado" required> <br>

                <input type="text" name="resp1"  value="" placeholder="resp1" required> <br>
                <input type="radio" name="res"  value="resp1" required > <br>

                <input type="text" name="resp2"  value="" placeholder="resp2" required> <br>
                <input type="radio" name="res"  value="resp2"  required > <br>

                <input type="text" name="resp3"  value="" placeholder="resp3" > <br>
                <input type="radio" name="res"  value="resp3" > <br>
                
                
                
                <input type="text" name="resp4"  value="" placeholder="resp4"> <br>
                <input type="radio" name="res"  value="resp4"  > <br>
                <input type="submit" name = "Crear" value="Crear Pregunta" />
                <?php $idasig = $_POST['asignatura'];
                    echo "<td> <input type=\"hidden\" name=\"idasig\" value=".$idasig."  ></td><br>";  ?><br>
                

 
                </th>
            </tr>
 
        </table>    

    </form>
    <br>
    <br>

    <h1 style="column-span: all; text-align: center">Lista de preguntas:</h1>

    <?php

        $conexionpreguntas = mysqli_connect('localhost','root', '777303', 'universidad'); //HAY QUE AÑADIR CONTRASEÑA EN CASO QUE LA TENGAIS EN VUESTRA BBDD
        if (mysqli_connect_errno()) {
            printf("Conexión fallida: %s\n", mysqli_connect_error());
            die();
        }
        $consulta = mysqli_query($conexionpreguntas, "SELECT * FROM preguntas WHERE IDASIG = $idasig");
        $Nfilas = mysqli_num_rows($consulta);
        
        
        for ($i = 1 ; $i <= $Nfilas ; $i++){
            $fila = mysqli_fetch_array($consulta); 
            if ($i==1){
             echo " <form method=POST enctype=multipart/form-data action=./CRUD/delpregunta.php>
             <table class=\"encabezado\" > 
                <tr bgcolor=#A5A5A5>
                <th>IDPREG</th>
                <th>ENUNCIADO</th>
                <th>RESPUESTA 1</th>
                <th>RESPUESTA 2</th>
                <th>RESPUESTA 3</th>
                <th>RESPUESTA 4</th>
                <th>RESPUESTA CORRECTA</th>
                <th>IDASIG</th>

                </tr>";            

            }
         

            echo  
                "<tr class=\"filas\" >
                <th bgcolor = #BBBBBB > $i </th>
                <th> ".$fila['ENUNCIADO']." </th>
                <th> ".$fila['RESP1']." </th>
                <th> ".$fila['RESP2']." </th>
                <th> ".$fila['RESP3']." </th>
                <th> ".$fila['RESP4']." </th>
                <th> ".$fila['RESP']." </th>
                <th> ".$fila['IDASIG']." </th>
                <td> <input type=\"hidden\" name=\"Selec\" value=".$fila['IDPREG']."  placeholder=\"Eliminar\"  >
                <input type=\"submit\" value=\"Eliminar\" placeholder=\"Eliminar\"  ></form>
                <form method=POST enctype=multipart/form-data action=./CRUD/modpregunta.php>
                <td> <input type=\"hidden\" name=\"idpreg\" value=".$fila['IDPREG']."  ></td>
                <td> <input type=\"submit\" name=\"editar\" value=Editar  ></td></form>
                </td><tr> ";
                echo "<tr>";
     
        }
        
        echo "
        </table>
        
        </table>";
        
        echo "
        
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

