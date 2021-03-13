
<?php
include('funciones.inc');

function autentificado($id, $pass){
    $conexion = mysqli_connect('localhost','root', '777303', 'universidad');
    if (mysqli_connect_errno()) {
        printf("Conexión fallida: %s\n", mysqli_connect_error());
        exit();
    }

    $ifuser = mysqli_query($conexion,"SELECT * FROM persona WHERE DNI='$id' && PASS='$pass'");
    $numuser = mysqli_num_rows($ifuser);
    return $numuser;
}

function givetipe($id, $pass){
    $conexion = mysqli_connect('localhost','root', '777303', 'universidad');
    if (mysqli_connect_errno()) {
        printf("Conexión fallida: %s\n", mysqli_connect_error());
        exit();
    }

    $consulta = mysqli_query($conexion,"SELECT TIPO FROM persona WHERE DNI='$id' && PASS='$pass'");
    $type = mysqli_fetch_array($consulta);

    return $type['TIPO'];
}

 


if ( isset($_POST['submit'])) {
    $incorrectlogin = '';
    $id = $_POST['user'];
    $pass = $_POST['pass'];
    if( autentificado($id, $pass)==1){
        $tipo = givetipe($id, $pass);
        switch($tipo){
            case 'ALUMNO': echo "<script> window.location='panelalumno.php'; </script>";
                break;
            case 'PROFESOR': echo "<script> window.location='panelprofesor.php'; </script>";
                break;
            case 'ADMIN':  echo "<script> window.location='paneladmin.php'; </script>";
                break;
            default: echo "Contacte con un administrador, su cuenta necesita reparación";
        }
    }else{
     $incorrectlogin = 'Identificacion incorrecta';
    }
}
?>




<!DOCTYPE html>
<html>
<head>
    <meta content="charset=utf-8" />
</head>
<body>
    <form method="POST" enctype="multipart/form-data" action="./login.php" style="text-align: center; min-height: 50%;">
        <div style="background-color: aquamarine; ">
            Usuario: <input type="text" name="user"  required><br>
            Password: <input type="password" name="pass" required><br>
            <input type="submit" value="Enviar" name="submit">
            <?php echo "<div color='red' style=\"text-align : center; color : red \">".$incorrectlogin."</div>"  ?>
        </div>
    </form>       
</body>
</html>







