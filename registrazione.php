<?php
    session_start();
    include("db_con.php");
    include ('header.html');
?>
		<div id="main">
            <?php include('findDevice.php') ?>
		<div id="contenuto">
			<span id="path">Ti trovi in:  <a href="index.php">Home</a> &#187; Iscrizione</span> </span>
			<?php
			$nome = $_POST['nome'];
			$cognome = $_POST['cognome'];
			$cf = $_POST['cf'];
			$email = $_POST['email'];
			$username = $_POST['username'];
			$password = $_POST['password'];
            if($_POST["username"] != "" && $_POST["password"]!= "" && $_POST["nome"] != "" && $_POST["cognome"] != ""
                && $_POST["email"] != "") {
                $strsql = "insert into clienti set username='$username', password='$password', nome= '$nome',cognome= '$cognome', email = '$email', cf= '$cf'";
                $risultato = mysqli_query($conn, $strsql);
                if (!$risultato) {
                    echo "Errore nel comando SQL" . "<br>";
                } else {
                    $to = $_POST["email"];
                    $toname = $_POST["cognome"] . "" . $_POST["nome"];
                    $subject = "Completa la tua registrazione";

                    $boundary = "==MP_Bound_xyccr948x==";
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers .= "Content-type: multipart/alternative; boundary=\"$boundary\"\r\n";
                    $headers .= "From: teamracinglf@gmail.com \r\n";
                    $html_msg = "<center>";
                    $html_msg .= "<table width=\"500\" border=0 cellpadding=\"4\">";
                    $html_msg .= "<tr><td align=\"center\">&nbsp;";
                    $html_msg .= "</td></tr>";
                    $html_msg .= "<tr><td>Questi sono i dati della tua registrazione:";
                    $html_msg .= "</td></tr><tr><td>Username: <font color=\"red\">" . $username . "</font>";
                    $html_msg .= "</td></tr><tr><td>Password: <font color=\"red\">" . $password . "</font>";
                    $html_msg .= "</td></tr><tr><td align=\"center\">&nbsp;";
                    $html_msg .= "</td></tr></table></center>";
                    $confirmmessage = "Salve". " " . $toname . ",\n\n";
                    $confirmmessage .= "per completare la tua registrazione devi cliccare sul link sottostante:\n\n";
                    $confirmmessage .= $html_msg . "\n\n";

                    $confirmmessage .= "Clicca <a href='http://127.0.0.1/www_teamracinglf_cloud/conferma.php"."?id=$cf'> qui </a>per confermare la tua registrazione";
                    //$confirmmessage .= "Clicca <a href='https://www.teamracinglf.cloud/conferma.php"."?id=$cf'> qui </a>per confermare la tua registrazione";
                    $message = "This is a Multipart Message in MIME format\n";
                    $message .= "--$boundary\n";
                    $message .= "Content-type: text/html; charset=iso-8859-1\n";
                    $message .= "Content-Transfer-Encoding: 7bit\n\n";
                    $message .= $confirmmessage . "\n";
                    $message .= "--$boundary--";
                    $mailsent = mail($to, $subject, $message, $headers);
                    if ($mailsent)
                    {
                        echo "<br><br>Salve" .  $toname . ",<br>";
                        echo "Un messaggio è stato inviato all'indirizzo <b>" . $to . "</b> da te fornito.<br><br>";
                        echo "IMPORTANTE:<br>";
                        echo "Per completare la registrazione al sito devi aprire la tua casella e-mail, leggere il messaggio di conferma e cliccare sul link che troverai all'interno.<br><br>";
                    } else {
                        echo "Errore durante l'invio dell'e-mail.";
                    }
                }
            }else{
			include ('formRegistrazione.html');
			echo "<p>Non sono stati inseriti tutti i campi neccessari alla registrazione</p>";
			}
		?>
		</div>
	</div>
<?php
    include ('footer.html')
?>