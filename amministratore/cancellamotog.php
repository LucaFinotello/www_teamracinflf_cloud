<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html');
?>
<div id="main">
    <div class="container">
        <?php include ('menuDesktopAmministratore.html') ?>
    </div>
		<div id="contenuto">
		<?php
            $id = $_POST['id'];
			$strsql = "delete from motogp where id='$id'";
			$risultato = mysqli_query($conn, $strsql);
			if (! $risultato)
			  {
			   echo "Errore nel comando SQL" . "<br>";
			  } else {
                header("location:motogp.php");
            }
		?>
            <p><a href="motogp.php"><button>Annulla</button></a></p>
		</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>