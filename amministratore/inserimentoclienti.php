<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html');
?>

<div id="main">
    <?php include ('menuDesktopAmministratore.html');?>
		<div id="contenuto">
			<h2>Inserimento nuovo addetto</h2>  
			<div class="#">
				<form action="inserimentocliente.php" method="POST" >
					 <p><span class="capo">Nome: <input name="nome" type="text" SIZE="35" value=""></span>
					 <span class="capo">Cognome:  <input name="cognome" type="text" value=""></span>
					 <span class="capo">E-mail: <input name="email" type="text" value=""></span>
					 <span class="capo">Username: <input name="username" type="text" value=""></span>
					 <span class="capo">Password: <input name="password" type="text" value=""></span>
					 <span class="capo"><input type="submit" value="Invia" name="Invio">
					 <input type="reset" value="Annulla" name="Annulla"></span></p>     
				</form>
			</div>
		</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>
