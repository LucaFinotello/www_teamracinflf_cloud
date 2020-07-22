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
				$titolo = $_POST["titolo"];
				$strsql = "update tblposts set PostDetails = '$news', PostTitle= '$titolo' where id = '$id'";
				$risultato = mysqli_query($conn, $strsql);
				if (!$risultato)
				  {
				   echo "Errore nel comando SQL" . "<br>";
				  } else {
                    header("location:news.php");
                }
			?>
		</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>