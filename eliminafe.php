<?php
	session_start();
	include("db_con.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//Dtd XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/Dtd/xhtml1-strict.dtd">
<html>
	<head>
		<title>Feedback- Team rancing</title>
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
					<li><a href="feedback.php">Feedback</a></li>
				</ul>
			</div>
		<div id="contenuto">
		<span id="path">Ti trovi in: <a href="home1.php">Home</a> &#187; Feedback</span>
			<div class="container">
			<div class="menu1">
				<ul>
					<li><a href="#"><?php echo $_SESSION['username'];
									$q = mysql_query("SELECT * FROM clienti WHERE username = '".$_SESSION['username']."'");
									while($riga = mysql_fetch_assoc($q)){
										if($riga['image'] == ""){
										echo "<div class='immagin'><img src='immagini/default.jpg' alt='Default Profile Pic'></div>";
										} else {
												echo "<div class='immagin'><img class='immagine' src='immagini/".$riga['image']."' alt='Profile Pic'></div>";
											   }
												echo "<br>";
										}
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
				$id = $_POST["id"];
				$strsql = "delete from feedback where id = '$id'";
				$risultato = mysql_query($strsql);
				if (! $risultato)
				  {
				   echo "Errore nel comando SQL" . "<br>";
				  }
				 else{
				 ?>
				<h2>Inserisci feedback</h2>  
			<form action='inserimentofeedback.php' method='POST'>
			<p>Votazione: </p> <p><input type='radio' name='radio' value='positivo'>Positivo
			<input type='radio' name='radio' value='neutro'>Neutro
			<input type='radio' name='radio' value='negativo'>Negativo</p>
			&nbsp
			<p>Su cosa:</p> <p> <input type='radio' name='dove' value='Acquisto biglietti'>Acquisto biglietti
			<input type='radio' name='dove' value='Acquisto moto'>Acquisto moto</p>
			&nbsp
				 <p><span class='capo'>Nome: <input readonly name='nome' type='text' value="<?php echo $_SESSION['username'];?>"></span>
				 <span class='capo'>Feedback: <textarea name='descrizione'></textarea></span>
				 <input readonly name='data' type='text' value="<?php echo $today=date("j-n-Y");?>" hidden="false">
				 <input readonly name='ora' type='text' value="<?php echo $today1=date("H:i");?>" hidden="false">
				 <span class='capo'><input type='submit' value='Inserisci' name='Invio'>
				 <input type='reset' value='Annulla' name='Annulla'></span></p> 
		  </form>
   &nbsp
		  <?php
			$strsql = "select * from feedback";
			$risultato = mysql_query($strsql);
			if (! $risultato)
			  {
			   echo "Errore nel comando SQL" . "<br>";
			  }
			$riga = mysql_fetch_array($risultato);
			if (! $riga)
			{		
			 echo "<div class='tabella'>" . "<br>";
			  }
			else
			{

			while ($riga)
			 {
			   echo ("<tr>");
			   echo "<form action=eliminaf.php method='POST' >";
			   echo "<input readonly name='id' type='text' value='".$riga["id"]."' hidden='false'>";
			   echo "<input readonly name='data' type='text' value='".$riga["data"]."'>";
			   echo "<input readonly name='ora' type='text' value='".$riga["ora"]."'>";
			   echo "<input readonly name='descrizione' type='text' value='".$riga["descrizione"]."'>";
			   echo "<input readonly name='radio' type='text' value='".$riga["radio"]."'>";
			   echo "<input readonly name='dove' type='text' value='".$riga["dove"]."'>";
			   echo "<input type='submit' value='elimina' name='Invio'></form>&nbsp ";
			   $riga = mysql_fetch_array($risultato);
			 }
			}
				}			
			?>
		</div>
	</div>
	<div id="footer">
		Benvenuto nel nostro sito
	</div>
</body>
</html>