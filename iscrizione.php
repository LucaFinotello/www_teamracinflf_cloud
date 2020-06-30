<?php
    session_start();
    include("db_con.php");
    include ('header.html')
?>
		<div id="main">
			<div id="menu"> 
				<?php include('menu.html') ?>
			</div>
            <div id="contenuto">
                <span id="path">Ti trovi in:  <a href="home.php">Home</a> &#187; Iscrizione</span>
                <?php include ('formRegistrazione.html') ?>
            </div>
		</div>
<?php
    include ('footer.html');
?>