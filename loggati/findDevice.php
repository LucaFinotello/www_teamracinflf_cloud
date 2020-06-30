<?php

function is_device() {
$user_agent = $_SERVER["HTTP_USER_AGENT"];

$device = array("iPhone", "Android", "Windows Phone", "BlackBerry", "iPod");
foreach ($device as $value) {
if (strpos($user_agent, $value) !== false) {
return true;
}
}
return false;
}

if (is_device()) {
 include ('menuLoggin.html');
} else {
    include ('menuDesktop.html');
}

?>
