


<?php

if (!empty($_POST['user']) && !empty($_POST['pass'])) {

    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $conexion = mysqli_connect('localhost','root', '777303', 'universidad');

     if (mysqli_connect_errno()) {
        printf("Conexión fallida: %s\n", mysqli_connect_error());
        exit();
    }

    $ifuser = $conexion->query("SELECT * FROM 'persona' WHERE DNI='".$user."' ");
    $matchuser = $ifuser->num_rows;

    if($ifuser){
        echo $user;
        echo $pass;
        $setpass = "SELECT * FROM persona WHERE PASS= '".$pass."' AND DNI='".$user."' ";
        $ifpass = mysqli_query($conexion, $setuser);
        $matchpass = $ifpass->num_rows;

        
        if( $matchpass == 0 )
            echo "Identificación incorrecta";
        else
        if($matchpass==1){
            echo "<p>Conexion establecida, redireccionando...<p>";
            $persona = mysqli_fetch_array($setpass);
            switch($persona['TIPO']){
                case 'ALUMNO': 
                    break; header('Location: ../templates/panelAlumno.html');
                case 'PROFESOR':header('Location: ../templates/panelProfesor.html');
                    break;
            }
        }
    }else{
        $incorrectlogin = 'Identificacion incorrecta';

    }
    $conexion->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta content="charset=utf-8" />
</head>
<body>
    <form method="POST" enctype="multipart/form-data" action="./backup.php" style="text-align: center; min-height: 50%;">
        <div style="background-color: aquamarine; ">
            Usuario: <input type="text" name="user"  required><br>
            Password: <input type="password" name="pass" required><br>
            <input type="submit" value="Enviar">
            <?php echo "<div color='red' style=\"text-align : center; color : red \">".$incorrectlogin."</div>"  ?>
        </div>
    </form>       
</body>
</html>
