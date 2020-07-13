<?php
include("db_con.php");
include ('header.html');
$id = $_GET['id'];
$sql = "SELECT * FROM clienti WHERE cf = '$id'";

$query = mysqli_query($conn, $sql) or die(mysql_error());

$pcarray = mysqli_fetch_array($query); // Memorizza nell'array

if (!is_array($pcarray))  {

    echo "Oops! Niente da confermare!";
    exit; }

$id = $pcarray["nome"];

// Aggiorna la tabella user
$update = "UPDATE clienti SET " ."user_reg = 1 " ."WHERE nome = '$id'";

$result = mysqli_query($conn, $update) or die(mysql_error());
?>

<html> <head> <title>Iscrizione confermata!</title> </head> <body> <h3>Complimenti, la tua iscrizione al sito è stata confermata!</h3><br> <p><a href="entra.php">Clicca qui per tornare alla Home Page ed effettuare il log-in</a></p> </body> </html>