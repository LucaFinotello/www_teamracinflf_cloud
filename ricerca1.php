<?php
	session_start();
	include("db_con.php");
include_once('mysql-fix.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//Dtd XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/Dtd/xhtml1-strict.dtd">
<html>
	<head>
		<title>Circuiti- Team rancing</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="title" content="" />
		<meta name="description" content="Home page del sito del progetto" />
		<meta name="keywords" content="team-racing" />
		<meta name="language" content="italian it" />
		<meta name="author" content="" />
		<link href="style.css" rel="stylesheet" type="text/css" media="screen"/>
		<link href="https://fonts.googleapis.com/css?family=Montserrat%7cMontserrat+Subrayada%7cIndie+Flower" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Fredoka+One|Shadows+Into+Light+Two|Cherry+Cream+Soda|Cinzel+Decorative" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="immagini/favicon.ico" type="image/x-icon"/>
    </head>
	<body>
	<div id="header">
		<h1>Team racing Luca & c.</h1>
	</div>
		<div id="main">
			<div id="menu"> 
				<ul>
					<li><a href="home1.php">Home</a></li>
					<li><a href="classifica.php">Classifica</a></li>
					<li><a href="news.php">News</a></li>
					<li>Circuiti</li>
					<li><a href="contatti.php">Contatti</a></li>
				</ul>
			</div>
		<div id="contenuto">
			<span id="path">Ti trovi in: <a href="home1.php">Home</a> &#187; Circuiti</span>
			<div class="container">
			<div class="menu1">
				<ul>
					<li><a href="#"><?php echo $_SESSION['username'];
									$q = mysqli_query($conn,"SELECT * FROM clienti WHERE username = '".$_SESSION['username']."'");
						?></a>
					   <ul>
							<li><a href="profilo.php">Modifica profilo</a></li>
							<li><a href="modifica.php">Modifica password</a></li>
							<li><a href="elimina.php">Elimina account</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
			</div>
			<div id="field">
				<form action="ricerca1.php" method="POST">
					<fieldset>
						<legend>ricerca circuito</legend>
						Circuito: <input name="circuito" type="text" value=""/>
						Stato: <input name="stato" type="text" value=""/>
						Paese: <input name="paese" type="text" value=""/>
						<input type="submit" name="invia" value="invia">
					</fieldset>
				</form>
				<?php
			$circuito= $_POST["circuito"];
			$stato= $_POST["stato"];
			$paese= $_POST["paese"];
			$strsql = "select * from circuiti where circuito='$circuito' or stato='$stato' or paese='$paese'";
			$risultato = mysqli_query($conn, $strsql);
			if (! $risultato)
			  {
			   echo "Errore nel comando SQL" . "<br>";
			  }
			$riga = mysqli_fetch_array($risultato);
			if (! $riga)
				  {
				   echo "nessun circuito inserito";
				  }
				else
				{
			     while ($riga)
					{
						echo "<form action='dettagli1.php' method='POST'>";
						echo "<div class='Box_Contenitore'><h2>".$riga["circuito"]."</h2>";
						echo "<input readonly name='id' type='text' value=".$riga["id"]." hidden='false'>";
						echo "<img src='immagini/".$riga["immagine"]."' alt='".$riga["immagine"]."'>";
						echo "<input type='submit' name='dettagli' value='dettagli' /></div>";
						echo "</form>";
						$riga = mysqli_fetch_array($risultato);
					}
				}
				?>
				</div>
			</div>
		</div>
	</div>
	<div id="footer">
		Benvenuto nel nostro sito
	</div>
    </body>
</html>