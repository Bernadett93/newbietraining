<?php
	error_reporting(0);
	require_once("../connect.php");
	session_start();
	if(isset($_POST["oldPass"]) && isset($_POST["newPass"]) && isset($_POST["newPassConf"]))
	{
		$oldPass=$_POST["oldPass"];
		$newPass=$_POST["newPass"];
		$newPassConf=$_POST["newPassConf"];
		$uid=$_SESSION["uid"];
		
		$sql="SELECT password FROM userek WHERE id=$uid";
		$result=mysqli_query($link, $sql);
		if($link)
		{
			$numrows=mysqli_num_rows($result);
			if(!$numrows)
			{
				echo "Hiba történt a lekérdezés során!";
			}
			else
			{
				//ellenőriz, hogy a régi jelszó, amit megadott, az helyes-e
				$row=mysqli_fetch_array($result);
				if(password_verify($oldPass, $row["password"]))
				{
					//ha helyes, akkor az új jelszó és új jelszó megerősítését ellenőrzi, hogy megegyezik-e
					if(!strcmp($newPass, $newPassConf))
					{
						//ha minden jó, akkor meni az adatbázisba az új jelszót hashelve
						$newPass=password_hash($newPass, PASSWORD_DEFAULT);
						$sql2="UPDATE userek SET password='".$newPass."' WHERE id=$uid";
						$result2=mysqli_query($link, $sql2);
						if($result2)
							echo "Sikeresen módosította az új jelszót! Kérem jelentkezzen ki és vissza.";
					}
					else
						echo "Nem egyezik az új jelszó és az új jelszó megerősítése!";
				}
				else
					echo "Nem egyezik a jelszó, nem jogosult újat módosítani!";
			}
		}
		
		echo "<br><a href='szemelyesadatlap.php'><button class='btn btn-primary'>Vissza az adatlapra</button></a>";
	}
?>