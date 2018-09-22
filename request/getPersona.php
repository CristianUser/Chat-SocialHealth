<?php
    include "db.php";
    $id=$_GET["id"];
    $sql="SELECT u.nombre, u.apellido, u.id_usuario FROM usuario u WHERE u.id_usuario = $id";
    $persona = $mysqli->query($sql);
    $result=$persona->fetch_assoc();
    $myJSON = json_encode($result);

    echo $myJSON;

?>
