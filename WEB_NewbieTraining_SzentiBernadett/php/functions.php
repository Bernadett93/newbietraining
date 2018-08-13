<?php
	error_reporting(0);
	#region a header és a menü kiírása	
	function kiirHeader()
	{
		//beállítja változókba a CSS fájlok nevét (elérési útvonalát)
		$header=file_get_contents("html/header.html");
		$filename=basename($_SERVER["SCRIPT_FILENAME"], ".php");
		$belepes="css/belepes.css";
		$kezdooldal="css/kezdooldal.css";
		$szemelyesadatlap="css/szemelyesadatlap.css";
		$segedanyagok="css/segedanyagok.css";
		$mentoraltak="css/mentoraltak.css";
		$oktatasok="css/oktatasokOperator.css";
		
		//ellenőrzi az aktuálisan nyitott fájl nevét, és annak függvényében átállítve a header.html fájlban a CSS fájl nevét, hogy ne akadjanak össze
		if (!strcmp($filename, "index"))
		{
			$header=str_replace("::header", $belepes, $header);
		}
		else if(!strcmp($filename, "kezdooldal"))
		{
			$header=str_replace("::header", $kezdooldal, $header);
		}
		else if(!strcmp($filename, "szemelyesadatlap") || !strcmp($filename, "modositadatokat") || !strcmp($filename, "modositjelszot"))
		{
			$header=str_replace("::header", $szemelyesadatlap, $header);
		}
		else if(!strcmp($filename, "segedanyagokHelpdesk") || !strcmp($filename, "segedanyagokOtthoni") || !strcmp($filename, "segedanyagokMobil"))
		{
			$header=str_replace("::header", $segedanyagok, $header);
		}
		else if(!strcmp($filename, "mentoraltak") || !strcmp($filename, "oktatasokatkiir"))
		{
			$header=str_replace("::header", $mentoraltak, $header);
		}
		else if(!strcmp($filename, "operatorOktatasok"))
		{
			$header=str_replace("::header", $oktatasok, $header);
		}
		echo $header;
	}
	function kiirMenu()
	{
		//a menu.html egy változóban van tárolva, és annak függvényében hogy operátor vagy mentor van bejelentkezve, változtatja a tartalmat
		$menu=file_get_contents("html/menu.html");
		if($_SESSION['pozicio']=="Operátor")
		{
			$menu=str_replace("::menu", getOperatorMenu(), $menu);
		}
		else
		{
			$menu=str_replace("::menu", getMentorMenu(), $menu);
		}
		echo $menu;
	}
	#endregion
	
	#region Belépés utáni kezdőoldal és a kép nézegető ezen a felületen
	function kiirCarousel()
	{
		$carousel=file_get_contents("html/carousel.html");
		echo $carousel;
	}
	function kiirKezdooldal()
	{
		$kezdooldal_bevezeto=file_get_contents("html/kezdooldal_bevezeto.html");
		if($_SESSION['pozicio']=="Operátor")
		{
			$kezdooldal_bevezeto=str_replace("::bevezeto", getOperatorBevezeto(), $kezdooldal_bevezeto);
		}
		else
		{
			$kezdooldal_bevezeto=str_replace("::bevezeto", getMentorBevezeto(), $kezdooldal_bevezeto);
			
		}
		echo $kezdooldal_bevezeto;
	}
	#endregion
	#region személyes adatlaphoz szükséges függvények
	
	//aktuális e-mail címet visszaad input placeholdernek
	function visszaadDolgozoEmailjet($link)
	{
		$uid=$_SESSION['uid'];
		$sql="SELECT email FROM dolgozo WHERE id='$uid'";
		$result=mysqli_query($link, $sql);
		$row=mysqli_fetch_array($result);
		$emailAktualis=$row['email'];
		return "placeholder='".$emailAktualis."'";
	}
	
	//aktuális mobil számot visszaad input placeholdernek
	function visszaadDolgozoMobiljat($link)
	{
		$uid=$_SESSION['uid'];
		$sql="SELECT mobilszam FROM dolgozo WHERE id='$uid'";
		$result=mysqli_query($link, $sql);
		$row=mysqli_fetch_array($result);
		$mobilAktualis=$row['mobilszam'];
		return " placeholder='".$mobilAktualis."'";
	}
	
	//táblázatban kiírja a személyes adatlapot
	function kiirSzemelyesAdatlap($link)
	{
		$uid=$_SESSION['uid'];
		$sql="SELECT * FROM dolgozo WHERE id='$uid'";
		$result=mysqli_query($link, $sql);
		$tablazat="<div class='container'><table class='table table-striped'>";
		if(!mysqli_errno($link))
		{
			while($row=mysqli_fetch_array($result))
			{
				$tablazat.="<tr class='info'><th>Név</th>";
				$tablazat.="<td>".$row['nev']."</td></tr>";
				
				$tablazat.="<tr><th>Születési idő</th>";
				$tablazat.="<td>".$row['szuletesi_ido']."</td></tr>";
				
				$tablazat.="<tr class='info'><th>Születési hely</th>";
				$tablazat.="<td>".$row['szuletesi_hely']."</td></tr>";
				
				$tablazat.="<tr class='info'><th>Mobilszám</th>";
				$tablazat.="<td id='mobilTD'>".$row['mobilszam']."</td></tr>";
				
				$tablazat.="<tr class='info'><th>E-mail</th>";
				$tablazat.="<td id='emailTD'>".$row['email']."</td></tr>";
				
				$tablazat.="<tr><th>Belépés kezdete</th>";
				$tablazat.="<td>".$row['belepes_kezdete']."</td></tr>";
				
				$tablazat.="<tr class='danger'><th>Pozíció</th>";
				$tablazat.="<td>".$row['pozicio']."</td></tr>";
				
				$teruletid=$row['terulet_id'];
				$sql2="SELECT nev FROM terulet WHERE id=$teruletid";
				$result2=mysqli_query($link, $sql2);
				$tablazat.="<tr><th>Terület</th>";
				$tablazat.="<td>".mysqli_fetch_array($result2)['nev']."</td></tr>";
				
			}
			$tablazat.="</table></div>";
			echo $tablazat;
		}
	}
	#endregion
	
	//segédanyagok oldalhoz üdvözlés
	function kiirUdvozles($link)
	{
		$pozicio=$_SESSION['pozicio'];
		if($pozicio=="Operátor")
			echo getOperatorSegedanyag($link);
		else if($pozicio=="Mentor")
			echo getMentorSegedanyag($link);
		else
			echo "Nincs jogosultsága megtekinteni a segédanyagokat!";
	}
	#region getterek(bevezeto, menu, segedanyag)
	function getMentorBevezeto()
	{
		$segedanyagok="";
		if($_SESSION["teruletid"]==1)
			$segedanyagok="segedanyagokHelpdesk.php";
		else if($_SESSION["teruletid"]==2)
			$segedanyagok="segedanyagokOtthoni.php";
		else if($_SESSION["teruletid"]==3)
			$segedanyagok="segedanyagokMobil.php";
		$mentor_bevezeto='<article>
		<header>Személyes adatlap</header>
		<p>Tekintsd meg személyes adatlapod, elérhetőséged, belépésed dátumát!</p>
		<form action="szemelyesadatlap.php">
			<button type="submit" class="btn btn-info">Tovább</button>
		</form>
	</article>
	<article>
		<header>Mentoráltak megjelenítése</header>
		<p>Tekintsd meg a neveden lévő operátorok adatait, oktatásait!</p>
		<form action="mentoraltak.php">
			<button type="submit" class="btn btn-info">Tovább</button>
		</form>
	</article>
	<article>
		<header>Oktatások kiírása</header>
		<p>Nézd meg, a mentoráltjaid közül ki nem volt oktatáson és jelenítsd meg számukra az oktatások időpontját!</p>
		<form action="oktatasokatkiir.php">
			<button type="submit" class="btn btn-info">Tovább</button>
		</form>
	</article>
	<article>
		<header>Segédanyagok</header>
		<p>Itt tudsz a mentoráltjaidnak újabb segédanyagokat feltölteni!</p>
		<form action="'.$segedanyagok.'">
			<button type="submit" class="btn btn-info">Tovább</button>
		</form>
	</article>';
		return $mentor_bevezeto;
	}
	function getOperatorBevezeto()
	{
		$segedanyagok="";
		if($_SESSION["teruletid"]==1)
			$segedanyagok="segedanyagokHelpdesk.php";
		else if($_SESSION["teruletid"]==2)
			$segedanyagok="segedanyagokOtthoni.php";
		else if($_SESSION["teruletid"]==3)
			$segedanyagok="segedanyagokMobil.php";
		$operator_bevezeto='<article>
		<header>Személyes adatlap</header>
		<p>Tekintsd meg személyes adatlapod, elérhetőséged, belépésed dátumát és a mentorod!</p>
		<form action="szemelyesadatlap.php">
			<button type="submit" class="btn btn-info">Tovább</button>
		</form>
	</article>
	<article>
		<header>Oktatások</header>
		<p>Itt tudod megtekinteni az oktatásaidat, amik lesznek, vagy amiket már teljesítettél!</p>
		<form action="operatorOktatasok.php">
			<button type="submit" class="btn btn-info">Tovább</button>
		</form>
	</article>
	<article>
		<header>Segédanyagok</header>
		<p>Töltsd le a számodra szükséges segédanyagokat, hogy tudd teljesíteni az oktatásokat!</p>
		<form action="'.$segedanyagok.'">
			<button type="submit" class="btn btn-info">Tovább</button>
		</form>
	</article>';
		return $operator_bevezeto;
	}
	
	function getMentorMenu()
	{
		$mentorMenu='<li class="nav-item">
				<a class="nav-link" href="szemelyesadatlap.php">Személyes adatlap </a>
			</li>
				
			<li class="nav-item">
				<a class="nav-link" href="mentoraltak.php">Mentoráltak</a>
			</li>
				
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle"  data-toggle="dropdown">
				Segédanyagok szerkesztése
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="segedanyagokHelpdesk.php">Helpdesk</a>
					<a class="dropdown-item" href="segedanyagokMobil.php">Mobil </a>
					<a class="dropdown-item" href="segedanyagokOtthoni.php">Otthoni</a>
				</div>
			</li>';
		return $mentorMenu;
	}
	
	function getOperatorMenu()
	{
		$operatorMenu='<li class="nav-item">
				<a class="nav-link" href="szemelyesadatlap.php">Személyes adatlap </a>
			</li>
				
			<li class="nav-item">
				<a class="nav-link" href="operatorOktatasok.php">Oktatások</a>
			</li>
				
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle"  data-toggle="dropdown">
				Segédanyagok
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="segedanyagokHelpdesk.php">Helpdesk</a>
					<a class="dropdown-item" href="segedanyagokMobil.php">Mobil </a>
					<a class="dropdown-item" href="segedanyagokOtthoni.php">Otthoni</a>
				</div>
			</li>';
		return $operatorMenu;
	}
	
	function getOperatorSegedanyag($link)
	{
		$operatorSegedanyag="<h1 id='udvozles'>Kedves ";
		$uid=$_SESSION['uid'];
		$sql="SELECT nev FROM dolgozo WHERE id='$uid'";
		$result=mysqli_query($link, $sql);
		while($row=mysqli_fetch_array($result))
			$operatorSegedanyag.=$row['nev'];
		$operatorSegedanyag.="! <br>";
		$operatorSegedanyag.="Itt tudod megtekinteni az oktatásokhoz szükséges segédanyagokat.</h1>";
		return $operatorSegedanyag;
	}
	
	function getMentorSegedanyag($link)
	{
		$mentorSegedanyag="<h1 id='udvozles'>Kedves ";
		$uid=$_SESSION['uid'];
		$sql="SELECT nev FROM dolgozo WHERE id='$uid'";
		$result=mysqli_query($link, $sql);
		while($row=mysqli_fetch_array($result))
			$mentorSegedanyag.=$row['nev'];
		$mentorSegedanyag.="!<br>";
		$mentorSegedanyag.=" Meg tudod tekinteni a segédanyagokat és újakat tudsz feltölteni a mentoráltjaid számára!</h1>";
		return $mentorSegedanyag;
	}
	#endregion
	
	//személyre szóló üdvözlésekhez
	function kiirNevet($link)
	{
		$uid=$_SESSION['uid'];
		$sql="SELECT nev FROM dolgozo WHERE id='$uid'";
		$result=mysqli_query($link, $sql);
		if(!mysqli_errno($link))
		{
			echo mysqli_fetch_array($result)['nev'];
		}
	}
	
	//visszaad tömböt mentor mentoráltjainak ID-jával
	function getMentoraltakIdOsszes($link)
	{
		$uid=$_SESSION['uid'];
		$sql="SELECT oper_id FROM ment_oper_kapcs WHERE mentor_id=$uid";
		$result=mysqli_query($link, $sql);
		$operidk=array();
		//Operátor ID-k akik  mentorhoz tartoznak
		while($row=mysqli_fetch_array($result))
		{
			array_push($operidk, $row['oper_id']);
		}
		return $operidk;
	}
	
	//visszaad tömböt mentor mentoráltjainak ID-jával választott belépés kezdete alapján
	function getMentoraltakIdDatumszerint($datum, $link)
	{
		$uid=$_SESSION['uid'];
		$sql="SELECT oper_id FROM ment_oper_kapcs, dolgozo WHERE ment_oper_kapcs.mentor_id=$uid AND dolgozo.id=ment_oper_kapcs.oper_id AND dolgozo.belepes_kezdete='".$datum."'";
		$result=mysqli_query($link, $sql);
		$operidkDatumszerint=array();
		//Operátor ID-k akik  mentorhoz tartoznak adott belépési dátummal
		while($row=mysqli_fetch_array($result))
		{
			array_push($operidkDatumszerint, $row['oper_id']);
		}
		return $operidkDatumszerint;
	}
	
	//visszaad tömböt mentor mentoráltjainak ID-jával választott kompetencia alapján
	function getMentoraltakIdOktatasszerint($link)
	{
		$uid=$_SESSION["uid"];
		$sql="SELECT DISTINCT dolgozo_id FROM kompetenciak_teljesitese, ment_oper_kapcs WHERE kompetenciak_teljesitese.teljesitve=0 AND ment_oper_kapcs.oper_id=kompetenciak_teljesitese.dolgozo_id AND ment_oper_kapcs.mentor_id=$uid";
		$result=mysqli_query($link, $sql);
		$operidkOktatasszerint=array();
		while($row=mysqli_fetch_array($result))
		{
			array_push($operidkOktatasszerint, $row['dolgozo_id']);
		}
		return $operidkOktatasszerint;
	}
	
	//a mentoráltak belépésének kezdete alapján feltölti a comboboxot
	function feltoltComboboxDatummal($link)
	{
		$operidk=getMentoraltakIdOsszes($link);
		$datum=array();
		$combobox="<select name='belepeskezdete'>";
		$combobox.="<option value='mind'>Mind</option>";
		for($i=0; $i<sizeof($operidk);$i++)
		{
			$sql="SELECT DISTINCT belepes_kezdete FROM dolgozo WHERE id=$operidk[$i]";
			$result=mysqli_query($link, $sql);
			while($row=mysqli_fetch_array($result))
			{
				if(!in_array($row['belepes_kezdete'], $datum))
				{
					array_push($datum, $row['belepes_kezdete']);
					$combobox.="<option value='".$row['belepes_kezdete']."'>".$row['belepes_kezdete']."</option>";
				}
			}
		}
		
		$combobox.="</select>";
		echo $combobox;
	}
	
	//a mentoráltak kompetenciái alapján feltölti a comboboxot
	function feltoltComboboxKompetenciakkal($link)
	{
		$teruletid=$_SESSION['teruletid'];
		$sql="SELECT nev, id FROM osszes_kompetencia WHERE terulet_id=$teruletid";
		$combobox="<select name='kompetenciak'>";
		$combobox.="<option value='mind'>Mind</option>";
		$result=mysqli_query($link, $sql);
		while($row=mysqli_fetch_array($result))
		{
			$combobox.="<option value='".$row['id']."'>".$row['nev']."</option>";
		}
		$combobox.="</select>";
		echo $combobox;
	}
	
	//táblázatban visszaadja a mentoráltakat kompetenciákkal együtt
	function kiirMentoraltakat($link)
	{
		$operidk=getMentoraltakIdOsszes($link);
		$table="<div class='container'><table class='table table-striped'>";
		
		for($i=0; $i<sizeof($operidk);$i++)
		{
			$sql="SELECT nev, belepes_kezdete FROM dolgozo WHERE id='$operidk[$i]'";
			$result=mysqli_query($link, $sql);
			while($row=mysqli_fetch_array($result))
			{
				$table.="<tr><th colspan='3' style='text-align: center'>".$row['nev']."<br>".$row['belepes_kezdete']."</th></tr>";
			}
			$sql="SELECT DISTINCT osszes_kompetencia.nev, kompetenciak_teljesitese.teljesitve FROM dolgozo, osszes_kompetencia, kompetenciak_teljesitese WHERE dolgozo.id=$operidk[$i] AND dolgozo.terulet_id=osszes_kompetencia.terulet_id AND osszes_kompetencia.id=kompetenciak_teljesitese.kompetencia_id AND dolgozo.id=kompetenciak_teljesitese.dolgozo_id";
			$result=mysqli_query($link, $sql);
			while($row=mysqli_fetch_array($result))
			{
				$table.="<tr>";
				$table.="<td>".$row['nev']."</td>";
				if($row['teljesitve'])
				{
					$table.="<td style='color: green'>&#10004;</td>";
				}
				else
				{
					$table.="<td style='color: red'>Oktatásra vár<br>";
				}
				$table.="</tr>";
			}
		}
		$table.="</table></div>";
		echo $table;
	}
	
	//mentoráltakat kiír táblázatban választott dátum alapján
	function kiirMentoraltakDatumalapjan($datum, $link)
	{
		$operidkDatumszerint=getMentoraltakIdDatumszerint($datum, $link);
		$table="<div class='container'><table class='table table-striped'>";
		
		for($i=0; $i<sizeof($operidkDatumszerint);$i++)
		{
			$sql="SELECT nev, belepes_kezdete FROM dolgozo WHERE id='$operidkDatumszerint[$i]'";
			$result=mysqli_query($link, $sql);
			while($row=mysqli_fetch_array($result))
			{
				$table.="<tr><th colspan='3' style='text-align: center'>".$row['nev']."<br>".$row['belepes_kezdete']."</th></tr>";
			}
			$sql="SELECT DISTINCT osszes_kompetencia.nev, kompetenciak_teljesitese.teljesitve FROM dolgozo, osszes_kompetencia, kompetenciak_teljesitese WHERE dolgozo.id=$operidkDatumszerint[$i] AND dolgozo.terulet_id=osszes_kompetencia.terulet_id AND osszes_kompetencia.id=kompetenciak_teljesitese.kompetencia_id AND dolgozo.id=kompetenciak_teljesitese.dolgozo_id";
			$result=mysqli_query($link, $sql);
			while($row=mysqli_fetch_array($result))
			{
				$table.="<tr>";
				$table.="<td>".$row['nev']."</td>";
				if($row['teljesitve'])
				{
					$table.="<td style='color: green'>&#10004;</td>";
				}
				else
				{
					$table.="<td style='color: red'>Oktatásra vár<br>";
				}
				$table.="</tr>";
			}
		}
		$table.="</table></div>";
		echo $table;
	}
	
	//mentoráltakat kiír táblázatban oktatások megjelenítésével
	function kiirMentoraltakOktatasokAlapjan($link)
	{
		$operidk=getMentoraltakIdOktatasszerint($link);
		$table="<div class='container'><table class='table table-striped'>";
		
		for($i=0; $i<sizeof($operidk);$i++)
		{
			$sql="SELECT nev, belepes_kezdete FROM dolgozo WHERE id='$operidk[$i]'";
			$result=mysqli_query($link, $sql);
			while($row=mysqli_fetch_array($result))
			{
				$table.="<tr><th colspan='3' style='text-align: center'>".$row['nev']."<br>".$row['belepes_kezdete']."</th></tr>";
			}
			$sql="SELECT DISTINCT osszes_kompetencia.nev, osszes_kompetencia.id, kompetenciak_teljesitese.teljesitve, kompetenciak_teljesitese.dolgozo_id, kompetenciak_teljesitese.kompetencia_id FROM dolgozo, osszes_kompetencia, kompetenciak_teljesitese WHERE dolgozo.id=$operidk[$i] AND dolgozo.terulet_id=osszes_kompetencia.terulet_id AND osszes_kompetencia.id=kompetenciak_teljesitese.kompetencia_id AND dolgozo.id=kompetenciak_teljesitese.dolgozo_id";
			$result=mysqli_query($link, $sql);
			while($row=mysqli_fetch_array($result))
			{
				$table.="<tr>";
				$table.="<td>".$row['nev']."</td>";
				if($row['teljesitve'])
				{
					$sql2="SELECT oktatasok.datum, oktatasok.oper_id, oktatasok.komp_id FROM oktatasok WHERE oktatasok.komp_id=".$row['kompetencia_id']." AND oktatasok.oper_id=".$operidk[$i];
					$result2=mysqli_query($link, $sql2);
					$row2=mysqli_fetch_array($result2);
					$table.="<td style='color: green'>&#10004;<br>".$row2["datum"]."</td>";
				}
				else
				{
					$sql2="SELECT oktatasok.datum, oktatasok.oper_id, oktatasok.komp_id FROM oktatasok WHERE oktatasok.komp_id=".$row['kompetencia_id']." AND oktatasok.oper_id=".$operidk[$i];
					$result2=mysqli_query($link, $sql2);
					if(mysqli_num_rows($result2))
					{
						$row2=mysqli_fetch_array($result2);
						$table.="<td style='color: orange'>Oktatásra vár<br>".$row2['datum']."</td>";
					}
					else
					{
						$table.="<td style='color: red'>Oktatásra vár<br>";
						$table.="<input type='checkbox' name='oktatas' value='".$row['dolgozo_id']."+".$row['kompetencia_id']."' id='oktatas'></td>";
					}
				}
				$table.="</tr>";
			}
		}
		$table.="</table></div>";
		echo $table;
	}
	
	//mentoráltakat kiír táblázatban oktatások megjelenítésével kompetenciák szerint
	function kiirMentoraltakOktatasokKompetenciakAlapjan($kompetencia, $link)
	{
		$operidk=getMentoraltakIdOktatasszerint($link);
		$table="<div class='container'><table class='table table-striped'>";
		
		for($i=0; $i<sizeof($operidk);$i++)
		{
			$sql="SELECT nev, belepes_kezdete FROM dolgozo WHERE id='$operidk[$i]'";
			$result=mysqli_query($link, $sql);
			while($row=mysqli_fetch_array($result))
			{
				$table.="<tr><th colspan='3' style='text-align: center'>".$row['nev']."<br>".$row['belepes_kezdete']."</th></tr>";
			}
			$sql="SELECT DISTINCT osszes_kompetencia.nev, osszes_kompetencia.id, kompetenciak_teljesitese.teljesitve, kompetenciak_teljesitese.dolgozo_id, kompetenciak_teljesitese.kompetencia_id FROM dolgozo, osszes_kompetencia, kompetenciak_teljesitese WHERE dolgozo.id=$operidk[$i] AND dolgozo.terulet_id=osszes_kompetencia.terulet_id AND osszes_kompetencia.id=kompetenciak_teljesitese.kompetencia_id AND dolgozo.id=kompetenciak_teljesitese.dolgozo_id AND kompetenciak_teljesitese.kompetencia_id=$kompetencia";
			$result=mysqli_query($link, $sql);
			while($row=mysqli_fetch_array($result))
			{
				$table.="<tr>";
				$table.="<td>".$row['nev']."</td>";
				if($row['teljesitve'])
				{
					$table.="<td style='color: green'>&#10004;</td>";
					$table.="<td></td>";
				}
				else
				{
					$sql2="SELECT oktatasok.datum, oktatasok.oper_id, oktatasok.komp_id FROM oktatasok WHERE oktatasok.komp_id=".$row['kompetencia_id']." AND oktatasok.oper_id=".$operidk[$i];
					$result2=mysqli_query($link, $sql2);
					if(mysqli_num_rows($result2))
					{
						$row2=mysqli_fetch_array($result2);
						$table.="<td style='color: orange'>Oktatásra vár<br>".$row2['datum']."</td>";
					}
					else
					{
						$table.="<td style='color: red'>Oktatásra vár<br>";
						$table.="<input type='checkbox' name='oktatas' value='".$row['dolgozo_id']."+".$row['kompetencia_id']."' id='oktatas'></td>";
					}
				}
				$table.="</tr>";
			}
		}
		$table.="</table></div>";
		echo $table;
	}
	
	//operátornak kiírja az összes oktatásokat
	function kiirOperatornakOktatasokat($link)
	{
		$table="<div class='container'><table class='table table-striped'>";
		$sql="SELECT nev, belepes_kezdete FROM dolgozo WHERE id=".$_SESSION['uid'];
		$result=mysqli_query($link, $sql);
		$row=mysqli_fetch_array($result);
		$table.="<tr><th colspan='2' style='text-align: center'>".$row['nev']."<br>".$row['belepes_kezdete']."</th></tr>";
		
		$sql2="SELECT DISTINCT osszes_kompetencia.nev, osszes_kompetencia.id FROM osszes_kompetencia, kompetenciak_teljesitese WHERE osszes_kompetencia.id=kompetenciak_teljesitese.kompetencia_id AND kompetenciak_teljesitese.dolgozo_id=".$_SESSION["uid"];
		$result2=mysqli_query($link, $sql2);
		while($row2=mysqli_fetch_array($result2))
		{
			$table.="<tr><td>".$row2['nev']."</td>";
			$sql3="SELECT oktatasok.datum FROM oktatasok, dolgozo WHERE dolgozo.id=".$_SESSION["uid"]." AND dolgozo.id=oktatasok.oper_id AND oktatasok.komp_id=".$row2['id'];
			$result3=mysqli_query($link, $sql3);
			if(mysqli_num_rows($result3))
			{
				$row3=mysqli_fetch_array($result3);
				$table.="<td>".$row3['datum']."</td></tr>";
			}
			else
				$table.="<td style='color: red'>Időpontra vár</td></tr>";
			
		}
		$table.="</table></div>";
		echo $table;
	}
?>
