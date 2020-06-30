<?php
	session_start();
	include("../db_con.php");
    include_once('../mysql-fix.php');
    include ('header.html');
?>
		<div id="main">
			<?php include ('findDevice.php'); ?>
		<div id="contenuto">
		<span id="path">Ti trovi in: Home</span>
			<div class="container">
			<div class="menu1">
				<ul>
					<li><a href="#"><?php echo $_SESSION['username'];
									$q = mysqli_query($conn,"SELECT * FROM clienti WHERE username = '".$_SESSION['username']."'");
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
			<div id="profilo">
				<p><span class="capo"><a href="motogp.php">1. MotoGp</a></span>
				<span class="capo"><a href="moto2.php">2. Moto2</a></span>
				<span class="capo"><a href="moto3.php">3. Moto3</a></span>
				</div>
		</div>
	</div>
	<?php
    include ('footer.html');
?>