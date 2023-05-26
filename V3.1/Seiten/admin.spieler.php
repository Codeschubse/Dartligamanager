<?php
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
              <th height="30">Adminbereich</th>
            </tr>
            <tr valign="top"> 
              <td><?php
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
            <td colspan="3" height="10"></td>
          </tr>
          <tr> 
            <td width="2%" height="374">&nbsp;</td>
            <td width="95%" height="374" valign="top">

<?php
// Datenbankverbindung
include ("../Bausteine/mysql.php");

// Formular wurde ausgef�hrt und Sicherheitsabfrage best�tigt
// SICHERHEITSABFRAGE ODER NICHT
switch($go){

// S.O.N. Sicherheitsabfrage f�r Neueintrag bejaht
case neu:

// Neuen Datensatz in Datenbank einf�gen
$befehl="insert into spieler (sp_pass,sp_vor,sp_name,sp_team) values('$pass','$vorname','$nachname','$team')";
mysql_query($befehl);

// Teamname zu Teamk�rzel feststellen
$befehl="select team_name from teams where team_kurz='$team'";
$antwort=mysql_query($befehl);
$datax=mysql_fetch_array($antwort);

echo "Neuer Spieler wurde mit folgenden Angaben eingetragen:<br><br>\n";
echo "<table border='0'>\n";
echo "<tr><td>Pa&szlig;:</td><td><b>".$pass."</b></td></tr>\n";
echo "<tr><td>Name:</td><td><b>".$vorname." ".$nachname."</b></td></tr>\n";
echo "<tr><td>Team:</td><td><b>".$datax['team_name']."</b></td></tr>\n";
echo "</table>\n";
echo "<br><br><a href='admin.spieler.php'>zur&uuml;ck zur Eingabemaske</a>\n";

break;

// S.O.N. Sicherheitsabfrage f�r �nderung bejaht
case �ndern:

$befehl="select * from spieler where sp_pass=$pass";
$antwort=mysql_query($befehl);

// Spieler und Teamk�rzel des vorhandenen Passes feststellen
$data=mysql_fetch_array($antwort);
$teamalt=$data['sp_team'];
$vornamealt=$data['sp_vor'];
$namealt=$data['sp_name'];

// Teamname zu Teamk�rzel feststellen
$befehl="select team_name from teams where team_kurz='$teamalt'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$teamnamealt=$data['team_name'];

// neuen Teamnamen feststellen
$befehl="select team_name from teams where team_kurz='$team'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$teamnameneu=$data['team_name'];

// Spielerdaten in Datenbank �ndern
$befehl="update spieler set sp_team='$team',sp_vor='$vorname',sp_name='$nachname' where sp_pass='$pass'";
mysql_query($befehl);

echo "Spielerdaten wurden wie folgt ge�ndert:<br><br>\n";
echo "<table border='0'>\n";
echo "<tr><td>Pa&szlig;:</td><td><b>".$pass."</b></td></tr>\n";
echo "<tr><td>Name alt:</td><td><b>".$vornamealt." ".$namealt."</b></td></tr>\n";
echo "<tr><td>Name neu:</td><td><b>".$vorname." ".$nachname."</b></td></tr>\n";
echo "<tr><td>Team alt:</td><td><b>".$teamnamealt."</b></td></tr>\n";
echo "<tr><td>Team neu:</td><td><b>".$teamnameneu."</b></td></tr>\n";
echo "</table>\n";
echo "<br><br><a href='admin.spieler.php'>zur&uuml;ck zur Eingabemaske</a>\n";

break;

// S.O.N. Sicherheitsabfrage f�r Ummeldung bejaht
case ummelden:

// Spielername und altes Teamk�rzel abfragen
$befehl="select * from spieler where sp_pass=$pass";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$name=$data['sp_vor']." ".$data['sp_name'];
$altteam=$data['sp_team'];

// alten Teamnamen feststellen
$befehl="select team_name from teams where team_kurz='$altteam'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$teamalt=$data['team_name'];

// neuen Teamnamen feststellen
$befehl="select team_name from teams where team_kurz='$team'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$teamneu=$data['team_name'];

// Teamk�rzel in Datenbank �ndern
$befehl="update spieler set sp_team='$team' where sp_pass='$pass'";
mysql_query($befehl);

echo "Aktiver Spieler wurde umgemeldet:<br><br>\n";
echo "<table border='0'>\n";
echo "<tr><td>Pa&szlig;:</td><td><b>".$pass."</b></td></tr>\n";
echo "<tr><td>Name:</td><td><b>".$name."</b></td></tr>\n";
echo "<tr><td>von Team:</td><td><b>".$teamalt."</b></td></tr>\n";
echo "<tr><td>zu Team:</td><td><b>".$teamneu."</b></td></tr>\n";
echo "</table>\n";
echo "<br><br><a href='admin.spieler.php'>zur&uuml;ck zur Eingabemaske</a>\n";

break;

// S.O.N. Sicherheitsabfrage f�r L�schung bejaht
case l�schen:

// Spielername und Teamk�rzel feststellen
$befehl="select * from spieler where sp_pass=$pass";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$name=$data['sp_vor']." ".$data['sp_name'];
$team=$data['sp_team'];

// Teamnamen zu Teamk�rzel feststellen
$befehl="select team_name from teams where team_kurz='$team'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$teamname=$data['team_name'];

// Spieler aus Datenbank l�schen
$befehl="update spieler set sp_team='vac' where sp_pass='$pass'";
mysql_query($befehl);

echo "Aktiver Spieler wurde gel&ouml;scht:<br><br>\n";
echo "<table border='0'>\n";
echo "<tr><td>Pa&szlig;:</td><td><b>".$pass."</b></td></tr>\n";
echo "<tr><td>Name:</td><td><b>".$name."</b></td></tr>\n";
echo "<tr><td>Team:</td><td><b>".$teamname."</b></td></tr>\n";
echo "</table>\n";
echo "<br><br><a href='admin.spieler.php'>zur&uuml;ck zur Eingabemaske</a>\n";

break;

// S.O.N. Sicherheitsabfrage noch nicht beantwortet
default:

// SUBMIT WURDE GEKLICKT
if ($spielerneu or $spielerum or $spielerex) {

// NEUER SPIELER
if($spielerneu){

// KEINE PASSNUMMER
if(strlen($pass)<1){
$fehler="Bitte gib eine Passnummer ein.<br>";

// schlie�ende Klammer f�r KEINE PASSNUMMER
}

// KEIN VORNAME
if(strlen($vorname)<3){
$fehler.="Bitte gib einen Vornamen ein.<br>";

// schlie�ende Klammer f�r KEIN VORNAME
}

// KEIN NACHNAME
if(strlen($nachname)<3){
$fehler.="Bitte gib einen Nachnamen ein.<br>";

// schlie�ende Klammer f�r KEIN NACHNAME
}

// NEU-FELDER NICHT KORREKT AUSGEF�LLT
if($fehler){
echo "Die Anfrage konnte aus folgenden Gr�nden leider nicht bearbeitet werden:<br><br>";
echo $fehler;
echo "<br>Bitte klicke auf <a href='admin.spieler.php'>zur&uuml;ck</a> und f�lle alle Felder aus.";

// schlie�ende Klammer f�r NEU-FELDER NICHT KORREKT AUSGEF�LLT
}

// SPIELER EINTRAGEN
else{

// Anzahl der Eintr�ge mit angegebener Passnummer z�hlen
$befehl="select * from spieler where sp_pass=$pass";
$antwort=mysql_query($befehl);
$data=mysql_num_rows($antwort);

// PASSNUMMER BEREITS VERGEBEN
if($data != 0){

// Spieler und Teamk�rzel des vorhandenen Passes feststellen
$data=mysql_fetch_array($antwort);
$teamalt=$data['sp_team'];
$vornamealt=$data['sp_vor'];
$namealt=$data['sp_name'];
$cap=$data['sp_cap'];

// Teamname zu Teamk�rzel feststellen
$befehl="select team_name from teams where team_kurz='$teamalt'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$teamnamealt=$data['team_name'];

// neuen Teamnamen feststellen
$befehl="select team_name from teams where team_kurz='$team'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$teamnameneu=$data['team_name'];

// NEU-FELDER NICHT KORREKT AUSGEF�LLT
if($cap and $teamnamealt!=$teamnameneu){
$fehler ="Inhaber der Passnummer ist Teamkapit�n!\n";
$fehler.="Kapit&auml;ne d�rfen nicht umgemeldet werden. Bitte erst einen neuen Kapit&auml;n festlegen.\n";
$fehlerx="<br>Bisherige Daten des Passinhabers:<br>\n";
$fehlerx.=$pass." ".$vornamealt." ".$namealt." (".$teamnamealt.")\n";

// schlie�ende Klammer f�r NEU-FELDER NICHT KORREKT AUSGEF�LLT
}

// KEINE KAPIT�NE UMMELDEN
if($fehler){
echo "Die Anfrage konnte aus folgenden Gr�nden leider nicht bearbeitet werden:<br>";
echo "<b>".$fehler."</b>\n";
echo $fehlerx."\n";
echo "<br><br><a href='admin.spieler.php'>zur&uuml;ck zur Eingabemaske</a>\n";

// schlie�ende Klammer f�r KEINE KAPIT�NE UMMELDEN
}

// FELDER KORREKT AUSGEF�LLT
else{

echo "Spielerdaten sollen wie folgt ge�ndert werden:<br><br>\n";
echo "<table border='0'>\n";
echo "<tr><td>Pa&szlig;:</td><td><b>".$pass."</b></td></tr>\n";
echo "<tr><td>Name alt:</td><td><b>".$vornamealt." ".$namealt."</b></td></tr>\n";
echo "<tr><td>Name neu:</td><td><b>".$vorname." ".$nachname."</b></td></tr>\n";
echo "<tr><td>Team alt:</td><td><b>".$teamnamealt."</b></td></tr>\n";
echo "<tr><td>Team neu:</td><td><b>".$teamnameneu."</b></td></tr>\n";
echo "</table>\n";
echo "<br><br><a href='admin.spieler.php?go=�ndern&pass=$pass&vorname=$vorname&nachname=$nachname&team=$team'>ausf&uuml;hren!</a>\n";
echo "<br><br><a href='admin.spieler.php'>zur&uuml;ck zur Eingabemaske</a>\n";

// schlie�ende Klammer f�r FELDER KORREKT AUSGEF�LLT
}

//schlie�ende Klammer f�r PASSNUMMER BEREITS VERGEBEN
}

// PASSNUMMER NEU - SPIELER NEU
else{

// Teamname zu Teamk�rzel feststellen
$befehl="select team_name from teams where team_kurz='$team'";
$antwort=mysql_query($befehl);
$datax=mysql_fetch_array($antwort);

echo "Neuer Spieler soll mit folgenden Angaben eingetragen werden:<br><br>\n";
echo "<table border='0'>\n";
echo "<tr><td>Pa&szlig;:</td><td><b>".$pass."</b></td></tr>\n";
echo "<tr><td>Name:</td><td><b>".$vorname." ".$nachname."</b></td></tr>\n";
echo "<tr><td>Team:</td><td><b>".$datax['team_name']."</b></td></tr>\n";
echo "</table>\n";
echo "<br><br><a href='admin.spieler.php?go=neu&pass=$pass&vorname=$vorname&nachname=$nachname&team=$team'>ausf&uuml;hren!</a>\n";
echo "<br><br><a href='admin.spieler.php'>zur&uuml;ck zur Eingabemaske</a>\n";

//schlie�ende Klammer f�r PASSNUMMER NEU - SPIELER NEU
}

//schlie�ende Klammer f�r SPIELER EINTRAGEN
}
  
// schlie�ende Klammer f�r NEUER SPIELER
}

// SPIELER WECHSELT TEAM
if($spielerum){

// Spielername und altes Teamk�rzel abfragen
$befehl="select * from spieler where sp_pass=$pass";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$name=$data['sp_vor']." ".$data['sp_name'];
$altteam=$data['sp_team'];
$cap=$data['sp_cap'];

// UM-FELDER NICHT KORREKT AUSGEF�LLT
if($cap){
$fehler="Kapit&auml;ne d�rfen nicht umgemeldet werden. Bitte erst einen neuen Kapit&auml;n festlegen.\n";

// schlie�ende Klammer f�r UM-FELDER NICHT KORREKT AUSGEF�LLT
}

// KEINE KAPIT�NE UMMELDEN
if($fehler){
echo "Die Anfrage konnte aus folgenden Gr�nden leider nicht bearbeitet werden:<br><br>";
echo "<b>".$fehler."</b>\n";
echo "<br><br><a href='admin.spieler.php'>zur&uuml;ck zur Eingabemaske</a>\n";

// schlie�ende Klammer f�r KEINE KAPIT�NE UMMELDEN
}else{

// alten Teamnamen feststellen
$befehl="select team_name from teams where team_kurz='$altteam'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$teamalt=$data['team_name'];

// neuen Teamnamen feststellen
$befehl="select team_name from teams where team_kurz='$team'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$teamneu=$data['team_name'];

echo "Aktiver Spieler soll umgemeldet werden:<br><br>\n";
echo "<table border='0'>\n";
echo "<tr><td>Pa&szlig;:</td><td><b>".$pass."</b></td></tr>\n";
echo "<tr><td>Name:</td><td><b>".$name."</b></td></tr>\n";
echo "<tr><td>von Team:</td><td><b>".$teamalt."</b></td></tr>\n";
echo "<tr><td>zu Team:</td><td><b>".$teamneu."</b></td></tr>\n";
echo "</table>\n";
echo "<br><br><a href='admin.spieler.php?go=ummelden&pass=$pass&team=$team'>ausf&uuml;hren!</a>\n";
echo "<br><br><a href='admin.spieler.php'>zur&uuml;ck zur Eingabemaske</a>\n";

// schlie�ende Klammer f�r ELSE: KEINE KAPIT�NE UMMELDEN
}

// schlie�ende Klammer f�r SPIELER WECHSELT TEAM
}

// SPIELER L�SCHEN
if($spielerex){

// Spielername und Teamk�rzel feststellen
$befehl="select * from spieler where sp_pass=$pass";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$name=$data['sp_vor']." ".$data['sp_name'];
$team=$data['sp_team'];
$cap=$data['sp_cap'];

// EX-FELDER NICHT KORREKT AUSGEF�LLT
if($cap){
$fehler="Kapit&auml;ne d�rfen nicht gel&ouml;scht werden. Bitte erst einen neuen Kapit&auml;n festlegen.\n";

// schlie�ende Klammer f�r EX-FELDER NICHT KORREKT AUSGEF�LLT
}

// KEINE KAPIT�NE L�SCHEN
if($fehler){
echo "Die Anfrage konnte aus folgenden Gr�nden leider nicht bearbeitet werden:<br><br>";
echo "<b>".$fehler."</b>\n";
echo "<br><br><a href='admin.spieler.php'>zur&uuml;ck zur Eingabemaske</a>\n";

// schlie�ende Klammer f�r KEINE KAPIT�NE L�SCHEN
}else{

// Teamnamen zu Teamk�rzel feststellen
$befehl="select team_name from teams where team_kurz='$team'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$teamname=$data['team_name'];

echo "Aktiver Spieler soll gel&ouml;scht werden:<br><br>\n";
echo "<table border='0'>\n";
echo "<tr><td>Pa&szlig;:</td><td><b>".$pass."</b></td></tr>\n";
echo "<tr><td>Name:</td><td><b>".$name."</b></td></tr>\n";
echo "<tr><td>Team:</td><td><b>".$teamname."</b></td></tr>\n";
echo "</table>\n";
echo "<br><br><a href='admin.spieler.php?go=l�schen&pass=$pass&team=$team'>ausf&uuml;hren!</a>\n";
echo "<br><br><a href='admin.spieler.php'>zur&uuml;ck zur Eingabemaske</a>\n";

// schlie�ende Klammer f�r ELSE: KEINE KAPIT�NE L�SCHEN
}

// schlie�ende Klammer f�r SPIELER L�SCHEN
}

// schlie�ende Klammer f�r SUBMIT WURDE GEKLICKT
}

// submit wurde nicht geklickt, FORMULAR AUSGEBEN
else{

include("../Bausteine/mysql.php");
include("../Bausteine/spieler.neu.php");
include("../Bausteine/spieler.um.php");
include("../Bausteine/spieler.ex.php");

mysql_close();

// schlie�ende Klammer f�r FORMULAR AUSGEBEN
}

// schlie�ende Klammer f�r SICHERHEITSABFRAGE ODER NICHT
}
?>


            </td>
            <td width="3%" height="374">&nbsp;</td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</div>
</body>
</html>
