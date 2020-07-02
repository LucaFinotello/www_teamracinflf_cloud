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
				$pilota = $_POST["pilota"];
				$team = $_POST["team"];
				$punti = $_POST["punti"];
				$strsql = "update moto2 set punti = '$punti' where id = '$id'";
				$risultato = mysqli_query($conn, $strsql);
				if (!$risultato)
				  {
				   echo "Errore nel comando SQL" . "<br>";
				  }else {
                    header("location:moto2.php");
                }
			?>
            <p><a href="moto2.php"><button>Annulla</button></a></p>
		</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>