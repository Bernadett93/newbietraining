<?php
	
	//adatbázis csatlakozáshoz szükséges adatok beállítása
	$host="localhost";
	$user="root";
	$password="";
	$database="szakdolgozat";
	//$port="";
	
	//kapcsolódás
	$link=mysqli_connect($host, $user, $password, $database);
	
	
	//ha nem sikerült kapcsolódni, akkor kiírja
	if(!$link)
	{
		echo file_get_contents("html/sikertelenadatbaziscsatlakozas.html");
		die();
	}
	//ha sikerült, akkor pedig beállítja a kódolást
	else
	{
		mysqli_set_charset($link, "utf8");
		if(mysqli_errno($link))
		{
			echo "Az UTF-8 kódolás sikertelen!";
		}
	}
?>
	