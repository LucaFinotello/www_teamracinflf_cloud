<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html');
?>

    <div id="main">
        <?php include ('menuDesktopAmministratore.html');?>
		<div id="contenuto">
			<?php
			$circuito = $_POST["circuito"];
			$immagine = $_POST["immagine"];
			$stato = $_POST["stato"];
			$paese = $_POST["paese"];
			$descrizione = $_POST["descrizione"];
			$strsql = "insert into circuiti (circuito, immagine, stato, paese, descrizione) values ('$circuito', '$immagine', '$stato', '$paese', '$descrizione')";
			$risultato = mysqli_query($conn, $strsql);
			if (! $risultato)
			  {
			   echo "Errore nel comando SQL" . "<br>";
			  }
			else
			{
                header("location:inserimentocircuiti.php");
			}
			?>
		</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>