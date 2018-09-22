<?php
    include "db.php";
    $id=$_GET["id"];
    $sql="SELECT u.nombre, u.apellido, u.id_usuario FROM usuario u WHERE u.id_usuario = $id";
    $persona = $mysqli->query($sql);
    $result=$persona->fetch_assoc();
    $myJSON = json_encode($result);
    $img_file="../../SocialHealth/login/files/$id/perfil.png";
    $imgData = base64_encode(file_get_contents($img_file));
    // Format the image SRC:  data:{mime};base64,{data};
    $perfil = 'data: '.mime_content_type($img_file).';base64,'.$imgData;
    //header('Content-Type: application/json');
    echo substr($myJSON, 0, -1),',"foto":"',$perfil,'"}';

?>
