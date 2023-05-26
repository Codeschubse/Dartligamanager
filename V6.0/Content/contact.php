<?php
     if($Submit){
       if(strlen($name)<3){
       $error_msg="Bitte gib Deinen Namen an.<br>";
       }
       if(!ereg("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$",$email)){
       $error_msg.="Bitte gib eine g&uuml;ltige eMail-Adresse an.<br>";
       }
       if(strlen($anfrage)<3){
       $error_msg.="Bitte gib eine Nachricht/Anfrage ein.<br>";
       }
       if($error_msg){
       //Eines der Felder wurde nicht korrekt ausgefüllt 
       echo "Die Anfrage konnte aus folgenden Gr&uuml;nden leider nicht bearbeitet werden:<br><br>";
       echo $error_msg;
       echo "<br>Bitte klicke auf <a href='javascript:history.back(1)'>zur&uuml;ck</a> und f&uuml;lle alle Felder aus.";

       }else{
       //Alle Felder ausgefüllt - eMail generieren
       $subject="Kontaktformular HDLeV";
       $header="From: " . $email . "\n";
       $mail_body ="Das Anfrage-Formular wurde am " . date("d.m.Y") . " um " . date("H:i") . "h ausgef&uuml;hrt.\n";
       $mail_body.="Folgende Werte wurden eingetragen:\n\n";
       $mail_body.="Name: " . $name . "\n";
       $mail_body.="eMail: " . $email . "\n\n";
       $mail_body.="Anfrage:\n";
       $mail_body.=$anfrage . "\n\n ---- Ende der automatisch generierten eMail ----";
     
       mail($recipient,$subject,$mail_body,$header);
          
       //Formular ausgeführt - Meldung ausgeben
       echo "Folgende Nachricht wurde am ".date("d.m.Y")." um ".date("H:i")."h von Dir an ".$empfaenger." abgeschickt:\n";
       echo "<blockquote><i>".$anfrage."</i></blockquote>\n";
       echo "Vielen Dank!";
       }
     }else{
     //Formular noch nicht ausgeführt - Formular anzeigen

// Teamnamen herausfinden
$sql_befehl="select * from teams where team_kurz='$team'";
$antwort=mysql_query($sql_befehl);
$data=mysql_fetch_array($antwort);
$empfaenger=$data['team_name'];
$recipient=$data['team_mail'];

      if(!$recipient)
       {
         $recipient="webmaster@hdlev.de";
         $empfaenger="Webmaster";
       }

     ?> 
<form action="index.php?content=contact" method=POST>
          <table border="0" cellspacing="2" cellpadding="2">
            <tr> 
              <th colspan="2" class="kleiner">Onlineformular f&uuml;r Kontakt/Anfrage</th>
            </tr>
            <tr>
              <td colspan="2" align="center" class="noborder">
                Empf&auml;nger: <?php echo $empfaenger; ?>
              </td>
            <tr> 
              <td width="317" class="noborder">Bitte gib hier Deinen Namen an:</td>
              <td width="472" class="noborder"> 
                <input type="text" name="name" size="40">
              </td>
            </tr>
            <tr> 
              <td width="317" height="2" class="noborder"> 
                <p>Bitte gib hier Deine eMail-Adresse an:</p>
                </td>
              <td width="472" height="2" class="noborder"> 
                <input type="text" name="email" size="40">
              </td>
            </tr>
            <tr> 
              <td width="317" class="noborder">Deine Nachricht/Anfrage:</td>
              <td width="472" class="noborder"> 
                <textarea name="anfrage" cols="45" rows="10"></textarea>
              </td>
            </tr>
            <tr> 
              <td colspan="2" class="noborder"> 
                <div align="center"> 
                  <input type="submit" name="Submit" value="Abschicken">
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="2" style="visibility: hidden;">
              <input type="hidden" name="recipient" value="<?php echo $recipient; ?>">
              <input type="hidden" name="empfaenger" value="<?php echo $empfaenger; ?>">
              </td>
            </tr>
          </table>
      </form>
        <?php
      }
      ?>
        