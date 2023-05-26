<!--<h4>Ein G&auml;stebuch ist kein Briefkasten!</h4>
<p>Es ist f&uuml;r Gru&szlig;worte bestimmt. Wenn Ihr uns etwas mitzuteilen habt, benutzt bitte das <a href="index.php?content=contact">Kontaktformular</a>. Wir freuen uns &uuml;ber Eure Nachrichten genauso wie &uuml;ber Eure Gr&uuml;&szlig;e.
-->

<p>Zum Schutz vor Spam werden die Eintr&auml;ge nicht sofort in das G&auml;stebuch eingetragen, sondern erst nach Pr&uuml;fung. Ein automatischer Spamschutz ist aber derzeit in Arbeit.</p>

<form method="post" action="index.php?content=buch">
          <table width="75%" border="0">
            <tr>
              <th colspan="2">neuer G&auml;stebucheintrag:</th>
            </tr>
            <tr> 
              <td width="33%" class="noborder">Dein Name:</td>
              <td width="67%" class="noborder"> 
                <input type="text" name="name" size="40">
              </td>
            </tr>
            <tr> 
              <td width="33%" class="noborder">Deine eMail-Adresse:</td>
              <td width="67%" class="noborder"> 
                <input type="text" name="email" size="40">
              </td>
            </tr>
            <tr> 
              <td width="33%" class="noborder">Deine Homepage:</td>
              <td width="67%" class="noborder"> 
                <input type="text" name="homepage" size="40">
              </td>
            </tr>
            <tr> 
              <td width="33%" class="noborder">Dein Eintrag:</td>
              <td width="67%" class="noborder"> 
                <textarea name="eintrag" cols="35" rows="3"></textarea>
              </td>
            </tr>
            <tr align="center"> 
              <td colspan="2" class="noborder"> 
                <input type="submit" name="GuestbookNew" value="Abschicken">
              </td>
            </tr>
          </table>
        </form>