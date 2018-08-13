<?php
	error_reporting(0);
	require_once("../connect.php");
	session_start();
	if (isset($_POST["checked"]) && isset($_POST["datum"]))
	{
		//amit az ajax átküldött, azt megfelelő formátumba szedi
		//ez a bejelölt négyzeteket jelöli, ahányat bejelölt a mentor, annyi operátornak vinne fel oktatást
		$checked=$_POST["checked"];
		$checked=str_replace("[", "", $checked);
		$checked=str_replace("]", "", $checked);
		$checked=str_replace('"', "", $checked);
		
		//tömböt képez, vesszőknél tördeli a stringet
		$checkedPieces=explode(",", $checked);
		$mentorid=$_SESSION["uid"];
		$datum=$_POST["datum"];
		for($i=0; $i<sizeof($checkedPieces);$i++)
		{
			//miután a vesszőnél tördelte, 15+2 formátumba jöttek létre stringek
			//15 ID-jú operátor a 2 ID-jú kompetenciára lett kiírva, ezért a + jelek alapján is tördeli a tömb elemeit
			//majd beállítja megfelelő változónak, végül adatbázishoz hozzáadja
			$seged=explode("+", $checkedPieces[$i]);
			$operatorId=$seged[0];
			$kompetenciaId=$seged[1];
			
			$sql="INSERT INTO oktatasok(mentor_id, oper_id, datum, komp_id) ".
			" VALUES($mentorid, $operatorId, '$datum', $kompetenciaId)";
			$result=mysqli_query($link, $sql);
			if(!$result)
				echo "Hiba történt!";
			else
			{
				//itt írja ki a sikeres rögzítést, adott operátorra, adott kompetenciára
				$sql2="SELECT nev FROM dolgozo WHERE id=$operatorId";
				$result2=mysqli_query($link, $sql2);
				while($row=mysqli_fetch_array($result2))
					$operatorNev=$row['nev'];
				
				$sql3="SELECT nev FROM osszes_kompetencia WHERE id=$kompetenciaId";
				$result3=mysqli_query($link, $sql3);
				while($row=mysqli_fetch_array($result3))
					$kompetenciaNev=$row['nev'];
				
				echo "Sikeresen rögzítette ".$operatorNev." nevű operátornak ".$datum." időpontra az oktatást. Témakör: ".$kompetenciaNev.". <br>";
				
			}
		}
	}
	else
		echo "Nem sikerült";
	
?>