<?php

include ("../Components/mysql.php");

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

// ======================================================================================
// Ab hier versuchsweise die Auswahl des Spieltages
// ======================================================================================

// ANDERER TAG GEWÜNSCHT
if($other){

  // TAG GEWÄHLT
  if($Tag){

// ==============================================================================================
// ERGEBNISSE AB HIER
// ==============================================================================================

// vorher noch feststellen, wieviele Divisionen an diesem Spieltag spielen
$befehl="SELECT count(DISTINCT tag_liga) FROM spieltag WHERE tag_saison = $saison";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$divanzahl=$data['count(DISTINCT tag_liga)'];

$befehl ="select distinct tag_datum from spieltag where tag_saison=$saison";
$befehl.=" and tag_index='$tag'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$datum=$data['tag_datum'];

echo "<div class='auswahl' align='center'><a href='index.php?content=liga&amp;other=1'>anderen Spieltag w&auml;hlen...</a></div><br>\n";

// bei mehreren Divisionen Ergebnisse & Tabelle mehrmals anzeigen (1x für jede Div)
$div=0;

// WIEDERHOLUNG FÜR JEDE DIVISION
do
{
$div++;

if($divanzahl > 1)
{
  $divnennung = " in der ".$div.". Division";
}

echo "<p align ='center'>\n";
echo "<b>Ergebnisse und Tabelle der Begegnungen";
echo $divnennung;
echo " vom ".$tag.". Spieltag der Saison ".$saison.", ".datum($datum)."</b>\n";
echo "</p>\n";

echo "<table border='0' cellspacing='1' cellpadding='1' align='center'>\n";
echo "<tr>\n";
echo "<th>Heimmannschaft</th>\n";
echo "<th>Gastmannschaft</th>\n";
echo "<th>Ergebnis</th>\n";
echo "</tr>\n";

// MANNSCHAFTEN UND ERGEBNISSE AUSLESEN UND DARSTELLEN
$befehl="select tag_heim from spieltag where tag_saison='$saison' and tag_index='$tag' and tag_liga='$div'";
$antwort=mysql_query($befehl);
while($data=mysql_fetch_array($antwort))
{
 $heim=$data['tag_heim'];
 $unterbefehl ="select tag_gast, tag_erg from spieltag where tag_saison='$saison' and tag_liga='$div'";
 $unterbefehl.=" and tag_index='$tag' and tag_heim='$heim'";
 $unterantwort=mysql_query($unterbefehl);
 $unterdata=mysql_fetch_array($unterantwort);
 $gast=$unterdata['tag_gast'];
 $erg=$unterdata['tag_erg'];

 $table ="<tr>\n";
 $table.="<td>".teamname($heim)."</td>\n";
 $table.="<td>".teamname($gast)."</td>\n";
 $table.="<td align='center'>".result($erg)."</td>\n";
 $table.="</tr>\n";
 echo $table;

// schließende Klammer für MANNSCHAFTEN UND ERGEBNISSE AUSLESEN UND DARSTELLEN
}

echo "</table>\n";

// ==============================================================================================
// TABELLE AB HIER
// ==============================================================================================

mysql_query("truncate table tabelle");

// MySql-TABELLE MIT ALLEN TABELLENEINTRÄGEN ALLER TEAMS ERZEUGEN
$teambefehl ="select distinct tag_heim from spieltag where tag_heim<>'x'";
$teambefehl.=" and tag_saison=$saison and tag_liga='$div'";
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
$befehl ="select distinct tag_datum, tag_index from spieltag where tag_saison=$saison";
$befehl.=" and tag_liga='$div' and tag_index<='$tag' order by tag_index";
$antwort=mysql_query($befehl);
while($data=mysql_fetch_array($antwort))
{
 $datum=$data['tag_datum'];
 $index=$data['tag_index'];

 // von momentan gewähltem Datum Gegner und Ergebnis auslesen und darstellen
 $unterbefehl ="select tag_heim, tag_gast, tag_erg from spieltag where tag_datum='$datum' and tag_liga='$div'";
 $unterantwort=mysql_query($unterbefehl);

 // HEIM UND GAST ERFAHREN
 while($unterdata=mysql_fetch_array($unterantwort))
 {
  $heim=$unterdata['tag_heim'];
  $gast=$unterdata['tag_gast'];
  $ergebnis=$unterdata['tag_erg'];

// NICHT GESPIELTE NICHT ZÃHLEN
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

   // schließende Klammer für SPIELFREIE AUSLASSEN
   }

  // schließende Klammer für HEIMSPIEL
  }

  // AUSWÃRTSSPIEL
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

   // schließende Klammer für SPIELFREIE AUSLASSEN
   }

  // schließende Klammer für AUSWÃRTSSPIEL
  }

// schließende Klammer zu NICHT GESPIELTE NICHT ZÃHLEN
}

 // schließende Klammer für HEIM UND GAST ERFAHREN
 }

// schließende Klammer für SPIELTAGE EINZELN AUSLESEN
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

// schließende Klammer für MySql-TABELLE MIT ALLEN TABELLENEINTRÃGEN ALLER TEAMS ERZEUGEN
}

// TABELLE AUSGEBEN
echo "<table border='0' cellspacing='1' cellpadding='1' align='center'>\n";
echo "<tr>\n";
echo "<th>Platz</th>\n";
echo "<th>Team</th>\n";
echo "<th>Anz.</th>\n";
echo "<th colspan='3'>Punkte</th>\n";
echo "<th>Diff.</th>\n";
echo "<th colspan='3'>Spiele</th>\n";
echo "<th>Diff.</th>\n";
echo "<th>S</th>\n";
echo "<th>U</th>\n";
echo "<th>N</th>\n";
echo "</tr>\n";

$platz=0;
$tabbefehl ="select * from tabelle order by plus desc, minus asc, p desc, m asc";
$tabantwort=mysql_query($tabbefehl);
while($tabdata=mysql_fetch_array($tabantwort))
{
 $platz++;

 $tab ="<tr>\n";
 $tab.="<td align='right'>".$platz."</td>\n";
 $tab.="<td><b>".$tabdata['team']."</b></td>\n";
 $tab.="<td align='center'>".$tabdata['anz']."</td>\n";
 $tab.="<td align='center'><b>".$tabdata['plus']."</b></td>\n";
 $tab.="<td align='center'><b> : </b></td>\n";
 $tab.="<td align='center'><b>".$tabdata['minus']."</b></td>\n";
 $tab.="<td align='center'>".$tabdata['diff']."</td>\n";
 $tab.="<td align='center'>".$tabdata['p']."</td>\n";
 $tab.="<td align='center'> : </td>\n";
 $tab.="<td align='center'>".$tabdata['m']."</td>\n";
 $tab.="<td align='center'>".$tabdata['d']."</td>\n";
 $tab.="<td align='center'>".$tabdata['s']."</td>\n";
 $tab.="<td align='center'>".$tabdata['u']."</td>\n";
 $tab.="<td align='center'>".$tabdata['n']."</td>\n";
 $tab.="</tr>\n";
 echo $tab;

// schließende Klammer zu TABELLE AUSGEBEN (while($tabdata=mysql_fetch_array($tabantwort)))
}

echo "</table>\n";

// schließende Klammer zu WIEDERHOLUNG FÜR JEDE DIVISION
} while ($div < $divanzahl);

// =============================================================================================
// MAXIMUMS UND HIGH FINISHS AB HIER
// =============================================================================================

echo "<table border='0' cellspacing='1' cellpadding='1' align='center'>\n";
echo "<tr><th>Max's</th><th>HiFi's</th></tr>\n";
echo "<tr>\n";

// erschdemol die hunnadachdsischa
$zelle ="<td valign='top'>\n";

$befehl ="SELECT max_pass, sum( max_max )  AS  'max' FROM max where max_saison='$saison' and max_tag='$tag'";
$befehl.="and max_max is not null GROUP  BY max_pass ORDER  BY max DESC ";
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
 $zelle.=$data['max']." x ".$spielername." (".$data['max_pass'].", ".teamname($spielerteam).")<br>\n";
}

$zelle.="</td>\n";
echo $zelle;

// dann die haifinnischs
$zelle ="<td valign='top'>\n";
$befehl ="select max_pass,max_hifi from max where max_saison='$saison' and max_tag='$tag'";
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
$zelle.="</td>\n";
echo $zelle;
echo "</table>\n";

// ================================================================================================
// BEMERKUNGEN AB HIER
// ================================================================================================

$befehl="select bem_text from bemerkungen where bem_saison='$saison' and bem_tag='$tag'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);

// KEINE BEMERKUNGEN - KEINE ANZEIGE
if($data['bem_text'])
{

echo "<table border='0' cellspacing='1' cellpadding='1' align='center'>\n";
echo "<tr><th>Bemerkungen</th></tr>\n";
echo "<tr><td>".$data['bem_text']."</td></tr>\n";
echo "</table>\n";

// schließende Klammer zu KEINE BEMERKUNGEN - KEINE ANZEIGE
}


  // schließende Klammer für TAG GEWÄHLT
  }

  // TAG NICHT GEWÄHLT
  else{

    // SAISON GEWÄHLT
    if($Saison){

      // mögliche Tage herausfinden
      $antwort=mysql_query("select distinct tag_index from spieltag where tag_saison=$saison");
      ?>

<form action="index.php?content=liga&amp;other=1" method="post" name="Tag">
                <table align="center" cellspacing="3">
                  <tr><th colspan="2">Ergebnisse und Tabelle eines anderen Spieltages anzeigen</th></tr>
<tr><td colspan="2" class="noborder">Saison <b><?php echo $saison ?></b> wurde ausgew&auml;hlt.</td></tr>
<tr><td colspan="2" class="noborder">Jetzt bitte Spieltag w&auml;hlen:</td></tr>
<tr>
                    <td align="center" class="noborder">
                      <select name="tag">

      <?php
      // Tage als Listenpunkte/Listenwerte ausgeben
      while($data=mysql_fetch_array($antwort))
      {
       $wert=$data['tag_index'];
      echo "<option value='".$wert."'>".$wert."</option>\n";
      }
      ?>

  </select>
                    </td>
                    <td align="center" class="noborder">
                      <input type="hidden" name="saison" value="<?php echo $saison ?>">
  <input type="submit" name="Tag" value="w&auml;hlen">
                    </td>
                  </tr>
</table>
</form>

    <?php
    // schließende Klammer für SAISON GEWÄHLT
    }

    // SAISON NICHT GEWÄHLT
    else{

      // mögliche Saisons herausfinden
      $antwort=mysql_query("select distinct tag_saison from spieltag order by tag_saison desc");
      ?>
<form action="index.php?content=liga&amp;other=1" method="post" name="Saison">
                <table cellspacing="3" align="center">
                  <tr><th colspan="2">Ergebnisse und Tabelle eines anderen Spieltages anzeigen</th><tr>
<tr><td colspan="2" class="noborder">Bitte&nbsp;zuerst&nbsp;Saison&nbsp;w&auml;hlen:</td><tr>
<tr>
                    <td align="center" class="noborder">
                      <select name="saison">
      <?php
      // Saisons als Listenpunkte/Listenwerte ausgeben
      while($data=mysql_fetch_array($antwort))
      {
       $wert=$data['tag_saison'];
       echo "<option value='".$wert."'>".$wert."</option>\n";
      }
      ?>
                      </select>
                    </td>
                    <td align="center" class="noborder">
                      <input type="submit" name="Saison" value="w&auml;hlen">
                    </td>
                  </tr>
</table>
</form>

    <?php
    // schließende Klammer für SAISON NICHT GEWÄHLT
    }

  // schließende Klammer für TAG NICHT GEWÄHLT
  }

// schließende Klammer für ANDERER TAG GEWÜNSCHT
}

// =======================================================================================================
// ENDE
// =======================================================================================================

// AKTUELLEN TAG ANZEIGEN (KEIN ANDERER TAG GEWÜNSCHT)
else
{


// Aktuelles Datum auswÃ¤hlen
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

// feststellen, wieviele Divisionen spielen
$befehl="SELECT count(DISTINCT tag_liga) FROM spieltag WHERE tag_saison = $saisonletzter";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$divanzahl=$data['count(DISTINCT tag_liga)'];

echo "<div class='auswahl' align='center'><a href='index.php?content=liga&amp;other=1'>anderen Spieltag w&auml;hlen...</a></div><br>\n";

// bei mehreren Divisionen Ergebnisse & Tabelle mehrmals anzeigen (1x für jede Div)
$div=0;

// WIEDERHOLUNG FÜR JEDE DIVISION
do {
$div++;

if($divanzahl>1){
  $divnennung = " in der ".$div.". Division";
}

// ==============================================================================================
// ERGEBNISSE AB HIER
// ==============================================================================================

echo "<p align ='center'>\n";
echo "<b>Ergebnisse und Tabelle der Begegnungen";
echo $divnennung;
echo " vom ".$spieltag.". Spieltag, ".datum($letzter)."</b>\n";
echo "</p>\n";

echo "<table border='0' cellspacing='1' cellpadding='1' align='center'>\n";
echo "<tr>\n";
echo "<th>Heimmannschaft</th>\n";
echo "<th>Gastmannschaft</th>\n";
echo "<th>Ergebnis</th>\n";
echo "</tr>\n";

// MANNSCHAFTEN UND ERGEBNISSE AUSLESEN UND DARSTELLEN
$befehl="select tag_heim from spieltag where tag_saison='$saisonletzter' and tag_datum='$letzter' and tag_liga='$div'";
$antwort=mysql_query($befehl);
while($data=mysql_fetch_array($antwort))
{
 $heim=$data['tag_heim'];
 $unterbefehl ="select tag_gast, tag_erg from spieltag where tag_saison='$saisonletzter'";
 $unterbefehl.=" and tag_datum='$letzter' and tag_heim='$heim' and tag_liga='$div'";
 $unterantwort=mysql_query($unterbefehl);
 $unterdata=mysql_fetch_array($unterantwort);
 $gast=$unterdata['tag_gast'];
 $erg=$unterdata['tag_erg'];

 $table ="<tr>\n";
 $table.="<td>".teamname($heim)."</td>\n";
 $table.="<td>".teamname($gast)."</td>\n";
 $table.="<td align='center'>".result($erg)."</td>\n";
 $table.="</tr>\n";
 echo $table;

// schließende Klammer für MANNSCHAFTEN UND ERGEBNISSE AUSLESEN UND DARSTELLEN
}

echo "</table>\n";

// ==============================================================================================
// TABELLE AB HIER
// ==============================================================================================

mysql_query("truncate table tabelle");

// MySql-TABELLE MIT ALLEN TABELLENEINTRÄGEN ALLER TEAMS ERZEUGEN
$teambefehl ="select distinct tag_heim from spieltag where tag_heim<>'x'";
$teambefehl.=" and tag_saison=$saisonletzter and tag_liga='$div'";
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
$befehl.=" and tag_liga='$div' and tag_datum<='$letzter' order by tag_datum";
$antwort=mysql_query($befehl);
while($data=mysql_fetch_array($antwort))
{
 $datum=$data['tag_datum'];
 $index=$data['tag_index'];

 // von momentan gewähltem Datum Gegner und Ergebnis auslesen und darstellen
 $unterbefehl ="select tag_heim, tag_gast, tag_erg from spieltag where tag_datum='$datum' and tag_liga='$div'";
 $unterantwort=mysql_query($unterbefehl);

 // HEIM UND GAST ERFAHREN
 while($unterdata=mysql_fetch_array($unterantwort))
 {
  $heim=$unterdata['tag_heim'];
  $gast=$unterdata['tag_gast'];
  $ergebnis=$unterdata['tag_erg'];

// NICHT GESPIELTE NICHT ZÃHLEN
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

   // schlieÃende Klammer fÃ¼r SPIELFREIE AUSLASSEN
   }

  // schlieÃende Klammer fÃ¼r HEIMSPIEL
  }

  // AUSWÃRTSSPIEL
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

   // schlieÃende Klammer fÃ¼r SPIELFREIE AUSLASSEN
   }

  // schlieÃende Klammer fÃ¼r AUSWÃRTSSPIEL
  }

// schlieÃende Klammer zu NICHT GESPIELTE NICHT ZÃHLEN
}

 // schlieÃende Klammer fÃ¼r HEIM UND GAST ERFAHREN
 }

// schlieÃende Klammer fÃ¼r SPIELTAGE EINZELN AUSLESEN
}

// Teamname herausfinden
$befehl ="select team_name from teams where team_kurz='$team'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$teamname=$data['team_name'];

// TabelleneintrÃ¤ge in Tabelle zwischenspeichern
$save_befehl ="insert into tabelle (team, anz, plus, minus, diff, p, m, d, s, u, n)";
$save_befehl.=" values ('$teamname', '$spiele', '$pluspunkte', '$minuspunkte', '$punktdiff',";
$save_befehl.=" '$plusspiele', '$minusspiele', '$spieldiff', '$siege', '$deuce', '$nieder')";
mysql_query($save_befehl);

// schlieÃende Klammer fÃ¼r MySql-TABELLE MIT ALLEN TABELLENEINTRÃGEN ALLER TEAMS ERZEUGEN
}

// TABELLE AUSGEBEN
echo "<table border='0' cellspacing='1' cellpadding='1' align='center'>\n";
echo "<tr>\n";
echo "<th>Platz</th>\n";
echo "<th>Team</th>\n";
echo "<th>Anz.</th>\n";
echo "<th colspan='3'>Punkte</th>\n";
echo "<th>Diff.</th>\n";
echo "<th colspan='3'>Spiele</th>\n";
echo "<th>Diff.</th>\n";
echo "<th>S</th>\n";
echo "<th>U</th>\n";
echo "<th>N</th>\n";
echo "</tr>\n";

$platz=0;
$tabbefehl ="select * from tabelle order by plus desc, minus asc, p desc, m asc";
$tabantwort=mysql_query($tabbefehl);
while($tabdata=mysql_fetch_array($tabantwort))
{
 $platz++;

 $tab ="<tr>\n";
 $tab.="<td align='right'>".$platz."</td>\n";
 $tab.="<td><b>".$tabdata['team']."</b></td>\n";
 $tab.="<td align='center'>".$tabdata['anz']."</td>\n";
 $tab.="<td align='center'><b>".$tabdata['plus']."</b></td>\n";
 $tab.="<td align='center'><b> : </b></td>\n";
 $tab.="<td align='center'><b>".$tabdata['minus']."</b></td>\n";
 $tab.="<td align='center'>".$tabdata['diff']."</td>\n";
 $tab.="<td align='center'>".$tabdata['p']."</td>\n";
 $tab.="<td align='center'> : </td>\n";
 $tab.="<td align='center'>".$tabdata['m']."</td>\n";
 $tab.="<td align='center'>".$tabdata['d']."</td>\n";
 $tab.="<td align='center'>".$tabdata['s']."</td>\n";
 $tab.="<td align='center'>".$tabdata['u']."</td>\n";
 $tab.="<td align='center'>".$tabdata['n']."</td>\n";
 $tab.="</tr>\n";
 echo $tab;

// schlieÃende Klammer zu TABELLE AUSGEBEN (while($tabdata=mysql_fetch_array($tabantwort)))
}

echo "</table>\n";

// schließende Klammer zu WIEDERHOLUNG FÜR JEDE DIVISION
} while($div < $divanzahl);

// =============================================================================================
// MAXIMUMS UND HIGH FINISHS AB HIER
// =============================================================================================

echo "<table border='0' cellspacing='1' cellpadding='1' align='center'>\n";
echo "<tr><th>Max's</th><th>HiFi's</th></tr>\n";
echo "<tr>\n";

// erschdemol die hunnadachdsischa
$zelle ="<td valign='top'>\n";
$befehl ="SELECT max_pass, sum( max_max ) AS 'max' FROM max where max_saison='$saisonletzter' and max_tag='$spieltag'";
$befehl.="and max_max is not null GROUP  BY max_pass ORDER  BY max DESC ";
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
 $zelle.=$data['max']." x ".$spielername." (".$data['max_pass'].", ".teamname($spielerteam).")<br>\n";
}

$zelle.="</td>\n";
echo $zelle;

// dann die haifinnischs
$zelle ="<td valign='top'>\n";
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
$zelle.="</td>\n";
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

echo "<table border='0' cellspacing='1' cellpadding='1' align='center'>\n";
echo "<tr><th>Bemerkungen</th></tr>\n";
echo "<tr><td>".$data['bem_text']."</td></tr>\n";
echo "</table>\n";

// schlieÃende Klammer zu KEINE BEMERKUNGEN - KEINE ANZEIGE
}

// schließende Klammer zu AKTUELLEN TAG ANZEIGEN (KEIN ANDERER TAG GEWÜNSCHT)
}

mysql_close();

?>