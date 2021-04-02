<?php

if ($_POST['elec'] == 'si'){

$id= $_POST['id'];

$conexionpregunta = mysqli_connect('localhost','root', '777303', 'universidad');//HAY QUE AÑADIR CONTRASEÑA EN CASO DE QUE TENGIAS BBDD
if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    die();
}else

mysqli_query($conexionpregunta,"DELETE FROM preguntas where IDPREG = '$id'");
}else
mysqli_close($conexionpregunta);

header("Location: ../panelprofesor.php");

?>