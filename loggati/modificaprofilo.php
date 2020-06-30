<?php
	session_start();
	include("../db_con.php");
include_once('../mysql-fix.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//Dtd XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/Dtd/xhtml1-strict.dtd">
<html>
	<head>
		<title>Modifica profilo- Team rancing</title>
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
	</head>	
	<body>
	<div id="header">
		<h1>Team racing Luca & c.</h1>
	</div>
		<div id="main">
			<div id="menu"> 
				<ul>
					<li><a href="home1.php">Home</a></li>
					<li><a href="classifica motogp.php">MotoGP</a></li>
					<li><a href="moto2.php">Moto2</a></li>
					<li><a href="moto3.php">Moto3</a></li>
					<li><a href="news.php">News</a></li>
					<li><a href="moto d'epoca.php">Moto d'epoca</a></li>
					<li><a href="circuiti.php">Circuiti</a></li>
					<li><a href="../vendita%20biglietti.php">Biglietti</a></li>
					<li><a href="../vendita%20moto.php">Negozio moto</a></li>
					<li><a href="contatti.php">Contatti</a></li>
					<li><a href="../feedback.php">Feedback</a></li>
				</ul>
			</div>
		<div id="contenuto">
		<span id="path">Ti trovi in: Modifica profilo</span>
			<div class="container">
			<div class="menu1">
				<ul>
					<li><a href="#"><?php echo $_SESSION['username'];
									$q = mysqli_query($conn, "SELECT * FROM clienti WHERE username = '".$_SESSION['username']."'");
						?></a>
					   <ul>
							<li>Modifica profilo</li>
							<li><a href="../modifica.php">Modifica password</a></li>
							<li><a href="../feedback1.php">Feedback</a></li>
							<li><a href="elimina.php">Elimina account</a></li>
							<li><a href="../logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
			</div>
			<div id="profilo">
			<?php
				$username = $_SESSION['username'];
				$password = $_SESSION['password'];
				$strsql = "select * from clienti where username ='$username' and password ='$password'";
				$risultato = mysqli_query($conn, $strsql);
				if (! $risultato)
				  {
				   echo "Errore nel comando SQL" . "<br>";
				  }
				$riga = mysqli_fetch_array($risultato);
				if (! $riga)
					{
					   echo "Cliente non presente" . "<br>";
					}
				  else
					{
					   
			?>
				<form action="modificaprofilo.php" method="POST" >
				   <p><span class="capo">Nome: <input readonly name="nome" type="text" value="<?php echo $riga["nome"]?>"></span>
				   <span class="capo">Cognome: <input readonly name="cognome" type="text" value="<?php echo $riga["cognome"]?>"></span>
				   <span class="capo">E-mail: <input readonly name="email" type="text" value="<?php echo $riga["email"]?>"></span>
				   <span class="capo">Username: <input readonly name="username" type="text" value="<?php echo $riga["username"]?>"></span>
				   <span class="capo">Password: <input readonly name="password" type="text" value="<?php echo $riga["password"]?>"></span>
				</form>
			<?php
					}
				echo "Profilo modificato con successo!" . "<br>";
			?>	
			</div>
		</div>
	</div>
	<div id="footer">
		Benvenuto nel nostro sito
	</div>
	</body>
</html>