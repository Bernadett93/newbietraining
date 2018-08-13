<?php
	error_reporting(0);
	session_start();
	//ellenőrzi, hogy be van-e jelentkezve a felhasználó, mert ha nem, akkor nem éri el ennek az oldalnak a tartalmát
	if(!isset($_SESSION['uid']))
	{
		header("Location: html/nincsbejelentkezve.html");
	}
	
?>
<body>
<?php
	require_once("php/functions.php");
	//ezek magyarázata a function.php fájlon belül található
	kiirHeader();
	kiirCarousel();
	kiirMenu();
	kiirKezdooldal();
?>
</body>
</html>







