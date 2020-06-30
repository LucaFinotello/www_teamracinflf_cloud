<?php
	session_start();
	include("../db_con.php");
    include_once('../mysql-fix.php');
    include ('header.html');
?>
		<div id="main">
			<?php include ('findDevice.php') ?>
		<div id="contenuto">
			<span id="path">Ti trovi in: <a href="home1.php">Home</a> &#187; Moto</span>
			<div class="container">
			<div class="menu1">
				<ul>
					<li><a href="#"><?php echo $_SESSION['username'];
									$q = mysqli_query($conn, "SELECT * FROM clienti WHERE username = '".$_SESSION['username']."'");
						?></a>
					   <ul>
							<li><a href="profilo.php">Modifica profilo</a></li>
							<li><a href="modifica.php">Modifica password</a></li>
							<li><a href="../feedback1.php">Feedback</a></li>
							<li><a href="elimina.php">Elimina account</a></li>
							<li><a href="../logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
			</div>
		
			<?php
				$id_info = $_POST["id_info"];
				$strsql = "select * from infomoto where id_info='$id_info'";
				$risultato = mysqli_query($conn, $strsql);
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
						echo "<h1 class='centra'>".$riga["marca"]." ".$riga["modello"]."</h1>";
						echo "<div class='immagine'><img class='immagini' src='immagini/".$riga["immagine"]."' alt='".$riga["immagine"]."'></div>";
						echo "<span class='capo'>anno: ".$riga["anno"]."</span>";
						echo "<span class='capo'>Prezzo: ".$riga["prezzo"]."</span>";
						echo "<span class='capo'>Descrizione: ".$riga["descrizione"]."</span>";
						$riga = mysqli_fetch_array($risultato);
					}
				}
				?>
				<p><input type="button" onclick="location.href='vendita moto.php'" value="Indietro" name="Annulla"></p>
		</div>
	</div>
<?php
include ('footer.html');
?>