<?php
session_start();
include_once('../mysql-fix.php');
include('../db_con.php');
include('header.html');
?>
<div id="main">
    <?php include('findDevice.php') ?>
    <div id="contenuto">
        <span id="path">Ti trovi in: <a href="home1.php">Home</a> &#187; Chat</span>
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
        <body onload="chat_onload();">

        <?php
        $chat_path = 'ajax-chat/';
        include_once 'ajax-chat/ajax-chat.php';
        ?>
        </body>
    </div>
</div>
<?php
include('footer.html');
?>