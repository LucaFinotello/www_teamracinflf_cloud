<?php
session_start();
include("db_con.php");
include_once('mysql-fix.php');
include ('header.html');
?>

<div id="main">
    <?php include ('menuDesktopAmministratore.html');?>

<?php
//template di base
echo "<fieldset class='weblog'>";
echo    '<legend style="color:blue">Immagini</legend>';

echo    "<form action=\"galleria.php\" method=\"POST\" enctype=\"multipart/form-data\">
        <input type=\"file\" value=\"scegli immagine\" name=\"image\" /><br />
        <input type=\"submit\" value=\"invia\" />
    </form>";
//Definiamo la directory di upload, dove mettere le nostre immagini
define('UPLOAD_DIR', '../immagini/gallery');
//
if(isset($_POST['action']) and $_POST['action'] == 'upload')
{   //se abbiamo cliccato l'immagine da caricare
    if(isset($_FILES['nomeFoto']))
    {   //recupero il nome
        $file = $_FILES['nomeFoto'];
        //se è tutto ok definismo il percorso e metto l'immagine nella cartella(controlliamo anche che sia stato caricato in upload
        //con tmp_name is_uploaded_file)
        if($file['error'] == UPLOAD_ERR_OK and is_uploaded_file($file['tmp_name']))
        {
            //percorso e muovo il file fisicamente
            $percorso = UPLOAD_DIR.$file['name'];
            move_uploaded_file($file['tmp_name'], UPLOAD_DIR.$file['name']);
        }
    }
}

//Impostiamo dove andiamo a leggere, in questo caso la cartella immagini dentro al nostro progetto
$dir_immagine = new DirectoryIterator('../immagini/gallery/');

//scorriamo tutta la directory
foreach ($dir_immagine as $fileIMG){

    //determiniamo che sia un file(togliamo i puntini inutili)
    if($fileIMG->isFile()) {

        //recuperiamo nome e percorso da passare al template
        $nome=$fileIMG->getFilename();
        $percorso = '../immagini/gallery/'.$nome;

        //stampiamo il template
        echo "<p class='immaginiRiga' style='display : inline; margin : 0.5%;'>";
        echo "<a class='fancybox-buttons' gallery-fancybox-group='button' href='$percorso'><img src='$percorso' style='width: 120px;height: 80px' alt='' /></a>";
        echo "</p>";
    }
}

echo '<style type="text/css">
        .fancybox-custom .fancybox-skin {
            box-shadow: 0 0 50px #222;
        }
    </style>';

?>
</div>
<?php include ('footerAmmnistratore.html'); ?>
