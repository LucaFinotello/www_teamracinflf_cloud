<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html');
?>

<div id="main">
    <?php include ('menuDesktopAmministratore.html');?>
		<div id="contenuto">
			<h2>Inserimento evento</h2>
			<form action="calendario.php" method="POST">
				 <p><span class="capo">Titolo: <input name="title" type="text" value=""></span>
				 <span class="capo">Descrizione: <input name="description" type="text" value=""></span>
				 <span class="capo">Data Inizio: <input name="dataInizio" type="date" value=""/></span>
				 <span class="capo">Data Fine: <input name="dataFine" type="date" value=""></span>
				 <span class="capo"><input type="submit" value="Inserisci" name="Invio">
				 <input type="reset" value="Annulla" name="Annulla"></span></p> 
		  </form>
		</div>
	</div>
    <?php include ('footerAmmnistratore.html'); ?>
