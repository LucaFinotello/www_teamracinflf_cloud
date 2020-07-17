<?php
    session_start();
    include("db_con.php");
    include ('header.html');
?>
		<div id="main">
            <?php include('findDevice.php') ?>
            <div id="contenuto">
                <span id="path">Ti trovi in:  <a href="index.php">Home</a> &#187; Iscrizione</span>
                <?php include ('formRegistrazione.html') ?>
            </div>
		</div>
<?php
    include ('footer.html');
?>