<?php
	session_start();
	include("db_con.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//Dtd XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/Dtd/xhtml1-strict.dtd">
<html>
	<head>
		<link rel="icon" href="immagini/favicon.ico"/>
		<title>Home- Team racing</title>
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
        <link rel="shortcut icon" href="immagini/favicon.ico" type="image/x-icon"/>
	</head>	
	<body>
    <!--<input type="checkbox" id="nav-toggle" hidden>
    <nav class="nav">
        <label for="nav-toggle" class="nav-toggle" onclick></label>
        <h2 class="logo">
            <a href="www.ioeweb.it/">ioeweb.it</a>
        </h2>
        <ul>
            <li><a href="#1">Uno </a>
            <li><a href="#2">Due</a>
            <li><a href="#3">Tre</a>
            <li><a href="#4">Quattro</a>
            <li><a href="#5">Cinque</a>
            <li><a href="#6">Sei</a>
            <li><a href="#7">Sete</a>
        </ul>
    </nav>-->


	<div id="header">
		<h1>Team racing Luca & c.</h1>
	</div>
		<div id="main">
            <input type="checkbox" id="nav-toggle" hidden>
            <label for="nav-toggle" class="nav-toggle" onclick></label>
			<div id="menu" class="nav">
				<ul>
					<li>Home</li>
					<li><a href="iscrizione.php">Iscrizione</a></li>
					<li><a href="entra.php">Login</a></li>
				</ul>
			</div>
		<div id="contenuto">
			<span id="path"> Ti trovi in: Home </span>
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
			</div>
		</div>
	</div>
	<div id="footer">
		Veniteci a trovare
	</div>
	</body>
</html>