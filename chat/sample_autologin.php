<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<title>Ajax Chat</title>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords"    content="" />

<link rel="stylesheet" type="text/css" href="../loggati/ajax-chat/style/style.css" />

<style type="text/css"> html, body { padding: 0px; margin: 0px; } </style>

</head>
<body onload="chat_onload('username', 'password');">

<?php
$chat_path = 'ajax-chat/';
include_once 'ajax-chat/ajax-chat.php';
?>

</body>
</html>