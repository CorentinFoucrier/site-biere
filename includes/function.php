<?php
function isConnect(){
	if (session_status() != PHP_SESSION_ACTIVE){
		session_start();
	}
	
	if(empty($_SESSION["id"])){
		return false;
	}

	if(!empty($_SESSION["id"])){
		return true;
	}
}