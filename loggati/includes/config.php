<?php
define('DB_SERVER','89.46.111.108');
define('DB_USER','Sql1344355');
define('DB_PASS' ,'m6477r3814');
define('DB_NAME','Sql1344355_4');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>