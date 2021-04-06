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

 ?>



<!DOCTYPE html>
<html>
<head>
    <meta content="charset=utf-8" />
    <title>Panel de preguntas</title>
    <link href="../templates/panelprofesor.css" rel="stylesheet" type="text/css">

</head>
<body>
    <h1 style="column-span: all; text-align: center">Selecciona una asignatura:<?php echo $nombresesion." ".$apellsesion ?></h1>
    <br></br>
    <?php
        $conexionasignaturas = mysqli_connect('localhost','root', '777303', 'universidad');
        if (mysqli_connect_errno()) {
            printf("Conexión fallida: %s\n", mysqli_connect_error());
            die();
        }
    
        $consulta = mysqli_query($conexionasignaturas, "SELECT * FROM asignatura, profesor WHERE profesor.DNI = '$dni' AND profesor.IDASIG = asignatura.IDASIG ");
        $Nfilas = mysqli_num_rows($consulta);

        echo "
            <form method=POST enctype=multipart/form-data action=GestResultados.php>
                <table style=text-align: left > ";
        for($i= 0 ; $i < $Nfilas ; $i++){
            $fila = mysqli_fetch_array($consulta); 
                 echo"  
                <tr><td width:100px align: left><input type=\"submit\" name=asignatura value=".$fila['IDASIG']."  placeholder= ".$fila['NOMBRE']." ></td></tr> ";
                       
        }
        echo"
            </form>
            </table>
                    <tr>                    
                    

                        <th>
                        <img src=\"../imgs/".$fotosesion." \" width=\"180px\" height=\"225px\" style=\"border: 1px solid;text-align: right;
                            color: black;\" ><br>
                            <a type=button href=cerrarsesion.php >Cerrar sesion</a>
                        </th>
                    </tr>
                
        ";
        
    ?>
        <form action=./panelprofesor.php >
        <input type=submit value= Volver />
        </form> 
</body>
</html>