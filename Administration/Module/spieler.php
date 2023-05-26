<?php
// Formular wurde ausgeführt und Sicherheitsabfrage bestätigt
// SICHERHEITSABFRAGE ODER NICHT
switch($sgo){

// S.O.N. Sicherheitsabfrage für Neueintrag bejaht
case neu:

// Neuen Datensatz in Datenbank einfügen
$befehl="insert into spieler (sp_pass,sp_vor,sp_name,sp_team) values('$pass','$vorname','$nachname','$team')";
mysql_query($befehl);

// Teamname zu Teamkürzel feststellen
$befehl="select team_name from teams where team_kurz='$team'";
$antwort=mysql_query($befehl);
$datax=mysql_fetch_array($antwort);

echo "Neuer Spieler wurde mit folgenden Angaben eingetragen:<br><br>\n";
echo "<table border='0'>\n";
echo "<tr><td>Pa&szlig;:</td><td><b>".$pass."</b></td></tr>\n";
echo "<tr><td>Name:</td><td><b>".$vorname." ".$nachname."</b></td></tr>\n";
echo "<tr><td>Team:</td><td><b>".$datax['team_name']."</b></td></tr>\n";
echo "</table>\n";
echo "<br><br><a href='index.php'>zur&uuml;ck zur Eingabemaske</a>\n";

break;

// S.O.N. Sicherheitsabfrage für Änderung bejaht
case ändern:

$befehl="select * from spieler where sp_pass=$pass";
$antwort=mysql_query($befehl);

// Spieler und Teamkürzel des vorhandenen Passes feststellen
$data=mysql_fetch_array($antwort);
$teamalt=$data['sp_team'];
$vornamealt=$data['sp_vor'];
$namealt=$data['sp_name'];

// Teamname zu Teamkürzel feststellen
$befehl="select team_name from teams where team_kurz='$teamalt'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$teamnamealt=$data['team_name'];

// neuen Teamnamen feststellen
$befehl="select team_name from teams where team_kurz='$team'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$teamnameneu=$data['team_name'];

// Spielerdaten in Datenbank ändern
$befehl="update spieler set sp_team='$team',sp_vor='$vorname',sp_name='$nachname' where sp_pass='$pass'";
mysql_query($befehl);

echo "Spielerdaten wurden wie folgt ge&auml;ndert:<br><br>\n";
echo "<table border='0'>\n";
echo "<tr><td>Pa&szlig;:</td><td><b>".$pass."</b></td></tr>\n";
echo "<tr><td>Name alt:</td><td><b>".$vornamealt." ".$namealt."</b></td></tr>\n";
echo "<tr><td>Name neu:</td><td><b>".$vorname." ".$nachname."</b></td></tr>\n";
echo "<tr><td>Team alt:</td><td><b>".$teamnamealt."</b></td></tr>\n";
echo "<tr><td>Team neu:</td><td><b>".$teamnameneu."</b></td></tr>\n";
echo "</table>\n";
echo "<br><br><a href='index.php'>zur&uuml;ck zur Eingabemaske</a>\n";

break;

// S.O.N. Sicherheitsabfrage für Ummeldung bejaht
case ummelden:

// Spielername und altes Teamkürzel abfragen
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

// Teamkürzel in Datenbank ändern
$befehl="update spieler set sp_team='$team' where sp_pass='$pass'";
mysql_query($befehl);

echo "Aktiver Spieler wurde umgemeldet:<br><br>\n";
echo "<table border='0'>\n";
echo "<tr><td>Pa&szlig;:</td><td><b>".$pass."</b></td></tr>\n";
echo "<tr><td>Name:</td><td><b>".$name."</b></td></tr>\n";
echo "<tr><td>von Team:</td><td><b>".$teamalt."</b></td></tr>\n";
echo "<tr><td>zu Team:</td><td><b>".$teamneu."</b></td></tr>\n";
echo "</table>\n";
echo "<br><br><a href='index.php'>zur&uuml;ck zur Eingabemaske</a>\n";

break;

// S.O.N. Sicherheitsabfrage für Löschung bejaht
case loeschen:

// Spielername und Teamkürzel feststellen
$befehl="select * from spieler where sp_pass=$pass";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$name=$data['sp_vor']." ".$data['sp_name'];
$team=$data['sp_team'];

// Teamnamen zu Teamkürzel feststellen
$befehl="select team_name from teams where team_kurz='$team'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$teamname=$data['team_name'];

// Spieler aus Datenbank löschen
$befehl="update spieler set sp_team='vac' where sp_pass='$pass'";
mysql_query($befehl);

echo "Aktiver Spieler wurde gel&ouml;scht:<br><br>\n";
echo "<table border='0'>\n";
echo "<tr><td>Pa&szlig;:</td><td><b>".$pass."</b></td></tr>\n";
echo "<tr><td>Name:</td><td><b>".$name."</b></td></tr>\n";
echo "<tr><td>Team:</td><td><b>".$teamname."</b></td></tr>\n";
echo "</table>\n";
echo "<br><br><a href='index.php'>zur&uuml;ck zur Eingabemaske</a>\n";

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

// schließende Klammer für KEINE PASSNUMMER
}

// KEIN VORNAME
if(strlen($vorname)<2){
$fehler.="Bitte gib einen Vornamen ein.<br>";

// schließende Klammer für KEIN VORNAME
}

// KEIN NACHNAME
if(strlen($nachname)<2){
$fehler.="Bitte gib einen Nachnamen ein.<br>";

// schließende Klammer für KEIN NACHNAME
}

// NEU-FELDER NICHT KORREKT AUSGEFÜLLT
if($fehler){
echo "Die Anfrage konnte aus folgenden Gründen leider nicht bearbeitet werden:<br><br>";
echo $fehler;
echo "<br>Bitte klicke auf <a href='index.php'>zur&uuml;ck</a> und fülle alle Felder aus.";

// schließende Klammer für NEU-FELDER NICHT KORREKT AUSGEFÜLLT
}

// SPIELER EINTRAGEN
else{

// Anzahl der Einträge mit angegebener Passnummer zählen
$befehl="select * from spieler where sp_pass=$pass";
$antwort=mysql_query($befehl);
$data=mysql_num_rows($antwort);

// PASSNUMMER BEREITS VERGEBEN
if($data != 0){

// Spieler und Teamkürzel des vorhandenen Passes feststellen
$data=mysql_fetch_array($antwort);
$teamalt=$data['sp_team'];
$vornamealt=$data['sp_vor'];
$namealt=$data['sp_name'];
$cap=$data['sp_cap'];

// Teamname zu Teamkürzel feststellen
$befehl="select team_name from teams where team_kurz='$teamalt'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$teamnamealt=$data['team_name'];

// neuen Teamnamen feststellen
$befehl="select team_name from teams where team_kurz='$team'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$teamnameneu=$data['team_name'];

// NEU-FELDER NICHT KORREKT AUSGEFÜLLT
if($cap and $teamnamealt!=$teamnameneu){
$fehler ="Inhaber der Passnummer ist Teamkapitän!\n";
$fehler.="Kapit&auml;ne dürfen nicht umgemeldet werden. Bitte erst einen neuen Kapit&auml;n festlegen.\n";
$fehlerx="<br>Bisherige Daten des Passinhabers:<br>\n";
$fehlerx.=$pass." ".$vornamealt." ".$namealt." (".$teamnamealt.")\n";

// schließende Klammer für NEU-FELDER NICHT KORREKT AUSGEFÜLLT
}

// KEINE KAPITÄNE UMMELDEN
if($fehler){
echo "Die Anfrage konnte aus folgenden Gründen leider nicht bearbeitet werden:<br>";
echo "<b>".$fehler."</b>\n";
echo $fehlerx."\n";
echo "<br><br><a href='index.php'>zur&uuml;ck zur Eingabemaske</a>\n";

// schließende Klammer für KEINE KAPITÄNE UMMELDEN
}

// FELDER KORREKT AUSGEFÜLLT
else{

echo "Spielerdaten sollen wie folgt ge&auml;ndert werden:<br><br>\n";
echo "<table border='0'>\n";
echo "<tr><td>Pa&szlig;:</td><td><b>".$pass."</b></td></tr>\n";
echo "<tr><td>Name alt:</td><td><b>".$vornamealt." ".$namealt."</b></td></tr>\n";
echo "<tr><td>Name neu:</td><td><b>".$vorname." ".$nachname."</b></td></tr>\n";
echo "<tr><td>Team alt:</td><td><b>".$teamnamealt."</b></td></tr>\n";
echo "<tr><td>Team neu:</td><td><b>".$teamnameneu."</b></td></tr>\n";
echo "</table>\n";
echo "<br><br><a href='index.php?sgo=ändern&pass=$pass&vorname=$vorname&nachname=$nachname&team=$team'>ausf&uuml;hren!</a>\n";
echo "<br><br><a href='index.php'>zur&uuml;ck zur Eingabemaske</a>\n";

// schließende Klammer für FELDER KORREKT AUSGEFÜLLT
}

//schließende Klammer für PASSNUMMER BEREITS VERGEBEN
}

// PASSNUMMER NEU - SPIELER NEU
else{

// Teamname zu Teamkürzel feststellen
$befehl="select team_name from teams where team_kurz='$team'";
$antwort=mysql_query($befehl);
$datax=mysql_fetch_array($antwort);

echo "Neuer Spieler soll mit folgenden Angaben eingetragen werden:<br><br>\n";
echo "<table border='0'>\n";
echo "<tr><td>Pa&szlig;:</td><td><b>".$pass."</b></td></tr>\n";
echo "<tr><td>Name:</td><td><b>".$vorname." ".$nachname."</b></td></tr>\n";
echo "<tr><td>Team:</td><td><b>".$datax['team_name']."</b></td></tr>\n";
echo "</table>\n";
echo "<br><br><a href='index.php?sgo=neu&pass=$pass&vorname=$vorname&nachname=$nachname&team=$team'>ausf&uuml;hren!</a>\n";
echo "<br><br><a href='index.php'>zur&uuml;ck zur Eingabemaske</a>\n";

//schließende Klammer für PASSNUMMER NEU - SPIELER NEU
}

//schließende Klammer für SPIELER EINTRAGEN
}
  
// schließende Klammer für NEUER SPIELER
}

// SPIELER WECHSELT TEAM
if($spielerum){

// Spielername und altes Teamkürzel abfragen
$befehl="select * from spieler where sp_pass=$pass";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$name=$data['sp_vor']." ".$data['sp_name'];
$altteam=$data['sp_team'];
$cap=$data['sp_cap'];

// UM-FELDER NICHT KORREKT AUSGEFÜLLT
if($cap){
$fehler="Kapit&auml;ne dürfen nicht umgemeldet werden. Bitte erst einen neuen Kapit&auml;n festlegen.\n";

// schließende Klammer für UM-FELDER NICHT KORREKT AUSGEFÜLLT
}

// KEINE KAPITÄNE UMMELDEN
if($fehler){
echo "Die Anfrage konnte aus folgenden Gründen leider nicht bearbeitet werden:<br><br>";
echo "<b>".$fehler."</b>\n";
echo "<br><br><a href='index.php'>zur&uuml;ck zur Eingabemaske</a>\n";

// schließende Klammer für KEINE KAPITÄNE UMMELDEN
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
echo "<br><br><a href='index.php?sgo=ummelden&pass=$pass&team=$team'>ausf&uuml;hren!</a>\n";
echo "<br><br><a href='index.php'>zur&uuml;ck zur Eingabemaske</a>\n";

// schließende Klammer für ELSE: KEINE KAPITÄNE UMMELDEN
}

// schließende Klammer für SPIELER WECHSELT TEAM
}

// SPIELER LÖSCHEN
if($spielerex){

// Spielername und Teamkürzel feststellen
$befehl="select * from spieler where sp_pass=$pass";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$name=$data['sp_vor']." ".$data['sp_name'];
$team=$data['sp_team'];
$cap=$data['sp_cap'];

// EX-FELDER NICHT KORREKT AUSGEFÜLLT
if($cap){
$fehler="Kapit&auml;ne d&uuml;rfen nicht gel&ouml;scht werden. Bitte erst einen neuen Kapit&auml;n festlegen.\n";

// schließende Klammer für EX-FELDER NICHT KORREKT AUSGEFÜLLT
}

// KEINE KAPITÄNE LÖSCHEN
if($fehler){
echo "Die Anfrage konnte aus folgenden Gr&uuml;nden leider nicht bearbeitet werden:<br><br>";
echo "<b>".$fehler."</b>\n";
echo "<br><br><a href='index.php'>zur&uuml;ck zur Eingabemaske</a>\n";

// schließende Klammer für KEINE KAPITÄNE LÖSCHEN
}else{

// Teamnamen zu Teamkürzel feststellen
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
echo "<br><br><a href='index.php?sgo=loeschen&pass=$pass&team=$team'>ausf&uuml;hren!</a>\n";
echo "<br><br><a href='index.php'>zur&uuml;ck zur Eingabemaske</a>\n";

// schließende Klammer für ELSE: KEINE KAPITÄNE LÖSCHEN
}

// schließende Klammer für SPIELER LÖSCHEN
}

// schließende Klammer für SUBMIT WURDE GEKLICKT
}

// submit wurde nicht geklickt, FORMULAR AUSGEBEN
else{
?>

<!-- Neuen Spieler eingeben -->
<form method="post" action="index.php">
  <table width="75%" border="0">
    <tr> 
      <th colspan="2"><strong>neuen Spieler eintragen / Spielerdaten &auml;ndern</strong></th>
    </tr>
    <tr> 
      <td width="24%">Pa&szlig;nummer:</td>
      <td width="76%">
        <input type="text" name="pass" maxlength="4" size="4">
      </td>
    </tr>
    <tr> 
      <td width="24%">Vorname:</td>
      <td width="76%">
        <input type="text" name="vorname" size="30" maxlength="30">
      </td>
    </tr>
    <tr> 
      <td width="24%">Nachname:</td>
      <td width="76%">
        <input type="text" name="nachname" size="30" maxlength="30">
      </td>
    </tr>
    <tr> 
      <td width="24%">Team:</td>
      <td width="76%"> 

<?php
$sql_befehl="select team_kurz,team_name from teams where team_aktiv is not null order by team_name";
$antwort=mysql_query($sql_befehl);
echo "<select name='team'>\n";
while($data=mysql_fetch_array($antwort)){
$teamname=$data['team_name'];
$teamkurz=$data['team_kurz'];
echo "<option value='".$teamkurz."'>".$teamname."</option>\n";
}
echo "</select>\n";
?>

      </td>
    </tr>
    <tr> 
      <td colspan="2" height="20"> 
        <div>
          <input type="submit" name="spielerneu" value="eintragen">
        </div>
      </td>
    </tr>
  </table>
</form>


<!-- Spieler ummelden -->
<form method="post" action="index.php">
  <table width="75%" border="0">
    <tr> 
      <th colspan="2"><strong>aktiven Spieler ummelden / vakanten Spieler anmelden</strong></th>
    </tr>
    <tr> 
      <td width="24%">Pa&szlig;nummer:</td>
      <td width="76%">

<?php
$sql_befehl="select * from spieler order by sp_pass";
$antwort=mysql_query($sql_befehl);
echo "<select name='pass'>\n";
while($data=mysql_fetch_array($antwort)){
$passnr=$data['sp_pass'];
$spielername=$data['sp_vor']."&nbsp;".$data['sp_name'];
echo "<option value='".$passnr."'>".$passnr."&nbsp;".$spielername."</option>\n";
}
echo "</select>\n";
?>

      </td>
    </tr>
    <tr> 
      <td width="24%">Team:</td>
      <td width="76%"> 

<?php
$sql_befehl="select team_kurz,team_name from teams where team_kurz<>'vac' and team_aktiv is not null order by team_name";
$antwort=mysql_query($sql_befehl);
echo "<select name='team'>\n";
while($data=mysql_fetch_array($antwort)){
$teamname=$data['team_name'];
$teamkurz=$data['team_kurz'];
echo "<option value='".$teamkurz."'>".$teamname."</option>\n";
}
echo "</select>\n";
?>

      </td>
    </tr>
    <tr> 
      <td colspan="2" height="20"> 
        <div>
          <input type="submit" name="spielerum" value="ummelden">
        </div>
      </td>
    </tr>
  </table>
</form>

<!-- Spieler löschen -->
<form method="post" action="index.php">
  <table width="75%" border="0">
    <tr> 
      <th colspan="2"><strong>aktiven Spieler l&ouml;schen</strong></th>
    </tr>
    <tr> 
      <td width="24%">Pa&szlig;nummer:</td>
      <td width="76%">

<?php
$sql_befehl="select * from spieler where sp_team<>'vac' order by sp_pass";
$antwort=mysql_query($sql_befehl);
echo "<select name='pass'>\n";
while($data=mysql_fetch_array($antwort)){
$passnr=$data['sp_pass'];
$spielername=$data['sp_vor']."&nbsp;".$data['sp_name'];
echo "<option value='".$passnr."'>".$passnr."&nbsp;".$spielername."</option>\n";

}
echo "</select>\n";
?>

      </td>
    </tr>
    <tr> 
      <td colspan="2" height="20"> 
        <div>
          <input type="submit" name="spielerex" value="l&ouml;schen">
        </div>
      </td>
    </tr>
  </table>
</form>

<?php
// schließende Klammer für FORMULAR AUSGEBEN
}

// schließende Klammer für SICHERHEITSABFRAGE ODER NICHT
}
?>