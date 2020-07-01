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
				$news = $_POST["news"];
				$strsql = "update news set news = '$news' where id = '$id'";
				$risultato = mysqli_query($conn, $strsql);
				if (!$risultato)
				  {
				   echo "Errore nel comando SQL" . "<br>";
				  } else {
                    header("location:news.php");
                }
			?>
			<a href="news.php">Visualizza </a>
		</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>