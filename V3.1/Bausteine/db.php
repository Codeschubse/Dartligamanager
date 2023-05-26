<?php

function mylib_connect_db()
{
   require_once("variablen.php");
   $fd = mysql_connect($db_host, $db_name, $db_pass);
   mysql_select_db($dbank, $fd);
   return $fd;
}
?>
