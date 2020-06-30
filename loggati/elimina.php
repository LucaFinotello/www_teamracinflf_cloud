<?php
	session_start();
	include("../db_con.php");
    include_once('../mysql-fix.php');
    include ('header.html');
?>
		<div id="main">
			<?php
            include ('findDevice.php');
            ?>
		<div id="contenuto">
		<span id="path">Ti trovi in: <a href="home1.php">Home</a> &#187; Elimina account</span>
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
		<div id="profilo">
            <?php
                $q = mysqli_query($conn, "SELECT * FROM clienti WHERE username = '".$_SESSION['username']."'");
                while($riga = mysqli_fetch_assoc($q)){
                    if($riga['image'] == ""){
                    echo "<img width='90' height='100' src='../immagini/default.jpg' alt='Default Profile Pic'>";
                    } else {
                            echo "<img width='90' height='100' src='immagini/".$riga['image']."' alt='Profile Pic'>";
                           }
                            echo "<br>";
                        }
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
				<form action="eliminaccount.php" method="POST" >
				   <p><span class="capo">Nome: <input readonly name="nome" type="text" value="<?php echo $riga["nome"]?>"></span>
				   <span class="capo">Cognome: <input readonly name="cognome" type="text" value="<?php echo $riga["cognome"]?>"></span>
				   <span class="capo">Username: <input readonly name="username" type="text" value="<?php echo $riga["username"]?>"></span>
				   <span class="capo">Password: <input readonly name="password" type="text" value="<?php echo $riga["password"]?>"></span>
				   <span class="capo"><input type="submit" value="elimina account" name="Invio"></span></p>
				</form>
			<?php
					}
			?>	
			</div>
		</div>
	</div>
<?php
include ('footer.html');
?>