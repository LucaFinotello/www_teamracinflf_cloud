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
				$username = $_POST["username"];
				$nome = $_POST["nome"];
				$cognome = $_POST["cognome"];
				$email = $_POST["email"];
				$password = $_POST["password"];
				$strsql = "insert into clienti (nome, cognome, email, username, password) values ('$nome', '$cognome', '$email', '$username', '$password')";
				$risultato = mysqli_query($conn,$strsql);
				if (! $risultato)
				  {
				   echo "Errore nel comando SQL" . "<br>";
				  }
				  else
				  {
                      header("location:inserimentoclienti.php");
				  }
			?>
			<a href="clienti.php">Visualizza</a>
			</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>