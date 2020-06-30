<?php
	session_start();
	include("../db_con.php");
    include_once('../mysql-fix.php');
    include ('header.html');
?>
		<div id="main">
            <?php include ('findDevice.php') ?>
		<div id="contenuto">
			<div class="container">
			<div class="menu1">
				<ul>
					<li><a href="#"><?php echo $_SESSION['username'];
									$q = mysqli_query($conn, "SELECT * FROM clienti WHERE username = '".$_SESSION['username']."'");
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
			<span id="path">Ti trovi in: <a href="home1.php">Home</a> &#187; News</span>
			<div id='notizia'>
			<?php
			$strsql = "select * from news";
			$risultato = mysqli_query($conn, $strsql);
			if (! $risultato)
			  {
			   echo "Errore nel comando SQL" . "<br>";
			  }
			$riga = mysqli_fetch_array($risultato);
			if (! $riga)
			{		
			 echo "Nessuna notizia presente" . "<br>";
			  }
			else
			{
			?>
			<table>
				<tr>
					<th>Data</th>
					<th>Notizia</th>
				</tr>
			<?php
			while ($riga)
			 {
			   echo ("<tr>");
			   echo "<td>".$riga["data"]."</td>";
			    echo "<td>".$riga["news"]."</td>";
			   echo ("</tr>");
			   $riga = mysqli_fetch_array($risultato);
			 }
			?>
			</table>
			<?php } ?>
			</div>
		</div>
	</div>
<?php
include ('footer.html');
?>