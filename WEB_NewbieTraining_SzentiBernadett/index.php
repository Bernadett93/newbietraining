<?php
	//BEJELENTKEZŐ FELÜLET
	error_reporting(0);
	require_once("php/belepes.php");
	require_once("php/functions.php");
	kiirHeader();
?>
<body>
	<div class="container">
		<div class="jumbotron" id="loginWindow">
			<h1 id="trainingLogin">Newbie Training</h1>
			<img src="kepek/logo.png" id="logo">
			<form action="index.php" method="post">
				<div class="form-group">
					<label for="login"> Felhasználónév </label>
					<input type="text" class="form-control" id="login" name="login">
				</div>
				<div class="form-group">
					<label for="pwd">Jelszó </label>
					<input type="password" class="form-control" id="pwd" name="password">
				</div>
				<p>
					<span id="hibauzenet"><?php 
						if(isset($_POST['submit']))
						{
							if(!$belepes)
							{
								$hibauzenet="Sikertelen belépés!";
								if(!$csatlakozas)
									$hibauzenet.=" A csatlakozás nem volt sikeres!";
								echo $hibauzenet;
							}
						}
					?> </span>
				</p>
				<button type="submit" class="btn btn-primary" id="signin" name="submit">Belépés</button>
			</form>
		</div>
	</div>
</body>
</html>