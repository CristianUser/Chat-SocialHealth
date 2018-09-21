<?php
include "db.php";		
$id_chat = $mysqli->real_escape_string($_POST['id_chat']);
$from = $mysqli->real_escape_string($_POST['from']);
$to = $mysqli->real_escape_string($_POST['to']);
$texto = $mysqli->real_escape_string($_POST['texto']);
$consulta = "INSERT INTO chat (nombre, mensaje) VALUES ('$nombre', '$mensaje')";
$estado ="Enviado";
enviarMsj($id_chat,$from,$to,$texto);
  function enviarMsj($id_chat,$from,$to,$texto){
      global $mysqli;
      $stmt = $mysqli->prepare("INSERT INTO `mensaje`(`ID_Chat`, `From`, `To`, `Texto`) VALUES (?,?,?,?)");
      $stmt -> bind_param('ssss',$id_chat,$from,$to,$texto);
      if($stmt->execute()){
          echo "Enviado completamente";
          return true;
        } else {
            echo "No enviado";
            return false;	}	
        }
    //$consulta = "INSERT INTO mensaje ('ID_Chat', 'Estado', 'From', 'To', 'Texto') VALUES ('$id_chat','$estado','$from','$to','$texto')";

    //$ejecutar = $mysqli->query($consulta);

    // if ($ejecutar) {
    //     echo "Enviado completamente";
    // 	//echo "<embed loop='false' src='beep.mp3' hidden='true' autoplay='true'>";
    // }
    // else{
    //     echo "No enviado";
    // }

?>