<?php
	error_reporting(0);
	$hibauzenet="";
	if(isset($_POST['submit']))
	{	
		$dir="./segedanyagok/"; //mappa, ahova mentse majd a segédanyagot
		$filename=$_FILES["fileToUpload"]["name"]; //fájl teljes neve kiterjesztéssel együtt
		$tmpname=$_FILES["fileToUpload"]["tmp_name"]; 
		$path=$dir.basename($_FILES["fileToUpload"]["name"]); //elérési útvonala a fájlnak
		$pathparts=pathinfo($path);
		$name=$pathparts["filename"]; //csak a neve a fájlnak (kiterjesztés nélkül)
		$title=$_POST['filename']; //amit a felhasználó megad
		$uploadOk=1; //a feltöltés sikeres-e, default érték true
		$fileType=strtolower(pathinfo($path, PATHINFO_EXTENSION)); //kiterjesztése a dokumentumnak
		
		
		//ha már van ilyen, nem engedi feltölteni
		if(file_exists($path))
		{
			$hibauzenet.="Létező fájl! ";
			$uploadOk=0;
		}
		
		//ha túl nagy méretű, nem engedi feltölteni
		if($_FILES['fileToUpload']['size']>10480000)
		{
			$hibauzenet.="Túl nagy a fájl mérete! ";
			$uploadOk=0;
		}
		
		//ha nem pdf formátum, nem engedi feltölteni
		if($fileType!="pdf")
		{
			$hibauzenet.="Nem megfelelő formátum! ";
			$uploadOk=0;
		}
		
		//ha nem volt eddig hiba, akkor indul a feltöltés
		if($uploadOk==1)
		{
			if(move_uploaded_file($tmpname, $path))
			{
				//feltölti adatbázisba
				$uid=$_SESSION['uid'];
				$sql="SELECT terulet_id FROM dolgozo WHERE id='$uid'";
				$result=mysqli_query($link, $sql);
				$terulet_id;
				while($row=mysqli_fetch_array($result))
					$terulet_id=$row['terulet_id'];
				
				$sql2="INSERT INTO oktatasianyagok (filename, name, path, title, terulet_id) VALUES('$filename', '$name', '$path', '$title', '$terulet_id')";
				if(mysqli_query($link, $sql2))
				{
					echo "Sikeres feltöltés!";
				}
				else
					$hibauzenet.="Sikertelen feltöltés! Hiba az adatbázis kapcsolatnál!";
			}
			else
			{
				$hibauzenet.="Sikertelen feltöltés! Nem megfelelően lett megadva az elérési útvonal, vagy a fájl neve!" ;
			}
		}
		else
			$hibauzenet.="Sikertelen feltöltés!";
	}
?>
<br>
<div id="upload">
	<h1 id="upload">Tölts fel fájlokat a mentoráltjaidnak!</h1>
	<form id="uploadForm" enctype="multipart/form-data" method="post" action="#">
		<div class="form-group">
			<label>Add meg a segédanyag címét: </label>
			<input type="text" name="filename" id="filename" placeholder="Fájl címe..."><br>
			Fájl feltöltése:
			<label class="btn btn-primary btn-file">
				Tallózás <input type="file" name="fileToUpload" id="fileToUpload" >
			</label>
		</div>
		<input type="submit" name="submit" value="Feltöltés" class="btn btn-info">
		<br>
		<span id="hibauzenet"><?php echo $hibauzenet;?></span>
	</form>
</div>
