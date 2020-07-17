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
                    $title = $_POST["title"];
                    $description = $_POST["description"];
                    $dataInizio = date("Y-m-d H:i:s", strtotime($_POST["dataInizio"]));
                    $dataFine = date("Y-m-d H:i:s", strtotime($_POST["dataFine"]));
                    $status = 1;
                    $created= date ("Y-m-d H:i:s");

                    $strsql = "insert into events set title = '$title', description='$description',
                                start_date= '$dataInizio', end_date='$dataFine', created ='$created', status = '$status' ";
                    $risultato = mysqli_query($conn, $strsql);
                    if (! $risultato)
                    {
                        echo "Errore nel comando SQL" . "<br>";
                    }
                    else
                    {
                        header("location:inserimentoCalendario.php");
                    }
			?>
		</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>