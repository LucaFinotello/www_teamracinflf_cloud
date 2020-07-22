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
			$strsql = "select * from tblposts";
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
			   echo "<td>".$riga["PostingDate"]."</td>";
			   echo "<td><div id='link'><p class='short'>".$riga["PostTitle"]."</p></div></td>";
			   echo "<td><form action='ricercanotizia.php' method='post'>
                      <input name='id' value='".$riga["id"]."' hidden/>
                      <button type='submit'>Modifica</button>
                    </form>
                    <form action='cancellanotizia.php' method='post'>
                      <input name='id' value='".$riga["id"]."' hidden/>
                       <button type='submit'>Elimina</button>
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

<script>
    $(document).ready(function () {
        $("#def .short").readmore();
        $("#len .short").readmore({ substr_len: 50 });
        $("#link .short").readmore({ more_link: '<a class="more something"><button>Leggi tutto</button></a>' });

    });
</script>
