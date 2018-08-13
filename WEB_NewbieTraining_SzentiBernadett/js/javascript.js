$(document).ready(function(){
	//dátum ellenőrzése oktatasokatkiir.php fájl alján
	$(".datum").keyup(function(){
		var patternDatum=/^[1-9][0-9]{3}\-[0-1][0-9]\-[0-3][0-9]$/;
		var input=$(this).val();
		if(!input.match(patternDatum))
		{
			$("#hibadatum").text("Nem megfelelő formátum (ÉÉÉÉ-HH-NN)");
		}
		else
		{
			$("#hibadatum").text("");
		}
	});
	
	//checkboxok ellenőrzése oktatasokatkiir.php fájlban, amikor kijelöljük a mentoráltakat, akiket oktatásra szeretnénk küldeni
	$("button#datum").click(function(){
		var checked=[];
		var datum=$("input#datum").val();
		var patternDatum=/^[1-9][0-9]{3}\-[0-1][0-9]\-[0-3][0-9]$/;
		$("input[name='oktatas']:checked").each(function(){
			checked.push($(this).val());
		});
		var jsonString=JSON.stringify(checked);
		if(checked.length==0)
		{
			$("#hibacheckbox").text("Nem jelölt ki egy operátort sem!");
		}
		else if(datum=="")
		{
			$("#hibacheckbox").text("Nem adott meg dátumot!");
		}
		else if(!datum.match(patternDatum))
		{
			$("#hibacheckbox").text("Nem megfelelő a dátum formátuma!");
		}
		else
		{
			//csak akkor küldi el a szerver oldalnak az adatokat, ha az adatbevitel kliens oldalon rendben van
			$("#hibacheckbox").text("");
			$.ajax({
				url:"php/kiiroktatas.php",
				method:"post",
				dataType:"text",
				data:{checked:jsonString, datum:datum},
				success:function(adat){
					$("#content").html(adat);
				}
			});
		}
	});
	
	//ellenőrzi az e-mail cím formátumát a modositadatokat.php fájlban
	$("input#email").keyup(function(){
		var input=$(this).val();
		var patternEmail=/^[a-zA-Z0-9_.\-+]+@[a-zA-Z0-9-]+\.[a-z]+$/;
		if(!input.match(patternEmail))
		{
			$("#hibauzenetEmail").text("Nem megfelelő az e-mail formátuma! (pl. valami@email.cim)");
		}
		else
			$("#hibauzenetEmail").text("");
	});
	
	//ellenőrzi a mobil formátumát a modositadatokat.php fájlban
	$("input#mobil").keyup(function(){
		var input=$(this).val();
		var patternMobil=/^[+]36[237]0[1-9]\d{6}$/;
		if(!input.match(patternMobil))
		{
			$("#hibauzenetMobil").text("Nem megfelelő a mobilszám formátuma! (pl. +36301234567)");
		}
		else
			$("#hibauzenetMobil").text("");
	});
	
	$("button#save").click(function(){
		var patternMobil=/^[+]36[237]0[1-9]\d{6}$/;
		var patternEmail=/^[a-zA-Z0-9_.\-+]+@[a-zA-Z0-9-]+\.[a-z]+$/;
		var mobil=$("#mobil").val();
		var email=$("#email").val();
		
		if(email=="" || mobil=="")
		{
			$("#mentesUzenet").text("Nem lehet üresen elmenteni az adatokat!");
		}
		else if(!email.match(patternEmail))
		{
			$("#mentesUzenet").text("Nem megfelelő formátumú e-mail cím esetén nem menthetőek el az adatok!");
		}
		else if(!mobil.match(patternMobil))
		{
			$("#mentesUzenet").text("Nem megfelelő formátumú mobilszám esetén nem menthetőek el az adatok!");
		}
		else
		{
			//csak akkor küldi el a szerver oldalnak az adatokat, ha az adatbevitel kliens oldalon rendben van
			$("#mentesUzenet").text("");
			$.ajax({
				url:"php/modositSzemelyesAdatok.php",
				method:"post",
				dataType:"text",
				data:{mobil:mobil, email:email},
				success: function(adat){
					$("#mentesUzenet").html(adat);
					$("#mentesUzenet").css("color", "green");
				}
			});
		}
	});
	
	$("button#savePass").click(function(){
		var oldPass=$("input#oldPass").val();
		var newPass=$("input#newPass").val();
		var newPassConf=$("input#newPassConf").val();
		if(oldPass=="" || newPass=="" || newPassConf=="")
			$("#mentesUzenetJelszo").text("Nincs minden mező kitöltve!");
		else if(newPass!=newPassConf)
			$("#mentesUzenetJelszo").text("Nem egyezik az új jelszó és az új jelszó megerősítése!");
		else
		{
			//csak akkor küldi el az adatokat a szerver oldalnak, ha megegyezik a felhasználó által megadott jelszó és jelszó megerősítése mező
			$.ajax({
				url:"php/modositJelszot.php",
				method:"post",
				dataType:"text",
				data:{oldPass:oldPass, newPass:newPass, newPassConf:newPassConf},
				success: function(adat){
					$("#mentesUzenetJelszo").html(adat);
					if(adat.indexOf("Sikeres")>=0)
						$("#mentesUzenetJelszo").css("color", "green");
				}
			});
		}
	});

});

//regex
//^[+]36[237]0[1-9]\d{6} Mobilszám
//[A-ZÍŰÁÉÚŐÓÜÖ][a-zíűáéúőóüö]+(\-|\s)[A-ZÍŰÁÉÚŐÓÜÖ][a-zíűáéúőóüö]+(\s[A-ZÍŰÁÉÚŐÓÜÖ][a-zíűáéúőóüö]+)* Névhez
//[a-zA-Z0-9_.\-+]+@[a-zA-Z0-9-]+\.[a-z]+ emailhez
//[1-9][0-9]{3}\-[0-1][0-9]\-[0-9]{2} dátumhoz