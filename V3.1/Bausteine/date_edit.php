<?php
//Dynamische Webseiten mit PHP - Echt einfach, Franzis Verlag
//Jochen Franke 2001

//Skript zum Bearbeiten der News-Daten

//Zunächst Verbindung zur Datenbank aufnehmen
include ("mysql.php");

//SQL-Anweiung benötigt eine news_ID, die von news_list.php übergeben wird.
$SQL_news="SELECT * FROM date WHERE news_ID=$news_ID";
$news_result=mysql_query($SQL_news);
$news=mysql_fetch_array($news_result);
mysql_close();

//<br>-Tags in Zeilenumbrüche konvertieren
$news['news_main'] = eregi_replace('<br[[:space:]]*/?[[:space:]]*>', "\n", $news['news_main']); 

?>
<p><b>Termin bearbeiten</b></p>
<p><span class="infosmallconfig">Mit diesem Formular k&ouml;nnen vorhandene Termine 
  ge&auml;ndert werden. </span></p>
<form action=admin.termine.php method=post>
  <table width="400" border="0" cellspacing="2" cellpadding="2">
    <tr valign="middle" bgcolor="F9F9F9"> 
      <td class="stdtextconfig">Datum/Uhrzeit:</td>
      <td> 
        <input type="text" name="news_datetime" value="<?php echo $news['news_datetime'] ?>" size="19" maxlength="19">
      </td>
  </tr>
    <tr valign="middle" bgcolor="F9F9F9"> 
      <td class="stdtextconfig">Text:</td>
      <td> 
        <textarea name="news_header" cols="45" rows="6"><?php echo $news['news_header'] ?></textarea>
      </td>
  </tr>
    <tr valign="middle" bgcolor="F9F9F9"> 
      <td class="stdtextconfig">
        <p>&Uuml;berschrift:</p>
        </td>
      <td> 
        <textarea name="news_main" rows="6" cols="45"><?php echo $news['news_main'] ?></textarea>
    </td>
  </tr>
    <tr bgcolor="F9F9F9"> 
      <td colspan="2"> 
        <div align="center">
        <input type="hidden" name="news_ID" value="<?php echo $news['news_ID'] ?>"> 
        <input type="hidden" name="action" value="update">
        <input type="submit" name="Submit" value="OK">
      </div>
    </td>
  </tr>
</table>
</form>
