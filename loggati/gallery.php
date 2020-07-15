<?php
session_start();
include_once('../mysql-fix.php');
include('../db_con.php');
include ('header.html');
?>

<div id="main">
    <?php include('findDevice.php') ?>
    <div id="contenuto">
        <span id="path">Ti trovi in: <a href="home1.php">Home</a> &#187; Galleria</span>
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

<?php
//template di base
echo "<div class='weblog'>";

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
</div>
</div>
    <?php
    include ('footer.html');
    ?>
