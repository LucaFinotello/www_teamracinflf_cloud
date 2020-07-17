<?php
	session_start();
	include("db_con.php");
	include ('header.html');
?>
    <div id="main">
        <?php include('findDevice.php') ?>
        <div id="contenuto">
            <span id="path">Ti trovi in: <a href="index.php">Home</a> &#187; Login</span>
            <div id="form">
                <form action="login.php" method="POST">
                    <p><span class="capo">Username: <input name="username" type="text"/></span>
                    <span class="capo">Password: <input name="password" type="password"/></span>
                    <input type="submit" title="login" value="Login" name="Login"/></p>
                </form>
            </div>
        </div>
    </div>
<?php include ('footer.html');?>