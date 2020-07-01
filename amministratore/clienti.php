<?php
	session_start();
	include("db_con.php");
    include_once('mysql-fix.php');
    include ('header.html');
?>

	<div id="main">
		<?php include ('menuDesktopAmministratore.html');?>
		<div id="contenuto">
			<?php
			$strsql = "select * from clienti where not username='admin' ";
			$risultato = mysqli_query($conn, $strsql);
			if (! $risultato)
			  {
			   echo "Errore nel comando SQL" . "<br>";
			  }
			$riga = mysqli_fetch_array($risultato);
			if (! $riga)
			{		
			 echo "<div class='tabella'>Nessun cliente presente nel Database" . "<br>";
			  }
			else
			{
			?>
			<p>Elenco clienti</p>
			<table>
				<tr>
					<th>Nome</th>
					<th>Cognome</th>
					<th>E-mail</th>
					<th>Username</th>
					<th>Password</th>
                    <th>Azioni</th>
				</tr>
			<?php
			while ($riga)
			 {
			   echo ("<tr>");
			   echo "<form action='ricercaclient.php' method='post'>";
			   echo "<input type='text' class='inputDati' name='id' value='". $riga['id']."' hidden/>";
			   echo "<td><input type='text' class='inputDati' name='nome' value='".$riga["nome"]."'/></td>";
			   echo "<td><input type='text' class='inputDati' name='cognome' value='".$riga["cognome"]."'/></td>";
			   echo "<td><input type='text' class='inputDati' name='email' value='".$riga["email"]."'/></td>";
			   echo "<td><input type='text' class='inputDati' name='username' value='".$riga["username"]."'/></td>";
			   echo "<td><input type='text' class='inputDati' name='paswword' value='".$riga["password"]."'/></td>";
			   echo "<td><button type='submit'>Modifica</button></form>";
                 echo "<form action='cancellaclient.php' method='post'>";
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