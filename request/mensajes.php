<?php
	include "db.php";
    ///consultamos a la base
    $id_chat=$_GET["id_chat"];
    $id=$_GET["id"];
	$consulta = "SELECT * FROM mensaje m , chat c WHERE  c.ID_Chat= $id_chat and m.ID_Chat=c.ID_Chat  and (c.User1=$id  or c.User2=$id) ORDER BY `m`.`ID_Msj` ASC";
	$ejecutar = $mysqli->query($consulta); 
    while($fila = $ejecutar->fetch_array()) { 
        if($fila['From']==$id){
?>
    <div class="outgoing_msg">
        <div class="sent_msg">
        <p><?php echo $fila['Texto'];?></p>
        <span class="time_date"> <?php echo extHora($fila['Fecha']);?>   |    <?php echo extDia($fila['Fecha']);?></span> </div>
    </div>
    
        <?php }else{?>
    <div class="incoming_msg">
    <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
    <div class="received_msg">
        <div class="received_withd_msg">
        <p><?php echo $fila['Texto'];?></p>
        <span class="time_date"> <?php echo extHora($fila['Fecha']);?>    |    <?php echo extDia($fila['Fecha']);?></span></div>
    </div>
    </div>
	
<?php
    } 
}; ?>