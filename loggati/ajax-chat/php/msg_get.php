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

if (isset($_GET['user']) &&
    isset($_GET['pass']) &&
    isset($_GET['ptr' ]))
{
  include_once 'init.php';
  $modified = false;

  if (isset($chat_data['user'][$_GET['user']]))
  {
    $chat_data['user'][$_GET['user']] = microtime_float();
    $modified = true;
  }

  foreach ($chat_data['user'] as $i => $x) if ($x < microtime_float()-$chat_t_logout)
  {
    $chat_data['msg'][] = "-\r\n$i";
    unset($chat_data['user'][$i]);
    unset($chat_data['pass'][$i]);
    $modified = true;
  }

  if (isset($chat_data['user'][$_GET['user']])) echo "+\r\n"; else echo "-\r\n";
  foreach ($chat_data['msg' ] as $i => $x)
    if ($i > $_GET['ptr'])
      if (!is_array($x))
           echo "$i\r\n$x\r\n";
      else if ($x[1] == $_GET['user'] || $x[0] == $_GET['user']) echo "$i\r\n{$x[2]}\r\n";

  if ($modified) file_put_contents('data.txt', serialize($chat_data));
}

?>