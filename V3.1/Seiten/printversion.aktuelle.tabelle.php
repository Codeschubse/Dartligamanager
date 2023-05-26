<html>
<head>
<title>Printversion der aktuellen Tabelle</title> <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<link rel="stylesheet" type="text/css" href="../print.css"> 
</head>

<body bgcolor="#FFFFFF">
<P ALIGN="CENTER"><IMG SRC="../Bilder/hdl.gif" WIDTH="89" HEIGHT="60" ALIGN="LEFT"><B><FONT SIZE="+2"><I><FONT SIZE="+2">Heidelberger 
  Dart Liga e.V</FONT>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</I></FONT></B> 
  <?php

include("../Bausteine/akt.tabelle.php");

// Datenbank öffnen
include ("../Bausteine/mysql.php");

// Faxnummer und Vorname von Ligaleiter auslesen
$befehl="select sp_vor from spieler where sp_man='1'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$man=$data['sp_vor'];

mysql_close();

?> </P>
<P ALIGN="CENTER"><FONT SIZE="-1"><B>Viele Gr&uuml;&szlig;e und good darts&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<I><?php echo $man ?></I></B></FONT><BR>
  <FONT SIZE="-1">(Achtung! Neue Faxnummer: 01805 999 1897 2127)</FONT></P>
</body>
</html>
