<?php include ("variablen.php");
   //Verbindung zur Datenbank aufbauen
   $db=mysql_connect("$db_host","$db_name","$db_pass") or
      die ("Datenbankverbindung fehlgeschlagen");
   mysql_select_db("$dbank",$db);
?>