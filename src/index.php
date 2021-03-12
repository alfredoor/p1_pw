
<?php


    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $conexion = mysqli_connect('localhost','root', '777303', 'universidad');

    $setuser = "SELECT * FROM 'persona' WHERE DNI=$user ";

    $ifuser = mysqli_query($conexion, $setuser);
    
    if( $ifchuser == FALSE ){
    
        echo "Identificación incorrecta";
    }else{
        $matchuser = mysqli_num_rows($ifuser);
        if($matchuser==1){
            $setpass = "SELECT * FROM persona WHERE PASS=$pass AND DNI=$user ";
            $ifpass = mysqli_query($conexion, $setuser);
            $matchpass = mysqli_num_rows($ifpass);
            if( $ifpass == FALSE )
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
        }
    }


?>