<?php
	session_start();
	include("../db_con.php");
include_once('../mysql-fix.php');
include ('header.html');
?>
		<div id="main">
            <?php include ('findDevice.php') ?>
		<div id="contenuto">
		<span id='path'>Ti trovi in: Home </span>
			<?php
				$nome = $_POST["nome"];
				$strsql = "delete from clienti where nome = '$nome'";
				$risultato = mysqli_query($conn, $strsql);
				if (! $risultato)
				  {
				   echo "Errore nel comando SQL" . "<br>";
				  }
				echo "<h2>L'UNICO SERVIZIO ON LINE IN CUI PUOI TROVARE DI TUTTO SU MOTO E SCOOTER</h2>
			<div class='tabella'>
				<table>
					<tr>
						<th>Cognome</th>
						<th>Nome</th>
						<th>E-mail</th>
					</tr>
					<tr>
						<td> Finotello </td>
						<td> Luca </td>
						<td> <a href='contatti.php'>luca.finotello@gmail.com</a> </td>
					</tr>
				</table>
			</div>
			<p>In questo sito troverete qualsiasi informazione su moto, sia dei giorni nostri ma anche moto d'epoca.
			In caso di mancate informazioni contatateci via e-mail. RISPONDEREMO AL PI&Ugrave; PRESTO.</p> 
			<p> Ci trovate anche su facebook </p>"
			?>    
		</div>
	</div>
<?php
include ('footer.html');
?>