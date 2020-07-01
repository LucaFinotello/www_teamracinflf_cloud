<?php
	session_start();
	include("db_con.php");
    include_once('mysql-fix.php');
    include ('header.html');
?>
	<div id="main">
		<?php include('menuDesktopAmministratore.html'); ?>
		<div id="contenuto">		
			<?php
			$strsql = "select * from circuiti";
			$risultato = mysqli_query($conn, $strsql);
			if (! $risultato)
			  {
			   echo "Errore nel comando SQL" . "<br>";
			  }
			$riga = mysqli_fetch_array($risultato);
			if (! $riga)
				  {
				   echo "nessun circuito inserito";
				  }
				else
				{
			     while ($riga)
					{   
						echo "<form action='ricercacircuito.php' method='POST'>";
						echo "<div class='Box_Contenitore'><h2>".$riga["circuito"]."</h2>";
						echo "<input readonly name='id' type='text' value=".$riga["id"]." hidden='false'>";
						echo "<img src='../immagini/".$riga["immagine"]."' alt='".$riga["immagine"]."'>";
						echo "<div class='Box_ContenitoreOverflow'>" .$riga["descrizione"]."</div>";
						echo "<button type='sumbit'>Modifica</button>
                              <form action='cancellacircuito.php' method='post'>";
                        echo "<input readonly name='id' type='text' value=".$riga["id"]." hidden='false'>";
                        echo "<button type='submit'>Elimina</button> </form>";
                        echo "</div>";
						echo "</form>";
						$riga = mysqli_fetch_array($risultato);
					}
				}
				?>
			</div>
			</div>
		</div>
	</div>
<?php include ('footerAmmnistratore.html'); ?>