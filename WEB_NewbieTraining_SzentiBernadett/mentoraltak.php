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
	<h1>Üdvözöllek <?php kiirNevet($link);?>!<br> Tekintsd meg a mentoráltjaid!</h1>
	<center>
		<h3>Szűrés belépés kezdete alapján</h3>
		<form action="#" method="post" id="szures">
		<?php feltoltComboboxDatummal($link);?>
			<button type="submit" class="btn btn-primary" id="szures" name="szures">Szűrés</button>
		<br>
		</form>
		<a href="oktatasokatkiir.php"><button type="submit" id="oktataskiirasa" name="oktataskiirasa" class="btn btn-primary">Oktatások kiírása</button></a>
	</center>
	<?php
		//ha a szűrésre kattintunk, akkor a szűrt feltételnek megfelelő mentoráltakat adja ki (belépés kezdete alapján szűr)
		if(isset($_POST["szures"]))
		{
			$datum=$_POST["belepeskezdete"];
			if(!strcmp($datum, "mind"))
				kiirMentoraltakat($link);
			else
				kiirMentoraltakDatumalapjan($datum, $link);
		}
		else
			kiirMentoraltakat($link);
	?>
</div>
</body>
</html>