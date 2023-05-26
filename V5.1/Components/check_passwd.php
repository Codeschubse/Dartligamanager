<?php
function check_passwd($auth_user, $auth_passwd, $fd )
{
   $my_select = "select count(*) from login where user = '$auth_user' and passwort = '$auth_passwd'"; 

   $result = mysql_query( $my_select, $fd );

   $row = mysql_fetch_row($result);
   
   return $row[0];
}
