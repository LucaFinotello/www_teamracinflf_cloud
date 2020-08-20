<?php
	session_start();
	include("db_con.php");
	include ('header.html');
?>
		<div id="main">
            <?php include('findDevice.php') ?>
            <div id="contenuto">
                <span id="path"> Ti trovi in: Home </span>
                <h2>L'UNICO SERVIZIO ON LINE IN CUI PUOI TROVARE DI TUTTO SULLE MOTO</h2>
                <video width="640" height="480" controls autoplay loop>
                    <source src="immagini/sigla-divino-pernat-motogp-tv8-2017.mp4" type="video/mp4">
                    <source src="movie.ogg" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
                <br><br>
                <p>In questo sito troverete qualsiasi informazione su moto, sia dei giorni nostri ma anche moto d'epoca.
                In caso di mancate informazioni contatateci via e-mail. RISPONDEREMO AL PI&Ugrave; PRESTO.</p>
                <p> Ci trovate anche su facebook </p>
            </div>
        </div>
<?php
    include ('footer.html')
?>