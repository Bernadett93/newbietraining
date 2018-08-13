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

<div id="oktatasok">
	<h1>Üdvözöllek <?php kiirNevet($link);?>!<br> Tekintsd meg a számodra kiírt oktatásokat!</h1>
	<?php
		//kiírja az összes oktatást
		kiirOperatornakOktatasokat($link);
	?>
</div>

</body>
</html>