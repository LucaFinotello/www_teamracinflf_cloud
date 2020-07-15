<?php
	session_start();
	include("db_con.php");
    include_once('mysql-fix.php');
	include("header.html")
?>
	<div id="main">
		<?php include ('menuDesktopAmministratore.html'); ?>
		<div id="contenuto">
			<?php
				$id = $_POST["id"];
				$strsql = "select * from circuiti where id = '$id'";
				$risultato = mysqli_query($conn, $strsql);
				if (! $risultato)
				  {
				   echo "Errore nel comando SQL" . "<br>";
				  }
				$riga = mysqli_fetch_array($risultato);
				if (! $riga)
					{
					   echo "Circuito non presente" . "<br>";
					}
				  else
					{
					   echo "Modifica Circuito:" . "<br>" ;
			?>
				<form action="modificacircuiti.php" method="POST" enctype="multipart/form-data">
				   <p>
                   <input type='text' name="id" value="<?php echo $riga["id"]?>" hidden/>
                   <span class="capo">Circuito: <input readonly name="circuito" type="text" value="<?php echo $riga["circuito"]?>"></span>
				   <span class="capo">Immagine: <input type="file" value="scegli immagine" name="image" /></span>
				   <span class="capo">Descrizione: <textarea cols="100" rows="100" name="descrizione" value="<?php echo $riga["descrizione"]?>"><?php echo $riga["descrizione"]?></textarea></span>
				   <span class="capo">Stato: <input name="stato" type="text" value="<?php echo $riga["stato"]?>"></span>
				   <span class="capo">Paese: <input name="paese" type="text" value="<?php echo $riga["paese"]?>"></span>
				   <span class="capo"><input type="submit" value="Modifica" name="Invio"></span></p>
				</form>
			<?php
					}
			?>	
				<p><a href="circuiti.php"><button>Annulla</button></a></p>
		</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>