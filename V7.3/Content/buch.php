<h2>G&auml;stebuch</h2>
<p align="center"><a href="?content=senf">eintragen</a></p>
<hr>
<?php

//Verbindung zur Datenbank aufbauen
include ("Components/mysql.php");

// scheiss POST und GET gedoens
$pos=$_GET['pos'];

//Gaestebucheintraege auslesen
if(!$pos) $pos=0;
$count=5;
$guestbook_SQL="SELECT * FROM guestbook ORDER BY guestbook_datetime DESC LIMIT $pos,$count";
$guestbook_result=mysql_query($guestbook_SQL);

//Anzahl der Datensaetze ermitteln
$no_data=mysql_num_rows(mysql_query("SELECT guestbook_ID FROM guestbook"));

//Mit diesen Anweisungen werden die Links fuer das Blaettern zwischen den Ergebnissen erzeugt
$new_pos_next=$pos+$count;
if($new_pos_next>=$no_data){
$link_next="weiter &gt;&gt;";
}else {
$link_next="<a href='index.php?content=buch&amp;pos=";
$link_next.= $new_pos_next;
$link_next.="'>weiter &gt;&gt;</a>";
}
$new_pos_prev=$pos-$count;
if($new_pos_prev<0){
$link_prev="&lt;&lt; zur&uuml;ck";
} else {
$link_prev="<a href='index.php?content=buch&amp;pos=";
$link_prev.=$new_pos_prev;
$link_prev.="'>&lt;&lt; zur&uuml;ck</a>";
}
?> 
<table align='center' border='0' cellspacing='1' cellpadding='1'>
  <?php

//Hier die Eintraege aus der Datenbank auslesen und darstellen
while($guestbook_data=mysql_fetch_array($guestbook_result)){

//Name und Email formatieren
$name=$guestbook_data['guestbook_name'];
$email=$guestbook_data['guestbook_email'];
$emailappendix="?subject=bitte%20gib%20einen%20Betreff%20an%2C%20please%20type%20a%20subject&body=Das%20%22%28at%29%22%20muss%20durch%20den%20Klammeraffen%20%22@%22%20ersetzt%20werden,%20%22%28at%29%22%20must%20be%20replaced%20by%20%22@%22";
if($email){$name="<a href='mailto:".$email.$emailappendix."'>".$name."</a>";}

//Datum und Uhrzeit formatieren
$com=$guestbook_data['guestbook_comment'];
$ts=$guestbook_data['guestbook_datetime'];
$unixtime = mktime(substr($ts,11,12),substr($ts,14,15),substr($ts,17,18),substr($ts,5,6),substr($ts,8,9),substr($ts,0,4));
?> 

  <tr valign='top' > 
    <td width='65%' class='noborder'><b>Name: </b> <?php echo $name . " " . $guestbook_data['guestbook_homepage'] ?></td>
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
