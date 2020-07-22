<?php
	session_start();
	include("../db_con.php");
    include_once('../mysql-fix.php');
    include ('header.html');
	if(isset($_SESSION['username']))
{  
     
?>
<div id="main">
        <?php include ('findDevice.php') ?>
		<div id="contenuto">
			<span id="path">Ti trovi in: <a href="home1.php">Home</a> &#187; Contatti</span>
			<div class="container">
			<div class="menu1">
				<ul>
					<li><a href="#"><?php echo $_SESSION['username'];
									$q = mysqli_query($conn, "SELECT * FROM clienti WHERE username = '".$_SESSION['username']."'");
						?></a>
					   <ul>
							<li><a href="profilo.php">Modifica profilo</a></li>
							<li><a href="modifica.php">Modifica password</a></li>
							<li><a href="elimina.php">Elimina account</a></li>
							<li><a href="../logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
			</div>
			<form name="modulo">
				<div id="form">
					Email:<br />
					<input type="text" name="email"> <br />
					Oggetto:<br />
					<input type="text" name="oggetto"> <br />
					Messaggio:<br />
					<textarea name="messaggio" rows="10" cols="30"></textarea>  <br/>
					<input type="button" value="Invia" onClick="Email()">
				</div>
			</form>
		</div>
		<div id="contatti">
				<p><span class="capo"><img src="../immagini/posto.png"> Indirizzo: <a href="https://www.google.it/maps/dir/45.1512556,12.1042598/45.1513323,12.104263/@45.1516158,12.0995452,17z/data=!4m2!4m1!3e2?hl=it&authuser=0"> Via mondonovo, 54 Cavarzere 30014 (VE)</a></span>
				<span class="capo"><img src="../immagini/tel.png"> Telefono: <a href="tel:+393450382340">345/0382340</a></span>
				<span class="capo"><img src="../immagini/busta.png"> E-mail: teamracinglf@gmail.com</span></p>
			</div>
	</div>
<?php   
}
else
{
     echo '<div class="centra"><h1>Non puoi vedere questa pagina 
	 devi <a href="../entra.php">Loggarti</a> prima</h1></div>';
}
include ('footer.html');
?>
