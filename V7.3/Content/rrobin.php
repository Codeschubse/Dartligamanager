<h2>Ergebnisse und Tabellen der Pokalrunde</h2>

<?php

include ("Components/mysql.php");

// Funktion zum formatieren des Datums definieren
function datum($datum)
{
 $tag=substr($datum,8,2);
 $monat=substr($datum,5,2);
 $jahr=substr($datum,0,4);
 $datum=$tag.".".$monat.".".$jahr;

 return $datum;
}

// Funktion zum Feststellen des Teamnamens anhand des Kuerzels definieren
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

// =====================================================
// Ab hier versuchsweise die Auswahl des Spieltages
// =====================================================

// ANDERER TAG GEWUENSCHT
$other=$_GET['other'];
if($other){

  // TAG GEWAEHLT
  $Saison=$_POST['Saison'].$_GET['Saison'];
  $saison=$_POST['saison'].$_GET['saison'];
  $Tag=$_POST['Tag'].$_GET['Tag'];
  $tag=$_POST['tag'];
  if($Tag){

// =========================
// ERGEBNISSE AB HIER
// =========================

// alte Suenden...
if(!$tag){$tag=$Tag;}
if(!$saison){$saison=$Saison;}

// Spieltage der Saison auslesen
$befehl="select max(rr_index) from roundrobin where rr_saison='$saison'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$letzterspieltag=$data['max(rr_index)'];

// der vorangegangene und der kommende...
if($tag>1){$vergangener=$tag-1;}else{$vergangener=$tag;}
if($tag<$letzterspieltag){$folgender=$tag+1;}else{$folgender=$tag;}

// vorher noch feststellen, wieviele Divisionen an diesem Spieltag spielen
$befehl="SELECT count(DISTINCT rr_gruppe) FROM roundrobin WHERE rr_saison = $saison";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$divanzahl=$data['count(DISTINCT rr_gruppe)'];

$befehl ="select distinct rr_datum from roundrobin where rr_saison=$saison";
$befehl.=" and rr_index='$tag'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$datum=$data['rr_datum'];

echo "<div class='auswahl' align='center'><a href='index.php?content=rrobin&amp;other=1";
if($style){echo "&amp;style=".$style;}
echo "'>anderen Spieltag w&auml;hlen...</a></div><br>\n";

echo "<div class='auswahl' align='center'><br /><a href='index.php?content=rrobin&amp;other=1&amp;Saison=".$saison."&amp;Tag=".$vergangener."'>&lt;=&nbsp;zum vorhergehenden Spieltag</a>&nbsp;&nbsp;&nbsp;<a href='index.php?content=rrobin&amp;other=1&amp;Saison=".$saison."&amp;Tag=".$folgender."'>zum kommenden Spieltag&nbsp;=&gt;</a></div><br>\n";

// bei mehreren Divisionen Ergebnisse & Tabelle mehrmals anzeigen (1x fuer jede Div)
$cnt=0;

// da hier Buchstaben benoetigt werden aber logischerweise Zahlen gezaehlt werden ein Array mit dem Alphabet
$group=array("LEER","A","B","C","D","E","F","G","H","I","J");

// WIEDERHOLUNG FUER JEDE DIVISION
do
{
$cnt++;
$gruppe=$group[$cnt];

if($divanzahl > 1)
{
  $divnennung = " in der Gruppe ".$gruppe;
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
$befehl="select rr_heim from roundrobin where rr_saison='$saison' and rr_index='$tag' and rr_gruppe='$gruppe'";
$antwort=mysql_query($befehl);
while($data=mysql_fetch_array($antwort))
{
 $heim=$data['rr_heim'];
 $unterbefehl ="select rr_gast, rr_erg from roundrobin where rr_saison='$saison' and rr_gruppe='$gruppe'";
 $unterbefehl.=" and rr_index='$tag' and rr_heim='$heim'";
 $unterantwort=mysql_query($unterbefehl);
 $unterdata=mysql_fetch_array($unterantwort);
 $gast=$unterdata['rr_gast'];
 $erg=$unterdata['rr_erg'];

 $table ="<tr>\n";
 $table.="<td>".teamname($heim)."</td>\n";
 $table.="<td>".teamname($gast)."</td>\n";
 $table.="<td align='center'>".result($erg)."</td>\n";
 $table.="</tr>\n";
 echo $table;

// schliessende Klammer fuer MANNSCHAFTEN UND ERGEBNISSE AUSLESEN UND DARSTELLEN
}

echo "</table>\n";

// ===================
// TABELLE AB HIER
// ===================

mysql_query("truncate table tabelle");

// MySql-TABELLE MIT ALLEN TABELLENEINTRAEGEN ALLER TEAMS ERZEUGEN
$teambefehl ="select distinct rr_heim from roundrobin where rr_heim<>'x'";
$teambefehl.=" and rr_saison=$saison and rr_gruppe='$gruppe'";
$teamantwort=mysql_query($teambefehl);
while($teamdaten=mysql_fetch_array($teamantwort))
{

$team=$teamdaten['rr_heim'];
$pluspunkte=0;
$minuspunkte=0;
$plusspiele=0;
$minusspiele=0;
$spiele=0;
$siege=0;
$nieder=0;
$deuce=0;

// SPIELTAGE EINZELN AUSLESEN
$befehl ="select distinct rr_datum, rr_index from roundrobin where rr_saison=$saison";
$befehl.=" and rr_gruppe='$gruppe' and rr_index<='$tag' order by rr_index";
$antwort=mysql_query($befehl);
while($data=mysql_fetch_array($antwort))
{
 $datum=$data['rr_datum'];
 $index=$data['rr_index'];

 // von momentan gewaehltem Datum Gegner und Ergebnis auslesen und darstellen
 $unterbefehl ="select rr_heim, rr_gast, rr_erg from roundrobin where rr_datum='$datum' and rr_gruppe='$gruppe'";
 $unterantwort=mysql_query($unterbefehl);

 // HEIM UND GAST ERFAHREN
 while($unterdata=mysql_fetch_array($unterantwort))
 {
  $heim=$unterdata['rr_heim'];
  $gast=$unterdata['rr_gast'];
  $ergebnis=$unterdata['rr_erg'];

// NICHT GESPIELTE NICHT ZAEHLEN
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

   // schliessende Klammer fuer SPIELFREIE AUSLASSEN
   }

  // schliessende Klammer fuer HEIMSPIEL
  }

  // AUSWAERTSSPIEL
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

   // schliessende Klammer fuer SPIELFREIE AUSLASSEN
   }

  // schliessende Klammer fuer AUSWAERTSSPIEL
  }

// schliessende Klammer zu NICHT GESPIELTE NICHT ZAEHLEN
}

 // schliessende Klammer fuer HEIM UND GAST ERFAHREN
 }

// schliessende Klammer fuer SPIELTAGE EINZELN AUSLESEN
}

// Teamname herausfinden
$befehl ="select team_name from teams where team_kurz='$team'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$teamname=$data['team_name'];

// Tabelleneintraege in Tabelle zwischenspeichern
$save_befehl ="insert into tabelle (team, anz, plus, minus, diff, p, m, d, s, u, n)";
$save_befehl.=" values ('$teamname', '$spiele', '$pluspunkte', '$minuspunkte', '$punktdiff',";
$save_befehl.=" '$plusspiele', '$minusspiele', '$spieldiff', '$siege', '$deuce', '$nieder')";
mysql_query($save_befehl);

// schliessende Klammer fuer MySql-TABELLE MIT ALLEN TABELLENEINTRAEGEN ALLER TEAMS ERZEUGEN
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

// schliessende Klammer zu TABELLE AUSGEBEN (while($tabdata=mysql_fetch_array($tabantwort)))
}

echo "</table>\n";

// schliessende Klammer zu WIEDERHOLUNG FUER JEDE DIVISION
} while ($cnt < $divanzahl);

// ======================================
// MAXIMUMS UND HIGH FINISHS AB HIER
// ======================================

echo "<table border='0' cellspacing='1' cellpadding='1' align='center'>\n";
echo "<tr><th>Max's</th><th>HiFi's</th></tr>\n";
echo "<tr>\n";

// erschdemol die hunnadachdsischa
$zelle ="<td valign='top'>\n";
$befehl ="SELECT max_pass, sum( max_max ) AS 'max' FROM max where max_saison='$saison' and max_tag='$tag'";
$befehl.="and max_max is not null and max_pokal is not null GROUP  BY max_pass ORDER  BY max DESC ";
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
$befehl.=" and max_hifi is not null and max_pokal is not null order by max_hifi desc";
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

// ==========================
// BEMERKUNGEN AB HIER
// ==========================

$befehl="select bem_text from bemerkungen where bem_saison='$saison' and bem_tag='$tag' and bem_pokal is not null";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);

// KEINE BEMERKUNGEN - KEINE ANZEIGE
if($data['bem_text'])
{

echo "<table border='0' cellspacing='1' cellpadding='1' align='center'>\n";
echo "<tr><th>Bemerkungen</th></tr>\n";
echo "<tr><td>".$data['bem_text']."</td></tr>\n";
echo "</table>\n";

// schliessende Klammer zu KEINE BEMERKUNGEN - KEINE ANZEIGE
}

  // schliessende Klammer fuer TAG GEWAEHLT
  }

  // TAG NICHT GEWAEHLT
  else{

    // SAISON GEWAEHLT
    $Saison=$_POST['Saison'];
    $saison=$_POST['saison'];
    if($Saison){

      // moegliche Tage herausfinden
      $antwort=mysql_query("select distinct rr_index from roundrobin where rr_saison=$saison");
      ?>

<form action="index.php?content=rrobin&amp;other=1<?php if($style){echo "&amp;style=".$style;} ?>" method="post" name="Tag">
                <table class="noborder" align="center" cellspacing="3">
                  <tr><th colspan="2">Ergebnisse und Tabelle eines anderen Spieltages anzeigen</th></tr>
<tr><td class="noborder" colspan="2">Saison <b><?php echo $saison ?></b> wurde ausgew&auml;hlt.</td></tr>
<tr><td class="noborder" colspan="2">Jetzt bitte Spieltag w&auml;hlen:</td></tr>
<tr>
                    <td class="noborder" align="center">
                      <select name="tag">

      <?php
      // Tage als Listenpunkte/Listenwerte ausgeben
      while($data=mysql_fetch_array($antwort))
      {
       $wert=$data['rr_index'];
      echo "<option value='".$wert."'>".$wert."</option>\n";
      }
      ?>

  </select>
                    </td>
                    <td class="noborder" align="center">
                      <input type="hidden" name="saison" value="<?php echo $saison ?>">
  <input type="submit" name="Tag" value="w&auml;hlen">
                    </td>
                  </tr>
</table>
</form>

    <?php
    // schliessende Klammer fuer SAISON GEWAEHLT
    }

    // SAISON NICHT GEWAEHLT
    else{

      // moegliche Saisons herausfinden
      $antwort=mysql_query("select distinct rr_saison from roundrobin order by rr_saison desc");
      ?>
<form action="index.php?content=rrobin&amp;other=1<?php if($style){echo "&amp;style=".$style;} ?>" method="post" name="Saison">
                <table cellspacing="3" align="center">
                  <tr><th colspan="2">Ergebnisse und Tabelle eines anderen Spieltages anzeigen</th><tr>
<tr><td class="noborder" colspan="2">Bitte&nbsp;zuerst&nbsp;Saison&nbsp;w&auml;hlen:</td><tr>
<tr>
                    <td class="noborder" align="center">
                      <select name="saison">
      <?php
      // Saisons als Listenpunkte/Listenwerte ausgeben
      while($data=mysql_fetch_array($antwort))
      {
       $wert=$data['rr_saison'];
       echo "<option value='".$wert."'>".$wert."</option>\n";
      }
      ?>
                      </select>
                    </td>
                    <td class="noborder" align="center">
                      <input type="submit" name="Saison" value="w&auml;hlen">
                    </td>
                  </tr>
</table>
</form>

    <?php
    // schliessende Klammer fuer SAISON NICHT GEWAEHLT
    }

  // schliessende Klammer fuer TAG NICHT GEWAEHLT
  }

// schliessende Klammer fuer ANDERER TAG GEWUENSCHT
}

// ==========
// ENDE
// ==========

// AKTUELLEN TAG ANZEIGEN (KEIN ANDERER TAG GEWUENSCHT)
else
{


// Aktuelles Datum auswaehlen
$auswahl=date("Y-m-d");

// Auslesen des vorangegangenen und folgenden Spieltages
$befehl="select max(rr_datum) from roundrobin where rr_datum<'$auswahl'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$letzter=$data['max(rr_datum)'];

$befehl="select min(rr_datum) from roundrobin where rr_datum>'$auswahl'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$erster=$data['min(rr_datum)'];

// Feststellen, ob Spieltag vor oder nach Saisonende liegt
$befehl="select distinct rr_saison from roundrobin where rr_datum='$letzter'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$saisonletzter=$data['rr_saison'];

$befehl="select distinct rr_saison from roundrobin where rr_datum='$erster'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$saisonerster=$data['rr_saison'];

// feststellen, der wievielte Spieltag der letzte war
$befehl="select distinct rr_index from roundrobin where rr_datum='$letzter'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$spieltag=$data['rr_index'];

// Spieltage der Saison auslesen
$befehl="select max(rr_index) from roundrobin where rr_saison='$saisonletzter'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$letzterspieltag=$data['max(rr_index)'];

// der vorangegangene und der kommende...
if($spieltag>1){$vergangener=$spieltag-1;}else{$vergangener=$spieltag;}
if($spieltag<$letzterspieltag){$folgender=$spieltag+1;}else{$folgender=$spieltag;}

// feststellen, wieviele Divisionen spielen
$befehl="SELECT count(DISTINCT rr_gruppe) FROM roundrobin WHERE rr_saison = $saisonletzter";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$divanzahl=$data['count(DISTINCT rr_gruppe)'];

echo "<div class='auswahl' align='center'><a href='index.php?content=rrobin&amp;other=1";
if($style){echo "&amp;style=".$style;}
echo "'>anderen Spieltag w&auml;hlen...</a></div><br>\n";

echo "<div class='auswahl' align='center'><br /><a href='index.php?content=rrobin&amp;other=1&amp;Saison=".$saisonletzter."&amp;Tag=".$vergangener."'>&lt;=&nbsp;zum vorhergehenden Spieltag</a>&nbsp;&nbsp;&nbsp;<a href='index.php?content=rrobin&amp;other=1&amp;Saison=".$saisonletzter."&amp;Tag=".$folgender."'>zum kommenden Spieltag&nbsp;=&gt;</a></div><br>\n";

// bei mehreren Divisionen Ergebnisse & Tabelle mehrmals anzeigen (1x fuer jede Div)
$cnt=0;

// da hier Buchstaben benoetigt werden aber logischerweise Zahlen gezaehlt werden ein Array mit dem Alphabet
$group=array("LEER","A","B","C","D","E","F","G","H","I","J");

// WIEDERHOLUNG FUER JEDE DIVISION
do {
$cnt++;
$gruppe=$group[$cnt];

$divnennung = " in der Gruppe ".$gruppe;

// ======================
// ERGEBNISSE AB HIER
// ======================

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
$befehl="select rr_heim from roundrobin where rr_saison='$saisonletzter' and rr_datum='$letzter' and rr_gruppe='$gruppe'";
$antwort=mysql_query($befehl);
while($data=mysql_fetch_array($antwort))
{
 $heim=$data['rr_heim'];
 $unterbefehl ="select rr_gast, rr_erg from roundrobin where rr_saison='$saisonletzter'";
 $unterbefehl.=" and rr_datum='$letzter' and rr_heim='$heim' and rr_gruppe='$gruppe'";
 $unterantwort=mysql_query($unterbefehl);
 $unterdata=mysql_fetch_array($unterantwort);
 $gast=$unterdata['rr_gast'];
 $erg=$unterdata['rr_erg'];

 $table ="<tr>\n";
 $table.="<td>".teamname($heim)."</td>\n";
 $table.="<td>".teamname($gast)."</td>\n";
 $table.="<td align='center'>".result($erg)."</td>\n";
 $table.="</tr>\n";
 echo $table;

// schliessende Klammer fuer MANNSCHAFTEN UND ERGEBNISSE AUSLESEN UND DARSTELLEN
}

echo "</table>\n";

// ======================
// TABELLE AB HIER
// ======================

mysql_query("truncate table tabelle");

// MySql-TABELLE MIT ALLEN TABELLENEINTRAEGEN ALLER TEAMS ERZEUGEN
$teambefehl ="select distinct rr_heim from roundrobin where rr_heim<>'x'";
$teambefehl.=" and rr_saison=$saisonletzter and rr_gruppe='$gruppe'";
$teamantwort=mysql_query($teambefehl);
while($teamdaten=mysql_fetch_array($teamantwort))
{

$team=$teamdaten['rr_heim'];
$pluspunkte=0;
$minuspunkte=0;
$plusspiele=0;
$minusspiele=0;
$spiele=0;
$siege=0;
$nieder=0;
$deuce=0;

// SPIELTAGE EINZELN AUSLESEN
$befehl ="select distinct rr_datum, rr_index from roundrobin where rr_saison=$saisonletzter";
$befehl.=" and rr_gruppe='$gruppe' and rr_datum<='$letzter' order by rr_datum";
$antwort=mysql_query($befehl);
while($data=mysql_fetch_array($antwort))
{
 $datum=$data['rr_datum'];
 $index=$data['rr_index'];

 // von momentan gewaehltem Datum Gegner und Ergebnis auslesen und darstellen
 $unterbefehl ="select rr_heim, rr_gast, rr_erg from roundrobin where rr_datum='$datum' and rr_gruppe='$gruppe'";
 $unterantwort=mysql_query($unterbefehl);

 // HEIM UND GAST ERFAHREN
 while($unterdata=mysql_fetch_array($unterantwort))
 {
  $heim=$unterdata['rr_heim'];
  $gast=$unterdata['rr_gast'];
  $ergebnis=$unterdata['rr_erg'];

// NICHT GESPIELTE NICHT ZAEHLEN
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

   // schliessende Klammer fuer SPIELFREIE AUSLASSEN
   }

  // schliessende Klammer fuer HEIMSPIEL
  }

  // AUSWAERTSSPIEL
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

   // schliessende Klammer fuer SPIELFREIE AUSLASSEN
   }

  // schliessende Klammer fuer AUSWAERTSSPIEL
  }

// schliessende Klammer zu NICHT GESPIELTE NICHT ZAEHLEN
}

 // schliessende Klammer fuer HEIM UND GAST ERFAHREN
 }

// schliessende Klammer fuer SPIELTAGE EINZELN AUSLESEN
}

// Teamname herausfinden
$befehl ="select team_name from teams where team_kurz='$team'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$teamname=$data['team_name'];

// Tabelleneintraege in Tabelle zwischenspeichern
$save_befehl ="insert into tabelle (team, anz, plus, minus, diff, p, m, d, s, u, n)";
$save_befehl.=" values ('$teamname', '$spiele', '$pluspunkte', '$minuspunkte', '$punktdiff',";
$save_befehl.=" '$plusspiele', '$minusspiele', '$spieldiff', '$siege', '$deuce', '$nieder')";
mysql_query($save_befehl);

// schliessende Klammer fuer MySql-TABELLE MIT ALLEN TABELLENEINTRAEGEN ALLER TEAMS ERZEUGEN
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

// schliessende Klammer zu TABELLE AUSGEBEN (while($tabdata=mysql_fetch_array($tabantwort)))
}

echo "</table>\n";


// schliessende Klammer zu WIEDERHOLUNG FUER JEDE DIVISION
} while($cnt < $divanzahl);

// ======================================
// MAXIMUMS UND HIGH FINISHS AB HIER
// ======================================

echo "<table border='0' cellspacing='1' cellpadding='1' align='center'>\n";
echo "<tr><th>Max's</th><th>HiFi's</th></tr>\n";
echo "<tr>\n";

// erschdemol die hunnadachdsischa
$zelle ="<td valign='top'>\n";
$befehl ="SELECT max_pass, sum( max_max ) AS 'max' FROM max where max_saison='$saisonletzter' and max_tag='$spieltag'";
$befehl.="and max_max is not null and max_pokal is not null GROUP  BY max_pass ORDER  BY max DESC ";
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
$befehl.=" and max_hifi is not null and max_pokal is not null order by max_hifi desc";
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

// ========================
// BEMERKUNGEN AB HIER
// ========================

$befehl="select bem_text from bemerkungen where bem_saison='$saisonletzter' and bem_tag='$spieltag' and bem_pokal is not null";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);

// KEINE BEMERKUNGEN - KEINE ANZEIGE
if($data['bem_text'])
{

echo "<table border='0' cellspacing='1' cellpadding='1' align='center'>\n";
echo "<tr><th>Bemerkungen</th></tr>\n";
echo "<tr><td>".$data['bem_text']."</td></tr>\n";
echo "</table>\n";

// schliessende Klammer zu KEINE BEMERKUNGEN - KEINE ANZEIGE
}

// schliessende Klammer zu AKTUELLEN TAG ANZEIGEN (KEIN ANDERER TAG GEWUENSCHT)
}

mysql_close();

?>