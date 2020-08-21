<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html');
?>

    <div id="main">
        <?php include ('menuDesktopAmministratore.html');?>
        <div id="contenuto">
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
                ?>

                <form action="modificahome.php" method="POST" >
                    <p><input readonly name="id" type="text" hidden value="<?php echo $riga["id"]?>">
                        <span class="capo"><textarea name="titolo" type="text" value="<?php echo $riga["titolo"]?>"><?php echo $riga["titolo"]?></textarea></span>
                        <br><br>
                        <video width="640" height="480" controls autoplay loop>
                            <source src="immagini/sigla-divino-pernat-motogp-tv8-2017.mp4" type="video/mp4">
                            <source src="movie.ogg" type="video/ogg">
                            Your browser does not support the video tag.
                        </video> <br><br>
                        <span class="capo"><textarea name="descrizione" type="text" value="<?php echo $riga["descrizione"]?>"><?php echo $riga["descrizione"]?></textarea></span>
                        <span class="capo"><input type="submit" value="Invia" name="Invio"></span></p>
                </form>
                <?php
            }
            ?>
        </div>
    </div>
    </div>
<?php include ('footerAmmnistratore.html'); ?>