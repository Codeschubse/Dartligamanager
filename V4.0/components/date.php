
<table border="0" cellspacing="0" cellpadding="3" align="center" width="95%">
  <tr bgcolor="#FF9900"> 
    <th colspan="2">Termine</th>
  </tr>
  <?php
/***********************************News-System********************************/
//Mit diesem Teil werden die Einträge der Tabelle news aus der Datenbank ausgelesen und später im Code ausgegeben
include ("components/mysql.php");

$news_SQL="SELECT * FROM date ORDER BY news_datetime";
$news_result=mysql_query($news_SQL);

/***********************************News-System-Ende***************************/

//Dieser Teil sorgt für die Ausgabe der Meldungen 
while($news=mysql_fetch_array($news_result)){

//Anweisungen zur besseren Formatierung des Datums
$ts=$news['news_datetime'];
$unixtime = mktime(substr($ts,11,12),substr($ts,14,15),substr($ts,17,18),substr($ts,5,6),substr($ts,8,9),substr($ts,0,4));
?> 
  <tr valign="top">
    <td width="33%" bgcolor="#FFCC66"><?php echo date("j.n.y H:i",$unixtime) ?></td>
    <td bgcolor="#FFCC66"><b><?php echo $news['news_main'] ?></b></td>
  </tr>
  <tr valign="top">
    <td colspan="2"><?php echo $news['news_header'] ?></td>
  </tr>
  <?php
}
mysql_close();
?> 
</table>
