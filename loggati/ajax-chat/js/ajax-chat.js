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


// ***** Var *******************************************************************

var chat_ptr;

var chat_auth;
var chat_user;
var chat_pass;

var chat_users;
var chat_msgs;
var chat_wait;
var chat_room;

var chat_focus = true;
var chat_rand  = -1;
var chat_col   = '#484848';
if (getCookie('chat_color'))
     chat_col = getCookie('chat_color');
else chat_col = '#'+(Math.floor(6*Math.random())*32+48).toString(16)
                   +(Math.floor(6*Math.random())*32+48).toString(16)
                   +(Math.floor(6*Math.random())*32+48).toString(16);
setCookieLT('chat_color', chat_col, 365*24*3600);


// ***** XMLHttpRequest ********************************************************

if(!window.XMLHttpRequest)
{
  var XMLHttpRequest = function()
  {
    try{ return new ActiveXObject(   "MSXML3.XMLHTTP")     } catch(e) {}
    try{ return new ActiveXObject(   "MSXML2.XMLHTTP.3.0") } catch(e) {}
    try{ return new ActiveXObject(   "MSXML2.XMLHTTP")     } catch(e) {}
    try{ return new ActiveXObject("Microsoft.XMLHTTP")     } catch(e) {}
  }
}

var chat_XMLHttp_add = new XMLHttpRequest();
var chat_XMLHttp_get = new XMLHttpRequest();
var chat_XMLHttp_log = new XMLHttpRequest();


// ***** chat_color ************************************************************

function chat_color(col)
{
  setCookie ('chat_color', chat_col = col);
  popup_hide('color');
}


// ***** chat_login ************************************************************

function chat_login(asuser)
{
  if ((document.getElementById( 'login').style.display != 'block') &&
      (document.getElementById('glogin').style.display != 'block') || asuser)
    popup_show('login', 'login_drag', 'login_exit', 'element', 50,  50, 'chat', true);
  if (chat_focus) if (document.getElementById( 'login').style.display == 'block') document.getElementById( 'user').focus();
  if (chat_focus) if (document.getElementById('glogin').style.display == 'block') document.getElementById('guser').focus();
}


// ***** chat_roomn ************************************************************

function chat_roomn(str, focus)
{
  if (chat_focus) if (focus) document.getElementById('send').focus();
  if (str == chat_user) return;
  chat_room = str;
  chat_roomp(chat_user, chat_room);
  if (chat_room == '.')
       document.getElementById('header_messages').innerHTML = 'Main Chat';
  else document.getElementById('header_messages').innerHTML = '<a href="javascript:chat_roomn(\'.\', true)">Back to Main Chat</a>'+str;
  chat_out_msg();
}


// ***** chat_roomp ************************************************************

function chat_roomp(user1, user2)
{
  if (chat_msgs[user1] == undefined) chat_msgs[user1] = new Array();
  if (chat_msgs[user2] == undefined) chat_msgs[user2] = new Array();
  if (chat_msgs[user1][user2] == undefined) chat_msgs[user1][user2] = '';
  if (chat_msgs[user2][user1] == undefined) chat_msgs[user2][user1] = '';
  if (chat_wait[user1] == undefined) chat_wait[user1] = new Array();
  if (chat_wait[user2] == undefined) chat_wait[user2] = new Array();
  if (chat_wait[user1][user2] == undefined) chat_wait[user1][user2] = false;
  if (chat_wait[user2][user1] == undefined) chat_wait[user2][user1] = false;
}


// ***** chat_onload ************************************************************

function chat_onload(username, password)
{
  if (username)
  {
    document.getElementById('user').value = username;
    document.getElementById('pass').value = password;
    chat_msg_log(false);
  }
  else
  {
    chat_focus = false;
    chat_reset(true);
    chat_focus = true;
  }
}


// ***** chat_parse ************************************************************

function chat_parse(str)
{
  str  = str.replace(/^\s+/, '');
  str  = str.replace(/\s+$/, '');
  return str.split(/\r\n/);
}

// ***** chat_reset ************************************************************

function chat_reset(relog)
{
  chat_XMLHttp_add.abort();
  chat_XMLHttp_get.abort();
  chat_XMLHttp_log.abort();

  if (relog)
  {
    chat_auth = 'user=&pass=';
    chat_user = '';
    chat_pass = '';

    chat_login(true);
  }

  chat_ptr       = -1;

  chat_users     = new Array();
  chat_msgs      = new Array();
  chat_wait      = new Array();
  chat_room      = '.';
  chat_msgs['.'] = '';

  chat_roomn('.', false);
  chat_msg_get();
}


// ***** chat_smiley ***********************************************************

function chat_smiley(str)
{
  var input = document.getElementById('send');
  input.focus();

  if (input.selectionStart !== undefined &&
      input.selectionEnd   !== undefined &&
      input.textLength     !== undefined)
  {
    pos  = input.selectionStart;
    val1 = input.value.substr(0, input.selectionStart);
    val2 = input.value.substr(input.selectionEnd, input.textLength);

    input.value          = val1+'%%'+str+'%%'+val2;
    input.selectionStart = pos+str.length+4;
    input.selectionEnd   = pos+str.length+4;

    return;
  }

  if (document.selection             !== undefined &&
      document.selection.createRange !== undefined)
  {
    range = document.selection.createRange();
    range.text = '%%'+str+'%%';
    range.select();

    return;
  }

  input.value += '%%'+str+'%%';
}


// ***** chat_msg_add **********************************************************

function chat_msg_add()
{
  if (!chat_user || !chat_pass) { chat_login(false); return; }
  if (!document.getElementById('send').value || chat_XMLHttp_add.readyState % 4) return;

  chat_rand += 1;
  chat_XMLHttp_add.open("get", chat_path+"php/msg_add.php?rand="+chat_rand+"&"+chat_auth+
                                                        "&room="+escape(chat_room)+
                                                         "&col="+escape(chat_col )+
                                                         "&msg="+escape(document.getElementById('send').value));
  chat_XMLHttp_add.send(null);

  document.getElementById('send').value = '';
  if (chat_focus) document.getElementById('send').focus();
}


// ***** chat_msg_get **********************************************************

function chat_msg_get()
{
  setTimeout("chat_msg_get();", Math.round(1000*chat_timeout));
  if (chat_XMLHttp_get.readyState % 4) return;
  chat_rand += 1;
  chat_XMLHttp_get.open("get", chat_path+"php/msg_get.php?rand="+chat_rand+"&"+chat_auth+"&ptr="+chat_ptr);
  chat_XMLHttp_get.send(null);
  chat_XMLHttp_get.onreadystatechange = function()
  {
    if(chat_XMLHttp_get.readyState == 4 && chat_XMLHttp_get.status == 200)
    {
      var data = chat_parse(chat_XMLHttp_get.responseText);
      if (data[0] == '-' && chat_user && chat_pass) { chat_reset(true); return; }

      for (var i = 1; i < data.length-1; i++)
      {
        chat_ptr = Math.max(chat_ptr, data[i]);

        if (data[i+1] == '+' || data[i+1] == '-')
        {
          var users = '';
          if (data[i+1] == '+') chat_users[data[i+2]] = true;
          if (data[i+1] == '-') chat_users[data[i+2]] = false;
          if (data[i+1] == '+') chat_msgs['.'] += '<b>System:</b> user <b>'+chat_msg_usr(data[i+2], 'black')+'</b> è entrato in chat<br />';
          if (data[i+1] == '-') chat_msgs['.'] += '<b>System:</b> user <b>'+chat_msg_usr(data[i+2], 'black')+'</b> ha abbandonato la chat<br />';
          i += 2;
        }

        if (data[i+1] == 'm')
        {
          chat_users[data[i+3]] = true;
          data[i+5] = data[i+5].replace(/%%(\w+)%%/g, '<img src="'+chat_path+'smileys/$1.gif" alt="" />');
          if (data[i+4] == '.')
            chat_msgs['.']                  += '<span style="color: '+data[i+2]+'"><b>'+chat_msg_usr(data[i+3], data[i+2])+'</b>:  '+data[i+5]+'</span><br />';
          else
          {
            chat_roomp(data[i+3], data[i+4]);
            chat_msgs[data[i+3]][data[i+4]] += '<span style="color: '+data[i+2]+'"><b>'+chat_msg_usr(data[i+3], data[i+2])+'</b>:  '+data[i+5]+'</span><br />';
            chat_msgs[data[i+4]][data[i+3]] += '<span style="color: '+data[i+2]+'"><b>'+chat_msg_usr(data[i+3], data[i+2])+'</b>:  '+data[i+5]+'</span><br />';
            chat_wait[data[i+3]][data[i+4]]  = false;
            chat_wait[data[i+4]][data[i+3]]  = true;
          }
          i += 5;
        }
      }

      if (data.length > 1)
      {
        chat_out_msg();
        chat_out_usr();
      }
    }
  }
}


// ***** chat_msg_log **********************************************************

function chat_msg_log(guest)
{
  chat_rand += 1;
  if (guest)
       chat_XMLHttp_log.open("get", chat_path+"php/msg_log.php?rand="+chat_rand+
                                                             "&user="+escape(document.getElementById('guser').value)+
                                                             "&pass="+
                                                            "&guest=1");
  else chat_XMLHttp_log.open("get", chat_path+"php/msg_log.php?rand="+chat_rand+
                                                             "&user="+escape(document.getElementById( 'user').value)+
                                                             "&pass="+escape(document.getElementById( 'pass').value)+
                                                            "&guest=0");
  chat_XMLHttp_log.send(null);
  chat_XMLHttp_log.onreadystatechange = function()
  {
    if(chat_XMLHttp_log.readyState == 4 && chat_XMLHttp_log.status == 200)
    {
      var data = chat_parse(chat_XMLHttp_log.responseText);
      if (data[0] == 'OK')
      {
        chat_user = data[1];
        chat_pass = data[2];
        chat_auth = "user="+escape(chat_user)+"&pass="+escape(chat_pass);
        popup_hide( 'login');
        popup_hide('glogin');
        chat_reset(false);
      }
      if (data[0] == 'FAILED') { alert(data[1]); chat_login(false); }
    }
  }
}


// ***** chat_msg_usr **********************************************************

function chat_msg_usr(user, color)
{
  return '<a style="color: '+color+'" href="javascript:chat_roomn(\''+user+'\', true);">'+user+'</a>';
}


// ***** chat_out_msg **********************************************************

function chat_out_msg()
{
  document.getElementById('messages').innerHTML = (chat_room == '.') ? chat_msgs[chat_room] : chat_msgs[chat_user][chat_room];
  document.getElementById('messages').scrollTop = document.getElementById('messages').scrollHeight+1024;
  document.getElementById('messages').scrollTop = document.getElementById('messages').scrollHeight+1024;
  document.getElementById('messages').scrollTop = document.getElementById('messages').scrollHeight+1024;
  document.getElementById('messages').scrollTop = document.getElementById('messages').scrollHeight+1024;
  document.getElementById('messages').scrollTop = document.getElementById('messages').scrollHeight+1024;
}


// ***** chat_out_usr **********************************************************

function chat_out_usr()
{
  var users = '';
  chat_users.sort();
  for (var i in chat_users)
    if (i != chat_user && chat_users[i])
      if (chat_wait[chat_user] == undefined || chat_wait[chat_user][i] == undefined || !chat_wait[chat_user][i])
        users = '<img src="'+chat_path+'style/user.png" alt="" />'+chat_msg_usr(i,         'black')+' <br />'+users;
  for (var i in chat_users)
    if (i != chat_user && chat_users[i])
      if (chat_wait[chat_user] != undefined && chat_wait[chat_user][i] != undefined &&  chat_wait[chat_user][i])
        users = '<img src="'+chat_path+'style/user.png" alt="" />'+chat_msg_usr(i,         'black')+'*<br />'+users;
  if (chat_user)
        users = '<img src="'+chat_path+'style/user.png" alt="" />'+chat_msg_usr(chat_user, 'black')+' <br />'+users;
  document.getElementById('users').innerHTML = users;
}
