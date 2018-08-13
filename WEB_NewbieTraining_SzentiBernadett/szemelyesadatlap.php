<?php
	error_reporting(0);
	session_start();
	require_once("php/functions.php");
	//ellenőrzi, hogy be van-e jelentkezve a felhasználó, mert ha nem, akkor nem éri el ennek az oldalnak a tartalmát
	if(!isset($_SESSION['uid']))
	{
		header("Location: html/nincsbejelentkezve.html");
	}
	kiirHeader();
?>
<script>
</script>
<body>
<?php
	require_once("connect.php");
	kiirMenu();
	//ha adatokat szeretnénk módosítani, akkor elvezet arra az oldalra, ahol ezt meg tudjuk tenni
	if(isset($_POST['modifydatas']))
		header("Location: modositadatokat.php");
	//ha jelszót szeretnénk módosítani, akkor elvezet arra az oldalra, ahol ezt meg tudjuk tenni
	if(isset($_POST['modifypass']))
		header("Location: modositjelszot.php");

?>

<div id="szemelyesadatok">
	<h1>Üdvözöllek <?php kiirNevet($link);?>!</h1>
	<?php kiirSzemelyesAdatlap($link);?>
	<center>
	<form action="#" method="post">
		<button type="submit" class="btn btn-primary" name="modifypass">Jelszó megváltoztatása</button>
		<button type="submit" class="btn btn-primary" name="modifydatas">Adatok megváltoztatása</button>
	</form>
	</center>
</div>

</body>
</html>