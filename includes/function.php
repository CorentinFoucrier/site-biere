<?php
function userOnly($verify=false){
	if (session_status() != PHP_SESSION_ACTIVE){
		session_start();
	}
	
	if(empty($_SESSION["id"]) && ($verify === true)){
		return false;
	}
	return true;
}