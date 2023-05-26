<?php
include("../Bausteine/top.php");
?>
<html>
<body>
<div align="left"> 
  <table width="100%" height="85%" border="1" bordercolor="#000000">
    <tr> 
      <td height="30" width="200"> 
<?php include("../Bausteine/copyright.php"); ?>
      </td>
      <td height="30"><?php
include("../Navigation/navitop.php");
?></td>
    </tr>
    <tr> 
      <td height="159" rowspan="5" valign="top" width="200"> 
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
              <th height="30">G&auml;stebuch</th>
            </tr>
            <tr valign="top"> 
              <td><a href="gaestebuch.neu.php">In das G&auml;stebuch eintragen</a><br>
                <a href="gaestebuch.php">G&auml;stebuch ansehen</a></td>
            </tr>
          </table>
        </div>
      </td>
      <td rowspan="5" width="81%" valign="top" align="center"> 
        <?php

//Verbindung zur Datenbank aufbauen
include ("../Bausteine/mysql.php");

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
  $error_msg.="<br>Bitte gib auch etwas in das Gästebuch ein.";
  }
  if(ereg("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$",$email)){
  //Mailadresse korrekt angegeben - Name entsprechend formatieren
  $name="<a href=mailto:" . $email . ">" . $name . "</a>";
  }else{
  $name="<b>".$name."</b>";
  }
  if($homepage){
  //Es wurde auch eine Homepageadresse angegeben - entsprechende Formatierung vornehmen
  if(!ereg("^http:",$homepage)){
    //http:// fehlt in der Angabe der Adresse - hier ergänzen
    $homepage="http://" . $homepage;
    }
  $hp_format="<br><b>Homepage: </b><a href=" . $homepage . " target=new>" . $homepage . "</a>";
  }
  //Ende Eingaben überprüfen

  if($error_msg){
  
     //Fehlerhafte Angaben - Hinweis ausgeben und keinen Eintrag vornehmen
     $message ="<br>Dein Eintrag konnte leider nicht in unser Gästebuch aufgenommen werden:<br>";
     $message.=$error_msg;
     $message.="<br><br>Bitte klicke auf <a href='admin.spieler.php'>zur&uuml;ck</a>.<br><br>";
 
  }else{

    //Neuen Gästebucheintrag vornehmen
     $now=date("Y-m-d H:i:s");
     $guestbook_SQL_insert="INSERT INTO guestbook (guestbook_name,guestbook_homepage,guestbook_text,guestbook_datetime) VALUES ('$name','$hp_format','$eintrag','$now')";
     mysql_query($guestbook_SQL_insert);
     
     //Mail verschicken
     $recipient="webmaster@hdlev.de";
     $subject="Neuer Eintrag im HDL-Gaestebuch";
     $header="From: webmaster@hdlev.de\n";
     $mail_body=$email."<br><br>".$eintrag;
     
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
$link_next="weiter >>";
}else {
$link_next="<a href=gaestebuch.php?pos=" . $new_pos_next . ">weiter >></a>";
}
$new_pos_prev=$pos-$count;
if($new_pos_prev<0){
$link_prev="<< zurück";
} else {
$link_prev="<a href=gaestebuch.php?pos=" . $new_pos_prev . "><< zurück</a>";
}
?>

       <table width='75%' border='0' cellspacing='1' cellpadding='1'>

<?php

//Hier die Einträge aus der Datenbank auslesen und darstellen
while($guestbook_data=mysql_fetch_array($guestbook_result)){

//Datum und Uhrzeit formatieren
$com=$guestbook_data['guestbook_comment'];
$ts=$guestbook_data['guestbook_datetime'];
$unixtime = mktime(substr($ts,11,12),substr($ts,14,15),substr($ts,17,18),substr($ts,5,6),substr($ts,8,9),substr($ts,0,4));
?>        

    	   <tr valign='top' >
    	    <td class='kleiner' width='65%'><b>Name: </b> <?php echo $guestbook_data['guestbook_name'] . " " . $guestbook_data['guestbook_homepage'] ?></td>
    	    <td class='kleiner' width='35%' align='right'><b>Datum:</b> <?php echo date("j.n.y H:i",$unixtime) ?></td>
  	   </tr>
  	<tr valign='top'>
            <td colspan='2' class='kleiner'>
      <p><?php echo $guestbook_data['guestbook_text'] ?></p>
    </td>
  </tr>

<?php
if($com){
?>
  	<tr valign='top'>
            <td colspan='2' class='kleiner'>
      <p><?php echo "<i>".$guestbook_data['guestbook_comment']."</i>" ?></p>
    </td>
  </tr>

<?php
}
?>

  <tr>
    <td colspan='2'>
      <hr width='90%' size='1' noshade>
    </td>
  </tr>

<?php
}
?>
  
     </table>
     <br>  
     <p class='kleiner'><?php echo $link_prev . " " . $link_next ?>

<?php
mysql_close();
?>

    </tr>
    <tr> </tr>
    <tr> </tr>
    <tr> </tr>
    <tr> </tr>
  </table>
</div>
</body>
</html>
