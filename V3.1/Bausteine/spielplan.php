<?php

// Datenbank �ffnen
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

// Funktion zum Feststellen des Teamnamens anhand des K�rzels definieren
function teamname($name)
{
 $befehl="select team_name from teams where team_kurz='$name'";
 $antwort=mysql_query($befehl);
 $datatn=mysql_fetch_array($antwort);
 $name=$datatn['team_name'];

 return $name;
}

// Aktuelles Datum ausw�hlen
 $auswahl=date("Y-m-d");

// Auslesen des folgenden Spieltages
$befehl="select distinct min(tag_datum) from spieltag where tag_datum>'$auswahl'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);

// WENN N�CHSTER SPIELTAG EXISTIERT HIER WEITER
$erster=$data['min(tag_datum)'];
if($erster)
{
 // Saison feststellen
 $befehl="select distinct tag_saison from spieltag where tag_datum='$erster'";
 $antwort=mysql_query($befehl);
 $data=mysql_fetch_array($antwort);
 $saisonerster=$data['tag_saison'];
 
 // Spieltage der Saison auslesen
 $befehl="select distinct tag_index,tag_datum from spieltag where tag_saison='$saisonerster' order by tag_index";
 $antwort=mysql_query($befehl);

 // SPIELTAGE NACHEINANDER AUFRUFEN
 while($datatag=mysql_fetch_array($antwort))
 {
  $spieltag=$datatag['tag_index'];
  $erster=$datatag['tag_datum'];

  // ==============================================================================================
  // ERGEBNISSE AB HIER f�r laufende Saison
  // ==============================================================================================
  echo "<p align ='center'>\n";
  echo "<b>Begegnungen vom ".$spieltag.". Spieltag der Saison ".$saisonerster.", ".datum($erster)."</b>\n";
  echo "</p>\n";
  
  echo "<table border='1' cellspacing='1' cellpadding='1' align='center' bordercolor='#000000'>\n";
  echo "<tr>\n";
  echo "<th><font size='-1'>Heimmannschaft</font></th>\n";
  echo "<th><font size='-1'>Gastmannschaft</font></th>\n";
  echo "</tr>\n";
 
  // MANNSCHAFTEN UND ERGEBNISSE AUSLESEN UND DARSTELLEN
  $befehlteam="select tag_heim from spieltag where tag_saison='$saisonerster' and tag_datum='$erster'";
  $antwortteam=mysql_query($befehlteam);
  while($datateam=mysql_fetch_array($antwortteam))
  {
   $heim=$datateam['tag_heim'];
   $unterbefehl ="select tag_gast from spieltag where tag_saison='$saisonerster'";
   $unterbefehl.=" and tag_datum='$erster' and tag_heim='$heim'";
   $unterantwort=mysql_query($unterbefehl);
   $unterdata=mysql_fetch_array($unterantwort);
   $gast=$unterdata['tag_gast'];
  
   $table ="<tr>\n";
   $table.="<td><font size='-1'>".teamname($heim)."</font></td>\n";
   $table.="<td><font size='-1'>".teamname($gast)."</font></td>\n";
   $table.="</tr>\n";
   echo $table;
  
  // schlie�ende Klammer f�r MANNSCHAFTEN UND ERGEBNISSE AUSLESEN UND DARSTELLEN
  }
  
  echo "</table>\n";
  
  echo "<hr noshade width=65%>\n";

 // schlie�ende Klammer zu SPIELTAGE NACHEINANDER AUFRUFEN
 }

// schlie�ende Klammer zu WENN N�CHSTER SPIELTAG EXISTIERT HIER WEITER
}

// N�CHSTER SPIELTAG EXISTIERT NICHT
else
{
 echo "<p>\n";
 echo "<b>F�r die kommende Saison wurde noch kein Spielplan eingegeben.</b>\n";
 echo "</p>\n";
}

mysql_close();
 
?>