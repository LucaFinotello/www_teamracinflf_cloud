<?php
	session_start();
	include("db_con.php");
	include ('header.html');
?>
		<div id="main">
            <?php include('findDevice.php') ?>
            <div id="contenuto">
                <span id="path"> Ti trovi in: Home </span>
                <?php
                $strsql = "select * from home";
                $risultato = mysqli_query($conn, $strsql);
                if (! $risultato)
                {
                    echo "Errore nel comando SQL" . "<br>";
                }
                $riga = mysqli_fetch_array($risultato);
                if (! $riga)
                {
                    echo "Pagina in costruzione" . "<br>";
                }
                else
                {
                    echo $riga["titolo"];
                    ?>
                    <video width="640" height="480" controls autoplay loop>
                        <source src="immagini/sigla-divino-pernat-motogp-tv8-2017.mp4" type="video/mp4">
                        <source src="movie.ogg" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                    <br><br>
                    <?php
                    echo $riga["descrizione"];
                } ?>
            </div>
        </div>
<?php
    include ('footer.html')
?>