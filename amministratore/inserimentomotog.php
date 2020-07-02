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
				$pilota = $_POST["pilota"];
				$team = $_POST["team"];
				$punti = $_POST["punti"];
				$strsql = "insert into motogp (pilota, team, punti) values ('$pilota', '$team', '$punti')";
				$risultato = mysqli_query($conn, $strsql);
				if (! $risultato)
				  {
				   echo "Errore nel comando SQL" . "<br>";
				  }
				  else
				  {
                      header("location:inserimentomotogp.php");
				}
			?>
		</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>