<?php
include("../Bausteine/top.php");
?>
<html>
<body>
<div align="left"> 
  <table width="100%" height="85%" border="1" bordercolor="#000000">
    <tr> 
      <td height="30"> 
<?php include("../Bausteine/copyright.php"); ?>
      </td>
      <td height="30"><?php
include("../Navigation/navitop.php");
?></td>
    </tr>
    <tr> 
      <td height="159" rowspan="5" valign="top"> 
        <div align="center"></div>
        <div align="center"></div>
        <div align="center"></div>
        <div align="left"></div>
        <div align="left">
          <table width="100%" border="0">
            <tr> 
              <th height="30"> 
                <div align="center"></div>
                <div align="center">Hauptmen&uuml;</div>
              </th>
            </tr>
            <tr> 
              <td height="80"><?php
include("../Navigation/navileft.php");
?></td>
            </tr>
            <tr> 
              <th height="30">Impressum</th>
            </tr>
            <tr valign="top"> 
              <td><?php
include("../Navigation/naviimpressum.php");
?></td>
            </tr>
          </table>
        </div>
      </td>
      <td rowspan="5" width="81%" valign="top"> 

     <?php
     if($Submit){
       if(strlen($name)<3){
       $error_msg="Bitte gib Deinen Namen an.<br>";
       }
       if(!ereg("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$",$email)){
       $error_msg.="Bitte gib eine gültige eMail-Adresse an.<br>";
       }
       if(strlen($anfrage)<3){
       $error_msg.="Bitte gib eine Nachricht/Anfrage ein.<br>";
       }
       if($error_msg){
       //Eines der Felder wurde nicht korrekt ausgefüllt 
       echo "Die Anfrage konnte aus folgenden Gründen leider nicht bearbeitet werden:<br><br>";
       echo $error_msg;
       echo "<br>Bitte klicke auf <a href='admin.spieler.php'>zur&uuml;ck</a> und fülle alle Felder aus.";

       }else{
       //Alle Felder ausgefüllt - eMail generieren
       $recipient="webmaster@hdlev.de";
       $subject="Kontaktformular HDLeV";
       $header="From: " . $email . "\n";
       $mail_body ="Das Anfrage-Formular wurde am " . date("d.m.Y") . " um " . date("H:i") . "h ausgeführt.\n";
       $mail_body.="Folgende Werte wurden eingetragen:\n\n";
       $mail_body.="Name: " . $name . "\n";
       $mail_body.="eMail: " . $email . "\n\n";
       $mail_body.="Anfrage:\n";
       $mail_body.=$anfrage . "\n\n ---- Ende der automatisch generierten eMail ----";
     
       mail($recipient,$subject,$mail_body,$header);
          
       //Formular ausgeführt - Meldung ausgeben
       echo "Deine Nachricht/Anfrage wurde abgeschickt. Vielen Dank!";
       }
     }else{
     //Formular noch nicht ausgeführt - Formular anzeigen
     ?>
     
      <form action="<?php echo $PHP_SELF ?>" method=POST>     
          <table width="100%" border="0" cellspacing="2" cellpadding="2">
            <tr> 
              <th colspan="2" class="kleiner">Onlineformular f&uuml;r Kontakt/Anfrage</th>
            </tr>
            <tr> 
              <td width="317" class="kleiner">Bitte gib hier Deinen Namen an:</td>
              <td width="472"> 
                <input type="text" name="name" size="40">
              </td>
            </tr>
            <tr> 
              <td width="317" class="kleiner" height="2"> 
                <p>Bitte gib hier Deine eMail-Adresse an:</p>
                </td>
              <td width="472" height="2"> 
                <input type="text" name="email" size="40">
              </td>
            </tr>
            <tr> 
              <td width="317" class="kleiner">Deine Nachricht/Anfrage:</td>
              <td width="472"> 
                <textarea name="anfrage" cols="45" rows="10"></textarea>
              </td>
            </tr>
            <tr> 
              <td colspan="2"> 
                <div align="center"> 
                  <input type="submit" name="Submit" value="Abschicken">
                </div>
              </td>
            </tr>
          </table>
      </form>
        <?php
      }
      ?>
        </td>
    </tr>
    <tr> </tr>
    <tr> </tr>
    <tr> </tr>
    <tr> </tr>
  </table>
</div>
</body>
</html>
