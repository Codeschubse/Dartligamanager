<?php

include ("components/mysql.php");

// Funktion zum formatieren des Datums definieren
function datum($datum)
{
 $tag=substr($datum,8,2);
 $monat=substr($datum,5,2);
 $jahr=substr($datum,0,4);
 $datum=$tag.".".$monat.".".$jahr;

 return $datum;
}

// Funktion zum Feststellen des Teamnamens anhand des K�rzels definieren
function teamname($name)
{
 $befehl="select team_name from teams where team_kurz='$name'";
 $antwort=mysql_query($befehl);
 $datatn=mysql_fetch_array($antwort);
 $name=$datatn['team_name'];

 return $name;
}

// Funktion zum Feststellen der Spielerdaten definieren
function spielerdaten($pass)
{
 $befehl="select sp_vor,sp_name,sp_team from spieler where sp_pass='$pass'";
 $antwort=mysql_query($befehl);
 $data=mysql_fetch_array($antwort);
 $spielerdaten["name"]=$data['sp_vor']." ".$data['sp_name'];
 $spielerdaten["team"]=$data['sp_team'];

 return $spielerdaten;
}

// Aktuelles Datum ausw�hlen
$auswahl=date("Y-m-d");

// Auslesen des vorangegangenen und folgenden Spieltages
$befehl="select max(tag_datum) from spieltag where tag_datum<'$auswahl'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$letzter=$data['max(tag_datum)'];

$befehl="select min(tag_datum) from spieltag where tag_datum>'$auswahl'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$erster=$data['min(tag_datum)'];

// Feststellen, ob Spieltag vor oder nach Saisonende liegt
$befehl="select distinct tag_saison from spieltag where tag_datum='$letzter'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$saisonletzter=$data['tag_saison'];

$befehl="select distinct tag_saison from spieltag where tag_datum='$erster'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$saisonerster=$data['tag_saison'];

// feststellen, der wievielte Spieltag der letzte war
$befehl="select distinct tag_index from spieltag where tag_datum='$letzter'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$spieltag=$data['tag_index'];

// ==============================================================================================
// RANGLISTEN AB HIER
// ==============================================================================================

echo "<p align ='center'>\n";
echo "<b>Ranglisten der High Finishs und Maximums<br>aus allen Begegnungen der laufenden Saison,<br>Stand ".$spieltag.". Spieltag, ".datum($letzter)."</b>\n";
echo "</p>\n";

echo "<table border='0' cellspacing='3' cellpadding='3' align='center'>\n";
echo "<tr>\n";
echo "<td valign='top'>\n";

// ==============================================================================================
// HIGH FINISHS AB HIER
// ==============================================================================================

echo "<table border='1' cellspacing='1' cellpadding='1' align='center'>\n";
echo "<tr>\n";
echo "<th>HiFi</th>\n";
echo "<th>Spieler (Pa�nummer, Team)</th>\n";
echo "</tr>\n";

// SPIELER UND HIFI AUSLESEN UND DARSTELLEN
$befehl="select max_pass, max_hifi, max_tag from max where max_hifi is not null and max_saison='$saisonletzter' order by max_hifi desc, max_tag asc, max_pass asc";
$antwort=mysql_query($befehl);
while($data=mysql_fetch_array($antwort))
{
 $pass=$data['max_pass'];
 $hifi=$data['max_hifi'];
 $spielerdaten=spielerdaten($pass);
 $spielername=$spielerdaten["name"];
 $spielerteam=$spielerdaten["team"];
 $komplett=$spielername." (".$pass.", ".teamname($spielerteam).")";

 $table ="<tr>\n";
 $table.="<td align='center'>".$hifi."</td>\n";
 $table.="<td>".$komplett."</td>\n";
 $table.="</tr>\n";
 echo $table;

// Schlie�ende Klammer f�r SPIELER UND HIFI AUSLESEN UND DARSTELLEN
}

echo "</table>\n";

echo "</td>\n";

// ==============================================================================================
// MAXIMUMS AB HIER
// ==============================================================================================

echo "<td valign='top'>\n";

mysql_query("truncate table charts");

echo "<table border='1' cellspacing='1' cellpadding='1' align='center'>\n";
echo "<tr>\n";
echo "<th>Max's</th>\n";
echo "<th>Spieler (Pa�nummer, Team)</th>\n";
echo "</tr>\n";

// Spieler und Max's in der Datenbank auslesen und weiterverarbeiten
$befehl="select max_pass, sum(max_max) from max where max_max is not null and max_saison='$saisonletzter' group by max_pass";
$antwort=mysql_query($befehl);

// SPIELER AUSLESEN UND IN CHARTS ZWISCHENSPEICHERN
while($data=mysql_fetch_array($antwort))
{
 $pass=$data['max_pass'];
 $max=$data['sum(max_max)'];

 $save_befehl ="insert into charts (pass, max) values ('$pass', '$max')";
 mysql_query($save_befehl);

// schlie�ende Klammer f�r SPIELER AUSLESEN UND IN CHARTS ZWISCHENSPEICHERN
}

// ZWISCHENSPEICHER AUSLESEN UND DARSTELLEN
$befehl="select pass, max from charts order by max desc, pass asc";
$antwort=mysql_query($befehl);
while($data=mysql_fetch_array($antwort))
{
 $pass=$data['pass'];
 $max=$data['max'];
 $spielerdaten=spielerdaten($pass);
 $spielername=$spielerdaten["name"];
 $spielerteam=$spielerdaten["team"];
 $komplett=$spielername." (".$pass.", ".teamname($spielerteam).")";

 $table ="<tr>\n";
 $table.="<td align='center'>".$max."</td>\n";
 $table.="<td>".$komplett."</td>\n";
 $table.="</tr>\n";
 echo $table;

// Schlie�ende Klammer f�r ZWISCHENSPEICHER AUSLESEN UND DARSTELLEN
}

echo "</table>\n";

echo "</td>\n";
echo "</tr>\n";
echo "</table>\n";

mysql_close();

?> 