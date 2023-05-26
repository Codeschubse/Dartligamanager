<?php

switch($newsaktion){

	case "newsneu":
	
?>
		<p><b>Neue Meldung aufnehmen</b></p>
		<p>Mit diesem Formular k&ouml;nnen neue Meldungen 
		  aufgenommen werden.</p>
		<form action=index.php method=post>
		  <table border="0" cellspacing="2" cellpadding="2">
		    <tr valign="middle" bgcolor="F9F9F9"> 
		      <td>Meldungstitel:</td>
		      <td> 
		        <input type="text" name="news_header" size="50" maxlength="120">
		      </td>
		    </tr>
		    <tr valign="middle" bgcolor="F9F9F9"> 
		      <td>Datum/Uhrzeit:</td>
		      <td> 
		        <input type="text" name="news_datetime" value="<?php echo date("Y-m-d H:i:s") ?>" size="19" maxlength="19">
		      </td>
		    </tr>
		    <tr valign="middle" bgcolor="F9F9F9"> 
		      <td>Meldungstext:</td>
		      <td> 
		        <textarea name="news_main" rows="6" cols="45"></textarea>
		      </td>
		    </tr>
		    <tr bgcolor="F9F9F9"> 
		      <td colspan="2"> 
		        <div align="center"> 
		          <input type="hidden" name="newsaction" value="newsinsert">
		          <input type="submit" name="Submit" value="OK">
		        </div>
		      </td>
		    </tr>
		  </table>
		</form>
		<a href="index.php">N&ouml;, hab&apos;s mir anders &uuml;berlegt...</a>
<?php
	
	break;

	case "newsentf":
	
		//SQL-Anweiung benötigt eine news_ID, die von news_list.php übergeben wird.
		$SQL_news="SELECT * FROM news WHERE news_ID=$news_ID";
		$news_result=mysql_query($SQL_news);
		$news=mysql_fetch_array($news_result);
		mysql_close();
		
		//<br>-Tags in Zeilenumbrüche konvertieren
		$news['news_main'] = eregi_replace('<br[[:space:]]*/?[[:space:]]*>', "\n", $news['news_main']); 
		
?>
		<p><b>Meldung l&ouml;schen</b> </p>
		<p>L&ouml;schen dieses Datensatzes bitte mit &quot;ok&quot; best&auml;tigen:</p>
		<form action=index.php method=post>
		  <table border="0" cellspacing="2" cellpadding="2">
		    <tr valign="middle" bgcolor="F9F9F9"> 
		      <td>Meldungstitel:</td>
		      <td> 
		        <input type="text" name="news_header" value="<?php echo $news['news_header'] ?>" size="50" maxlength="120">
		      </td>
		    </tr>
		    <tr valign="middle" bgcolor="F9F9F9"> 
		      <td>Datum/Uhrzeit:</td>
		      <td> 
		        <input type="text" name="news_datetime" value="<?php echo $news['news_datetime'] ?>" size="19" maxlength="19">
		      </td>
	        </tr>
		    <tr valign="middle" bgcolor="F9F9F9"> 
		      <td>Meldungstext:</td>
		      <td> 
		        <textarea name="news_main" rows="6" cols="45"><?php echo $news['news_main'] ?></textarea>
		      </td>
		    </tr>
		    <tr bgcolor="F9F9F9"> 
		      <td colspan="2"> 
		        <div align="center">
		          <input type="hidden" name="news_ID" value="<?php echo $news['news_ID'] ?>"> 
		          <input type="hidden" name="newsaction" value="newsdelete">
		          <input type="submit" name="Submit" value="OK">
		        </div>
		      </td>
		    </tr>
		  </table>
		</form>
		<a href="index.php">N&ouml;, lieber doch nicht...</a>
	
<?php
	
	break;

	case "newsbearb":
	
		//SQL-Anweiung benötigt eine news_ID, die von news_list.php übergeben wird.
		$SQL_news="SELECT * FROM news WHERE news_ID=$news_ID";
		$news_result=mysql_query($SQL_news);
		$news=mysql_fetch_array($news_result);
		mysql_close();
		
		//<br>-Tags in Zeilenumbrüche konvertieren
		$news['news_main'] = eregi_replace('<br[[:space:]]*/?[[:space:]]*>', "\n", $news['news_main']); 
		
		?>
		<p><b>Meldung bearbeiten</b></p>
		<p>Mit diesem Formular k&ouml;nnen vorhandene Meldungen 
		  ge&auml;ndert werden.</p>
		<form action=index.php method=post>
		  <table border="0" cellspacing="2" cellpadding="2">
		    <tr valign="middle" bgcolor="F9F9F9"> 
		      <td>Meldungstitel:</td>
		      <td> 
		        <input type="text" name="news_header" value="<?php echo $news['news_header'] ?>" size="50" maxlength="120">
		      </td>
		    </tr>
		    <tr valign="middle" bgcolor="F9F9F9"> 
		      <td>Datum/Uhrzeit:</td>
		      <td> 
		        <input type="text" name="news_datetime" value="<?php echo $news['news_datetime'] ?>" size="19" maxlength="19">
		      </td>
	        </tr>
		    <tr valign="middle" bgcolor="F9F9F9"> 
		      <td>Meldungstext:</td>
		      <td> 
		        <textarea name="news_main" rows="6" cols="45"><?php echo $news['news_main'] ?></textarea>
		      </td>
		    </tr>
		    <tr bgcolor="F9F9F9"> 
		      <td colspan="2"> 
		        <div align="center">
		          <input type="hidden" name="news_ID" value="<?php echo $news['news_ID'] ?>"> 
		          <input type="hidden" name="newsaction" value="newsupdate">
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
if($newsaction=="newsdelete"){
  //Der Link Löschen wurde angeklickt, Datensatz löschen
  $news_SQL_del="DELETE FROM news WHERE news_ID=$news_ID";
  $bool=mysql_query($news_SQL_del);
  if($bool==1) echo "<SCRIPT LANGUAGE=JavaScript>window.alert('Nachricht wurde entfernt')</SCRIPT>";
  if($bool<>1) echo "<SCRIPT LANGUAGE=JavaScript>window.alert('Beim Entfernen ist ein Fehler aufgetreten')</SCRIPT>";
}


//Anweisungen zum Einfügen eines neuen Datensatzes
if($newsaction=="newsinsert"){
  //Zeilenumbrüche im Haupttext in HTML-Zeilenumbrüche konvertieren
  $news_main=nl2br($news_main);
  $news_main=eregi_replace("\n", "", $news_main); 
  $news_SQL_insert="INSERT INTO news (news_header,news_datetime,news_main) VALUES ('$news_header','$news_datetime','$news_main')";
  $bool=mysql_query($news_SQL_insert);
  if($bool==1) echo "<SCRIPT LANGUAGE=JavaScript>window.alert('Nachricht wurde aufgenommen')</SCRIPT>";
  if($bool<>1) echo "<SCRIPT LANGUAGE=JavaScript>window.alert('Beim Aufnehmen der Nachricht ist ein Fehler aufgetreten')</SCRIPT>";
}


//Anweisungen zum Verändern von Datensätzen
if($newsaction=="newsupdate"){
  //Zeilenumbrüche im Haupttext in HTML-Zeilenumbrüche konvertieren
  $news_main=nl2br($news_main);
  $news_main=eregi_replace("\n", "", $news_main); 
  $news_SQL_update="UPDATE news SET news_header='$news_header',news_main='$news_main',news_datetime='$news_datetime' WHERE news_ID='$news_ID'";
  $bool=mysql_query($news_SQL_update);
  if($bool==1) echo "<SCRIPT LANGUAGE=JavaScript>window.alert('Nachricht wurde angepasst')</SCRIPT>";
  if($bool<>1) echo "<SCRIPT LANGUAGE=JavaScript>window.alert('Beim Bearbeiten der Nachricht ist ein Fehler aufgetreten')</SCRIPT>";  
}



//Mit diesem Teil werden die Einträge der Tabelle news aus der Datenbank ausgelesen und später im Code ausgegeben
$news_SQL="SELECT * FROM news ORDER BY news_datetime DESC";
$news_result=mysql_query($news_SQL);
/***********************************News-System-Ende***************************/
?>
<div align="left"> 
  <table border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
        <div align="center">
          <p><b>News-Administration</b></p>
          <p><a href="?newsaktion=newsneu">Neue Meldung eintragen</a></p>
          <p>Hier finden Sie eine &Uuml;bersicht 
            der eingetragenen Meldungen</p>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <table border="0" cellspacing="2" cellpadding="2">
          <tr> 
            <td>Datum/Uhrzeit</td>
            <td>Meldungstitel</td>
            <td>Haupttext</td>
            <td>&nbsp;</td>
          </tr>
<?php
//Dieser Teil sorgt für die Ausgabe der Meldungen 
while($news=mysql_fetch_array($news_result)){

//Anweisungen zur besseren Formatierung des Datums
$ts=$news['news_datetime'];
$unixtime = mktime(substr($ts,11,12),substr($ts,14,15),substr($ts,17,18),substr($ts,5,6),substr($ts,8,9),substr($ts,0,4));
?>
          
          <tr bgcolor="#F9F9F9"> 
            <td><?php echo date("j.n.y H:i",$unixtime) ?></td>
            <td><?php echo $news['news_header'] ?></td>
            <td><?php echo $news['news_main'] ?></td>
            <td><a href=?news_ID=<?php echo $news['news_ID'] ?>&newsaktion=newsentf>L&ouml;schen</a> <br>
              <a href=?news_ID=<?php echo $news['news_ID'] ?>&newsaktion=newsbearb>Bearbeiten</a></td>
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