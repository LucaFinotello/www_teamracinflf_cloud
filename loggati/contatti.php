<?php
	session_start();
	include("../db_con.php");
    include_once('../mysql-fix.php');
    include ('header.html');
	if(isset($_SESSION['username']))
{
    # http://localhost/test_site/php/test/MAIL/PHPMail_Test.php

if (isset($_POST['Submitted'])){

  // estrae e stampa variabili e valori da $_POST
  print '<table width="500" border="0" cellspacing="5" cellpadding="5" style="display: none">';
  while(list($chiave, $valore)=each($_POST)){
    ${$chiave}=trim(strip_tags($valore));
    print "<tr><td>".$chiave." : </td><td>".${$chiave}."</td></tr>";
  }
  print "</table>";

//  require_once 'Config_MAIL.php';	// servizi SMTP disponibili
//  SMTPservice(1);			// sceglie il servizio SMTP da usare per invio mail, da Config_MAIL.php

  // utilizza i parametri seguenti NON quelli di php.ini, solo per questo script
  ini_set("SMTP"     ,$eM_Host);
  ini_set("smtp_port",$eM_Port);
  ini_set("username" ,$eM_username);
  ini_set("password" ,$eM_password);

  // prepara e invia messaggio
  // per FROM viene usato $eM_username per evitare il rifiuto dell' invio (invece che $emailFROM)
  $eM_header = "MIME-Version: 1.0\r\n";
  $eM_header.= "Content-type: text/html; charset=utf-8\r\n";
  $eM_header.= "From: <".$eM_username.">\r\n";

  if(!empty($eM_CC1))  $eM_header.= "cc: " .$eM_CC1 ."\r\n";	// copia conoscenza
  if(!empty($eM_BCC1)) $eM_header.= "Bcc: ".$eM_BCC1."\r\n";	// copia conoscenza nascosta

  if(!empty($eM_ReplyTo)) $eM_header.= "Reply-To: ".$eM_ReplyTo."\r\n";	// rispondere a ...

  if (mail($eM_TO1, $eM_subject, $eM_body, $eM_header)) print "<div id='main'><b>MESSAGGIO INVIATO</b>";
  else                                                  print "<b>ERRORE : MESSAGGIO NON INVIATO</b>";
  print "<br /><br /><a href='contatti.php'>Indietro</a></div>";
}
else{
  require_once 'Config_MAIL.php';	// servizi SMTP disponibili
  SMTPservice(1);			// sceglie il servizio SMTP da provare per invio mail, da Config_MAIL.php
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
            <form action="contatti.php" method="post" enctype="multipart/form-data" name="myform" id="myform">
                <div id="form">
                        <input type="text" name="eM_Host" id="eM_Host" required value="smtp.gmail.com" size="50" hidden>
                        <input type="text" name="eM_Port" id="eM_Port" required value="<?= $eM_Port; ?>" size="50" hidden>
                        <label for="eM_FROM">E-mail da :</label>
                        <input type="email" name="eM_username" id="eM_username" required value="" size="50" ><br>
                        <input type="text" name="eM_password" id="eM_password" required value="Yamahayzf-r" size="50" hidden>
                        <input type="email" name="eM_FROM" id="eM_FROM" required value="teamracinglf@gmail.com" size="50" hidden>
                        <label for="eM_TO1">e-mail a :</label>
                        <input type="email" name="eM_TO1" id="eM_TO1" required value="teamracinglf@gmail.com" size="50" ><br>
                        <label for="eM_subject">Oggetto :</label>
                        <input type="text" name="eM_subject" id="eM_subject" required value="" placeholder="Oggetto email" size="50"><br>
                        <label for="eM_body">Messaggio :</label>
                    <textarea type="text" name="eM_body" id="eM_body" required value="" placeholder="Inserisci testo" size="50"></textarea><br>
                    <button class="button" name="submit" type="submit" id="submit" formaction="contatti.php" formenctype="multipart/form-data" formmethod="POST">Invia</button>
                </div>
                <input type="hidden" name="eM_TO2" value="">
                <input type="hidden" name="eM_CC1" value="">
                <input type="hidden" name="eM_BCC1" value="">
                <input type="hidden" name="eM_ReplyTo" value="">

                <input type="hidden" name="Submitted" value="1" />
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
}
else
{
     echo '<div class="centra"><h1>Non puoi vedere questa pagina 
	 devi <a href="../entra.php">Loggarti</a> prima</h1></div>';
}
include ('footer.html');
?>
