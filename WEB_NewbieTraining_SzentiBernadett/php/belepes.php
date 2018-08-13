<?php
	error_reporting(0);
	session_start();
	require_once("connect.php");
	if(isset($_POST["submit"]))
	{
		$login=$_POST['login'];
		$password=$_POST['password'];
		$belepes=false; //engedi-e a belépést
		$csatlakozas=true; //tudtunk-e csatlakozni az adatbázishoz
		
		$sql="SELECT id, password FROM userek WHERE username='$login'";
		$result=mysqli_query($link, $sql);
		if(!mysqli_errno($link))
		{
			$numrows=mysqli_num_rows($result);
			if($numrows==0)
			{
				//nincs ilyen felhasználó
				$belepes=false;
			}
			else
			{
				$result=mysqli_query($link, $sql);
				while($row=mysqli_fetch_array($result))
				{
					//jelszó ellenőrzés
					if(password_verify($password, $row["password"]))
					{
						$belepes=true;
						$uid=$row['id'];
						$_SESSION['uid']=$uid;
						$sql="SELECT * FROM dolgozo WHERE id=$uid";
						$result=mysqli_query($link, $sql);
						if(!mysqli_errno($link))
						{
							while($row=mysqli_fetch_array($result))
							{
								//sessionök beállítása
								$pozicio=$row['pozicio'];
								$_SESSION['pozicio']=$pozicio;
								$teruletid=$row['terulet_id'];
								$_SESSION['teruletid']=$teruletid;
								header("Location: kezdooldal.php");
							}
						}
					}
				}
			}
		}
		else
			$csatlakozas=false;
	}
?>