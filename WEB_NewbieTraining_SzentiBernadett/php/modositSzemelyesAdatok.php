<?php
	error_reporting(0);
	require_once("../connect.php");
	session_start();
	
	if(isset($_POST['email']) && isset($_POST['mobil']))
	{
		//felhasználó által bevitt adatokat változóba elmenti
		$email=$_POST['email'];
		$mobil=$_POST['mobil'];
		$uid=$_SESSION["uid"];
		
		//kliens oldal is ellenőrzi, de ha mégis ürresen jutna el ide nem engedi változtatni
		if(($mobil=="") && ($email==""))
		{
			echo "Sikertelen módosítás, nem adott meg adatot!";
		}	
		else if($email=="")
		{
			$sql="UPDATE dolgozo SET mobilszam='$mobil' WHERE id='$uid'";
			$result=mysqli_query($link, $sql);
			if($result)
				echo "E-mail cím sikeresen módosítva!";
		}
		else if($mobil=="")
		{
			$sql="UPDATE dolgozo SET email='$email' WHERE id='$uid'";
			$result=mysqli_query($link, $sql);
			if($result)
				echo "Mobilszám sikeresen módosítva!";
		}
		else
		{
			$sql="UPDATE dolgozo SET mobilszam='$mobil', email='$email' WHERE id='$uid'";
			$result=mysqli_query($link, $sql);
			if($result)
				echo "E-mail cím és mobilszám sikeresen módosítva!";
		}
		echo "<br><a href='szemelyesadatlap.php'><button class='btn btn-primary'>Vissza az adatlapra</button></a>";
	}
	
	
?>