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
                    echo "<br>Pagina in costruzione" . "<br>";
                }
                else
                {
                    echo $riga["titolo"];
                    echo $riga["descrizione"];
                } ?>
            </div>
        </div>
<?php
    include ('footer.html')
?>