
<table border="0" cellspacing="0" cellpadding="3" align="center" width="95%">
  <tr> 
    <td colspan="2" align="center" class="noborder"><h3>Termine</h3></td>
  </tr>
  <?php
/***********************************News-System********************************/
//Mit diesem Teil werden die Einträge der Tabelle news aus der Datenbank ausgelesen und später im Code ausgegeben
include ("Components/mysql.php");

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
    <td width="33%" class="noborder"><?php echo date("j.n.y H:i",$unixtime) ?></td>
    <th><?php echo $news['news_main'] ?></th>
  </tr>
  <tr valign="top">
    <td colspan="2"><?php echo $news['news_header'] ?></td>
  </tr>
  <tr>
    <td colspan="2" height="3" class="noborder">&nbsp;</td>
  </tr>

  <?php
}
mysql_close();
?> 
</table>
