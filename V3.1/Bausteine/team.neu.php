<form method="post" action="../Seiten/admin.teams.php">
  <table width="100%" border="0" align="center" cellspacing="15">
    <tr> 
      <td width="50%" valign="top">Zum Erfassen eines neuen Teams bitte alle Felder 
        (au&szlig;er eingeklammert) ausf&uuml;llen.<br>
        Um Daten eines bereits eingetragenen Teams zu &auml;ndern, nur das Teamk&uuml;rzel 
        und die zu &auml;ndernden Daten eintragen.<br>
        Um ein Team zu deaktivieren, bitte nur das Teamk&uuml;rzel sowie ein Minuszeichen 
        als Name eintragen und die restlichen Felder leer lassen. </td>
      <td valign="top"> 
         <table border="0" align="center">
          <tr> 
            <th colspan="2">Team</th>
          </tr>
          <tr> 
            <td>K&uuml;rzel:</td>
            <td> 
              <input type="text" name="tkurz" size="3" maxlength="3">
            </td>
          </tr>
          <tr> 
            <td>Name:</td>
            <td> 
              <input type="text" name="tname" size="35" maxlength="50">
            </td>
          </tr>
          <tr> 
            <td>(Homepage:)</td>
            <td> 
              <input type="text" name="thome" size="35" maxlength="50">
            </td>
          </tr>
        </table>
        </td>
    </tr>
    <tr> 
      <td width="50%" valign="top"> 
        <table border="0" align="center">
          <tr> 
            <th colspan="2">Lokal</th>
          </tr>
          <tr> 
            <td>Name:</td>
            <td> 
              <input type="text" name="lname" size="35" maxlength="50">
            </td>
          </tr>
          <tr> 
            <td>Adresse:</td>
            <td height="29"> 
              <input type="text" name="lstr" size="35" maxlength="50">
            </td>
          </tr>
          <tr> 
            <td>Plz.:</td>
            <td> 
              <input type="text" name="lplz" size="5" maxlength="5">
            </td>
          </tr>
          <tr> 
            <td>Ort:</td>
            <td> 
              <input type="text" name="lort" size="35" maxlength="50">
            </td>
          </tr>
          <tr> 
            <td>Tel.:</td>
            <td> 
              <input type="text" name="ltel" size="35" maxlength="50">
            </td>
          </tr>
          <tr> 
            <td>(Homepage):</td>
            <td> 
              <input type="text" name="lhome" size="35" maxlength="50">
            </td>
          </tr>
        </table>
        <p align="center"> 
          <input type="submit" name="teamneu" value="eintragen/&auml;ndern">
        </p>
      </td>
      <td valign="top">
        <table border="0" align="center">
          <tr> 
            <th colspan="2">Captain</th>
          </tr>
          <tr> 
            <td>Passnr.:</td>
            <td> 
              <input type="text" name="cpass" size="4" maxlength="4">
            </td>
          </tr>
          <tr> 
            <td>Vorname:</td>
            <td> 
              <input type="text" name="cvor" size="35" maxlength="50">
            </td>
          </tr>
          <tr> 
            <td>Nachname:</td>
            <td> 
              <input type="text" name="cname" size="35" maxlength="50">
            </td>
          </tr>
          <tr> 
            <td>Adresse:</td>
            <td> 
              <input type="text" name="cstr" size="35" maxlength="50">
            </td>
          </tr>
          <tr> 
            <td>Plz.:</td>
            <td> 
              <input type="text" name="cplz" size="5" maxlength="5">
            </td>
          </tr>
          <tr> 
            <td>Ort:</td>
            <td> 
              <input type="text" name="cort" size="35" maxlength="50">
            </td>
          </tr>
          <tr> 
            <td>Tel.:</td>
            <td> 
              <input type="text" name="ctel" size="35" maxlength="50">
            </td>
          </tr>
          <tr> 
            <td>(eMail):</td>
            <td> 
              <input type="text" name="cemail" size="35" maxlength="50">
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</form>