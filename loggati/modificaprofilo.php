<?php
	session_start();
	include("../db_con.php");
    include_once('../mysql-fix.php');
    include ('header.html');
?>
		<div id="main">
            <?php include ('findDevice.php') ?>
		<div id="contenuto">
		<span id="path">Ti trovi in: Modifica profilo</span>
			<div class="container">
			<div class="menu1">
				<ul>
					<li><a href="#"><?php echo $_SESSION['username'];
									$q = mysqli_query($conn, "SELECT * FROM clienti WHERE username = '".$_SESSION['username']."'");
						?></a>
					   <ul>
							<li>Modifica profilo</li>
							<li><a href="modifica.php">Modifica password</a></li>
							<li><a href="../feedback1.php">Feedback</a></li>
							<li><a href="elimina.php">Elimina account</a></li>
							<li><a href="../logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
			</div>
			<div id="profilo">
			<?php
				$username = $_SESSION['username'];
				$password = $_SESSION['password'];
				$strsql = "select * from clienti where username ='$username' and password ='$password'";
				$risultato = mysqli_query($conn, $strsql);
				if (! $risultato)
				  {
				   echo "Errore nel comando SQL" . "<br>";
				  }
				$riga = mysqli_fetch_array($risultato);
				if (! $riga)
					{
					   echo "Cliente non presente" . "<br>";
					}
				  else
					{
					   
			?>
				<form action="modificaprofilo.php" method="POST" >
				   <p><span class="capo">Nome: <input readonly name="nome" type="text" value="<?php echo $riga["nome"]?>"></span>
				   <span class="capo">Cognome: <input readonly name="cognome" type="text" value="<?php echo $riga["cognome"]?>"></span>
				   <span class="capo">E-mail: <input readonly name="email" type="text" value="<?php echo $riga["email"]?>"></span>
				   <span class="capo">Username: <input readonly name="username" type="text" value="<?php echo $riga["username"]?>"></span>
				   <span class="capo">Password: <input readonly name="password" type="text" value="<?php echo $riga["password"]?>"></span>
				</form>
			<?php
					}
				echo "Profilo modificato con successo!" . "<br>";
			?>	
			</div>
		</div>
	</div>
<?php
include ('footer.html');
?>