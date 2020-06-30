<?php
	session_start();
	include("../db_con.php");
    include_once('../mysql-fix.php');
    include ('header.html');
?>
		<div id="main">
            <?php include ('findDevice.php') ?>
		<div id="contenuto">
			<span id="path">Ti trovi in: <a href="home1.php">Home</a> &#187; Modifica password</span>
			<div class="container">
				<div class="menu1">
					<ul>
						<li><a href="#"><?php echo $_SESSION['username'];
									$q = mysqli_query($conn, "SELECT * FROM clienti WHERE username = '".$_SESSION['username']."'");
						?></a>
						   <ul>
								<li><a href="profilo.php">Modifica profilo</a></li>
								<li><a href="modifica.php">modifica password</a></li>
								<li><a href="elimina.php">Elimina account</a></li>
								<li><a href="../logout.php">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<?php
				if(count($_POST)>0)
				{
					$result = mysqli_query($conn, "SELECT * from clienti WHERE username='" . $_SESSION["username"] . "'");
					$row=mysqli_fetch_array($result);
					if($_POST["currentPassword"] == $row["password"])
					{
						mysqli_query($conn, "UPDATE clienti set password='" . $_POST["newPassword"] . "' WHERE username='" . $_SESSION["username"] . "'");
						$message = "Password cambiata";
					} else
					$message = "Cambio password errato";
				}
			?>
			<form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
			<div class="centra">
				<div>
					<?php if(isset($message))
						{ 
							echo $message;
						} 
					?>
				</div>
				<table>
					<tr>
						<td class="mezzo" colspan="2">Cambio password</td>
					</tr>
					<tr>
						<td><label>Password corrente</label></td>
					<td>
					<input type="password" name="currentPassword" class="txtField"/><span id="currentPassword"></span>
					</td>
					</tr>
					<tr>
					<td>
						<label>Nuova password</label>
					</td>
					<td>
					<input type="password" name="newPassword" class="txtField"/><span id="newPassword" class="required"></span>
					</td>
					</tr>
					<td>
						<label>Conferma Password</label>
					</td>
					<td>
					<input type="password" name="confirmPassword" class="txtField"/><span id="confirmPassword" class="required"></span>
					</td>
					</tr>
					<tr>
					<td class="mezzo" colspan="2">
					<input type="submit" name="submit" value="Conferma" class="btnSubmit"></td>
					</tr>
				</table>
			</div>
			</form>
		</div>
	</div>
    <?php
    include ('footer.html');
    ?>