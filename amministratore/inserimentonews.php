<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html');
?>

<div id="main">
    <?php include ('menuDesktopAmministratore.html');?>
		<div id="contenuto">
			<h2>Inserimento nuova notizia</h2>  
			<form action="inserimentonotizia.php" method="POST" enctype="multipart/form-data">
				 <p>
				 <span class="capo">Titolo: <input type="text" name="titolo" value=""/></span>
                 <span class="capo">News: <textarea type="text" name="dettagli" value=""></textarea></span>
				 <span class="capo">Immagine: <input type="file" name="image" value="Inserisci immagine" /></span>
				 <span class="capo"><input type="submit" value="Inserisci" name="Invio">
				 <input type="reset" value="Annulla" name="Annulla"></span></p>     
		  </form>
		</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>