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
				$codice = $_POST["codice"];
				$news = $_POST["news"];
				$strsql = "insert into news (codice, data, news) values ('$codice', NOW() , '$news')";
				$risultato = mysqli_query($conn, $strsql);
				if (! $risultato)
				  {
				   echo "Verificare il codice sia inserito correttamente" . "<br>";
				  }
				  else
				  {
                      header("location:inserimentonews.php");
				}
			?>
		</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>