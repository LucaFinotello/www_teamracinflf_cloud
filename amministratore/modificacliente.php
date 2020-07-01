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
				$nome = $_POST["nome"];
				$cognome = $_POST["cognome"];
				$email = $_POST["email"];
				$username = $_POST["username"];
				$password = $_POST["password"];
				$strsql = "update clienti set email = '$email', username= '$username', password='$password' where id = '$id'";
				$risultato = mysqli_query($conn, $strsql);
				if (!$risultato)
				  {
				   echo "Errore nel comando SQL" . "<br>";
				  }else {
                    header("location:clienti.php");
                }
			?>
			<a href="clienti.php">Visualizza </a>
		</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>