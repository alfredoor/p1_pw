<?php 
    $id = $_POST['idpreg'];

    $consultapregunta = mysqli_connect('localhost','root', '777303', 'universidad');
    if (mysqli_connect_errno()) {
        printf("Conexión fallida: %s\n", mysqli_connect_error());
        die();
    }


    $consultapregunta = mysqli_query($consultapregunta ,"SELECT * FROM preguntas WHERE IDPREG='$id'");
    $pregunta = mysqli_fetch_array($consultapregunta);
    



?>




<!DOCTYPE html>
<html>
<head>
    <meta content="charset=utf-8" />
    <title>Actualizar pregunta</title>
    <link href="../templates/paneladmin.css" rel="stylesheet" type="text/css">

</head>
<body>
    <h1 style="column-span: all; text-align: center">Menu para actualizar pregunta con ID: <?php echo $id; ?></h1>
    <br></br>
    <h2 style=" text-align: center">Cambiar los campos a actualizar</h2>

    <div style="text-align: left;">
    <table style= "margin: 0 auto">
        <form method="POST" enctype="multipart/form-data" action="./updpregbbdd.php" >
          <tr>
            <tr>
                <th>
                <?php 
                    echo "
                    <input type=\"hidden\" name=\"ID\" value=\"".$pregunta['IDPREG']." \" >
                    <input type=\"text\" name=\"enunciado\" placeholder=\"enunciado\" value=\"".$pregunta['ENUNCIADO']." \" >Enunciado<br>
                    <input type=\"text\" name=\"resp1\" placeholder=\"resp1\" value=\"".$pregunta['RESP1']." \" >Resp1<br>
                    <input type=\"text\" name=\"resp2\" placeholder=\"resp2\" value=\"".$pregunta['RESP2']." \" >Resp2<br>
                    <input type=\"text\" name=\"resp3\" placeholder=\"resp3\" value=\"".$pregunta['RESP3']." \" >Resp3<br>
                    <input type=\"text\" name=\"resp4\" placeholder=\"resp4\" value=\"".$pregunta['RESP4']." \" >Resp4<br>
                    <input type=\"text\" name=\"resp\"  placeholder=\"resp\" value=\"".$pregunta['RESP']." \" >Respuesta correcta<br>
                

                    <br>
                    <br>
                    <br>
                    <input type=\"submit\" value=\"Actualizar\" name=\"submit\" >
                    <form action=\"./GestPreguntas.php\"
                    <td><input type=\"submit\" value=\"Volver\" /></td>
                    </form>
                    </th>";
                ?>
            </tr>
            </tr>
        </form>
    </table>    
    </div>
    
    


</body>
</html>



