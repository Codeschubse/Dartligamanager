<?php
/***********************************News-System********************************/
//Mit diesem Teil wird ein Eintrag aus der Datenbank (mit entsprechender news_ID) ausgelesen und komplett ausgegeben
include ("Components/mysql.php");

$news_ID=$_GET['news_ID'];
$news_SQL="SELECT * FROM news WHERE news_ID=$news_ID";
$news_result=mysql_query($news_SQL);
$news=mysql_fetch_array($news_result);
mysql_close();
/***********************************News-System-Ende***************************/

//Dieser Teil sorgt fuer die Ausgabe der Meldungen 

//Anweisungen zur besseren Formatierung des Datums
$ts=$news['news_datetime'];
$unixtime = mktime(substr($ts,11,12),substr($ts,14,15),substr($ts,17,18),substr($ts,5,6),substr($ts,8,9),substr($ts,0,4));

?>    

<div id="news">

	<div class="newsleft">
		Newsmeldung Nr. <?php echo $news_ID; ?>
	</div>
<br class="doNotDisplay" />
	<div class="newsright">
		Datum und Uhrzeit: <?php echo date("j.n.y H:i",$unixtime) ?>
	</div>

</div>

<h3><?php echo $news['news_header'] ?></h3>

<p>
<?php echo $news['news_main'] ?>
</p>
<p>
<a class="doNotPrint" href="index.php?content=news<?php if($style){echo "&amp;style=".$style;} ?>">zur News&uuml;bersicht</a>
</p>