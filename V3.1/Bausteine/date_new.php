<?php
//Dynamische Webseiten mit PHP - Echt einfach, Franzis Verlag
//Jochen Franke 2001

//Formular zum Aufnehmen neuer Meldungen
?>
<p><b>Neuen Termin aufnehmen</b></p>
<p> <span class="infosmallconfig">Mit diesem Formular k&ouml;nnen neue Termine 
  aufgenommen werden. </span></p>
<form action=admin.termine.php method=post>
  <table width="400" border="0" cellspacing="2" cellpadding="2">
    <tr valign="middle" bgcolor="F9F9F9"> 
      <td class="stdtextconfig">Datum/Uhrzeit:</td>
      <td> 
        <input type="text" name="news_datetime" value="<?php echo date("Y-m-d H:i:s") ?>" size="19" maxlength="19">
      </td>
  </tr>
    <tr valign="middle" bgcolor="F9F9F9"> 
      <td class="stdtextconfig">Text:</td>
      <td>
        <textarea name="news_header" cols="45" rows="6"></textarea>
      </td>
  </tr>
    <tr valign="middle" bgcolor="F9F9F9"> 
      <td class="stdtextconfig">&Uuml;berschrift:</td>
      <td> 
        <textarea name="news_main" rows="6" cols="45"></textarea>
    </td>
  </tr>
    <tr bgcolor="F9F9F9"> 
      <td colspan="2"> 
        <div align="center"> 
        <input type="hidden" name="action" value="insert">
        <input type="submit" name="Submit" value="OK">
      </div>
    </td>
  </tr>
</table>
</form>
