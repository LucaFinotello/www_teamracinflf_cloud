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
				$strsql = "select * from moto2 where id = '$id'";
				$risultato = mysqli_query($conn, $strsql);
				if (! $risultato)
				  {
				   echo "Errore nel comando SQL" . "<br>";
				  }
				$riga = mysqli_fetch_array($risultato);
				if (! $riga)
					{
					   echo "Pilota non presente" . "<br>";
					}
				  else
					{
					   echo "Modificare i dati del pilota" . "<br>" ;
				  ?>
                        <form action="modificamoto2.php" method="POST" >
                            <p><input readonly name="id" type="text" hidden value="<?php echo $riga["id"]?>">
                                <span class="capo">Pilota: <input readonly name="pilota" type="text" value="<?php echo $riga["pilota"]?>"></span>
                                <span class="capo">Team: <input readonly name="team" type="text" value="<?php echo $riga["team"]?>"></span>
                                <span class="capo">Punti: <input name="punti" type="text" value="<?php echo $riga["punti"]?>"></span>
                                <span class="capo"><input type="submit" value="Modifica" name="Invio"></span></p>
                        </form>
		   <?php
					}
			?>
            <p><a href="moto2.php"><button>Annulla</button></a></p>
		</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>