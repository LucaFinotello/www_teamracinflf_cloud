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

            function check_ext($tipo) {

                switch($tipo) {
                    case "image/png":
                        return true;
                        break;
                    case "image/jpg":
                        return true;
                        break;
                    case "image/jpeg":
                        return true;
                        break;
                    case "image/gif":
                        return true;
                        break;
                    default:
                        return false;
                        break;
                }

            }

            function get_ext($tipo) {

                switch($tipo) {
                    case "image/png":
                        return ".png";
                        break;
                    case "image/jpg":
                        return ".jpg";
                        break;
                    case "image/jpeg":
                        return ".jpg";
                        break;
                    case "image/gif":
                        return ".gif";
                        break;
                    default:
                        return false;
                        break;
                }

            }

            function get_error($tmp, $type, $size, $max_size) {

                if(!is_uploaded_file($tmp)) {
                    echo "File caricato in modo non corretto<br />";
                }
                if(!check_ext($type)) {
                    echo "Estensione del file non ammesso<br />";
                }
                if($size > $max_size) {
                    echo "Dimensione del file troppo grande<br />";
                }
                echo '<a href="news.php">News</a>';
            }

            $tmp = $_FILES['image']['tmp_name'];
            $type = $_FILES['image']['type'];
            $size = $_FILES['image']['size'];
            $max_size = 5242880; //dimensione massima in byte consentita
            $folder = "../immagini/postimages/"; //cartella di destinazione dell'immagine

            if(is_uploaded_file($tmp) && check_ext($type) && $size <= $max_size) {

                $ext = get_ext($type); //estensione dell'immagine
                $name = time().rand(0,999); //timestamp attuale + un numero random compreso tra 0 e 999
                $name = $name.$ext; //aggiungo al nome appena creato l'estensione
                $name = $folder.$name; //aggiungo il folder di destinazione
                //esempio risultato finale: folder/timestamp657.gif
                if(move_uploaded_file($tmp,$name)) {

                    $titolo = $_POST["titolo"];
                    $dettagli = $_POST["dettagli"];
                    $active = 1;

                    $strsql = "insert into tblposts set PostTitle= '$titolo', PostDetails= '$dettagli', PostingDate = NOW(), UpdationDate = NOW(), 
                            Is_Active= '$active', PostUrl= '$titolo', PostImage= '$name'";
                    $risultato = mysqli_query($conn, $strsql) or die (mysqli_error($conn));
                    if (! $risultato)
                    {
                        echo "Verificare che i valori siano inseriti correttamente" . "<br>";
                    }
                    else
                    {
                        header("location:inserimentonews.php");
                    }
                } else {
                    echo "Non è stato possibile caricare l'immagine<br />";
                    echo '';
                }
            } else {

                get_error($tmp, $type, $size, $max_size);

            }





			?>
		</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>