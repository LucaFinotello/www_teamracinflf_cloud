<!DOCTYPE html PUBLIC "-//W3C//Dtd XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/Dtd/xhtml1-strict.dtd">
<html>
	<head>
		<title>Iscrizione- Team rancing</title>
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
					<li><a href="home.php">Home</a></li>
					<li>Iscrizione</li>
					<li><a href="entra.php">Login</a></li>
				</ul>
			</div>
		<div id="contenuto">
			<span id="path">Ti trovi in:  <a href="home.php">Home</a> &#187; Iscrizione</span> </span>
			<?php
			session_start(); 
			include("db_con.php");
			$nome = $_POST['nome'];
			$cognome = $_POST['cognome'];
			$email = $_POST['email'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			if($_POST["username"] != "" && $_POST["password"]!= "" && $_POST["nome"] != "" && $_POST["cognome"] != "" 
			&& $_POST["email"] != "")
			{
			$query_registrazione = mysqli_query($conn, "INSERT INTO clienti (username,password,nome,cognome, email)
			VALUES ('".$_POST["username"]."','".$_POST["password"]."','".$_POST["nome"]."','".$_POST["cognome"]."','".$_POST["email"]."')") 
			or die ("query di registrazione non riuscita".mysqli_error());
			}else{
			
			?>
			<div id="form">
					<form action="registrazione.php" method="POST">
						<p><span class="capo">Nome: <input name="nome" type="text"/></span>
						<span class="capo">Cognome: <input name="cognome" type="text"/></span>
						<span class="capo">E-mail: <input name="email" type="text"/></span>
						<span class="capo">Username: <input name="username" type="text"/></span>
						<span class="capo">Password: <input name="password" type="password"/></span>
						<span class="capo"><input type="submit" id="submit" name="submit" value="Registrati" />
						<input type="reset" value="anulla" name="anulla"></span></p>
					</form>
			</div>
			<?php
			echo "<p>Non sono stati inseriti tutti i campi neccessari alla registrazione</p>";
			}
			if(isset($query_registrazione)){
			$_SESSION["logged"]=true; 
			echo "<p>Ti sei registrato con successo</p>";
			}else{
			echo "<p>Registrazione non avvenuta</p>";
			}
		?>
		</div>
	</div>
	<div id="footer">
		Veniteci a trovare
	</div>
	</body>
</html>