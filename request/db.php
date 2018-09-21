<?php
	
	$mysqli=new mysqli("localhost","root","","socialhealth");
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	function extHora($fecha){
		return date('g:i A', strtotime($fecha));
	}
	function extDia($fecha){
		return date('F j', strtotime($fecha));
	}
	function extDiaShort($fecha){
		return date('M j', strtotime($fecha));
	}
?>