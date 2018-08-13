<?php
	error_reporting(0);
	session_start();
	
	//megszünteti a sessiont, és visszavezet a kezdőoldalra (belépési felületre)
	session_destroy();
	header("Location: ../index.php");
?>