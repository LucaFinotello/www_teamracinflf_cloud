<?php
	session_start();
	include("db_con.php");
include_once('mysql-fix.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//Dtd XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/Dtd/xhtml1-strict.dtd">
<html>
	<head>
		<title>Home- Team rancing</title>
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
					<li><a href="circuiti.php">Circuiti</a></li>
					<li><a href="vendita biglietti.php">Biglietti</a></li>
					<li><a href="vendita moto.php">Negozio moto</a></li>
					<li><a href="contatti.php">Contatti</a></li>
					<li>Feedback</li>
				</ul>
			</div>
		<div id="contenuto">
		<span id="path">Ti trovi in: <a href="home1.php">Home</a> &#187; Feedback</span>
			<div class="container">
			<div class="menu1">
				<ul>
					<li><a href="#"><?php echo $_SESSION['username'];
									$q = mysqli_query($conn, "SELECT * FROM clienti WHERE username = '".$_SESSION['username']."'");
						?></a>
					   <ul>
							<li><a href="profilo.php">Modifica profilo</a></li>
							<li><a href="modifica.php">Modifica password</a></li>
							<li><a href="feedback1.php">Feedback</a></li>
							<li><a href="elimina.php">Elimina account</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
			</div>
			
			<?php
				$nome = $_POST["nome"];
				$descrizione = $_POST["descrizione"];
				$voto = $_POST["voto"];
				$dove = $_POST["dove"];
				$strsql = "INSERT into feedback (nome, data, ora, descrizione, voto, dove) values ('$nome', NOW(), NOW(), '$descrizione', '$voto', '$dove')";
				$risultato = mysqli_query($conn, $strsql);
				if (! $risultato)
				  {
				   echo "Errore nel comando SQL qui" . "<br>";
				  }
				
			$strsql = "select * from feedback where nome='".$_SESSION['username']."'";
			$risultato = mysqli_query($conn, $strsql);
			if (! $risultato)
			  {
			   echo "Errore nel comando SQL" . "<br>";
			  }
			$riga = mysqli_fetch_array($risultato);
			if (! $riga)
			{		
			 echo "<div class='tabella'>" . "<br>";
			  }
			else
			{
			?>
			
			<table>
				<tr>
					<th>Nome</th>
					<th>Data</th>
					<th>Ora</th>
					<th>Feedback</th>
					<th>Voto</th>
					<th>Dove</th>
				</tr>
			<?php
			while ($riga)
			 {
			   echo ("<tr>");
			   echo "<td>".$riga["nome"]."</td>";
			   echo "<td>".$riga["data"]."</td>";
			   echo "<td>".$riga["ora"]."</td>";
			   echo "<td>".$riga["descrizione"]."</td>";
			   echo "<td>".$riga["voto"]."</td>";
			   echo "<td>".$riga["dove"]."</td>";
			   echo ("</tr>");
			   $riga = mysqli_fetch_array($risultato);
			 }
			?>
			</table>
			<?php } ?>	
			<input type="button" onclick="location.href='feedback.php'" value="Indietro" name="Annulla">		
		</div>
		</div>
	</div>
	<div id="footer">
		Benvenuto nel nostro sito
	</div>
	</body>
</html>