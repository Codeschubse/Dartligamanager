
<table border="0" cellspacing="3" cellpadding="0" align="center" width="95%">
<tr><th colspan="2">Aktuelles/Aktualisierungen</th></tr>
  <?php
/***********************************News-System********************************/
//Mit diesem Teil werden die Einträge der Tabelle news aus der Datenbank ausgelesen und später im Code ausgegeben
include ("mysql.php");

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
$news['news_main']=substr($news['news_main'],0,180) . " ... <a href=../Bausteine/news_lang.php?news_ID=" . $news['news_ID'] . " target='_blank'>mehr</a>";
}

?> 
  <tr> 
    <td width="25%" bgcolor="#66FFCC"> <span class="kleiner"><?php echo date("j.n.y H:i",$unixtime) ?></span></td>
    <td width="313" bgcolor="#66FFCC"><b><?php echo $news['news_header'] ?></b></td>
  </tr>
  <tr bgcolor="#FFCC66"> 
    <td colspan="2" height="19"><?php echo $news['news_main'] ?></td>
  </tr>
  <?php
}
mysql_close();
?> 
</table>
