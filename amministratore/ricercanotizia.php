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
				$strsql = "select * from news where id = '$id'";
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
					   echo "Modificare notizia" . "<br>" ;
				  ?>
		   <form action="modificanews.php" method="POST" >
			   <p><span class="capo">Data: <input readonly name="data" type="text" value="<?php echo $riga["data"]?>"></span>
			   <span class="capo"><input name="id" type="text" value="<?php echo $riga["id"]?>" hidden/></span>
			   <span class="capo">Notizia: <textarea name="news" value="<?php echo $riga["news"]?>"></textarea></span>
			   <span class="capo"><input type="submit" value="Invia" name="Invio"></span></p>
		   </form>
		   <?php
					}
			?>
			<p><a href="news.php"><button>Annulla</button></a></p>
		</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>