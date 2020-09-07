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

if (isset($_GET['user' ]) &&
    isset($_GET['pass' ]) &&
    isset($_GET['guest']))
{
  include_once 'init.php';
  $user  = $_GET[ 'user'];
  $pass  = $_GET[ 'pass'];
  $guest = $_GET['guest'];

  if (!preg_match('/^\w+$/', $user))      { echo "FAILED\r\n$chat_err_inval"; die; }
  if (!$guest && !chat_chk($user, $pass)) { echo "FAILED\r\n$chat_err_inval"; die; }
  if ( $guest)                            { $user = "guest-{$user}"; }
  if (isset($chat_data['user'][$user]))   { echo "FAILED\r\n$chat_err_inuse"; die; }

  $chat_data[ 'msg'][] = "+\r\n{$user}";
  $chat_data['user'][$user] = time();
  $chat_data['pass'][$user] = md5(rand());
  echo "OK\r\n{$user}\r\n{$chat_data['pass'][$user]}\r\n";
  file_put_contents('data.txt', serialize($chat_data));
}

?>