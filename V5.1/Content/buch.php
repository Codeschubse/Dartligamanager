<?php

//Verbindung zur Datenbank aufbauen
include ("Components/mysql.php");

if($GuestbookNew){
  //Das Formular der Datei gaestebuch.neu.php wurde ausgefüllt und abgeschickt

  //HTML- und PHP-Tags aus den Eingabefeldern entfernen
  $name=strip_tags($name);
  $email=strip_tags($email);
  $homepage=strip_tags($homepage);
  $eintrag=strip_tags($eintrag);

  //Konvertiere Zeilenumbrüche in HTML-<br>-Umbrüche
  $eintrag=nl2br($eintrag);

  //Eingaben überprüfen
  if(strlen($name)<1){
  //Kein richtiger Name eingegeben
  $error_msg="Bitte gib Deinen Namen an";
  }
  if(strlen($eintrag)<3){
  //Kein Eintrag vorgenommen
  $error_msg.="<br>Bitte gib auch etwas in das G&auml;stebuch ein.";
  }
  if(ereg("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$",$email)){
  $email=str_replace("@", "(at)", $email);
  //Mailadresse korrekt angegeben - Name entsprechend formatieren
  $name="<a href='mailto:" . $email . "?subject=bitte%20gib%20einen%20Betreff%20an%2C%20please%20type%20a%20subject&amp;body=Das%20%22%28at%29%22%20muss%20durch%20den%20Klammeraffen%20%22@%22%20ersetzt%20werden%0D%0A%0D%0A%22%28at%29%22%20must%20be%20replaced%20by%20%22@%22' title='Das (at) muss durch den Klammeraffen @ ersetzt werden!'>" . $name . "</a>";
  }else{
  $name="<b>".$name."</b>";
  }
  if($homepage){
  //Es wurde auch eine Homepageadresse angegeben - entsprechende Formatierung vornehmen
  if(!ereg("^http:",$homepage)){
    //http:// fehlt in der Angabe der Adresse - hier ergänzen
    $homepage="http://" . $homepage;
    }
  $hp_format="<br><b>Homepage: </b><a href=" . $homepage . ">" . $homepage . "</a>";
  }
  //Ende Eingaben überprüfen

  if($error_msg){
  
     //Fehlerhafte Angaben - Hinweis ausgeben und keinen Eintrag vornehmen
     $message ="<br><big>Dein Eintrag konnte leider nicht in unser G&auml;stebuch aufgenommen werden:<br>";
     $message.=$error_msg;
     $message.="<br><br>Bitte klicke auf <a href='http://www.hdlev.de/index.php?content=eintrag'>zur&uuml;ck
     </a>, wenn Du Deinen Eintrag korrekt vornehmen willst.</big><br><br><hr>";
     
     echo $message;
 
  }else{

    //Neuen Gästebucheintrag vornehmen
     $now=date("Y-m-d H:i:s");
     $guestbook_SQL_insert="INSERT INTO guestbook (guestbook_name,guestbook_homepage,guestbook_text,guestbook_datetime) VALUES ('$name','$hp_format','$eintrag','$now')";
     mysql_query($guestbook_SQL_insert);
     
     //Mail verschicken
     $recipient="webmaster@hdlev.de";
     $subject="Neuer Eintrag im HDL-Gaestebuch";
     $header="From: webmaster@hdlev.de\n";
     $mail_body="Von: ".$name."\n\nE-Mail: ".$email."\n\nHomepage: ".$hp_format."\n\nEintrag: ".$eintrag;
     
     mail($recipient,$subject,$mail_body,$header);

//schließende Klammer für IF ERROR MESSAGE   ELSE
  }

//schließende Klammer für IF GUESTBOOK_NEW
}

//Gästebucheinträge auslesen
if(!$pos) $pos=0;
$count=5;
$guestbook_SQL="SELECT * FROM guestbook ORDER BY guestbook_datetime DESC LIMIT $pos,$count";
$guestbook_result=mysql_query($guestbook_SQL);

//Anzahl der Datensätze ermitteln
$no_data=mysql_num_rows(mysql_query("SELECT guestbook_ID FROM guestbook"));

//Mit diesen Anweisungen werden die Links für das Blättern zwischen den Ergebnissen erzeugt
$new_pos_next=$pos+$count;
if($new_pos_next>=$no_data){
$link_next="weiter &gt;&gt;";
}else {
$link_next="<a href='http://www.hdlev.de/index.php?content=buch&amp;pos=" . $new_pos_next . "'>weiter &gt;&gt;</a>";
}
$new_pos_prev=$pos-$count;
if($new_pos_prev<0){
$link_prev="&lt;&lt; zur&uuml;ck";
} else {
$link_prev="<a href='http://www.hdlev.de/index.php?content=buch&amp;pos=" . $new_pos_prev . "'>&lt;&lt; zur&uuml;ck</a>";
}
?> 
<table align='center' width='95%' border='0' cellspacing='1' cellpadding='1'>
  <?php

//Hier die Einträge aus der Datenbank auslesen und darstellen
while($guestbook_data=mysql_fetch_array($guestbook_result)){

//Datum und Uhrzeit formatieren
$com=$guestbook_data['guestbook_comment'];
$ts=$guestbook_data['guestbook_datetime'];
$unixtime = mktime(substr($ts,11,12),substr($ts,14,15),substr($ts,17,18),substr($ts,5,6),substr($ts,8,9),substr($ts,0,4));
?> 
  <tr valign='top' > 
    <td width='65%' class='noborder'><b>Name: </b> <?php echo $guestbook_data['guestbook_name'] . " " . $guestbook_data['guestbook_homepage'] ?></td>
    <td class='noborder' width='35%' align='right'><b>Datum:</b> <?php echo date("j.n.y H:i",$unixtime) ?></td>
  </tr>
  <tr valign='top'> 
    <td colspan='2' class='noborder'> 
      <p><?php echo $guestbook_data['guestbook_text'] ?></p>
    </td>
  </tr>
  <?php
if($com){
?> 
  <tr valign='top'> 
    <td colspan='2' class='noborder'> 
      <p><?php echo "<i>".$guestbook_data['guestbook_comment']."</i>" ?></p>
    </td>
  </tr>
  <?php
}
?> 
  <tr> 
    <td colspan='2' class='noborder'> 
      <hr width='90%' size='1' noshade>
    </td>
  </tr>
  <?php
}
?> 
</table>
<br>
<p class='kleiner'><?php echo $link_prev . " " . $link_next ?> <?php
mysql_close();
?> 
