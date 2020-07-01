<?php
	session_start();
	include("db_con.php");
    include_once('mysql-fix.php');
    include ('header.html');
?>
	<div id="main">
        <?php include ('menuDesktopAmministratore.html') ?>
		<div id="contenuto">
			<?php
				$id = $_POST["id"];
				$strsql = "select * from news where id= '$id'";
				$risultato = mysqli_query($conn, $strsql);
				if (! $risultato)
				  {
				   echo "Errore nel comando SQL" . "<br>";
				  }
				$riga = mysqli_fetch_array($risultato);
				if (! $riga)
					{
					   echo "Notizia non presente" . "<br>";
					}
				  else
					{
					   echo "Dati della notizia da cancellare" . "<br>" ;
			?>
			<form action="cancellanotizia.php" method="POST" >
				<p><input readonly name="id" type="text" value="<?php echo $riga["id"]?>" hidden/>
                    <span class="capo">Data: <input readonly name="data" type="text" value="<?php echo date('d/m/Y', strtotime($riga["data"]))?>"></span>
				<span class="capo">Notizia: <textarea readonly name="news" type="text" value="<?php echo $riga["news"]?>"></textarea></span>
				<span class="capo"><input type="submit" value="Cancella" name="Invio"></span></p>
			</form>
			<?php
					}
			?>
			<p><a href="news.php"><button>Annulla</button></a></p>
		</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>