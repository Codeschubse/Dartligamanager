
<table border="0" cellspacing="0" cellpadding="3" align="center">
  <tr> 
    <td colspan="2" align="center" class="noborder"><h6>die aktuellsten Neuigkeiten</h6></td>
  </tr>
  <?php 

/***********************************News-System********************************/
//Mit diesem Teil werden die Eintraege der Tabelle news aus der Datenbank ausgelesen und spaeter im Code ausgegeben
include ("Components/mysql.php");

$news_SQL="SELECT * FROM news ORDER BY news_datetime DESC";
$news_result=mysql_query($news_SQL);

/***********************************News-System-Ende***************************/

//Dieser Teil sorgt fuer die Ausgabe der Meldungen 
$newszaehler=0;
while($news=mysql_fetch_array($news_result) and $newszaehler<5){

//Anweisungen zur besseren Formatierung des Datums
$ts=$news['news_datetime'];
$unixtime = mktime(substr($ts,11,12),substr($ts,14,15),substr($ts,17,18),substr($ts,5,6),substr($ts,8,9),substr($ts,0,4));

//Anweisungen, um die Ueberschrift mit dem Langtext zu verknuepfen
$news['news_header']=$news['news_header']." ... <a href='index.php?content=news_lang&amp;news_ID=".$news['news_ID'];
if($style){ $news['news_header'].="&amp;style=".$style;}
$news['news_header'].="' class='mehr'>mehr</a>";


?> 
  <tr> 
    <td width="25%" class="noborder" align="left">
<?php echo date("j.n.y H:i",$unixtime) ?>
    </td>
    <td width="313" align="center"><b><?php echo $news['news_header'] ?></b></td>
  </tr>
  <?php
$newszaehler++;
}
mysql_close();
?> 
</table>