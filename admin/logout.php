<?php
	session_start();
	unset($_SESSION['userInfo']);
	header('Location:/admin/login.php');
 ?>