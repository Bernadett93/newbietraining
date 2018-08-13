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
	//ellenőrzi, hogy a belépő, aki meg akarja tekinteni ezt az oldalt, tényleg Mobil területhez tartozik-e
	//mert ha nem, akkor kiírja, hogy nem jogosult az oldalt megtekinteni
	if($_SESSION["teruletid"]==3)
	{
		kiirUdvozles($link);
		//ha mentor pozícióval rendelkezik, megjeleníti a feltöltés felületet is, mert csak mentor tud segédanyagot feltölteni
		if($_SESSION["pozicio"]=="Mentor")
			require_once("php/upload.php");
	}
	else
	{
		echo file_get_contents("html/segedanyagjogosulatlan.html");
		die();
	}
?>
<div id="container">
	<?php
		require_once("php/download.php");
	?>
</div>

</body>
</html>