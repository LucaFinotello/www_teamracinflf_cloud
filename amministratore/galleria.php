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
    echo '<a href="gallery.php">Torna all\'uploader</a>';

}

$tmp = $_FILES['image']['tmp_name'];
$type = $_FILES['image']['type'];
$size = $_FILES['image']['size'];
$max_size = 5242880; //dimensione massima in byte consentita
$folder = "../immagini/gallery/"; //cartella di destinazione dell'immagine

if(is_uploaded_file($tmp) && check_ext($type) && $size <= $max_size) {

    $ext = get_ext($type); //estensione dell'immagine
    $name = time().rand(0,999); //timestamp attuale + un numero random compreso tra 0 e 999
    $name = $name.$ext; //aggiungo al nome appena creato l'estensione
    $name = $folder.$name; //aggiungo il folder di destinazione
    //esempio risultato finale: folder/timestamp657.gif
    if(move_uploaded_file($tmp,$name)) {
        header('location:gallery.php');
    } else {
        echo "Non è stato possibile caricare l'immagine<br />";
        echo '';
    }
} else {

    get_error($tmp, $type, $size, $max_size);

}
?>