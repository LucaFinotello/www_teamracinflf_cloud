<?php
session_start();
include("db_con.php");
include ('header.html');
?>
<div id="main">
    <?php include('findDevice.php') ?>
    <div id="contenuto">
			<span id="path">Ti trovi in: <a href="index.php">Home</a> &#187; Login</span>
		<?php
			$_SESSION["username"]=$_POST["username"];
			$_SESSION["password"]=$_POST["password"];
			$query = mysqli_query( $conn, "SELECT * FROM clienti WHERE username='".$_POST["username"]."' AND password ='".$_POST["password"]."'")
			or DIE('query non riuscita'.mysqli_error());
			if(mysqli_num_rows($query)>0)
			{
				$row = mysqli_fetch_assoc($query);
				$_SESSION["logged"] =true;

				if($_POST["username"]=="admin" and $_POST["password"]=="nimda")
				{
					header("location:amministratore/clienti.php");
				}
				else {

                    $strsql = "SELECT * FROM clienti WHERE username='" . $_POST["username"] . "'";
                    $risultato = mysqli_query($conn, $strsql);
                    if (!$risultato) {
                        echo "Errore nel comando SQL" . "<br>";
                    }
                    $riga = mysqli_fetch_array($risultato);
                    if (!$riga) {
                        echo " Nessuna classifica attualmente presente";
                    } else {
                        $user_reg = $riga['user_reg'];
                        //echo $user_reg;
                        if ($user_reg == '1') {
                            header("location:loggati/home1.php");
                        } else {
                            echo '<br><br>Account da confermare. Controlla l\'email.';
                        }
                    }
                }
			}else{
		?>
                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'login')" id="defaultOpen">Login</button>
                    <button class="tablinks" onclick="openCity(event, 'Paris')">Registrati</button>
                </div>

                <!-- Tab content -->
                <div id="login" class="tabcontent">
                    <div id="form">
                        <form action="login.php" method="POST">
                            <p><span class="capo">Username: <input name="username" type="text"/></span>
                                <span class="capo">Password: <input name="password" type="password"/></span>
                                <input type="submit" title="login" value="Login" name="Login"/></p>
                        </form>
                        <?php
                        echo "Username o password errati";
                        }
                        ?>
                    </div>
                </div>

                <div id="Paris" class="tabcontent">
                    <?php include ('formRegistrazione.html') ?>
                </div>
    </div>
</div>
<?php include ('footer.html');?>
<script>
    function openCity(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
