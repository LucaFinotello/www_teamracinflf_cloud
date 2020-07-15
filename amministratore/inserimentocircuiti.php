<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html');
?>

<div id="main">
    <?php include ('menuDesktopAmministratore.html');?>
		<div id="contenuto">
			<h2>Inserimento circuito</h2>  
			<form action="inserimentocircuito.php" method="POST" enctype="multipart/form-data">
				 <p><span class="capo">Circuito: <input name="circuito" type="text" value=""></span>
				 <span class="capo">Immagine: <input type="file" value="scegli immagine" name="image" /></span>
				 <span class="capo">Descrizione: <textarea name="descrizione"></textarea></span>
				 <span class="capo">Stato: <input name="stato" type="text" value=""></span>
				 <span class="capo">Paese: <input name="paese" type="text" value=""></span>
				 <span class="capo"><input type="submit" value="Inserisci" name="Invio">
				 <input type="reset" value="Annulla" name="Annulla"></span></p> 
		  </form>
		</div>
	</div>
    <?php include ('footerAmmnistratore.html'); ?>
