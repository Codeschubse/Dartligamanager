<?php
/********************************************************************************/
/********************************************************************************/
/**                                                                            **/
/**                                                                            **/
/**                ACHTUNG! DILLETANTISCHER PROGRAMMIERER! ;-)                 **/
/**                                                                            **/
/**                                                                            **/
/**  Das Skript wurde einfach vom News-Skript kopiert und auf das Date-Skript  **/
/**                                                                            **/
/**  adaptiert. Daher stehen überall noch $news-Variablen. Außerdem ist        **/
/**                                                                            **/
/**  news_header nicht die Überschrift, sondern die Veranstaltung und          **/
/**                                                                            **/
/**  news_main dementsprechend der Ort.                                        **/
/**                                                                            **/
/**                                                                            **/
/**  Diese dürfen aber auch nicht verändert werden, da in der MySQL-Datenbank  **/
/**                                                                            **/
/**  ebenfalls diese news-Variablen eingetragen sind.                          **/
/**                                                                            **/
/**                                                                            **/
/********************************************************************************/
/********************************************************************************/

//neuen Eintrag vornehmen
switch($termineaktion){
	case "dateneu":

?>
		<p><b>Neuen Termin aufnehmen</b></p>
		<p>Mit diesem Formular k&ouml;nnen neue Termine aufgenommen werden.</p>
		<form action=index.php method=post>
			<table border="0" cellspacing="2" cellpadding="2">
				<tr valign="middle" bgcolor="F9F9F9">
					<td>Datum/Uhrzeit:</td>
					<td>
						<input type="text" name="news_datetime" value="<?php echo date("Y-m-d H:i:s") ?>" size="19" maxlength="19">&nbsp;(jjjj-mm-tt hh:mm:ss)
					</td>
				</tr>
				<tr valign="middle" bgcolor="F9F9F9">
					<td>Ort:</td>
					<td>
						<input type="text" name="news_main" size="50" maxlength="100">
					</td>
				</tr>
				<tr valign="middle" bgcolor="F9F9F9">
					<td>Veranstaltung:</td>
					<td>
						<textarea name="news_header" rows="6" cols="45"></textarea>
					</td>
				</tr>
				<tr bgcolor="F9F9F9">
					<td colspan="2">
						<div align="center">
							<input type="hidden" name="dateaction" value="dateinsert">
							<input type="submit" name="Submit" value="OK">
						</div>
					</td>
				</tr>
			</table>
		</form>
		<a href="index.php">N&ouml;, hab&apos;s mir anders &uuml;berlegt...</a>
<?php	
	break;
	
	case "datedelete":
	
		//SQL-Anweiung benötigt eine news_ID, die von news_list.php übergeben wird.
		$SQL_news="SELECT * FROM date WHERE news_ID=$news_ID";
		$news_result=mysql_query($SQL_news);
		$news=mysql_fetch_array($news_result);
		mysql_close();
		
		//<br>-Tags in Zeilenumbrüche konvertieren
		$news['news_main'] = eregi_replace('<br[[:space:]]*/?[[:space:]]*>', "\n", $news['news_main']); 
		
?>
		<p><b>Termin l&ouml;schen</b> </p>
		<p>L&ouml;schen dieses Datensatzes bitte mit &quot;ok&quot; best&auml;tigen:</p>
		<form action=index.php method=post>
		  <table border="0" cellspacing="2" cellpadding="2">
		    <tr valign="middle" bgcolor="F9F9F9"> 
		      <td>Datum/Uhrzeit:</td>
		      <td> 
		        <input type="text" name="news_datetime" value="<?php echo $news['news_datetime'] ?>" size="19" maxlength="19">
		      </td>
		  </tr>
		    <tr valign="middle" bgcolor="F9F9F9"> 
		      <td>Ort:</td>
		      <td>
		        <input type="text" name="news_main" size="50" maxlength="100" value="<?php echo $news['news_main'] ?>">
		      </td>
		  </tr>
		    <tr valign="middle" bgcolor="F9F9F9"> 
		      <td>Veranstaltung:</td>
		      <td> 
		        <textarea name="news_header" rows="6" cols="45"><?php echo $news['news_header'] ?></textarea>
		    </td>
		  </tr>
		    <tr bgcolor="F9F9F9"> 
		      <td colspan="2"> 
		        <div align="center">
		        <input type="hidden" name="news_ID" value="<?php echo $news['news_ID'] ?>"> 
		        <input type="hidden" name="dateaction" value="datedelete">
		        <input type="submit" name="Submit" value="OK">
		      </div>
		    </td>
		  </tr>
		</table>
		</form>
		<a href="index.php">N&ouml;, lieber doch nicht...</a>
	
<?php

	break;
	
	case "dateedit":
	
		//SQL-Anweiung benötigt eine news_ID, die von news_list.php übergeben wird.
		$SQL_news="SELECT * FROM date WHERE news_ID=$news_ID";
		$news_result=mysql_query($SQL_news);
		$news=mysql_fetch_array($news_result);
		mysql_close();
		
		//<br>-Tags in Zeilenumbrüche konvertieren
		$news['news_main'] = eregi_replace('<br[[:space:]]*/?[[:space:]]*>', "\n", $news['news_main']); 
		
		?>
		<p><b>Termin bearbeiten</b></p>
		<p>Mit diesem Formular k&ouml;nnen vorhandene Termine 
		  ge&auml;ndert werden.</p>
		<form action=index.php method=post>
		  <table border="0" cellspacing="2" cellpadding="2">
		    <tr valign="middle" bgcolor="F9F9F9"> 
		      <td>Datum/Uhrzeit:</td>
		      <td> 
		        <input type="text" name="news_datetime" value="<?php echo $news['news_datetime'] ?>" size="19" maxlength="19">
		      </td>
		  </tr>
		    <tr valign="middle" bgcolor="F9F9F9"> 
		      <td>Ort:</td>
		      <td> 
		        <input type="text" name="news_main" size="50" maxlength="100" value="<?php echo $news['news_main'] ?>">
		      </td>
		  </tr>
		    <tr valign="middle" bgcolor="F9F9F9"> 
		      <td>
		        <p>Veranstaltung:</p>
		        </td>
		      <td> 
		        <textarea name="news_header" cols="45" rows="6"><?php echo $news['news_header'] ?></textarea>
		    </td>
		  </tr>
		    <tr bgcolor="F9F9F9"> 
		      <td colspan="2"> 
		        <div align="center">
		        <input type="hidden" name="news_ID" value="<?php echo $news['news_ID'] ?>"> 
		        <input type="hidden" name="dateaction" value="dateupdate">
		        <input type="submit" name="Submit" value="OK">
		      </div>
		    </td>
		  </tr>
		</table>
		</form>
		<a href="index.php">N&ouml;, la&szlig; mal gut sein...</a>

<?php
	
	break;
	
	default:

//Anweisungen zum Löschen eines Datensatzes
if($dateaction=="datedelete"){
  //Der Link Löschen wurde angeklickt, Datensatz löschen
  $news_SQL_del="DELETE FROM date WHERE news_ID=$news_ID";
  $bool=mysql_query($news_SQL_del);
  if($bool==1) echo "<SCRIPT LANGUAGE=JavaScript>window.alert('Termin wurde ausgetragen')</SCRIPT>";
  if($bool<>1) echo "<SCRIPT LANGUAGE=JavaScript>window.alert('Beim Austragen ist ein Fehler aufgetreten')</SCRIPT>";
}


//Anweisungen zum Einfügen eines neuen Datensatzes
if($dateaction=="dateinsert"){
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
if($dateaction=="dateupdate"){
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
<div align="left"> 
  <table width="95%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
        <div align="center">
          <p><b>Termine-Administration</b></p>
          <p><a href="?termineaktion=dateneu">Neuen Termin eintragen</a></p>
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
            <td width="15%">Datum/Uhrzeit</td>
            <td width="30%">Text</td>
            <td>&Uuml;berschrift</td>
            <td width="15%">&nbsp;</td>
          </tr>
<?php
//Dieser Teil sorgt für die Ausgabe der Meldungen 
while($news=mysql_fetch_array($news_result)){

//Anweisungen zur besseren Formatierung des Datums
$ts=$news['news_datetime'];
$unixtime = mktime(substr($ts,11,12),substr($ts,14,15),substr($ts,17,18),substr($ts,5,6),substr($ts,8,9),substr($ts,0,4));
?>
          
          <tr bgcolor="#F9F9F9" valign="top"> 
            <td width="15%"><?php echo date("j.n.y H:i",$unixtime) ?></td>
            <td width="30%"><?php echo $news['news_header'] ?></td>
            <td><?php echo $news['news_main'] ?></td>
            <td width="15%"><a href=?news_ID=<?php echo $news['news_ID'] ?>&amp;termineaktion=datedelete>L&ouml;schen</a> 
              <br>
              <a href=?news_ID=<?php echo $news['news_ID'] ?>&amp;termineaktion=dateedit>Bearbeiten</a></td>
          </tr>
<?php
}
?>          
          
        </table>
      </td>
    </tr>
  </table>
</div>
<?php
	} //schließende Klammer für switch -- default
?>
