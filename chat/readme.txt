Installation:

1. Upload all files to the server.

2. If necessary, change permissions for the file "ajax-chat/php/data.txt" so that
   it can be modified by php script. Setting permissions to 0666 should be enough.

3. Open sample.php in your browser and test the chat.


Installation (more):

4. To edit configuration, open "ajax-chat/php/init.php" file and find "Config" section.
   Use $chat_histlen variable to set the number of messages to be kept.
   Use $chat_t_logout and $chat_t_refresh variables to set logout and refresh timeouts.
   Use chat_chk function to implement custom user authentication.

5. To place ajax chat on a webpage, add the code:
     <link rel="stylesheet" type="text/css" href="relative_path/ajax-chat/style/style.css" />
   to the <head> section, the code:
     <?php
     $chat_path = 'relative_path/ajax-chat/';
     include_once 'relative_path/ajax-chat/ajax-chat.php';
     ?>
   to the <body> section (here "relative_path" is the relative path to ajax chat folder),
   and use onload event:
     <body onload="chat_onload();">
   to initialize chat. Check "ajax-chat/sample.php" to for the sample.

6. To add or replace smileys, simply add them to "ajax-chat/smileys" folder.

7. If you want to autologin users who already signed in to your website,
   you can pass username and password to the function chat_onload():
     <body onload="chat_onload();">
   Check "ajax-chat/sample_autologin.php" for the sample.
   Also, consider using hashes to improve security.


Issues:

1. Due to unresolved bug in FireFox (https://bugzilla.mozilla.org/show_bug.cgi?id=167801),
   I have to use "fixed" position instead of "absolute" position for login box in FireFox.
   This has two consequences (for FireFox only):
   (a) Login box can't be dragged like other auxiliary boxes;
   (b) If you scroll browser window, login box will stay on the same place.


If you have any question, feel free to contact me.
Thank you for using my script.

Ilya S. Lyubinskiy
http://www.php-development.ru/