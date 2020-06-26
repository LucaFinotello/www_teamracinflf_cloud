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
        <link rel="shortcut icon" href="immagini/favicon.ico" type="image/x-icon"/>
	</head>	
	<body>
	<div id="header">
		<h1>Team racing Luca & c.</h1>
	</div>
		<div id="main">
			<div id="menu"> 
				<ul>
					<li>Home</li>
					<li><a href="classifica.php">Classifica</a></li>
					<li><a href="news.php">News</a></li>
					<li><a href="circuiti.php">Circuiti</a></li>
					<li><a href="contatti.php">Contatti</a></li>
				</ul>
			</div>
		<div id="contenuto">
		<span id="path">Ti trovi in: Home</span>
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
			<h2>L'UNICO SERVIZIO ON LINE IN CUI PUOI TROVARE DI TUTTO SULLE MOTO</h2>
			<div class="tabella">
				<table>
					<tr>
						<th>Cognome</th>
						<th>Nome</th>
						<th>E-mail</th>
					</tr>
					<tr>
						<td> Finotello </td>
						<td> Luca </td>
						<td> <a href="contatti.php">teamracinglf@gmail.com</a> </td>
					</tr>
				</table>
			</div>
			<p>In questo sito troverete qualsiasi informazione su moto, sia dei giorni nostri ma anche moto d'epoca.
			In caso di mancate informazioni contatateci via e-mail. RISPONDEREMO AL PI&Ugrave; PRESTO.</p> 
			<p> Ci trovate anche su facebook </p>
			&nbsp
            <a href="TeamRacing">
                <div class="Box_Contenitore">
                    <img src="immagini/teamracing.png"> TeamRacing App
                </div>
            </a>
            <a href="RidingSchool">
                <div class="Box_Contenitore">
                    <img src="immagini/ridingschool.png" >RidingSchool App
                </div>
            </a>
		</div>
	</div>
	<div id="footer">
		Benvenuto nel nostro sito
	</div>
	</body>
</html>