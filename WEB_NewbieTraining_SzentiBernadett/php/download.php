<?php
	error_reporting(0);
	//lekérdezzük az összes segédanyagot terület szerint
	$teruletid=$_SESSION["teruletid"];
	$sql="SELECT * FROM oktatasianyagok WHERE terulet_id='$teruletid'";
	$result=mysqli_query($link, $sql);
	$table="<h1 id='download'>Töltsd le a segédanyagokat!</h1>";
	$table.="<div id='segedanyagok'>";
	$index=0;
	while($row=mysqli_fetch_array($result))
	{
		//itt jeleníti meg a segédanyagokat a felület, és itt is tudja letölteni, mert meg van adja az elérési útvonal, amit adatbázisból szed
		$path=$row['path'];
		$id=$row['id'];
		$terulet_id=$row['terulet_id'];
		$title=$row['title'];
		$table.="<div id='sections'><img src='kepek/adobeicon.png' width='100px' height='100px'><br><a href='$path' target='_blank'>$title</a></div>";
	}
	$table.="</div>";
	echo $table;
?>