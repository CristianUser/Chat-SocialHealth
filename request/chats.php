<?php
    function lastMsj($id,$id_chat){
        global $mysqli;
        $sql="SELECT * FROM mensaje m , chat c WHERE c.ID_Chat=$id_chat and m.ID_Chat=c.ID_Chat and (c.User1=$id or c.User2=$id) ORDER BY `m`.`ID_Msj` DESC limit 1";
        $lastmsj = $mysqli->query($sql);
        $last=$lastmsj->fetch_assoc();
        return $last;
    }
	include "db.php";
    ///consultamos a la base
    $id=$_GET["id"];
	$consulta = "SELECT u.id_usuario, u.nombre, u.apellido, 
    u.usuario,c.ID_Chat, c.User1, c.User2 FROM usuario u 
    ,chat c where u.id_usuario!= $id and (c.User1=$id or c.User2=$id) 
    and  (c.User1=u.id_usuario or c.User2=u.id_usuario); ";
    $ejecutar = $mysqli->query($consulta);
    
    
	while($fila = $ejecutar->fetch_array()) : 
?>
    <div value="<?php echo $fila['id_usuario']?>" id="chat<?php echo $fila["ID_Chat"]?>" class="chat_list">
        <div class="chat_people">
        <div class="chat_img"> <img src="../../SocialHealth/login/files/<?php echo $fila['id_usuario']?>/perfil.png" alt="sunil"> </div>
        <div class="chat_ib">
            <h5><?php echo $fila['nombre']," ", $fila['apellido']; ?><span class="chat_date"><?php echo extDiaShort(lastMsj($id,$fila["ID_Chat"])['Fecha']);?></span></h5>
            <p><?php echo lastMsj($id,$fila["ID_Chat"])['Texto'];?></p>
        </div>
        </div>
    </div>
	
<?php endwhile; ?>
