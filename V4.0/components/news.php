
<table border="0" cellspacing="0" cellpadding="3" align="center" width="95%">
  <tr> 
    <th colspan="2" bgcolor="#FF9900">Aktuelles/Aktualisierungen</th>
  </tr>
  <?php 

/***********************************News-System********************************/
//Mit diesem Teil werden die Einträge der Tabelle news aus der Datenbank ausgelesen und später im Code ausgegeben
include ("components/mysql.php");

$news_SQL="SELECT * FROM news ORDER BY news_datetime DESC";
$news_result=mysql_query($news_SQL);

/***********************************News-System-Ende***************************/

//Dieser Teil sorgt für die Ausgabe der Meldungen 
while($news=mysql_fetch_array($news_result)){

//Anweisungen zur besseren Formatierung des Datums
$ts=$news['news_datetime'];
$unixtime = mktime(substr($ts,11,12),substr($ts,14,15),substr($ts,17,18),substr($ts,5,6),substr($ts,8,9),substr($ts,0,4));

//Anweisungen, um die Länge des Haupttextes zu überprüfen und ggfs. zu kürzen
if(strlen($news['news_main'])>220){
$news['news_main']=substr($news['news_main'],0,180)." ... <a href='components/news_lang.php?news_ID=".$news['news_ID']."' target='_blank'>mehr</a>";
}


?> 
  <tr> 
    <td width="25%" bgcolor="#FFCC66">
<?php echo date("j.n.y H:i",$unixtime) ?>
</td>
    <td width="313" bgcolor="#FFCC66"><b><?php echo $news['news_header'] ?></b></td>
  </tr>
  <tr> 
    <td colspan="2" height="19"><?php echo $news['news_main'] ?></td>
  </tr>
  <?php
}
mysql_close();
?> 
</table>