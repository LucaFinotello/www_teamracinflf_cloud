<?php
	session_start();
	include("db_con.php");
include_once('mysql-fix.php');
	?>	
	
<!DOCTYPE html PUBLIC "-//W3C//Dtd XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/Dtd/xhtml1-strict.dtd">
<html>
	<head>
		<title>Vendita Moto- Team rancing</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="title" content="" />
		<meta name="description" content="Home page del sito del progetto" />
		<meta name="keywords" content="team-racing" />
		<meta name="language" content="italian it" />
		<meta name="author" content="" />
		<script type="text/javascript" src="jquery-1.3.2.js"></script>
		<link href="style.css" rel="stylesheet" type="text/css" media="screen"/>
		<script type="text/javascript" src="javascript/simpleCart.js"></script>
		<script type="text/javascript">
			simpleCart.email = "luca.finotello@gmail.com";
			simpleCart.checkoutTo = PayPal;
			simpleCart.currency = EUR;
			simpleCart.taxRate  = 0.00;
			simpleCart.shippingFlatRate = 5.00;
			simpleCart.cartHeaders = ["Name" , "Size", "Price" , "decrement" , "Quantity", "increment", "remove", "Total" ];
		</script>
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
					<li>Negozio moto</li>
					<li><a href="contatti.php">Contatti</a></li>
					<li><a href="feedback.php">Feedback</a></li>
				</ul>
			</div>
		<div id="contenuto">
			<span id="path">Ti trovi in: <a href="home1.php">Home</a> &#187; Vendita moto</span>
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
			<div class="sposta">
			<p class="alignRight"> Carrello:<span class="simpleCart_total"></span> (<span class="simpleCart_quantity"></span> pezzi)
					<a href="javascript:;" class="simpleCart_empty">Svuota carello</a> <br />
			</p>
			<div id="field">
					<form action="vendita moto1.php" method="POST">
						<fieldset>
							<legend>ricerca moto</legend>
							Marca: <input name="marca" type="text" value=""/>
							Modello: <input name="modello" type="text" value=""/>
							Anno: <input name="anno" type="text" value=""/>
							<input type="submit" name="invia" value="invia">
						</fieldset>
					</form>
				</div>
			<div id="carello">
					<div id="carttotal">
						Subtotale: <span class="simpleCart_total"></span> 
						Spese spedizione: <span class="simpleCart_shippingCost"></span> 
						Totale finale: <span class="simpleCart_finalTotal"></span>
						<a href="javascript:;" class="simpleCart_checkout">Acquista</a> 
					</div>
				</div>
			<?php
					$strsql = "select * from infomoto";
				$risultato = mysqli_query($conn, $strsql);
				if (! $risultato)
				  {
				   echo "Errore nella select" . "<br>";
				  }
				$riga = mysqli_fetch_array($risultato);
				if (! $riga)
			    {
				  echo "nessuna moto inserita";
				}
				else
				{
				 while ($riga)
					{
						echo "<div class='simpleCart_shelfItem last'><form action='dettagli2.php' method='POST'>";
						echo "<div class='Box_Contenitore'><span class='capo'>Marca:  <input readonly name='marca' type='text' value=".$riga["marca"]."></span>";
						echo "<input readonly name='id_info' type='text' value=".$riga["id_info"]." hidden='false'>";
						echo "<span class='capo'>Modello:  <input readonly name='modello' type='text' value=".$riga["modello"]."></span>";
						echo "<span class='capo'>Anno:  <input readonly name='anno' type='text' value=".$riga["anno"]."></span>";
						echo "<span class='capo'>Prezzo: <strong class='item_price'> ".$riga["prezzo"]." &euro;</strong></span>";
						echo "<img src='immagini/".$riga["immagine"]."' alt='".$riga["immagine"]."'><span class='capo'></p> ";  
						echo "<input type='submit' name='dettagli' value='dettagli' />";
						echo "</form>";
						echo " <input type='button' class='item_add' value='aggiungi' /></div></div>";
						$riga = mysqli_fetch_array($risultato);
					}
				}
				?>
		</div>
		</div>
	</div>
	<div id="footer">
		Benvenuto nel nostro sito
	</div>
	</body>
</html>