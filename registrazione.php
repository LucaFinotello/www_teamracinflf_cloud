<?php
    session_start();
    include("db_con.php");
    include ('header.html');
?>
		<div id="main">
            <?php include('findDevice.php') ?>
		<div id="contenuto">
			<span id="path">Ti trovi in:  <a href="home.php">Home</a> &#187; Iscrizione</span> </span>
			<?php
			$nome = $_POST['nome'];
			$cognome = $_POST['cognome'];
			$email = $_POST['email'];
			$username = $_POST['username'];
			$password = $_POST['password'];
            if($_POST["username"] != "" && $_POST["password"]!= "" && $_POST["nome"] != "" && $_POST["cognome"] != ""
                && $_POST["email"] != "") {
                $strsql = "insert into clienti set username='$username', password='$password', nome= '$nome',cognome= '$cognome', email = '$email' ";
                $risultato = mysqli_query($conn, $strsql);
                if (!$risultato) {
                    echo "Errore nel comando SQL" . "<br>";
                } else {
                    header("location:inserimentomotogp.php");
                }
            }else{
			include ('formRegistrazione.html');
			echo "<p>Non sono stati inseriti tutti i campi neccessari alla registrazione</p>";
			}

			if(isset($strsql)){
			$_SESSION["logged"]=true;
                header("location:entra.php");
			}else{
                header("location:entra.php");
			}
		?>
		</div>
	</div>
<?php
    include ('footer.html')
?>