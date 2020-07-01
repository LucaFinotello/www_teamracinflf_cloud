<?php
	session_start();
	include("db_con.php");
    include_once('mysql-fix.php');
    include ('header.html');
?>
	<div id="main">
        <?php include('menuDesktopAmministratore.html'); ?>
		<div id="contenuto">
			<?php
				$circuito = $_POST["circuito"];
				$strsql = "select * from circuiti where circuito = '$circuito'";
				$risultato = mysqli_query($conn, $strsql);
				if (! $risultato)
				  {
				   echo "Errore nel comando SQL" . "<br>";
				  }
				$riga = mysqli_fetch_array($risultato);
				if (! $riga)
					{
					   echo "Annuncio non presente" . "<br>";
					}
				  else
					{
					   echo "Dati pista" . "<br>" ;
			?>
			<form action="cancellacircuit.php" method="POST" >
				<p><input name="id" value="<?php echo $riga["id"]?>" hidden>
                    <span class="capo">Circuito: <input readonly name="circuito" type="text" value="<?php echo $riga["circuito"]?>"></span>
				<span class="capo">Immagine: <input readonly name="immagine" type="text" value="<?php echo $riga["immagine"]?>"></span>
				<span class="capo">Descrizione: <textarea readonly name="descrizione" type="text" value="<?php echo $riga["descrizione"]?>"><?php echo $riga["descrizione"]?></textarea></span>
				<span class="capo">Stato: <input readonly name="stato" type="text" value="<?php echo $riga["stato"]?>"></span>
				<span class="capo">Paese: <input readonly name="paese" type="text" value="<?php echo $riga["paese"]?>"></span>
				<input type="submit" value="Elimina" name="Invio"></span></p>
			</form>
			<?php
			}
			?>
		<p><a href="cancellacircuiti.php"><button>Annulla</button></a></p>
		</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>