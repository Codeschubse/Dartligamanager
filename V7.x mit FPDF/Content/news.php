<h2>Aktuelles/Aktualisierungen</h2>
<table border="0" cellspacing="0" cellpadding="3" align="center">
<?php 

/***********************************News-System********************************/
//Mit diesem Teil werden die Eintraege der Tabelle news aus der Datenbank ausgelesen und spaeter im Code ausgegeben
include ("Components/mysql.php");

$news_SQL="SELECT * FROM news ORDER BY news_datetime DESC";
$news_result=mysql_query($news_SQL);

/***********************************News-System-Ende***************************/

//Dieser Teil sorgt fuer die Ausgabe der Meldungen 
while($news=mysql_fetch_array($news_result)){

//Anweisungen zur besseren Formatierung des Datums
$ts=$news['news_datetime'];
$unixtime = mktime(substr($ts,11,12),substr($ts,14,15),substr($ts,17,18),substr($ts,5,6),substr($ts,8,9),substr($ts,0,4));

//Anweisungen, um die Laenge des Haupttextes zu ueberpruefen und ggfs. zu kuerzen
if(strlen($news['news_main'])>220){
$news['news_main']=substr($news['news_main'],0,180)."&nbsp;&hellip;&nbsp;<a href='index.php?content=news_lang&amp;news_ID=".$news['news_ID'];
if($style){ $news['news_main'].="&amp;style=".$style;}
$news['news_main'].="'>mehr</a>";
}


?> 
  <tr> 
    <td width="25%" class="noborder" align="left">
<?php echo date("j.n.y H:i",$unixtime)."&nbsp;&nbsp;<a href='index.php?content=news_lang&amp;news_ID=".$news['news_ID']."' class='mehr'></a>";
     ?>
	</td>
    <th align="center"><b><?php echo $news['news_header'] ?></b></th>
  </tr>
  <tr> 
    <td colspan="2" align="left"><?php echo $news['news_main'] ?></td>
  </tr>
  <tr>
    <td colspan="2" class="noborder">&nbsp;</td>
  </tr>
  <?php
}
mysql_close();
?> 
</table>