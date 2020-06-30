<?php
	session_start();
	include("../db_con.php");
    include_once('../mysql-fix.php');
include('header.html')
?>
		<div id="main">
			<?php
            include('findDevice.php')
            ?>
		<div id="contenuto">
		<span id="path">Ti trovi in: Home</span>
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
			<h2>L'UNICO SERVIZIO ON LINE IN CUI PUOI TROVARE DI TUTTO SULLE MOTO</h2>
			<div class="tabella">
				<table>
					<tr>
						<th>Cognome</th>
						<th>Nome</th>
						<th>E-mail</th>
					</tr>
					<tr>
						<td> Finotello </td>
						<td> Luca </td>
						<td> <a href="contatti.php">teamracinglf@gmail.com</a> </td>
					</tr>
				</table>
			</div>
			<p>In questo sito troverete qualsiasi informazione su moto, sia dei giorni nostri ma anche moto d'epoca.
			In caso di mancate informazioni contatateci via e-mail. RISPONDEREMO AL PI&Ugrave; PRESTO.</p> 
			<p> Ci trovate anche su facebook </p>
			&nbsp
            <a href="../TeamRacing">
                <div class="Box_Contenitore">
                    <img src="../immagini/teamracing.png"> TeamRacing App
                </div>
            </a>
            <a href="../RidingSchool">
                <div class="Box_Contenitore">
                    <img src="../immagini/ridingschool.png" >RidingSchool App
                </div>
            </a>
		</div>
	</div>
<?php
include ('footer.html');
?>