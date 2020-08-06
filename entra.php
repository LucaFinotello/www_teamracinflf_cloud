<?php
	session_start();
	include("db_con.php");
	include ('header.html');
?>
    <div id="main">
        <?php include('findDevice.php') ?>
        <div id="contenuto">
            <span id="path">Ti trovi in: <a href="index.php">Home</a> &#187; Login</span>
            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'login')" id="defaultOpen">Login</button>
                <button class="tablinks" onclick="openCity(event, 'registrazione')">Registrati</button>
            </div>

            <!-- Tab content -->
            <div id="login" class="tabcontent">
                <div id="form">
                    <form action="login.php" method="POST">
                        <p><span class="capo">Username: <input name="username" type="text"/></span>
                            <span class="capo">Password: <input name="password" type="password"/></span>
                            <input type="submit" title="login" value="Login" name="Login"/></p>
                    </form>
                </div>
            </div>

            <div id="registrazione" class="tabcontent">
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
