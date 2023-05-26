<h6>Termine &Uuml;bersicht</h6>
<table border="0" cellspacing="0" cellpadding="3">
<?php
/***********************************News-System********************************/
//Mit diesem Teil werden die Eintraege der Tabelle news aus der Datenbank ausgelesen und spaeter im Code ausgegeben
include ("Components/mysql.php");

$news_SQL="SELECT * FROM date ORDER BY news_datetime";
$news_result=mysql_query($news_SQL);

/***********************************News-System-Ende***************************/

//Dieser Teil sorgt fuer die Ausgabe der Meldungen 
while($news=mysql_fetch_array($news_result)){

//Anweisungen zur besseren Formatierung des Datums
$ts=$news['news_datetime'];
$unixtime = mktime(substr($ts,11,12),substr($ts,14,15),substr($ts,17,18),substr($ts,5,6),substr($ts,8,9),substr($ts,0,4));
?> 
  <tr valign="top">
    <td width="25%"><?php echo date("j.n.y H:i",$unixtime) ?></td>
    <th><?php echo $news['news_main'] ?></th>
  </tr>
  <?php
}
mysql_close();
?> 
</table>
