<HTML>
<HEAD>
<TITLE>Printversion Termine</TITLE>
 <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1"> 
<link rel="stylesheet" type="text/css" href="../print.css"> 
</HEAD>

<?php
/***********************************News-System********************************/
//Mit diesem Teil wird ein Eintrag aus der Datenbank (mit entsprechender news_ID) ausgelesen und komplett ausgegeben
include ("../Bausteine/mysql.php");

$news_SQL="SELECT * FROM date WHERE news_ID=$news_ID";
$news_result=mysql_query($news_SQL);
$news=mysql_fetch_array($news_result);
mysql_close();
/***********************************News-System-Ende***************************/

//Dieser Teil sorgt für die Ausgabe der Meldungen 

//Anweisungen zur besseren Formatierung des Datums
$ts=$news['news_datetime'];
$unixtime = mktime(substr($ts,11,12),substr($ts,14,15),substr($ts,17,18),substr($ts,5,6),substr($ts,8,9),substr($ts,0,4));

?>    

<BODY BGCOLOR="#FFFFFF">
<P ALIGN="CENTER"><IMG SRC="../Bilder/hdl.gif" WIDTH="89" HEIGHT="60" ALIGN="LEFT"><B><FONT SIZE="+2"><I><FONT SIZE="+2">&nbsp;&nbsp;&nbsp;Heidelberger 
  Dart Liga e.V</FONT>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</I></FONT></B> 
<DIV ALIGN="CENTER">
  <p><BR>
    <b>Termine</b></p>
  <p align="left"><font face="Arial, Helvetica, sans-serif"><span class="kleiner"><i><font size="-1">Datum 
    und Uhrzeit:</font></i><br>
    <?php echo date("j.n.y H:i",$unixtime) ?></span></font></p>
  <p align="left"><font face="Arial, Helvetica, sans-serif"><i><font size="-1">Ort:</font></i><br>
    <?php echo $news['news_header'] ?></font></p>
  <p align="left"><font face="Arial, Helvetica, sans-serif"><i><font size="-1">Veranstaltung:</font></i><br>
    <?php echo $news['news_main'] ?></font></p>
</DIV>
</BODY>
</HTML>
