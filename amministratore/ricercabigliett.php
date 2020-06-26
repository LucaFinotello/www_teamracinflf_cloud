<?php
	session_start();
	include("db_con.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<title>Amministratore</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="title" content="" />
		<meta name="description" content="Home page del sito del progetto" />
		<meta name="keywords" content="team-rancing" />
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
		<div class="container">
			<div class="menu">
				<ul>
					<li><a href="#">Lettura</a>
					   <ul>
							<li><a href="clienti.php">Clienti</a></li>
							<li><a href="biglietti.php">Biglietti</a></li>
							<li><a href="motogp.php">MotoGp</a></li>
							<li><a href="moto2.php">Moto2</a></li>
							<li><a href="moto3.php">Moto3</a></li>
							<li><a href="circuiti.php">Circuiti</a></li>
							<li><a href="news.php">News</a></li>
							<li><a href="info moto.php">Info moto</a></li>
						</ul>
					</li>
					<li><a href="#">Inserimento</a>
					   <ul>
							<li><a href="inserimentoclienti.php">Cliente</a></li>
							<li><a href="inserimentobiglietti.php">Biglietti</a></li>
							<li><a href="inserimentomotogp.php">MotoGp</a></li>
							<li><a href="inserimentomoto2.php">Moto2</a></li>
							<li><a href="inserimentomoto3.php">Moto3</a></li>
							<li><a href="inserimentocircuiti.php">Circuiti</a></li>
							<li><a href="inserimentonews.php">News</a></li>
							<li><a href="inserimentoinfomoto.php">Info moto</a></li>
						</ul>
					</li>
					<li><a href="#">Modifica</a>
					   <ul>
							<li><a href="ricercaclienti.php">Cliente</a>/li>
							<li>Biglietti</li>
							<li><a href="ricercamotogp.php">MotoGp</a></li>
							<li><a href="ricercamoto2.php">Moto2</a></li>
							<li><a href="ricercamoto3.php">Moto3</a></li>
							<li><a href="ricercacircuiti.php">Circuiti</a></li>
							<li><a href="ricercanews.php">News</a></li>
							<li><a href="ricercainfomoto.php">Info moto</a></li>
						</ul>
					</li>
					<li><a href="#">Cancella</a>
					   <ul>
							<li><a href="cancellacliente.php">Cliente</a></li>
							<li><a href="cancellabiglietti.php">Biglietti</a></li>
							<li><a href="cancellamotogp.php">MotoGp</a></li>
							<li><a href="cancellamoto2.php">Moto2</a></li>
							<li><a href="cancellamoto3.php">Moto3</a></li>
							<li><a href="cancellacircuiti.php">Circuiti</a></li>
							<li><a href="cancellanews.php">News</a></li>
							<li><a href="cancellainfo moto.php">Info moto</a></li>
						</ul>
					</li>
					<li><a href="feedback.php">Feedback</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
		<div id="contenuto">
			<?php
				$data = $_POST["data"];
				$strsql = "select * from biglietti where data = '$data'";
				$risultato = mysql_query($strsql);
				if (! $risultato)
				  {
				   echo "Errore nel comando SQL" . "<br>";
				  }
				$riga = mysql_fetch_array($risultato);
				if (! $riga)
					{
					   echo "Evento non presente" . "<br>";
					}
				  else
					{
					   echo "Modificare i Dati dell&rsquo;evento:" . "<br>" ;
			?>
				<form action="modificabiglietti.php" method="POST" >
				   <p><span class="capo">Data: <input readonly name="data" type="text" value="<?php echo $riga["data"]?>"></span>
				   <span class="capo">Prezzo: <input name="prezzo" type="text" value="<?php echo $riga["prezzo"]?>"></span>
				   <span class="capo">Disponibilit&agrave;: <input name="disponibilita" type="text" value="<?php echo $riga["disponibilita"]?>"></span>
				   <span class="capo"><input type="submit" value="Invia" name="Invio"></span></p>
				</form>
			<?php
					}
			?>	
				<p><a href="ricercabiglietti.php">Indietro</a></p>
		</div>
	</div>
	<div id="footer">
		Area Amministratore
	</div>
</body>
</html>