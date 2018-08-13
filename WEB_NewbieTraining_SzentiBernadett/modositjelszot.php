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
	<h1>Jelszómódosítás</h1>
		<div class="form-group" id="modositadatok">
			<label>Régi jelszó</label>
			<input type='password' id='oldPass' class='form-control' name='oldPass'>
			<label>Új jelszó</label>
			<input type='password' class='form-control input-lg' id='newPass' name='newPass'>
			<label>Új jelszó megerősítése</label>
			<input type='password' class='form-control input-lg' id='newPassConf' name='newPassConf'>
			<center>
				<button class='btn btn-primary' id="savePass" name='save' >Mentés</button>
				<form style="display: inline-block" method="post" action="#">
					<button class='btn btn-primary' id="cancelPass" name='cancel' >Mégsem</button>
				</form>
			</center>
			<center>
				<span class="hibauzenet" id="hibauzenetJelszo"></span><br>
				<span class="hibauzenet" id="mentesUzenetJelszo"></span>
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