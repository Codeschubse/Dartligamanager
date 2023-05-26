<?php

include ("../Bausteine/mysql.php");

// Funktion zum formatieren des Datums definieren
function datum($datum)
{
 $tag=substr($datum,8,2);
 $monat=substr($datum,5,2);
 $jahr=substr($datum,0,4);
 $datum=$tag.".".$monat.".".$jahr;

 return $datum;
}

// Funktion zum Feststellen des Teamnamens anhand des Kürzels definieren
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

// Funktion zum Formatieren der Ergebnisanzeige definieren
function result($erg)
{
 switch($erg)
 {
  case 1:
   $result="verlegt";
  break;

  case -1:
   $result="ohne Wertung";
  break;

  case 10:
   $result="10:0";
  break;

  case 8:
   $result="9:1";
  break;

  case 6:
   $result="8:2";
  break;

  case 4:
   $result="7:3";
  break;

  case 2:
   $result="6:4";
  break;

  case 0:
   $result="5:5";
  break;

  case -2:
   $result="4:6";
  break;

  case -4:
   $result="3:7";
  break;

  case -6:
   $result="2:8";
  break;

  case -8:
   $result="1:9";
  break;

  case -9:
   $result="0:10*";
  break;

  case -10:
   $result="0:10";
  break;

  default:
   $result="-";
 }
 
 return $result;
}

// Aktuelles Datum auswählen
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
// ERGEBNISSE AB HIER
// ==============================================================================================

echo "<p align ='center'>\n";
echo "<b>Ergebnisse und Tabelle der Begegnungen vom ".$spieltag.". Spieltag, ".datum($letzter)."</b>\n";
echo "</p>\n";

echo "<table border='1' bordercolor='#fff' cellspacing='1' cellpadding='1' align='center'>\n";
echo "<tr>\n";
echo "<th><font size='-1'>Heimmannschaft</font></th>\n";
echo "<th><font size='-1'>Gastmannschaft</font></th>\n";
echo "<th><font size='-1'>Ergebnis</font></th>\n";
echo "</tr>\n";

// MANNSCHAFTEN UND ERGEBNISSE AUSLESEN UND DARSTELLEN
$befehl="select tag_heim from spieltag where tag_saison='$saisonletzter' and tag_datum='$letzter'";
$antwort=mysql_query($befehl);
while($data=mysql_fetch_array($antwort))
{
 $heim=$data['tag_heim'];
 $unterbefehl ="select tag_gast, tag_erg from spieltag where tag_saison='$saisonletzter'";
 $unterbefehl.=" and tag_datum='$letzter' and tag_heim='$heim'";
 $unterantwort=mysql_query($unterbefehl);
 $unterdata=mysql_fetch_array($unterantwort);
 $gast=$unterdata['tag_gast'];
 $erg=$unterdata['tag_erg'];

 $table ="<tr>\n";
 $table.="<td><font size='-1'>".teamname($heim)."</font></td>\n";
 $table.="<td><font size='-1'>".teamname($gast)."</font></td>\n";
 $table.="<td align='center'><font size='-1'>".result($erg)."</font></td>\n";
 $table.="</tr>\n";
 echo $table;

// schließende Klammer für MANNSCHAFTEN UND ERGEBNISSE AUSLESEN UND DARSTELLEN
}

echo "</table>\n";

// ==============================================================================================
// TABELLE AB HIER
// ==============================================================================================

echo "<hr width=35%>\n";

mysql_query("truncate table tabelle");

// MySql-TABELLE MIT ALLEN TABELLENEINTRÄGEN ALLER TEAMS ERZEUGEN
$teambefehl ="select distinct tag_heim from spieltag where tag_heim<>'x'";
$teambefehl.=" and tag_saison=$saisonletzter";
$teamantwort=mysql_query($teambefehl);
while($teamdaten=mysql_fetch_array($teamantwort))
{

$team=$teamdaten['tag_heim'];
$pluspunkte=0;
$minuspunkte=0;
$plusspiele=0;
$minusspiele=0;
$spiele=0;
$siege=0;
$nieder=0;
$deuce=0;

// SPIELTAGE EINZELN AUSLESEN
$befehl ="select distinct tag_datum, tag_index from spieltag where tag_saison=$saisonletzter";
$befehl.=" and tag_datum<='$letzter' order by tag_datum";
$antwort=mysql_query($befehl);
while($data=mysql_fetch_array($antwort))
{
 $datum=$data['tag_datum'];
 $index=$data['tag_index'];

 // von momentan gewähltem Datum Gegner und Ergebnis auslesen und darstellen
 $unterbefehl ="select tag_heim, tag_gast, tag_erg from spieltag where tag_datum='$datum'";
 $unterantwort=mysql_query($unterbefehl);

 // HEIM UND GAST ERFAHREN
 while($unterdata=mysql_fetch_array($unterantwort))
 {
  $heim=$unterdata['tag_heim'];
  $gast=$unterdata['tag_gast'];
  $ergebnis=$unterdata['tag_erg'];

// NICHT GESPIELTE NICHT ZÄHLEN
if($ergebnis<>9 and $ergebnis<>1)
{

  // HEIMSPIEL
  if($heim==$team)
  {

   // SPIELFREIE AUSLASSEN
   if($gast!='x')
   {
    $spiele++;
    if($ergebnis<0)
    {
     if($ergebnis==-9)
     {
      $nieder++;
      $ergebnis=-10;
      $pluspunkte=$pluspunkte-2;
      $minuspunkte=$minuspunkte+2;
      $plusspiele=$plusspiele+(5+$ergebnis/2);
      $minusspiele=$minusspiele+(5-$ergebnis/2);
     }
     else
     {
      $nieder++;
      $minuspunkte=$minuspunkte+2;
      $plusspiele=$plusspiele+(5+$ergebnis/2);
      $minusspiele=$minusspiele+(5-$ergebnis/2);
     }
    }
    if($ergebnis==0)
    {
     $deuce++;
     $pluspunkte++;
     $minuspunkte++;
     $plusspiele=$plusspiele+5;
     $minusspiele=$minusspiele+5;
    }
    if($ergebnis>0)
    {
     $siege++;
     $pluspunkte=$pluspunkte+2;
     $plusspiele=$plusspiele+(5+$ergebnis/2);
     $minusspiele=$minusspiele+(5-$ergebnis/2);
    }

    $spieldiff=$plusspiele-$minusspiele;
    $punktdiff=$pluspunkte-$minuspunkte;

   // schließende Klammer für SPIELFREIE AUSLASSEN
   }

  // schließende Klammer für HEIMSPIEL
  }

  // AUSWÄRTSSPIEL
  if($gast==$team)
  {

   // SPIELFREIE AUSLASSEN
   if($heim!='x')
   {
    $spiele++;
    if($ergebnis>0)
    {
     $nieder++;
     $minuspunkte=$minuspunkte+2;
     $plusspiele=$plusspiele+(5-$ergebnis/2);
     $minusspiele=$minusspiele+(5+$ergebnis/2);
    }
    if($ergebnis==0)
    {
     $deuce++;
     $pluspunkte++;
     $minuspunkte++;
     $plusspiele=$plusspiele+5;
     $minusspiele=$minusspiele+5;
    }
    if($ergebnis<0)
    {
     if($ergebnis==-9)
     {
      $ergebnis=-10;
      $siege++;
      $pluspunkte=$pluspunkte+2;
      $plusspiele=$plusspiele+(5-$ergebnis/2);
      $minusspiele=$minusspiele+(5+$ergebnis/2);
     }
     else
     {
      $siege++;
      $pluspunkte=$pluspunkte+2;
      $plusspiele=$plusspiele+(5-$ergebnis/2);
      $minusspiele=$minusspiele+(5+$ergebnis/2);
     }
    }

    $spieldiff=$plusspiele-$minusspiele;
    $punktdiff=$pluspunkte-$minuspunkte;

   // schließende Klammer für SPIELFREIE AUSLASSEN
   }

  // schließende Klammer für AUSWÄRTSSPIEL
  }

// schließende Klammer zu NICHT GESPIELTE NICHT ZÄHLEN
}

 // schließende Klammer für HEIM UND GAST ERFAHREN
 }

// schließende Klammer für SPIELTAGE EINZELN AUSLESEN
}

// Teamname herausfinden
$befehl ="select team_name from teams where team_kurz='$team'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$teamname=$data['team_name'];

// Tabelleneinträge in Tabelle zwischenspeichern
$save_befehl ="insert into tabelle (team, anz, plus, minus, diff, p, m, d, s, u, n)";
$save_befehl.=" values ('$teamname', '$spiele', '$pluspunkte', '$minuspunkte', '$punktdiff',";
$save_befehl.=" '$plusspiele', '$minusspiele', '$spieldiff', '$siege', '$deuce', '$nieder')";
mysql_query($save_befehl);

// schließende Klammer für MySql-TABELLE MIT ALLEN TABELLENEINTRÄGEN ALLER TEAMS ERZEUGEN
}

// TABELLE AUSGEBEN
echo "<table border='1' bordercolor='#fff' cellspacing='1' cellpadding='1' align='center'>\n";
echo "<tr>\n";
echo "<th><font size='-2'>Platz</font></th>\n";
echo "<th><font size='-1'>Team</font></th>\n";
echo "<th><font size='-2'>Anz.</font></th>\n";
echo "<th colspan='3'><font size='-1'>Punkte</font></th>\n";
echo "<th><font size='-2'>Diff.</font></th>\n";
echo "<th colspan='3'><font size='-1'>Spiele</font></th>\n";
echo "<th><font size='-2'>Diff.</font></th>\n";
echo "<th><font size='-2'>S</font></th>\n";
echo "<th><font size='-2'>U</font></th>\n";
echo "<th><font size='-2'>N</font></th>\n";
echo "</tr>\n";

$platz=0;
$tabbefehl ="select * from tabelle order by plus desc, minus asc, p desc, m asc";
$tabantwort=mysql_query($tabbefehl);
while($tabdata=mysql_fetch_array($tabantwort))
{
 $platz++;

 $tab ="<tr>\n";
 $tab.="<td align='right'><font size='-1'>".$platz."</font></td>\n";
 $tab.="<td><b><font size='-1'>".$tabdata['team']."</font></b></td>\n";
 $tab.="<td align='center'><font size='-1'>".$tabdata['anz']."</font></td>\n";
 $tab.="<td align='center'><b><font size='-1'>".$tabdata['plus']."</font></b></td>\n";
 $tab.="<td align='center'><b><font size='-1'> : </font></b></td>\n";
 $tab.="<td align='center'><b><font size='-1'>".$tabdata['minus']."</font></b></td>\n";
 $tab.="<td align='center'><font size='-1'>".$tabdata['diff']."</font></td>\n";
 $tab.="<td align='center'><font size='-1'>".$tabdata['p']."</font></td>\n";
 $tab.="<td align='center'><font size='-1'> : </font></td>\n";
 $tab.="<td align='center'><font size='-1'>".$tabdata['m']."</font></td>\n";
 $tab.="<td align='center'><font size='-1'>".$tabdata['d']."</font></td>\n";
 $tab.="<td align='center'><font size='-1'>".$tabdata['s']."</font></td>\n";
 $tab.="<td align='center'><font size='-1'>".$tabdata['u']."</font></td>\n";
 $tab.="<td align='center'><font size='-1'>".$tabdata['n']."</font></td>\n";
 $tab.="</tr>\n";
 echo $tab;

// schließende Klammer zu TABELLE AUSGEBEN (while($tabdata=mysql_fetch_array($tabantwort)))
}

echo "</table>\n";

// =============================================================================================
// MAXIMUMS UND HIGH FINISHS AB HIER
// =============================================================================================

echo "<hr width=35%>\n";

echo "<table border='1' bordercolor='#fff' cellspacing='1' cellpadding='1' align='center'>\n";
echo "<tr><th><font size='-1'>Max's</font></th><th><font size='-1'>HiFi's</font></th></tr>\n";
echo "<tr>\n";

// erschdemol die hunnadachdsischa
$zelle ="<td valign='top'><font size='-1'>\n";
$befehl ="select max_pass,max_max from max where max_saison='$saisonletzter' and max_tag='$spieltag'";
$befehl.=" and max_max is not null order by max_max desc";
$antwort=mysql_query($befehl);
$anzahl=mysql_num_rows($antwort);

// KEINE MAX - EINTRAG "KEINE"
if($anzahl==0)
{
$zelle.="keine\n";
}

while($data=mysql_fetch_array($antwort))
{
 $spielerdaten=spielerdaten($data['max_pass']);
 $spielername=$spielerdaten["name"];
 $spielerteam=$spielerdaten["team"];
 $zelle.=$data['max_max']." x ".$spielername." (".$data['max_pass'].", ".teamname($spielerteam).")<br>\n";
}

$zelle.="</font></td>\n";
echo $zelle;

// dann die haifinnischs
$zelle ="<td valign='top'><font size='-1'>\n";
$befehl ="select max_pass,max_hifi from max where max_saison='$saisonletzter' and max_tag='$spieltag'";
$befehl.=" and max_hifi is not null order by max_hifi desc";
$antwort=mysql_query($befehl);
$anzahl=mysql_num_rows($antwort);

// KEINE MAX - EINTRAG "KEINE"
if($anzahl==0)
{
$zelle.="keine\n";
}

while($data=mysql_fetch_array($antwort))
{
 $spielerdaten=spielerdaten($data['max_pass']);
 $spielername=$spielerdaten["name"];
 $spielerteam=$spielerdaten["team"];
 $zelle.=$data['max_hifi']." - ".$spielername." (".$data['max_pass'].", ".teamname($spielerteam).")<br>\n";
}
$zelle.="</font></td>\n";
echo $zelle;
echo "</table>\n";

// ================================================================================================
// BEMERKUNGEN AB HIER
// ================================================================================================

$befehl="select bem_text from bemerkungen where bem_saison='$saisonletzter' and bem_tag='$spieltag'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);

// KEINE BEMERKUNGEN - KEINE ANZEIGE
if($data['bem_text'])
{
echo "<hr width=35%>\n";

echo "<table border='1' bordercolor='#fff' cellspacing='1' cellpadding='1' align='center'>\n";
echo "<tr><th><font size='-1'>Bemerkungen</font></th></tr>\n";
echo "<tr><td><font size='-1'>".$data['bem_text']."</font></td></tr>\n";
echo "</table>\n";

// schließende Klammer zu KEINE BEMERKUNGEN - KEINE ANZEIGE
}

mysql_close();

?> 
