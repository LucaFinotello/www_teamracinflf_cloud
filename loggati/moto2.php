<?php
	session_start();
	include("../db_con.php");
    include_once('../mysql-fix.php');
    include ('header.html');
?>
		<div id="main">
            <?php include ('findDevice.php') ?>
		<div id="contenuto">
			<span id="path">Ti trovi in: <a href="home1.php">Home</a> &#187; Classifica</span>
			<div class="container">
			<div class="menu1">
				<ul>
					<li><a href="#"><?php echo $_SESSION['username'];
									$q = mysqli_query($conn,"SELECT * FROM clienti WHERE username = '".$_SESSION['username']."'");
						?></a>
					   <ul>
							<li><a href="profilo.php">Modifica profilo</a></li>
							<li><a href="modifica.php">Modifica password</a></li>
							<li><a href="elimina.php">Elimina account</a></li>
							<li><a href="../logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
			</div>
			<div id="classifica">
				<?php
		$strsql = "select * from moto2 order by punti DESC";
		$risultato = mysqli_query($conn, $strsql);
		if (! $risultato)
		  {
		   echo "Errore nel comando SQL" . "<br>";
		  }
		$riga= mysqli_fetch_array($risultato);
		if (!$riga)
		  {
		   echo "Nessuna classifica attualmente presente";
		  }
		else
		{
		?>
				<table>
					<tr>
						<th>Pilota</th>
						<th>Team</th>
						<th>Punteggio</th>
					</tr>
				<?php
				while ($riga)
				{
					echo ("<tr>");
					echo "<td>".$riga["pilota"]."</td>";
					echo "<td>".$riga["team"]."</td>";
					echo "<td>".$riga["punti"]."</td>";
					echo ("</tr>");
					$riga = mysqli_fetch_array($risultato);
				}
				?>
				</table>
				<?php
				}
				?>
				<p><span class="capo"><a href="motogp.php">1. MotoGp</a></span>
				<span class="capo"><a href="moto3.php">3. Moto3</a></span>
				</div>
		</div>
	</div>
<?php
include ('footer.html');
?>