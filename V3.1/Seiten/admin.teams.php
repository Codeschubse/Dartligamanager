<?
require_once("../Bausteine/proof_session.php");
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
      <td height="30"><?
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
              <td height="80"><?
include("../Navigation/navileft.php");
?></td>
            </tr>
            <tr> 
              <th height="30">Adminbereich</th>
            </tr>
            <tr valign="top"> 
              <td><?
include("../Navigation/naviadmin.php");
?> </td>
            </tr>
          </table>
        </div>
      </td>
      <td rowspan="5" width="81%" valign="top">
        <table width="100%" border="0" height="100%">
          <tr bgcolor="#FF9999"> 
            <td colspan="3" height="12"><font size="-2">Hier k&ouml;nnen registrierte 
              Administratoren Daten in die Datenbank eingeben und vorhandene Datens&auml;tze 
              &auml;ndern. Bei Fragen bitte an den Webmaster wenden: R&uuml;diger 
              Sehls, . Diese Telefonnummer bitte vertraulich behandeln.</font></td>
          </tr>
          <tr> 
            <td width="2%" height="374">&nbsp;</td>
            <td width="95%" height="374" valign="top">

<?php

// Datenbankverbindung
include ("../Bausteine/mysql.php");

// SICHERHEITSABFRAGE VOR EINTRAG
switch($go){

// S.V.E. neues Team best�tigt
case neu:

// Daten in Datenbank eintragen, hier in Tabelle Teams
$befehl ="insert into teams (team_kurz,team_name,team_cap,team_lokal,team_str,team_plz,";
$befehl.="team_ort,team_tel,team_aktiv";
// Wenn Homepage f�r Team angegeben wurde, hier in Datenbank eintragen 1. Teil
   if($thome){$befehl.=",team_home";}
// Wenn Homepage f�r Lokal angegeben wurde, hier in Datenbank eintragen 1. Teil
   if($lhome){$befehl.=",team_lokalhome";}
$befehl.=") values ('$tkurz','$tname','$cpass','$lname','$lstr','$lplz','$lort','$ltel','1'";
// Wenn Homepage f�r Team angegeben wurde, hier in Datenbank eintragen 2. Teil
   if($thome){$befehl.=",'$thome'";}
// Wenn Homepage f�r Lokal angegeben wurde, hier in Datenbank eintragen 2. Teil
   if($lhome){$befehl.=",'$lhome'";}
$befehl.=")";
mysql_query($befehl);

// Daten in Datenbank eintragen, hier in Tabelle Spieler
$befehl ="insert into spieler (sp_pass,sp_vor,sp_name,sp_team,sp_str,sp_plz,sp_ort,";
$befehl.="sp_tel,sp_cap";
// Wenn eMailadresse angegeben wurde, hier in Datenbank eintragen Teil 1
   if($cmeil){$befehl.=",sp_mail";}
$befehl.=") values ('$cpass','$cvor','$cname','$tkurz','$cstr','$cplz',";
$befehl.="'$cort','$ctel','1'";
// Wenn eMailadresse angegeben wurde, hier in Datenbank eintragen Teil 2
   if($cmeil){$befehl.=",'$cemail'";}
$befehl.=")";
mysql_query($befehl);

echo "<br>Team wurde mit folgenden Daten eingetragen:<br><br>\n";

echo "<table>\n";
echo "<tr><th colspan='2'>Team</th></tr>\n";
echo "<tr><td>K&uuml;rzel:</td><td><b>".$tkurz."</b></td></tr>\n";
echo "<tr><td>Teamname:</td><td><b>".$tname."</b></td></tr>\n";
if($thome){
 echo "<tr><td>Homepage:</td><td><b>".$thome."</b></td></tr>\n";
}
echo "<tr><th colspan='2'>Lokal</th></tr>\n";
echo "<tr><td>Heimlokal:</td><td><b>".$lname."</b></td></tr>\n";
echo "<tr><td>Stra&szlig;e, Nr.:</td><td><b>".$lstr."</b></td></tr>\n";
echo "<tr><td>Postleitzahl:</td><td><b>".$lplz."</b></td></tr>\n";
echo "<tr><td>Ort:</td><td><b>".$lort."</b></td></tr>\n";
echo "<tr><td>Telefon:</td><td><b>".$ltel."</b></td></tr>\n";
if($lhome){
 echo "<tr><td>Homepage:</td><td><b>".$lhome."</b></td></tr>\n";
}
echo "<tr><th colspan='2'>Captain</th></tr>\n";
echo "<tr><td>Passnummer:</td><td><b>".$cpass."</b></td></tr>\n";
echo "<tr><td>Vorname:</td><td><b>".$cvor."</b></td></tr>\n";
echo "<tr><td>Name:</td><td><b>".$cname."</b></td></tr>\n";
echo "<tr><td>Stra&szlig;e, Nr.:</td><td><b>".$cstr."</b></td></tr>\n";
echo "<tr><td>Postleitzahl:</td><td><b>".$cplz."</b></td></tr>\n";
echo "<tr><td>Ort:</td><td><b>".$cort."</b></td></tr>\n";
echo "<tr><td>Telefon:</td><td><b>".$ctel."</b></td></tr>\n";
if($cemail){
 echo "<tr><td>eMail:</td><td><b>".$cemail."</b></td></tr>\n";
}
echo "</table><br><br>\n";
echo "<a href='admin.teams.php'>Zur&uuml;ck</a> zur Eingabemaske!\n";

break;

// S.V.E. neues Team best�tigt mit vakantem Captain
case vac:

// Daten in Datenbank eintragen, hier in Tabelle Teams
$befehl ="insert into teams (team_kurz,team_name,team_cap,team_lokal,team_str,team_plz,";
$befehl.="team_ort,team_tel,team_aktiv";
// Wenn Homepage f�r Team angegeben wurde, hier in Datenbank eintragen 1. Teil
   if($thome){$befehl.=",team_home";}
// Wenn Homepage f�r Lokal angegeben wurde, hier in Datenbank eintragen 1. Teil
   if($lhome){$befehl.=",team_lokalhome";}
$befehl.=") values ('$tkurz','$tname','$cpass','$lname','$lstr','$lplz','$lort','$ltel','1'";
// Wenn Homepage f�r Team angegeben wurde, hier in Datenbank eintragen 2. Teil
   if($thome){$befehl.=",'$thome'";}
// Wenn Homepage f�r Lokal angegeben wurde, hier in Datenbank eintragen 2. Teil
   if($lhome){$befehl.=",'$lhome'";}
$befehl.=")";
mysql_query($befehl);

// Daten in Datenbank aktualisieren, hier in Tabelle Spieler
$befehl ="update spieler set sp_vor='$cvor',sp_name='$cname',sp_team='$tkurz',";
$befehl.="sp_str='$cstr',sp_plz='$cplz',sp_ort='$cort',sp_tel='$ctel',sp_cap='1'";
// Wenn eMailadresse angegeben wurde, hier in Datenbank eintragen
   if($cmeil){$befehl.=",sp_mail='$cemail'";}
$befehl.=" where sp_pass='$cpass'";
mysql_query($befehl);


echo "<br>Team wurde mit folgenden Daten eingetragen:<br><br>\n";

echo "<table>\n";
echo "<tr><th colspan='2'>Team</th></tr>\n";
echo "<tr><td>K&uuml;rzel:</td><td><b>".$tkurz."</b></td></tr>\n";
echo "<tr><td>Teamname:</td><td><b>".$tname."</b></td></tr>\n";
if($thome){
 echo "<tr><td>Homepage:</td><td><b>".$thome."</b></td></tr>\n";
}
echo "<tr><th colspan='2'>Lokal</th></tr>\n";
echo "<tr><td>Heimlokal:</td><td><b>".$lname."</b></td></tr>\n";
echo "<tr><td>Stra&szlig;e, Nr.:</td><td><b>".$lstr."</b></td></tr>\n";
echo "<tr><td>Postleitzahl:</td><td><b>".$lplz."</b></td></tr>\n";
echo "<tr><td>Ort:</td><td><b>".$lort."</b></td></tr>\n";
echo "<tr><td>Telefon:</td><td><b>".$ltel."</b></td></tr>\n";
if($lhome){
 echo "<tr><td>Homepage:</td><td><b>".$lhome."</b></td></tr>\n";
}
echo "<tr><th colspan='2'>Captain</th></tr>\n";
echo "<tr><td>Passnummer:</td><td><b>".$cpass."</b></td></tr>\n";
echo "<tr><td>Vorname:</td><td><b>".$cvor."</b></td></tr>\n";
echo "<tr><td>Name:</td><td><b>".$cname."</b></td></tr>\n";
echo "<tr><td>Stra&szlig;e, Nr.:</td><td><b>".$cstr."</b></td></tr>\n";
echo "<tr><td>Postleitzahl:</td><td><b>".$cplz."</b></td></tr>\n";
echo "<tr><td>Ort:</td><td><b>".$cort."</b></td></tr>\n";
echo "<tr><td>Telefon:</td><td><b>".$ctel."</b></td></tr>\n";
if($cemail){
 echo "<tr><td>eMail:</td><td><b>".$cemail."</b></td></tr>\n";
}
echo "</table><br><br>\n";
echo "<a href='admin.teams.php'>Zur&uuml;ck</a> zur Eingabemaske!\n";

break;

// S.V.E. neues Team best�tigt
case chg:

// Daten in Datenbank aktualisieren, hier in Tabelle Teams
$befehl ="update teams set team_name='$tname',team_cap='$cpass',team_lokal='$lname',";
$befehl.="team_str='$lstr',team_plz='$lplz',team_ort='$lort',team_tel='$ltel',";
// wenn Teamhomepage angegeben wurde hier eintragen
   if ($thome){$befehl.="team_home='$thome',";}
// wenn Lokalhomepage angegeben wurde hier eintragen
   if ($lhome){$befehl.="team_lokalhome='$lhome',";}
$befehl.="team_aktiv='1' where team_kurz='$tkurz'";
mysql_query($befehl);

// Daten in Datenbank aktualisieren, hier in Tabelle Spieler
// Alten Captain "entmachten" :-)
$befehl ="update spieler set sp_cap=null where sp_pass='$acpass'";
mysql_query($befehl);

// SPIELER BEREITS ANGELEGT, �NDERN
if($exist){

// Daten in Datenbank aktualisieren, hier in Tabelle Spieler
$befehl ="update spieler set sp_vor='$cvor',sp_name='$cname',sp_team='$tkurz',";
$befehl.="sp_str='$cstr',sp_plz='$cplz',sp_ort='$cort',sp_tel='$ctel',sp_cap='1'";
// Wenn eMailadresse angegeben wurde, hier in Datenbank eintragen
   if($cmeil){$befehl.=",sp_mail='$cemail'";}
$befehl.=" where sp_pass='$cpass'";
mysql_query($befehl);

// schlie�ende Klammer f�r SPIELER BEREITS ANGELEGT, �NDERN
}

// SPIELER NICHT ANGELEGT, NEU EINTRAGEN
else{

// Daten in Datenbank eintragen, hier in Tabelle Spieler
$befehl ="insert into spieler (sp_pass,sp_vor,sp_name,sp_team,sp_str,sp_plz,sp_ort,";
$befehl.="sp_tel,sp_cap";
// Wenn eMailadresse angegeben wurde, hier in Datenbank eintragen Teil 1
   if($cmeil){$befehl.=",sp_mail";}
$befehl.=") values ('$cpass','$cvor','$cname','$tkurz','$cstr','$cplz',";
$befehl.="'$cort','$ctel','1'";
// Wenn eMailadresse angegeben wurde, hier in Datenbank eintragen Teil 2
   if($cmeil){$befehl.=",'$cemail'";}
$befehl.=")";
mysql_query($befehl);

// schlie�ende Klammer f�r SPIELER NICHT ANGELEGT, NEU EINTRAGEN
}

echo "<br>Team wurde wie folgt ge�ndert:<br><br>\n";

echo "<table>\n";
echo "<tr><th colspan='2'>Team</th></tr>\n";
echo "<tr><td>K&uuml;rzel:</td><td><b>".$tkurz."</b></td></tr>\n";
echo "<tr><td>Teamname:</td><td><b>".$tname."</b></td></tr>\n";
if($thome){
 echo "<tr><td>Homepage:</td><td><b>".$thome."</b></td></tr>\n";
}
echo "<tr><th colspan='2'>Lokal</th></tr>\n";
echo "<tr><td>Heimlokal:</td><td><b>".$lname."</b></td></tr>\n";
echo "<tr><td>Stra&szlig;e, Nr.:</td><td><b>".$lstr."</b></td></tr>\n";
echo "<tr><td>Postleitzahl:</td><td><b>".$lplz."</b></td></tr>\n";
echo "<tr><td>Ort:</td><td><b>".$lort."</b></td></tr>\n";
echo "<tr><td>Telefon:</td><td><b>".$ltel."</b></td></tr>\n";
if($lhome){
 echo "<tr><td>Homepage:</td><td><b>".$lhome."</b></td></tr>\n";
}
echo "<tr><th colspan='2'>Captain</th></tr>\n";
echo "<tr><td>Passnummer:</td><td><b>".$cpass."</b></td></tr>\n";
echo "<tr><td>Vorname:</td><td><b>".$cvor."</b></td></tr>\n";
echo "<tr><td>Name:</td><td><b>".$cname."</b></td></tr>\n";
echo "<tr><td>Stra&szlig;e, Nr.:</td><td><b>".$cstr."</b></td></tr>\n";
echo "<tr><td>Postleitzahl:</td><td><b>".$cplz."</b></td></tr>\n";
echo "<tr><td>Ort:</td><td><b>".$cort."</b></td></tr>\n";
echo "<tr><td>Telefon:</td><td><b>".$ctel."</b></td></tr>\n";
if($cemail){
 echo "<tr><td>eMail:</td><td><b>".$cemail."</b></td></tr>\n";
}
echo "</table><br><br>\n";
echo "<a href='admin.teams.php'>Zur&uuml;ck</a> zur Eingabemaske!\n";

break;

// S.V.E. Team soll gel�scht werden
case kill:

// Teamcaptain feststellen
$befehl="select sp_pass from spieler where sp_team='tkurz' and sp_cap=1";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$cap=$data['sp_pass'];

// Captain seines Amtes entheben ;-)
$befehl="update spieler set sp_cap=null where sp_pass=$cap";
mysql_query($befehl);

// Spieler des Teams als vakant kennzeichnen
$befehl="update spieler set sp_team='vac' where sp_team='$tkurz'";
mysql_query($befehl);

// Team deaktivieren
$befehl="update teams set team_aktiv=null where team_kurz='$tkurz'";
mysql_query($befehl);

echo "<br><b>Team wurde gel�scht</b><br><br>\n";
echo "<a href='admin.teams.php'>Zur&uuml;ck</a> zur Eingabemaske!\n";

break;

// S.V.E. Sicherheitsabfrage noch nicht abgerufen
default:

// SUBMIT WURDE GEKLICKT
if($teamneu){

// TEAMK�RZEL MUSS ANGEGEBEN SEIN
if(strlen($tkurz)<3){
echo "<br>Folgender Fehler ist aufgetreten:\n";
echo "<br><b>Teamk�rzel mu� angegeben werden!</b>\n";
echo "<br><br>Bitte klicke auf <a href='admin.teams.php'>zur&uuml;ck</a> und f&uuml;lle\n";
echo " das Formular korrekt aus.\n";

// schlie�ende Klammer f�r TEAMK�RZEL MUSS ANGEGEBEN SEIN
}

// TEAMK�RZEL KORREKT ANGEGEBEN
else{

// feststellen, ob Team bereits registriert
$befehl="select * from teams where team_kurz='$tkurz'";
$antwort=mysql_query($befehl);
$data=mysql_num_rows($antwort);

// TEAM IST BEREITS REGISTRIERT
if($data!=0){

// feststellen, ob Team gel�scht werden soll (ist der Fall, wenn Teamname=Minuszeichen)
// TEAM NICHT L�SCHEN
if($tname!="-"){

// falls Captain nicht ge�ndert werden soll, ist keine Passnummer angegeben
// in dem Fall vorhandene Captainpassnummer auslesen, damit keine MySQL Fehlermeldung kommt
if(!$cpass){
$befehl="select sp_pass from spieler where sp_team='$tkurz' and sp_cap=1";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$cpass=$data['sp_pass'];
}

// feststellen, ob Captain bereits bei anderem Team gemeldet ist
// hierzu feststellen, ob Pa�nummer �berhaupt vorhanden
$befehl="select * from spieler where sp_pass=$cpass";
$antwort=mysql_query($befehl);
$data=mysql_num_rows($antwort);

// PASSNUMMER BEREITS VERGEBEN
if($data!=0){
$exist="1";
$data=mysql_fetch_array($antwort);

// SPIELER NICHT VAKANT
$team=$data['sp_team'];
if($team!="vac" and $team!=$tkurz){

// SPIELER IST BEREITS CAPTAIN
$befehl="select * from spieler where sp_pass=$cpass and sp_cap is not null";
$antwort=mysql_query($befehl);
$data=mysql_num_rows($antwort);
if($data!=0){

echo "<br>Spieler, die noch bei einem anderen Team gemeldet sind, d&uuml;rfen nicht als K&auml;pt'n\n";
echo " angemeldet werden. Bitte Spieler erst l&ouml;schen, dadurch wird er als vakant in die Datenbank\n";
echo " eingetragen.<br>\n";
echo "<br>Da der hier angegebene Spieler aber noch dazu als K&auml;pt'n gemeldet ist, mu&szlig; erst\n";
echo " ein anderer K&auml;pt'n f&uuml;r dieses Team angegeben werden. Dazu in der Teamadministration\n";
echo " das Teamk&uuml;rzel und den neuen K&auml;pt'n samt Pa&szlig;nummer, Adresse und Telefonnummer\n";
echo " eintragen. Der ex-K&auml;pt'n kann dann in der Spieleradministration gel&ouml;scht werden.<br><br>\n";
echo "<a href='admin.teams.php'>Zur&uuml;ck</a> zur Eingabemaske!\n";

// schlie�ende Klammer zu SPIELER IST BEREITS CAPTAIN
}

// SPIELER IST KEIN CAPTAIN
else{

echo "<br>Spieler, die noch bei einem anderen Team gemeldet sind, d&uuml;rfen nicht als K&auml;pt'n\n";
echo " angemeldet werden. Bitte Spieler erst l&ouml;schen, dadurch wird er als vakant in die Datenbank\n";
echo " eingetragen.<br><br>\n";
echo "Ich will zur <a href='admin.spieler.php'>Spieleradministration</a>!<br><br>\n";
echo "Nein, lieber <a href='admin.teams.php'>zur&uuml;ck</a> zur Eingabemaske!\n";

// schlie�ende Klammer zu SPIELER IST KEIN CAPTAIN
}

// schlie�ende Klammer zu SPIELER NICHT VAKANT
}

// SPIELER VAKANT
else{

// vorhandene Teamangaben auslesen
$befehl="select * from teams where team_kurz='$tkurz'";
$antwort=mysql_query($befehl);
$datat=mysql_fetch_array($antwort);
$acpass=$datat['team_cap'];

// vorhandene Captainangaben auslesen
$befehl="select * from spieler where sp_pass=$acpass";
$antwort=mysql_query($befehl);
$datas=mysql_fetch_array($antwort);

// neue Eingaben mit vorhandenen Werten vergleichen
// hierzu Variablen mit alten Daten definieren
$atname=$datat['team_name'];
$athome=$datat['team_home'];
$alname=$datat['team_lokal'];
$alstr=$datat['team_str'];
$alplz=$datat['team_plz'];
$alort=$datat['team_ort'];
$altel=$datat['team_tel'];
$alhome=$datat['team_lokalhome'];
$acpass=$datat['team_cap'];
$acvor=$datas['sp_vor'];
$acname=$datas['sp_name'];
$acstr=$datas['sp_str'];
$acplz=$datas['sp_plz'];
$acort=$datas['sp_ort'];
$actel=$datas['sp_tel'];
$acemail=$datas['sp_mail'];

// nicht gemachte Eintr�ge erg�nzen

if(strlen($tname)<1){$tname=$atname;}
if(strlen($thome)<1){$thome=$athome;}
if(strlen($lname)<1){$lname=$alname;}
if(strlen($lstr)<1){$lstr=$alstr;}
if(strlen($lplz)<1){$lplz=$alplz;}
if(strlen($lort)<1){$lort=$alort;}
if(strlen($ltel)<1){$ltel=$altel;}
if(strlen($lhome)<1){$lhome=$alhome;}
if(strlen($cpass)<1){$cpass=$acpass;}
if(strlen($cvor)<1){$cvor=$acvor;}
if(strlen($cname)<1){$cname=$acname;}
if(strlen($cstr)<1){$cstr=$acstr;}
if(strlen($cplz)<1){$cplz=$acplz;}
if(strlen($cort)<1){$cort=$acort;}
if(strlen($ctel)<1){$ctel=$actel;}
if(strlen($cemail)<1){$cemail=$acemail;}

echo "<br>Team soll wie folgt ge&auml;ndert werden \n";
echo "(bitte Angaben kontrollieren):<br><br>\n";
echo "<table>\n";
echo "<tr><th colspan='2'>Team</th><th>war bisher:</th></tr>\n";
echo "<tr><td>K&uuml;rzel:</td><td><b>".$tkurz."</b></td><td>".$tkurz."</td></tr>\n";
echo "<tr><td>Teamname:</td><td><b>".$tname."</b></td><td>".$atname."</td></tr>\n";
if($thome){
 echo "<tr><td>Homepage:</td><td><b>".$thome."</b></td><td>".$athome."</td></tr>\n";
}
echo "<tr><th colspan='2'>Lokal</th><th>war bisher:</th></tr>\n";
echo "<tr><td>Heimlokal:</td><td><b>".$lname."</b></td><td>".$alname."</td></tr>\n";
echo "<tr><td>Stra&szlig;e, Nr.:</td><td><b>".$lstr."</b></td><td>".$alstr."</td></tr>\n";
echo "<tr><td>Postleitzahl:</td><td><b>".$lplz."</b></td><td>".$alplz."</td></tr>\n";
echo "<tr><td>Ort:</td><td><b>".$lort."</b></td><td>".$alort."</td></tr>\n";
echo "<tr><td>Telefon:</td><td><b>".$ltel."</b></td><td>".$altel."</td></tr>\n";
if($lhome){
 echo "<tr><td>Homepage:</td><td><b>".$lhome."</b></td><td>".$alhome."</td></tr>\n";
}
echo "<tr><th colspan='2'>Captain</th><th>war bisher:</th></tr>\n";
echo "<tr><td>Passnummer:</td><td><b>".$cpass."</b></td><td>".$acpass."</td></tr>\n";
echo "<tr><td>Vorname:</td><td><b>".$cvor."</b></td><td>".$acvor."</td></tr>\n";
echo "<tr><td>Name:</td><td><b>".$cname."</b></td><td>".$acname."</td></tr>\n";
echo "<tr><td>Stra&szlig;e, Nr.:</td><td><b>".$cstr."</b></td><td>".$acstr."</td></tr>\n";
echo "<tr><td>Postleitzahl:</td><td><b>".$cplz."</b></td><td>".$acplz."</td></tr>\n";
echo "<tr><td>Ort:</td><td><b>".$cort."</b></td><td>".$acort."</td></tr>\n";
echo "<tr><td>Telefon:</td><td><b>".$ctel."</b></td><td>".$actel."</td></tr>\n";
if($cemail){
 echo "<tr><td>eMail:</td><td><b>".$cemail."</b></td><td>".$acemail."</td></tr>\n";
}
echo "</table><br><br>\n";

$anhang ="?go=chg";
$anhang.="&exist=".$exist;
$anhang.="&tkurz=".$tkurz;
$anhang.="&tname=".$tname;
if($thome){$anhang.="&thome=".$thome;}
$anhang.="&lname=".$lname;
$anhang.="&lstr=".$lstr;
$anhang.="&lplz=".$lplz;
$anhang.="&lort=".$lort;
$anhang.="&ltel=".$ltel;
if($lhome){$anhang.="&lhome=".$lhome;}
$anhang.="&cpass=".$cpass;
$anhang.="&acpass=".$acpass;
$anhang.="&cvor=".$cvor;
$anhang.="&cname=".$cname;
$anhang.="&cstr=".$cstr;
$anhang.="&cplz=".$cplz;
$anhang.="&cort=".$cort;
$anhang.="&ctel=".$ctel;
if($cemail){$anhang.="&cemail=".$cemail;}
echo "Jetzt <a href='admin.teams.php".$anhang."'>ausf&uuml;hren!</a><br><br>\n";
echo "Nein, lieber <a href='admin.teams.php'>zur&uuml;ck</a> zur Eingabemaske!\n";

// schlie�ende Klammer zu SPIELER VAKANT
}

// schlie�ende Klammer zu PASSNUMMER BEREITS VERGEBEN
}

// PASSNUMMER NEU
else{

// vorhandene Teamangaben auslesen
$befehl="select * from teams where team_kurz='$tkurz'";
$antwort=mysql_query($befehl);
$datat=mysql_fetch_array($antwort);
$acpass=$datat['team_cap'];

// vorhandene Captainangaben auslesen
$befehl="select * from spieler where sp_pass=$acpass";
$antwort=mysql_query($befehl);
$datas=mysql_fetch_array($antwort);

// neue Eingaben mit vorhandenen Werten vergleichen
// hierzu Variablen mit alten Daten definieren
$atname=$datat['team_name'];
$athome=$datat['team_home'];
$alname=$datat['team_lokal'];
$alstr=$datat['team_str'];
$alplz=$datat['team_plz'];
$alort=$datat['team_ort'];
$altel=$datat['team_tel'];
$alhome=$datat['team_lokalhome'];
$acpass=$datat['team_cap'];
$acvor=$datas['sp_vor'];
$acname=$datas['sp_name'];
$acstr=$datas['sp_str'];
$acplz=$datas['sp_plz'];
$acort=$datas['sp_ort'];
$actel=$datas['sp_tel'];
$acemail=$datas['sp_mail'];

// nicht gemachte Eintr�ge erg�nzen

if(strlen($tname)<1){$tname=$atname;}
if(strlen($thome)<1){$thome=$athome;}
if(strlen($lname)<1){$lname=$alname;}
if(strlen($lstr)<1){$lstr=$alstr;}
if(strlen($lplz)<1){$lplz=$alplz;}
if(strlen($lort)<1){$lort=$alort;}
if(strlen($ltel)<1){$ltel=$altel;}
if(strlen($lhome)<1){$lhome=$alhome;}
if(strlen($cpass)<1){$cpass=$acpass;}
if(strlen($cvor)<1){$cvor=$acvor;}
if(strlen($cname)<1){$cname=$acname;}
if(strlen($cstr)<1){$cstr=$acstr;}
if(strlen($cplz)<1){$cplz=$acplz;}
if(strlen($cort)<1){$cort=$acort;}
if(strlen($ctel)<1){$ctel=$actel;}
if(strlen($cemail)<1){$cemail=$acemail;}

echo "<br>Team soll wie folgt ge&auml;ndert werden \n";
echo "(bitte Angaben kontrollieren):<br><br>\n";
echo "<table>\n";
echo "<tr><th colspan='2'>Team</th><th>war bisher:</th></tr>\n";
echo "<tr><td>K&uuml;rzel:</td><td><b>".$tkurz."</b></td><td>".$tkurz."</td></tr>\n";
echo "<tr><td>Teamname:</td><td><b>".$tname."</b></td><td>".$atname."</td></tr>\n";
if($thome){
 echo "<tr><td>Homepage:</td><td><b>".$thome."</b></td><td>".$athome."</td></tr>\n";
}
echo "<tr><th colspan='2'>Lokal</th><th>war bisher:</th></tr>\n";
echo "<tr><td>Heimlokal:</td><td><b>".$lname."</b></td><td>".$alname."</td></tr>\n";
echo "<tr><td>Stra&szlig;e, Nr.:</td><td><b>".$lstr."</b></td><td>".$alstr."</td></tr>\n";
echo "<tr><td>Postleitzahl:</td><td><b>".$lplz."</b></td><td>".$alplz."</td></tr>\n";
echo "<tr><td>Ort:</td><td><b>".$lort."</b></td><td>".$alort."</td></tr>\n";
echo "<tr><td>Telefon:</td><td><b>".$ltel."</b></td><td>".$altel."</td></tr>\n";
if($lhome){
 echo "<tr><td>Homepage:</td><td><b>".$lhome."</b></td><td>".$alhome."</td></tr>\n";
}
echo "<tr><th colspan='2'>Captain</th><th>war bisher:</th></tr>\n";
echo "<tr><td>Passnummer:</td><td><b>".$cpass."</b></td><td>".$acpass."</td></tr>\n";
echo "<tr><td>Vorname:</td><td><b>".$cvor."</b></td><td>".$acvor."</td></tr>\n";
echo "<tr><td>Name:</td><td><b>".$cname."</b></td><td>".$acname."</td></tr>\n";
echo "<tr><td>Stra&szlig;e, Nr.:</td><td><b>".$cstr."</b></td><td>".$acstr."</td></tr>\n";
echo "<tr><td>Postleitzahl:</td><td><b>".$cplz."</b></td><td>".$acplz."</td></tr>\n";
echo "<tr><td>Ort:</td><td><b>".$cort."</b></td><td>".$acort."</td></tr>\n";
echo "<tr><td>Telefon:</td><td><b>".$ctel."</b></td><td>".$actel."</td></tr>\n";
if($cemail){
 echo "<tr><td>eMail:</td><td><b>".$cemail."</b></td><td>".$acemail."</td></tr>\n";
}
echo "</table><br><br>\n";

$anhang ="?go=chg";
$anhang.="&exist=".$exist;
$anhang.="&tkurz=".$tkurz;
$anhang.="&tname=".$tname;
if($thome){$anhang.="&thome=".$thome;}
$anhang.="&lname=".$lname;
$anhang.="&lstr=".$lstr;
$anhang.="&lplz=".$lplz;
$anhang.="&lort=".$lort;
$anhang.="&ltel=".$ltel;
if($lhome){$anhang.="&lhome=".$lhome;}
$anhang.="&cpass=".$cpass;
$anhang.="&acpass=".$acpass;
$anhang.="&cvor=".$cvor;
$anhang.="&cname=".$cname;
$anhang.="&cstr=".$cstr;
$anhang.="&cplz=".$cplz;
$anhang.="&cort=".$cort;
$anhang.="&ctel=".$ctel;
if($cemail){$anhang.="&cemail=".$cemail;}
echo "Jetzt <a href='admin.teams.php".$anhang."'>ausf&uuml;hren!</a><br><br>\n";
echo "Nein, lieber <a href='admin.teams.php'>zur&uuml;ck</a> zur Eingabemaske!\n";

// schlie�ende Klammer zu PASSNUMMER NEU
}

// schlie�ende Klammer zu TEAM NICHT L�SCHEN
}

// TEAM L�SCHEN
else{

$anhang ="?go=kill";
$anhang.="&tkurz=".$tkurz;
echo "<br><b>Team soll gel�scht werden!</b><br>\n";
echo "Alle Spieler werden als vakant gekennzeichnet und das Team deaktiviert.<br><br>\n";
echo "Jetzt <a href='admin.teams.php".$anhang."'>ausf&uuml;hren!</a><br><br>\n";
echo "Nein, lieber <a href='admin.teams.php'>zur&uuml;ck</a> zur Eingabemaske!\n";

// schlie�ende Klammer zu TEAM L�SCHEN
}

// schlie�ende Klammer f�r TEAM IST BEREITS REGISTRIERT
}

// TEAM IST NOCH NICHT REGISTRIERT
else{

// KEIN TEAMNAME
   if(strlen($tname)<1){
   $fehler ="Es mu&szlig; ein Teamname angegeben sein.<br>";

// schlie�ende Klammer f�r KEIN TEAMNAME
} 

// KEIN LOKALNAME
   if(strlen($lname)<1){
   $fehler.="Es mu&szlig; der Name des Heimlokals angegeben sein.<br>";

// schlie�ende Klammer f�r KEIN LOKALNAME
}

// KEINE LOKALSTRASSE
   if(strlen($lstr)<3){
   $fehler.="Die Stra&szlig;e und Hausnummer des Heimlokals m&uuml;ssen angegeben sein.<br>";

// schlie�ende Klammer f�r KEINE LOKALSTRASSE
}

// KEINE LOKALPLZ
   if(strlen($lplz)<5){
   $fehler.="Die Postleitzahl des Heimlokals mu&szlig; angegeben sein.<br>";

// schlie�ende Klammer f�r KEINE LOKALPLZ
}

// KEIN LOKALORT
   if(strlen($lort)<3){
   $fehler.="Es mu&szlig; der Ort des Heimlokals angegeben sein.<br>";

// schlie�ende Klammer f�r KEIN LOKALORT
}

// KEINE LOKALTEL
   if(strlen($ltel)<3){
   $fehler.="Es mu&szlig; eine Telefonnummer des Heimlokals angegeben sein.<br>";

// schlie�ende Klammer f�r KEINE LOKALTEL
}

// KEIN CAPTAINPASS
   if(strlen($cpass)<1){
   $fehler.="Die Pa&szlig;nummer des K&auml;pt'ns mu&szlig; angegeben sein.<br>";

// schlie�ende Klammer f�r KEIN CAPTAINPASS
}

// KEIN CAPTAINVORNAME
   if(strlen($cvor)<1){
   $fehler.="Auch der Vorname des K&auml;pt'ns mu&szlig; angegeben sein.<br>";

// schlie�ende Klammer f�r KEIN CAPTAINVORNAME
}

// KEIN CAPTAINNACHNAME
   if(strlen($cname)<1){
   $fehler.="Bitte den Nachnamen des K&auml;pt'ns angegeben.<br>";

// schlie�ende Klammer f�r KEIN CAPTAINNACHNAME
}

// KEINE CAPTAINSTRASSE
   if(strlen($cstr)<3){
   $fehler.="Die Stra&szlig;e des K&auml;pt'ns mu&szlig; angegeben sein.<br>";

// schlie�ende Klammer f�r KEINE CAPTAINSTRASSE
}

// KEINE CAPTAINPLZ
   if(strlen($cplz)<5){
   $fehler.="Bitte gib die Postleitzahl des K&auml;ptn's an.<br>";

// schlie�ende Klammer f�r KEINE CAPTAINPLZ
}

// KEIN CAPTAINORT
   if(strlen($cort)<3){
   $fehler.="Es mu&szlig; der Ort des K&auml;pt'ns angegeben sein.<br>";

// schlie�ende Klammer f�r KEIN CAPTAINORT
}

// KEINE CAPTAINTEL
   if(strlen($ctel)<3){
   $fehler.="Es mu&szlig; eine Telefonnummer des K&auml;pt'ns angegeben sein.<br>";

// schlie�ende Klammer f�r KEINE CAPTAINTEL
}

// CAPTAINEMAIL WURDE ANGEGEBEN
   if($cemail){

// CAPTAINEMAIL NICHT KORREKT
   if(!ereg("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$",$cemail)){
   $fehler.="Die eMail-Adresse des K&auml;pt'ns mu&szlig; zwar nicht angegeben sein,<br>";
   $fehler.="&nbsp;&nbsp;&nbsp;aber wenn sie angegeben wird, sollte sie auch korrekt sein. ;-)<br>";

// schlie�ende Klammer f�r CAPTAINEMAIL NICHT KORREKT
}

// schlie�ende Klammer f�r CAPTAINEMAIL WURDE ANGEGEBEN
}

// TEAMHOMEPAGE WURDE ANGEGEBEN
   if($thome){
   $thome=strip_tags($thome);

    //http:// fehlt in der Angabe der Adresse - hier erg�nzen
    if(!ereg("^http:",$thome)){
    $thome="http://" . $thome;
    }

// schlie�ende Klammer f�r TEAMHOMEPAGE WURDE ANGEGEBEN
}

// LOKALHOMEPAGE WURDE ANGEGEBEN
   if($lhome){
   $lhome=strip_tags($lhome);

   //http:// fehlt in der Angabe der Adresse - hier erg�nzen
   if(!ereg("^http:",$lhome)){
   $lhome="http://" . $lhome;
   }

// schlie�ende Klammer f�r LOKALHOMEPAGE WURDE ANGEGEBEN
}

// FELDER WURDEN NICHT KORREKT AUSGEF�LLT
   if($fehler){
   echo "<br>Folgender Fehler ist aufgetreten:<br><br>\n";
   echo "<b>".$fehler."</b><br>\n";
   echo "Bitte klicke auf <a href='admin.teams.php'>zur&uuml;ck</a> und f&uuml;lle das Formular korrekt aus!\n";

// schlie�ende Klammer f�r FELDER WURDEN NICHT KORREKT AUSGEF�LLT
}

// FELDER KORREKT AUSGEF�LLT
else{

// feststellen, ob Captain bereits bei anderem Team gemeldet ist
// hierzu feststellen, ob Pa�nummer �berhaupt vorhanden
$befehl="select * from spieler where sp_pass=$cpass";
$antwort=mysql_query($befehl);
$data=mysql_num_rows($antwort);

// PASSNUMMER BEREITS VERGEBEN
if($data!=0){
$data=mysql_fetch_array($antwort);

// SPIELER NICHT VAKANT
$team=$data['sp_team'];
if($team!="vac"){

// SPIELER IST BEREITS CAPTAIN
$befehl="select * from spieler where sp_pass=$cpass and sp_cap is not null";
$antwort=mysql_query($befehl);
$data=mysql_num_rows($antwort);
if($data!=0){

echo "<br>Spieler, die noch bei einem anderen Team gemeldet sind, d&uuml;rfen nicht als K&auml;pt'n\n";
echo " angemeldet werden. Bitte Spieler erst l&ouml;schen, dadurch wird er als vakant in die Datenbank\n";
echo " eingetragen.<br>\n";
echo "<br>Da der hier angegebene Spieler aber noch dazu als K&auml;pt'n gemeldet ist, mu&szlig; erst\n";
echo " ein anderer K&auml;pt'n f&uuml;r dieses Team angegeben werden. Dazu in der Teamadministration\n";
echo " das Teamk&uuml;rzel und den neuen K&auml;pt'n samt Pa&szlig;nummer, Adresse und Telefonnummer\n";
echo " eintragen. Der ex-K&auml;pt'n kann dann in der Spieleradministration gel&ouml;scht werden.<br><br>\n";
echo "<a href='admin.teams.php'>Zur&uuml;ck</a> zur Eingabemaske!\n";

// schlie�ende Klammer zu SPIELER IST BEREITS CAPTAIN
}

// SPIELER IST KEIN CAPTAIN
else{

echo "<br>Spieler, die noch bei einem anderen Team gemeldet sind, d&uuml;rfen nicht als K&auml;pt'n\n";
echo " angemeldet werden. Bitte Spieler erst l&ouml;schen, dadurch wird er als vakant in die Datenbank\n";
echo " eingetragen.<br><br>\n";
echo "Ich will zur <a href='admin.spieler.php'>Spieleradministration</a>!<br><br>\n";
echo "Nein, lieber <a href='admin.teams.php'>zur&uuml;ck</a> zur Eingabemaske!\n";

// schlie�ende Klammer zu SPIELER IST KEIN CAPTAIN
}

// schlie�ende Klammer zu SPIELER NICHT VAKANT
}

// SPIELER VAKANT
else{

echo "<br>Team soll mit folgenden Daten eingetragen werden \n";
echo "(K&auml;pt'n war bereits gemeldet, bitte Angaben kontrollieren):<br><br>\n";
echo "<table>\n";
echo "<tr><th colspan='2'>Team</th></tr>\n";
echo "<tr><td>K&uuml;rzel:</td><td><b>".$tkurz."</b></td></tr>\n";
echo "<tr><td>Teamname:</td><td><b>".$tname."</b></td></tr>\n";
if($thome){
 echo "<tr><td>Homepage:</td><td><b>".$thome."</b></td></tr>\n";
}
echo "<tr><th colspan='2'>Lokal</th></tr>\n";
echo "<tr><td>Heimlokal:</td><td><b>".$lname."</b></td></tr>\n";
echo "<tr><td>Stra&szlig;e, Nr.:</td><td><b>".$lstr."</b></td></tr>\n";
echo "<tr><td>Postleitzahl:</td><td><b>".$lplz."</b></td></tr>\n";
echo "<tr><td>Ort:</td><td><b>".$lort."</b></td></tr>\n";
echo "<tr><td>Telefon:</td><td><b>".$ltel."</b></td></tr>\n";
if($lhome){
 echo "<tr><td>Homepage:</td><td><b>".$lhome."</b></td></tr>\n";
}
echo "<tr><th colspan='2'>Captain</th></tr>\n";
echo "<tr><td>Passnummer:</td><td><b>".$cpass."</b></td></tr>\n";
echo "<tr><td>Vorname:</td><td><b>".$cvor."</b></td></tr>\n";
echo "<tr><td>Name:</td><td><b>".$cname."</b></td></tr>\n";
echo "<tr><td>Stra&szlig;e, Nr.:</td><td><b>".$cstr."</b></td></tr>\n";
echo "<tr><td>Postleitzahl:</td><td><b>".$cplz."</b></td></tr>\n";
echo "<tr><td>Ort:</td><td><b>".$cort."</b></td></tr>\n";
echo "<tr><td>Telefon:</td><td><b>".$ctel."</b></td></tr>\n";
if($cemail){
 echo "<tr><td>eMail:</td><td><b>".$cemail."</b></td></tr>\n";
}
echo "</table><br><br>\n";
$anhang ="?go=vac";
$anhang.="&tkurz=".$tkurz;
$anhang.="&tname=".$tname;
if($thome){
$anhang.="&thome=".$thome;
}
$anhang.="&lname=".$lname;
$anhang.="&lstr=".$lstr;
$anhang.="&lplz=".$lplz;
$anhang.="&lort=".$lort;
$anhang.="&ltel=".$ltel;
if($lhome){
$anhang.="&lhome=".$lhome;
}
$anhang.="&cpass=".$cpass;
$anhang.="&cvor=".$cvor;
$anhang.="&cname=".$cname;
$anhang.="&cstr=".$cstr;
$anhang.="&cplz=".$cplz;
$anhang.="&cort=".$cort;
$anhang.="&ctel=".$ctel;
if($cemail){
$anhang.="&cemail=".$cemail;
}
echo "Jetzt <a href='admin.teams.php".$anhang."'>ausf&uuml;hren!</a><br><br>\n";
echo "Nein, lieber <a href='admin.teams.php'>zur&uuml;ck</a> zur Eingabemaske!\n";

// schlie�ende Klammer zu SPIELER VAKANT
}

// schlie�ende Klammer zu PASSNUMMER BEREITS VERGEBEN
}

// PASSNUMMER NEU
else{

echo "<br>Team soll mit folgenden Daten eingetragen werden:<br><br>\n";
echo "<table>\n";
echo "<tr><th colspan='2'>Team</th></tr>\n";
echo "<tr><td>K&uuml;rzel:</td><td><b>".$tkurz."</b></td></tr>\n";
echo "<tr><td>Teamname:</td><td><b>".$tname."</b></td></tr>\n";
if($thome){
 echo "<tr><td>Homepage:</td><td><b>".$thome."</b></td></tr>\n";
}
echo "<tr><th colspan='2'>Lokal</th></tr>\n";
echo "<tr><td>Heimlokal:</td><td><b>".$lname."</b></td></tr>\n";
echo "<tr><td>Stra&szlig;e, Nr.:</td><td><b>".$lstr."</b></td></tr>\n";
echo "<tr><td>Postleitzahl:</td><td><b>".$lplz."</b></td></tr>\n";
echo "<tr><td>Ort:</td><td><b>".$lort."</b></td></tr>\n";
echo "<tr><td>Telefon:</td><td><b>".$ltel."</b></td></tr>\n";
if($lhome){
 echo "<tr><td>Homepage:</td><td><b>".$lhome."</b></td></tr>\n";
}
echo "<tr><th colspan='2'>Captain</th></tr>\n";
echo "<tr><td>Passnummer:</td><td><b>".$cpass."</b></td></tr>\n";
echo "<tr><td>Vorname:</td><td><b>".$cvor."</b></td></tr>\n";
echo "<tr><td>Name:</td><td><b>".$cname."</b></td></tr>\n";
echo "<tr><td>Stra&szlig;e, Nr.:</td><td><b>".$cstr."</b></td></tr>\n";
echo "<tr><td>Postleitzahl:</td><td><b>".$cplz."</b></td></tr>\n";
echo "<tr><td>Ort:</td><td><b>".$cort."</b></td></tr>\n";
echo "<tr><td>Telefon:</td><td><b>".$ctel."</b></td></tr>\n";
if($cemail){
 echo "<tr><td>eMail:</td><td><b>".$cemail."</b></td></tr>\n";
}
echo "</table><br><br>\n";
$anhang ="?go=neu";
$anhang.="&tkurz=".$tkurz;
$anhang.="&tname=".$tname;
if($thome){
$anhang.="&thome=".$thome;
}
$anhang.="&lname=".$lname;
$anhang.="&lstr=".$lstr;
$anhang.="&lplz=".$lplz;
$anhang.="&lort=".$lort;
$anhang.="&ltel=".$ltel;
if($lhome){
$anhang.="&lhome=".$lhome;
}
$anhang.="&cpass=".$cpass;
$anhang.="&cvor=".$cvor;
$anhang.="&cname=".$cname;
$anhang.="&cstr=".$cstr;
$anhang.="&cplz=".$cplz;
$anhang.="&cort=".$cort;
$anhang.="&ctel=".$ctel;
if($cemail){
$anhang.="&cemail=".$cemail;
}
echo "Jetzt <a href='admin.teams.php".$anhang."'>ausf&uuml;hren!</a><br><br>\n";
echo "Nein, lieber <a href='admin.teams.php'>zur&uuml;ck</a> zur Eingabemaske!\n";

// schlie�ende Klammer f�r PASSNUMMER NEU
}

// schlie�ende Klammer f�r FELDER KORREKT AUSGEF�LLT
}

// schlie�ende Klammer f�r TEAM IST NOCH NICHT REGISTRIERT
}

// schlie�ende Klammer f�r TEAMK�RZEL KORREKT ANGEGEBEN
}

// schlie�ende Klammer f�r SUBMIT WURDE GEKLICKT
}

// SUBMIT WURDE NICHT GEKLICKT
else{

include("../Bausteine/team.neu.php");

// schlie�ende Klammer f�r SUBMIT WURDE NICHT GEKLICKT
}

// schlie�ende Klammer f�r SICHERHEITSABFRAGE VOR EINTRAG
}

// Datenbankverbindung beenden
mysql_close();
?>

            </td>
            <td width="3%" height="374">&nbsp;</td>
          </tr>
        </table>
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
