<?php
	session_start();
	include("db_con.php");
    include_once('mysql-fix.php');
	include("header.html")
?>
	<div id="main">
		<?php include ('menuDesktopAmministratore.html'); ?>
		<div id="contenuto">
			<?php
				$id = $_POST["id"];
				$strsql = "select * from clienti where id = '$id'";
				$risultato = mysqli_query($conn, $strsql);
				if (! $risultato)
				  {
				   echo "Errore nel comando SQL" . "<br>";
				  }
				$riga = mysqli_fetch_array($risultato);
				if (! $riga)
					{
					   echo "Cliente non presente" . "<br>";
					}
				  else
					{
					   echo "Modificare Cliente" . "<br>" ;
			?>
				<form action="modificacliente.php" method="POST" >
				   <p><input readonly name="id" type="text" hidden value="<?php echo $riga["id"]?>">
                   <span class="capo">Nome: <input readonly name="nome" type="text" value="<?php echo $riga["nome"]?>"></span>
				   <span class="capo">Cognome: <input readonly name="cognome" type="text" value="<?php echo $riga["cognome"]?>"></span>
				   <span class="capo">E-mail: <input name="email" type="text" value="<?php echo $riga["email"]?>"></span>
				   <span class="capo">Username: <input name="username" type="text" value="<?php echo $riga["username"]?>"></span>
				   <span class="capo">Password: <input name="password" type="text" value="<?php echo $riga["password"]?>"></span>
				   <span class="capo"><input type="submit" value="Invia" name="Invio"></span></p>
				</form>
			<?php
					}
			?>	
				<p><a href="clienti.php"><button>Annulla</button></a></p>
		</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>