<?php
	session_start();
	include("db_con.php");
include_once('mysql-fix.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//Dtd XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/Dtd/xhtml1-strict.dtd">
<html>
	<head>
		<title>Modifica Profilo- Team rancing</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="title" content="" />
		<meta name="description" content="Home page del sito del progetto" />
		<meta name="keywords" content="team-racing" />
		<meta name="language" content="italian it" />
		<meta name="author" content="" />
		<link href="style.css" rel="stylesheet" type="text/css" media="screen"/>
		<script type="text/javascript" src="javascript/modifica.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Montserrat%7cMontserrat+Subrayada%7cIndie+Flower" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Fredoka+One|Shadows+Into+Light+Two|Cherry+Cream+Soda|Cinzel+Decorative" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="immagini/favicon.ico" type="image/x-icon"/>
	</head>	
	<body>
	<div id="header">
		<h1>Team racing Luca & c.</h1>
	</div>
		<div id="main">
			<div id="menu"> 
				<ul>
					<li><a href="home1.php">Home</a></li>
					<li><a href="classifica.php">Classifica</a></li>
					<li><a href="news.php">News</a></li>
					<li><a href="circuiti.php">Circuiti</a></li>
					<li><a href="contatti.php">Contatti</a></li>
					<li><a href="feedback.php">Feedback</a></li>
				</ul>
			</div>
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
								<li><a href="logout.php">Logout</a></li>
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
	<div id="footer">
		Benvenuto nel nostro sito
	</div>
</body>
</html>