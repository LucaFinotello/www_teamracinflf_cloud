<?php
	session_start();
	include("db_con.php");
    include_once('mysql-fix.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//Dtd XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/Dtd/xhtml1-strict.dtd">
<html>
	<head>
		<link rel="icon" href="immagini/favicon.ico" />
		<title>Login- Team rancing</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="title" content="" />
		<meta name="description" content="Home page del sito del progetto" />
		<meta name="keywords" content="team-racing" />
		<meta name="language" content="italian it" />
		<meta name="author" content="" />
		<link href="style.css" rel="stylesheet" type="text/css" media="screen"/>
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
					<li><a href="home.php">Home</a></li>
					<li><a href="iscrizione.php">Iscrizione</a></li>
					<li>Login</li>
				</ul>
			</div>
		<div id="contenuto">
			<span id="path">Ti trovi in: <a href="home.php">Home</a> &#187; Login</span>
		<?php
			$_SESSION["username"]=$_POST["username"];
			$_SESSION["password"]=$_POST["password"];
            $user_reg = 1;
			$query = mysqli_query( $conn, "SELECT * FROM clienti WHERE username='".$_POST["username"]."' AND password ='".$_POST["password"]."'")
			or DIE('query non riuscita'.mysqli_error());
			if(mysqli_num_rows($query)>0)
			{
				$row = mysqli_fetch_assoc($query);
				$_SESSION["logged"] =true;

				if($_POST["username"]=="admin" and $_POST["password"]=="nimda")
				{
					header("location:amministratore/clienti.php");
				}
				else{
				    if ($user_reg == '1') {
                        header("location:loggati/home1.php");
                    } else {
				        echo '<br><br>Account da confermare. Controlla l\'email.';
                    }
				}
			}else{
		?>
		<div id="form">
				<form action="login.php" method="POST">
					<p><span class="capo">Username: <input name="username" type="text"/></span>
					<span class="capo">Password: <input name="password" type="password"/></span>
					<input type="submit" title="login" value="Login" name="Login"/></p>
				</form>
			</div>
		<?php
			echo "Username o password errati";
			}
		?>
		</div>
	</div>
	<div id="footer">
		Veniteci a trovare
	</div>
	</body>
</html>