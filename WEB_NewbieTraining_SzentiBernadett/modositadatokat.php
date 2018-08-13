<?php
	error_reporting(0);
	session_start();
	//ellenőrzi, hogy be van-e jelentkezve a felhasználó, mert ha nem, akkor nem éri el ennek az oldalnak a tartalmát
	if(!isset($_SESSION['uid']))
	{
		header("Location: html/nincsbejelentkezve.html");
	}
	require_once("php/functions.php");
	kiirHeader();
?>
<body>
<?php
	require_once("connect.php");
	kiirMenu();
?>
<div id="szemelyesadatok">
	<h1>Adatok módosítása</h1>
		<div class="form-group" id="modositadatok">
			<label for='email'>Új e-mail cím </label>
			<input type='text' id='email' class='form-control' name='email' <?php echo visszaadDolgozoEmailjet($link);?>>
			<label for='mobil'>Új mobil szám </label>
			<input type='text' class='form-control input-lg' id='mobil' name='mobil' <?php echo visszaadDolgozoMobiljat($link);?>>
			<center>
				<button class='btn btn-primary' id="save" name='save' >Mentés</button>
				<form style="display: inline-block" method="post" action="#">
					<button class='btn btn-primary' id="cancel" name='cancel' >Mégsem</button>
				</form>
			</center>
			<center>
				<span class="hibauzenet" id="hibauzenetEmail"></span><br>
				<span class="hibauzenet" id="hibauzenetMobil"></span>
				<span class="hibauzenet" id="mentesUzenet"></span>
			</center>
		</div>
	<?php
		//ha a mégsem gombra kattintunk visszamegyünk a személyes adatlapra
		if(isset($_POST["cancel"]))
			header("Location: szemelyesadatlap.php");
	?>
</div>
</body>
</html>