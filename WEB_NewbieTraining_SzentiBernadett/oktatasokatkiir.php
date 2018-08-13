<?php
	error_reporting(0);
	session_start();
	require_once("php/functions.php");
	require_once("connect.php");
	//ellenőrzi, hogy be van-e jelentkezve a felhasználó, mert ha nem, akkor nem éri el ennek az oldalnak a tartalmát
	if(!isset($_SESSION['uid']))
	{
		header("Location: html/nincsbejelentkezve.html");
	}
	
?>
<body>
<?php
	kiirHeader();
	kiirMenu();
?>

<div id="mentoraltak">
	<h1>Üdvözöllek <?php kiirNevet($link);?>!<br> Tekintsd meg a mentoráltjaid! <br><br>Oktatások kiírása</h1>
	
	<center>
		<h3>Szűrés kompetenciák alapján</h3>
		<form action="#" method="post" id="szures">
		<?php feltoltComboboxKompetenciakkal($link);?>
			<button type="submit" class="btn btn-primary" id="szures" name="szuresKiir">Szűrés</button>
		<br>
		
		</form>
		<a href="mentoraltak.php"><button class="btn btn-outline-primary" id="visszamentoraltakhoz">Vissza a mentoráltakhoz</button></a>
	</center>
<?php
	//szűrésre kattintva a szűrt feltételnek megfelelő mentoráltakat adja ki (kompetenciák alapján szűr)
	if(isset($_POST["szuresKiir"]))
	{
		$kompetencia=$_POST["kompetenciak"];
		if(!strcmp($kompetencia, "mind"))
		{
			kiirMentoraltakOktatasokAlapjan($link);
		}
		else
			kiirMentoraltakOktatasokKompetenciakAlapjan($kompetencia, $link);
	}
	else
		kiirMentoraltakOktatasokAlapjan($link);
?>
<center>
		<input type="text" name="datum" id="datum" class="datum" placeholder="Oktatás időpontja">
		
		<button class="btn btn-primary" id="datum">Dátum hozzáadása</button><br>
		<span class="hibauzenet" id="hibadatum"></span><br>
		<span class="hibauzenet" id="hibacheckbox"></span>
</center>
	<div id="content"></div>
</div>
</body>
</html>