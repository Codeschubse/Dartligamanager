<?php
//Dynamische Webseiten mit PHP - Echt einfach, Franzis Verlag
//Jochen Franke 2001

//news_list.php admin
//Dieses Skript erzeugt eine Liste der eingetragenen News im Administrationsbereich
//und empfängt die Daten von news_edit.php und news_new.php und verarbeitet sie weiter

/***********************************News-System********************************/
//Zunächst Verbindung zur Datenbank aufnehmen
include ("mysql.php");

//Anweisungen zum Löschen eines Datensatzes
if($action=="delete"){
  //Der Link Löschen wurde angeklickt, Datensatz löschen
  $news_SQL_del="DELETE FROM date WHERE news_ID=$news_ID";
  $bool=mysql_query($news_SQL_del);
  if($bool==1) echo "<SCRIPT LANGUAGE=JavaScript>window.alert('Termin wurde gelöscht')</SCRIPT>";
  if($bool<>1) echo "<SCRIPT LANGUAGE=JavaScript>window.alert('Beim Löschen ist ein Fehler aufgetreten')</SCRIPT>";
}


//Anweisungen zum Einfügen eines neuen Datensatzes
if($action=="insert"){
  //Zeilenumbrüche im Haupttext in HTML-Zeilenumbrüche konvertieren
  $news_main=nl2br($news_main);
  $news_main=eregi_replace("\n", "", $news_main); 
  //Zeilenumbrüche im Ort in HTML-Zeilenumbrüche konvertieren
  $news_header=nl2br($news_header);
  $news_header=eregi_replace("\n", "", $news_header); 
  $news_SQL_insert="INSERT INTO date (news_header,news_datetime,news_main) VALUES ('$news_header','$news_datetime','$news_main')";
  $bool=mysql_query($news_SQL_insert);
  if($bool==1) echo "<SCRIPT LANGUAGE=JavaScript>window.alert('Termin wurde aufgenommen')</SCRIPT>";
  if($bool<>1) echo "<SCRIPT LANGUAGE=JavaScript>window.alert('Beim Aufnehmen des Termins ist ein Fehler aufgetreten')</SCRIPT>";
}


//Anweisungen zum Verändern von Datensätzen
if($action=="update"){
  //Zeilenumbrüche im Haupttext in HTML-Zeilenumbrüche konvertieren
  $news_main=nl2br($news_main);
  $news_main=eregi_replace("\n", "", $news_main); 
  //Zeilenumbrüche im Ort in HTML-Zeilenumbrüche konvertieren
  $news_header=nl2br($news_header);
  $news_header=eregi_replace("\n", "", $news_header); 
  $news_SQL_update="UPDATE date SET news_header='$news_header',news_main='$news_main',news_datetime='$news_datetime' WHERE news_ID='$news_ID'";
  $bool=mysql_query($news_SQL_update);
  if($bool==1) echo "<SCRIPT LANGUAGE=JavaScript>window.alert('Termin wurde angepasst')</SCRIPT>";
  if($bool<>1) echo "<SCRIPT LANGUAGE=JavaScript>window.alert('Beim Bearbeiten des Termins ist ein Fehler aufgetreten')</SCRIPT>";  
}



//Mit diesem Teil werden die Einträge der Tabelle news aus der Datenbank ausgelesen und später im Code ausgegeben
$news_SQL="SELECT * FROM date ORDER BY news_datetime";
$news_result=mysql_query($news_SQL);
/***********************************News-System-Ende***************************/
?>
<div align="left" class="stdheaderconfig"> 
  <table width="95%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
        <div align="center" class="stdheaderconfig">
          <p><b>Termine-Administration</b></p>
          <p><a href="admin.termine.new.php">Neuen Termin eintragen</a></p>
          <p> <span class="infosmallconfig">Hier finden Sie eine &Uuml;bersicht 
            der eingetragenen Termine<br>
            <br>
            </span></p>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr> 
            <td class="stdtextconfigbold" width="15%">Datum/Uhrzeit</td>
            <td class="stdtextconfigbold" width="30%">Text</td>
            <td class="stdtextconfigbold">&Uuml;berschrift</td>
            <td class="stdtextconfigbold" width="15%">&nbsp;</td>
          </tr>
<?php
//Dieser Teil sorgt für die Ausgabe der Meldungen 
while($news=mysql_fetch_array($news_result)){

//Anweisungen zur besseren Formatierung des Datums
$ts=$news['news_datetime'];
$unixtime = mktime(substr($ts,11,12),substr($ts,14,15),substr($ts,17,18),substr($ts,5,6),substr($ts,8,9),substr($ts,0,4));
?>
          
          <tr bgcolor="#F9F9F9" valign="top"> 
            <td class="stdtextconfig" width="15%"><?php echo date("j.n.y H:i",$unixtime) ?></td>
            <td class="stdtextconfig" width="30%"><?php echo $news['news_header'] ?></td>
            <td class="stdtextconfig"><?php echo $news['news_main'] ?></td>
            <td class="stdtextconfig" width="15%"><a href=admin.termine.delete.php?news_ID=<?php echo $news['news_ID'] ?>&amp;action=delete>L&ouml;schen</a> 
              <br>
              <a href=admin.termine.edit.php?news_ID=<?php echo $news['news_ID'] ?>>Bearbeiten</a></td>
          </tr>
<?php
}
mysql_close();
?>          
          
        </table>
      </td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p align="left">&nbsp;</p>
</div>

