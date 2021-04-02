<?php 


    $update = mysqli_connect('localhost','root', '777303', 'universidad');
    if (mysqli_connect_errno()) {
        printf("Conexión fallida: %s\n", mysqli_connect_error());
        die();
    }

    $id = $_POST['ID'];
    $enunciado = $_POST['enunciado'];
    $resp1 = $_POST['resp1'];
    $resp2 = $_POST['resp2'];
    $resp3 = $_POST['resp3'];
    $resp4 = $_POST['resp4'];
    $resp = $_POST['resp'];
 



    $consulta = mysqli_query($update ,"SELECT * FROM preguntas WHERE ID='$id'");
    $fila = mysqli_fetch_array($consulta);


    mysqli_query($update ,"UPDATE preguntas SET ENUNCIADO='$enunciado' ,RESP1='$resp1' , RESP2='$resp2' , RESP3='$resp3', 
                        RESP4='$resp4' , RESP='$resp' WHERE IDPREG='$id' ");

    mysqli_close($update);
    header("Location: ../panelprofesor.php");

?>