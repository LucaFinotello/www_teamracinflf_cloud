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
				$id = $_POST["id"];
				$strsql = "delete from circuiti where id = '$id'";
				$risultato = mysqli_query($conn, $strsql);
				if (! $risultato)
				  {
				   echo "Errore nel comando SQL" . "<br>";
				  } else {
                    header("location:circuiti.php");
                }

			?>
			<p><a href="circuiti.php">Visualizza</a></p>
		</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>