<?php
	session_start();
	include("../db_con.php");
include_once('../mysql-fix.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//Dtd XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/Dtd/xhtml1-strict.dtd">
<html>
	<head>
		<title>Info moto- Team rancing</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="title" content="" />
		<meta name="description" content="Home page del sito del progetto" />
		<meta name="keywords" content="team-racing" />
		<meta name="language" content="italian it" />
		<meta name="author" content="" />
		<link href="../style.css" rel="stylesheet" type="text/css" media="screen"/>
		<link href="https://fonts.googleapis.com/css?family=Montserrat%7cMontserrat+Subrayada%7cIndie+Flower" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Fredoka+One|Shadows+Into+Light+Two|Cherry+Cream+Soda|Cinzel+Decorative" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="../immagini/favicon.ico" type="image/x-icon"/>
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
			<span id="path">Ti trovi in: <a href="home1.php">Home</a> &#187; Info moto</span>
			<div class="container">
			<div class="menu1">
				<ul>
					<li><a href="#"><?php echo $_SESSION['username'];
									$q = mysqli_query($conn,"SELECT * FROM clienti WHERE username = '".$_SESSION['username']."'");
						?></a>
					   <ul>
							<li><a href="profilo.php">Modifica profilo</a></li>
							<li><a href="../modifica.php">Modifica password</a></li>
							<li><a href="elimina.php">Elimina account</a></li>
							<li><a href="../logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
			</div>
			<?php
				$id = $_POST["id"];
				$strsql = "select * from circuiti where id='$id'";
				$risultato = mysqli_query($conn,$strsql);
				if (! $risultato)
				  {
				   echo "Errore nel comando SQL" . "<br>";
				  }
				$riga = mysqli_fetch_array($risultato);
				if (! $riga)
				  {
				   echo "Nessun prodotto corrisponde alla ricerca." . "<br>";
				  }
				 else
				 {				
					while ($riga)
					{
						echo "<div><h1 class='centra'>".$riga["circuito"]."</h1>";
						echo "<div class='immagine'><img class='immagini' src='immagini/".$riga["immagine"]."' alt='".$riga["immagine"]."'></div>";
						echo "<span class='capo'>Stato: ".$riga["stato"]."</span>";
						echo "<span class='capo'>Paese: ".$riga["paese"]."</span>";
						echo "<span class='capo'>Descrizione: ".$riga["descrizione"]."</span>";
						echo "</div>";
						$riga = mysqli_fetch_array($risultato);
					}
				}
				?>
				<p><input type="button" onclick="location.href='circuiti.php'" value="Indietro" name="Annulla"></p>
		</div>
	</div>
	<div id="footer">
		Benvenuto nel nostro sito
	</div>	
</html>