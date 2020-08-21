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
				$titolo = $_POST["titolo"];
				$descrizione = $_POST["descrizione"];
				print_r ($_POST);
				$strsql = "update home set titolo = '$titolo', descrizione= '$descrizione' where id = '$id'";
				$risultato = mysqli_query($conn, $strsql);
				if (!$risultato)
				  {
				   echo "Errore nel comando SQL";
				  }else {
                    header("location:homePage.php");
                }
			?>
		</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>