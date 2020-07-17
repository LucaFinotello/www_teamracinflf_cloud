<?php
session_start();
include("../db_con.php");
include_once('../mysql-fix.php');
include('header.html')
?>
<div id="main">
    <?php
    include('findDevice.php')
    ?>
<link rel="stylesheet" href="../calendar.css">
<div id="contenuto">
    <span id="path">Ti trovi in: <a href="home1.php">Home</a> &#187; Calendario</span>
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
	<div class="page-header">
		<div class="pull-right form-inline">
			<div class="btn-group">
				<button class="btn btn-primary" data-calendar-nav="prev"><< Ieri</button>
				<button class="btn btn-default" data-calendar-nav="today">Oggi</button>
				<button class="btn btn-primary" data-calendar-nav="next">Domani >></button>
			</div>
			<div class="btn-group">
				<button class="btn btn-warning" data-calendar-view="year">Anno</button>
				<button class="btn btn-warning active" data-calendar-view="month">Mese</button>
				<button class="btn btn-warning" data-calendar-view="week">Settimana</button>
				<button class="btn btn-warning" data-calendar-view="day">Giorno</button>
			</div>
		</div>
		<h3></h3>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div id="showEventCalendar"></div>
		</div>
	</div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/events.js"></script>
</div>
<?php
include ('footer.html');
?>