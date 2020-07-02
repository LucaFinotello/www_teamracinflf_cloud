<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html');
?>

<div id="main">
    <?php include ('menuDesktopAmministratore.html');?>
		<div id="contenuto">
			<h2>Inserimento nuovo pilota moto3</h2>  
			<form action="inserimentomototre.php" method="POST" >
				 <p><span class="capo">Pilota: <input name="pilota" type="text" value=""></span>
				 <span class="capo">Team: <input name="team" type="text" value=""></span>
				 <span class="capo">Punti: <input name="punti" type="text" value=""></span>
				 <span class="capo"><input type="submit" value="Inserisci" name="Invio">
				 <input type="reset" value="Annulla" name="Annulla"></span></p>     
		  </form>
		</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>