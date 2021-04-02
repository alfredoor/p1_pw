<?php 

    session_start();
    $_SESSION['nopass']='';
    $idasig = $_POST['idasig'];
    $enunciado = $_POST['enunciado'];
    $resp1 = $_POST['resp1'];
    $resp2 = $_POST['resp2'];
    $resp3 = $_POST['resp3'];
    $resp4 = $_POST['resp4'];
    $res = $_POST['res'];

    
    echo $resp1;
    echo $resp2;
    echo $resp3;
    echo $resp4;
    echo $resp;


    $conexionpregunta = mysqli_connect('localhost','root', '777303', 'universidad');//HAY QUE AÑADIR CONTRASEÑA EN CASO DE QUE TENGIAS BBDD
    if (mysqli_connect_errno()) {
        printf("Conexión fallida: %s\n", mysqli_connect_error());
        die();
    }

    if ($resp3 == '' && $resp4 == ''){
    mysqli_query($conexionpregunta ,"INSERT INTO preguntas (ENUNCIADO,RESP1,RESP2,RESP3,RESP4,RESP,IDASIG ) VALUES
    ('$enunciado' , '$resp1' , '$resp2', '' , '' , '$res','$idasig')");
    }else{
        mysqli_query($conexionpregunta ,"INSERT INTO preguntas (ENUNCIADO,RESP1,RESP2,RESP3,RESP4,RESP,IDASIG ) VALUES
        ('$enunciado' , '$resp1' , '$resp2', '$resp3' , '$resp4' , '$res','$idasig')");
    }
  

    mysqli_close($conexionpregunta);

    header("Location: ../panelprofesor.php");
   
?>