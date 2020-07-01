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
			$strsql = "select * from news order by data";
			$risultato = mysqli_query($conn, $strsql);
			if (! $risultato)
			  {
			   echo "Errore nel comando SQL" . "<br>";
			  }
			$riga = mysqli_fetch_array($risultato);
			if (! $riga)
			{		
			 echo "<div class='tabella'>Nessuna notizia" . "<br>";
			  }
			else
			{
			?>
			<p>Elenco notizie</p>
			<table>
				<tr>
					<th>Data</th>
					<th>News</th>
                    <th>Azioni</th>
				</tr>
			<?php
			while ($riga)
			 {
			   echo ("<tr>");
			   echo "<td>".$riga["data"]."</td>";
			   echo "<td>".$riga["news"]."</td>";
			   echo "<td><form action='ricercanotizia.php' method='post'>
                      <input name='id' value='".$riga["id"]."' hidden/>
                      <button type='submit'>Modifica</button>
                    </form>
                    <form action='cancellanew.php' method='post'>
                      <input name='id' value='".$riga["id"]."' hidden/>
                       <button type='submit'>elimina</button>
                    </form></td>";
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