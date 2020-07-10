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
			<form action="inserimentonotizia.php" method="POST" >
				 <p>
				 <span class="capo">Data: <?php echo $today=date("j-n-Y");?></span>
				 <span class="capo">Notizia: <textarea name="news" ></textarea></span>
				 <span class="capo"><input type="submit" value="Inserisci" name="Invio">
				 <input type="reset" value="Annulla" name="Annulla"></span></p>     
		  </form>
		</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>