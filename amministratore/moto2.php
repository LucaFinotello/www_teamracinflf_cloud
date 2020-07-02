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
			$strsql = "select * from moto2 order by punti DESC";
			$risultato = mysqli_query($conn, $strsql);
			if (! $risultato)
			  {
			   echo "Errore nel comando SQL" . "<br>";
			  }
			$riga = mysqli_fetch_array($risultato);
			if (! $riga)
			{		
			 echo "<div class='tabella'>Nessuna classifica attualmente" . "<br>";
			  }
			else
			{
			?>
			<p>Classifica moto2</p>
			<table>
				<tr>
					<th>Piloti</th>
					<th>Team</th>
					<th>Punti</th>
                    <th>Azioni</th>
				</tr>
			<?php
			while ($riga)
			 {
			   echo ("<tr>");
                 echo "<form action='ricercamotodue.php' method='POST'>";
                 echo "<input type='text' class='inputDati' name='id' value='". $riga['id']."' hidden/>";
			   echo "<td>".$riga["pilota"]."</td>";
			   echo "<td>".$riga["team"]."</td>";
			   echo "<td>".$riga["punti"]."</td>";
                 echo "<td><button type='submit'>Modifica</button></form>";
                 echo "<form action='cancellamoto2.php' method='post'>";
                 echo "<input type='text' class='inputDati' name='id' value='". $riga['id']."' hidden/>";
                 echo "<button type='submit'>Elimina</button></form></td>";
			   echo ("</tr>");
			   $riga = mysqli_fetch_array($risultato);
			 }
			?>
			</table>
			<?php } ?>
			</div>
		</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>