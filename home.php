<?php
	session_start();
	include("db_con.php");
	include ('header.html')
?>
		<div id="main">
            <input type="checkbox" id="nav-toggle" hidden>
            <label for="nav-toggle" class="nav-toggle" onclick></label>
			<div id="menu" class="nav">
				<?php include('menu.html')?>
			</div>
		<div id="contenuto">
			<span id="path"> Ti trovi in: Home </span>
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
			</div>
		</div>
	</div>
<?php
    include ('footer.html')
?>