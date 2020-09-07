<?php

// Copyright (C) 2008 Ilya S. Lyubinskiy. All rights reserved.
// Technical support: http://www.php-development.ru/
//
// YOU MAY NOT
// (1) Remove or modify this copyright notice.
// (2) Re-distribute this code or any part of it.
//     Instead, you may link to the homepage of this code:
//     http://www.php-development.ru/javascripts/ajax-chat.php
// (3) Use this code or any part of it as part of another product.
//
// YOU MAY
// (1) Use this code on your website.
//
// NO WARRANTY
// This code is provided "as is" without warranty of any kind.
// You expressly acknowledge and agree that use of this code is at your own risk.


// ***** Config ****************************************************************

// The number of messages to keep
$chat_histlen   = 1000;

// Interval in seconds to wait before disconnecting a user
$chat_t_logout  = 5.00;

// Interval in seconds between refreshes
$chat_t_refresh = 1.00;

$chat_err_inval = 'Invalid username or password!';
$chat_err_inuse = 'The username you selected is already in use!';

// Use this function to validate registered users' login information.
// This way you can integrate Ajax Chat with an existing membership system.
function chat_chk($username, $password) { return true; }


// ***** Init ******************************************************************

error_reporting(E_ALL ^ E_NOTICE);
ini_set("log_errors",     0);
ini_set("display_errors", 1);

if (!headers_sent())
{
  session_id  ('lock');
  session_name('lock');
  session_start();

  header("Pragma: no-cache");
  header("Cache-Control: no-cache");
  header("Expires: Fri, 31 Dec 1999 23:59:59 GMT");
}

$chat_data = file_get_contents(dirname(__FILE__) . '/data.txt');
$chat_data = $chat_data ? unserialize($chat_data) : array('user' => array(), 'pass' => array(), 'msg' => array());

// ***** file_put_contents  *****

if (!function_exists('file_put_contents'))
{
  function file_put_contents($name, $data)
  {
    if (!($handle = @fopen($name, 'w'))) return false;
    $bytes = fwrite($handle, $data);
    fclose($handle);
    return $bytes;
  }
}

// ***** microtime_float    *****

function microtime_float()
{
  list($usec, $sec) = explode(' ', microtime());
  return (float)$usec+(float)$sec;
}

// ***** strip_slashes_deep *****

if (!function_exists('strip_slashes_deep') && get_magic_quotes_gpc())
{
  function strip_slashes_deep($value)
  {
    if (is_array($value)) return array_map('strip_slashes_deep', $value);
    return stripslashes($value);
  }

  $_GET    = strip_slashes_deep($_GET);
  $_POST   = strip_slashes_deep($_POST);
  $_COOKIE = strip_slashes_deep($_COOKIE);
}

?>