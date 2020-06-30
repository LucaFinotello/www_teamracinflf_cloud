<?php
    session_start();
    include("db_con.php");
    include ('header.html');
?>
		<div id="main">
			<div id="menu"> 
				<?php include ('menu.html')?>
			</div>
		<div id="contenuto">
			<span id="path">Ti trovi in:  <a href="home.php">Home</a> &#187; Iscrizione</span> </span>
			<?php
			$nome = $_POST['nome'];
			$cognome = $_POST['cognome'];
			$email = $_POST['email'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			if($_POST["username"] != "" && $_POST["password"]!= "" && $_POST["nome"] != "" && $_POST["cognome"] != "" 
			&& $_POST["email"] != "")
			{
			$query_registrazione = mysqli_query($conn, "INSERT INTO clienti set username,password,nome,cognome, email)
			VALUES ('".$_POST["username"]."','".$_POST["password"]."','".$_POST["nome"]."','".$_POST["cognome"]."','".$_POST["email"]."')")
			or die ("query di registrazione non riuscita".mysqli_error());
			}else{
			include ('formRegistrazione.html');
			echo "<p>Non sono stati inseriti tutti i campi neccessari alla registrazione</p>";
			}
			if(isset($query_registrazione)){
			$_SESSION["logged"]=true;
                header("location:entra.php");
			}else{
			echo "<p>Registrazione non avvenuta</p>";
			}
		?>
		</div>
	</div>
<?php
    include ('footer.html')
?>