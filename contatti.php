<!DOCTYPE html PUBLIC "-//W3C//Dtd XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/Dtd/xhtml1-strict.dtd">
<html>
	<head>
		<title>Contatti- Team rancing</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="title" content="" />
		<meta name="description" content="Home page del sito del progetto" />
		<meta name="keywords" content="team-racing" />
		<meta name="language" content="italian it" />
		<meta name="author" content="" />
		<link href="style.css" rel="stylesheet" type="text/css" media="screen"/>
		<script type="text/javascript" src="javascript/email.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Montserrat%7cMontserrat+Subrayada%7cIndie+Flower" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Fredoka+One|Shadows+Into+Light+Two|Cherry+Cream+Soda|Cinzel+Decorative" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="immagini/favicon.ico" type="image/x-icon"/>
	</head>	
	<body>
	<div id="header">
		<h1>Team racing Luca & c.</h1>
	</div>
<?php
	session_start();
	include("db_con.php");
include_once('mysql-fix.php');
	if(isset($_SESSION['username']))
{  
     
?>
<div id="main">
			<div id="menu"> 
				<ul>
					<li><a href="home1.php">Home</a></li>
					<li><a href="classifica.php">Classifica</a></li>
					<li><a href="news.php">News</a></li>
					<li><a href="circuiti.php">Circuiti</a></li>
					<li>Contatti</li>
				</ul>
			</div>
		<div id="contenuto">
			<span id="path">Ti trovi in: <a href="home1.php">Home</a> &#187; Contatti</span>
			<div class="container">
			<div class="menu1">
				<ul>
					<li><a href="#"><?php echo $_SESSION['username'];
									$q = mysqli_query($conn, "SELECT * FROM clienti WHERE username = '".$_SESSION['username']."'");
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
			<form name="modulo">
				<div id="form">
					Email:<br />
					<input type="text" name="email"> <br />
					Oggetto:<br />
					<input type="text" name="oggetto"> <br />
					Messaggio:<br />
					<textarea name="messaggio" rows="10" cols="30"></textarea>  <br/>
					<input type="button" value="Invia" onClick="Email()">
				</div>
			</form>
		</div>
		<div id="contatti">
				<p><span class="capo"><img src="immagini/posto.png"> Indirizzo: <a href="https://www.google.it/maps/dir/45.1512556,12.1042598/45.1513323,12.104263/@45.1516158,12.0995452,17z/data=!4m2!4m1!3e2?hl=it&authuser=0"> Via mondonovo, 54 Cavarzere 30014 (VE)</a></span>
				<span class="capo"><img src="immagini/tel.png"> Telefono: <a href="tel:+393401572273">340/1572273</a></span>
				<span class="capo"><img src="immagini/busta.png"> E-mail: teamracinglf@gmail.com</span></p>
			</div>
	</div>
<?php   
}
else
{
     //sorgente in caso che il visitatore non è loggato
     echo '<div class="centra"><h1>Non puoi vedere questa pagina 
	 devi <a href="entra.php">Loggarti</a> prima</h1></div>'; 
}
?>
	<div id="footer">
		Benvenuto nel nostro sito
	</div>
	</body>
</html>