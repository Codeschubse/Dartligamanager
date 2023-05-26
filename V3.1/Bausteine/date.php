
<table border="0" cellspacing="3" cellpadding="0" align="center" width="95%">
  <tr> 
    <th>Datum/Uhrzeit</th>
    <th>Ort</th>
    <th>Veranstaltung</th>
  </tr>
  <?php
/***********************************News-System********************************/
//Mit diesem Teil werden die Einträge der Tabelle news aus der Datenbank ausgelesen und später im Code ausgegeben
include ("mysql.php");

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
    <td width="25%"> <span class="kleiner"><?php echo date("j.n.y H:i",$unixtime) ?></span></td>
    <td width="35%"><?php echo $news['news_header'] ?></td>
    <td><?php echo $news['news_main'] ?></td>
  </tr>
  <tr> 
    <td colspan="3"> 
      <div align="right"> <font size="-2"> <?php echo
"<a href=../Bausteine/date_lang.php?news_ID=" . $news['news_ID'] . " target='_blank'>diesen Termin in der Druckansicht anzeigen</a>"
?><br>
        </font>
        <hr width="50%">
      </div>
    </td>
  </tr>
  <?php
}
mysql_close();
?> 
</table>
