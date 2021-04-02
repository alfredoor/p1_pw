<?php 

    $eliminar = $_POST['Selec'];  //Variable para eliminar preguntas
    

    echo "Estas seguro de que quieres eliminar la pregunta con ID: ".$eliminar;
    
    echo "<form method=\"POST\" enctype=\"multipart/form-data\" action=\"./eliminadoPreg.php\" >
            <input type=\"radio\" name=\"elec\" value=\"si\">SI
            <input type=\"radio\" name=\"elec\" value=\"no\">NO
            <input type=\"hidden\" name=\"id\" value=\"".$eliminar."\">
            <input type=\"submit\" value=\"Enviar decision\">

        </form>";

?>
   
