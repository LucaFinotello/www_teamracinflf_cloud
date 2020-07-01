<?php
	session_start();
	include("db_con.php");
    include_once('mysql-fix.php');
    include ('header.html');
?>
	<div id="main">
        <?php include('menuDesktopAmministratore.html'); ?>
		<div id="contenuto">
			<?php
                print_r($_POST);
                $id = $_POST['id'];
				$immagine = $_POST["immagine"];
				$descrizione = $_POST["descrizione"];
				$stato = $_POST["stato"];
				$paese = $_POST["paese"];
				$strsql = "update circuiti set immagine='$immagine', descrizione='$descrizione', stato='$stato', paese='$paese' where id = '$id'";
				$risultato = mysqli_query($conn, $strsql);
				if (!$risultato)
				  {
				   echo "Errore nel comando SQL" . "<br>";
				  } else {
                    header("location:circuiti.php");
                }
			?>
		</div>
	</div>
<?php
    include ('footerAmmnistratore.html');
?>