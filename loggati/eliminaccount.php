<?php
	session_start();
	include("../db_con.php");
include_once('../mysql-fix.php');
include ('header.html');
?>
		<div id="main">
            <?php include ('findDevice.php') ?>
		<div id="contenuto">
		<span id='path'>Ti trovi in: Home </span>
			<?php
				$nome = $_POST["nome"];
				$strsql = "delete from clienti where nome = '$nome'";
				$risultato = mysqli_query($conn, $strsql);
				if (! $risultato)
				  {
				   echo "Errore nel comando SQL" . "<br>";
				  } else {
				    header("location:../index.php");
                }

			?>    
		</div>
	</div>
<?php
include ('footer.html');
?>