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

if (isset($_GET['user']) && $_GET['user'] &&
    isset($_GET['pass']) && $_GET['pass'] &&
    isset($_GET['room']) && $_GET['room'] &&
    isset($_GET['col' ]) && $_GET['col' ] &&
    isset($_GET['msg' ]) && $_GET['msg' ])
{
  include_once 'init.php';
  if (isset($chat_data['user'][$_GET['user']]) &&
      isset($chat_data['pass'][$_GET['user']]) &&
           ($chat_data['pass'][$_GET['user']]) == $_GET['pass'])
  {
    $col  = htmlentities(preg_replace("/\\s+/iX", " ", $_GET['col' ]), ENT_QUOTES);
    $user = htmlentities(preg_replace("/\\s+/iX", " ", $_GET['user']), ENT_QUOTES);
    $room = htmlentities(preg_replace("/\\s+/iX", " ", $_GET['room']), ENT_QUOTES);
    $msg  = htmlentities(preg_replace("/\\s+/iX", " ", $_GET['msg' ]), ENT_QUOTES);
    if ($room == '.')
         $chat_data['msg'][] = "m\r\n$col\r\n$user\r\n$room\r\n$msg";
    else $chat_data['msg'][] = array($user, $room, "m\r\n$col\r\n$user\r\n$room\r\n$msg");
    foreach($chat_data['msg'] as $i => $x)
    {
      if (count($chat_data['msg']) <= $chat_histlen) break;
      unset($chat_data['msg'][$i]);
    }
    file_put_contents('data.txt', serialize($chat_data));
  }
}

?>