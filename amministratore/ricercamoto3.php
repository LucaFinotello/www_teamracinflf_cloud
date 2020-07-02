<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html');
?>
    <div id="main">
        <?php include ('menuDesktopAmministratore.html') ?>
		<div id="contenuto">
		    <h2>Inserire pilota da modificare</h2>  
			<form action="ricercamototre.php" method="POST" >
			<p>Pilota: <input name="pilota" type="text" value="">
			<input type="submit" value="Invia" name="Invio">
			<input type="reset" value="Annulla" name="Annulla"></p>
        </form>
		</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>