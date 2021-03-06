<?php
	//initializarea sesiunii
	function session_set(){
		ini_set('session.use_only_cookies', 1);// se vor folosi numai cookie-uri pt transmiterea id-ului de sesiune
	
		session_start();
		setcookie(session_name(), session_id(), time() + 2*60, "/");  // prelungeste viata cookie-ului de la ultimul click

		}
	
	function logged_in() {
		return isset($_SESSION['user_id']);
	}
	
	function confirm_logged_in() {
		if (!logged_in()) {
			redirect_to("login.php");
		}
	}
	
	function logged_out(){
		// 1. Gasesc sesiunea
		session_set();
		
		// 2. Sterg toate variabilele sesiunii
		$_SESSION = array();//sau unset($_SESSION)
		
		// 3. Sterg cookie-ul de sesiune
		if(isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time()-42000, '/');
		}
		
		// 4. Sterg fisierul de pe server asociat sesiunii
		session_destroy();
		}
?>
