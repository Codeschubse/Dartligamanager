<?
include("../Bausteine/top.php");
?>
<html>
<body>
<div align="left"> <table width="100%" height="85%" border="1" bordercolor="#000000"> 
<tr> <td height="30"> <?php include("../Bausteine/copyright.php"); ?> </td><td height="30"><?
include("../Navigation/navitop.php");
?></td></tr> <tr> <td height="159" rowspan="5" valign="top"> <div align="center"> 
<table width="100%" border="0"> <tr> <th height="30"> <div align="center"></div><div align="center">Hauptmen&uuml;</div></th></tr> 
<tr> <td height="80"><?
include("../Navigation/navileft.php");
?></td></tr> <tr> <th height="30">Spielbetrieb</th></tr> <tr valign="top"> <td><?
include("../Navigation/navispielbetrieb.php");
?></td></tr> </table></div></td><td rowspan="5" width="81%" VALIGN="TOP"> <DIV ALIGN="CENTER"><FONT SIZE="+1"><B><I>N&auml;chster 
Spieltag:</I></B></FONT><BR> <?php

// Datenbank öffnen
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

// Aktuelles Datum auswählen
$auswahl=date("Y-m-d");

// Auslesen des folgenden Spieltages
$befehl="select distinct min(tag_datum) from spieltag where tag_datum>='$auswahl'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);

// WENN NÄCHSTER SPIELTAG EXISTIERT HIER WEITER
$erster=$data['min(tag_datum)'];
if($erster)
{
 // Saison feststellen
 $befehl="select distinct tag_saison from spieltag where tag_datum='$erster'";
 $antwort=mysql_query($befehl);
 $data=mysql_fetch_array($antwort);
 $saisonerster=$data['tag_saison'];
 
 // feststellen, der wievielte Spieltag der nächste ist
 $befehl="select distinct tag_index from spieltag where tag_datum='$erster'";
 $antwort=mysql_query($befehl);
 $data=mysql_fetch_array($antwort);
 $spieltag=$data['tag_index'];
 
 // ==============================================================================================
 // ERGEBNISSE AB HIER für laufende Saison
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
 $befehl="select tag_heim from spieltag where tag_saison='$saisonerster' and tag_datum='$erster'";
 $antwort=mysql_query($befehl);
 while($data=mysql_fetch_array($antwort))
 {
  $heim=$data['tag_heim'];
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
 
 // schließende Klammer für MANNSCHAFTEN UND ERGEBNISSE AUSLESEN UND DARSTELLEN
 }
 
 echo "</table>\n";
 
 // ================================================================================================
 // BEMERKUNGEN AB HIER
 // ================================================================================================
 
 $befehl="select bem_text from bemerkungen where bem_saison='$saisonletzter' and bem_tag='$spieltag'";
 $antwort=mysql_query($befehl);
 $data=mysql_fetch_array($antwort);
 
 // Bemerkungen nur Anzeigen, wenn auch welche vorhanden sind
 if($data)
 {
  echo "<hr noshade width=35%>\n";
 
  echo "<table border='1' cellspacing='1' cellpadding='1' align='center' bordercolor='#000000'>\n";
  echo "<tr><th><font size='-1'>Bemerkungen</font></th></tr>\n";
  echo "<tr><td><font size='-1'>".$data['bem_text']."</font></td></tr>\n";
  echo "</table>\n";
 }
 
// schließende Klammer zu WENN NÄCHSTER SPIELTAG EXISTIERT HIER WEITER
}

// NÄCHSTER SPIELTAG EXISTIERT NICHT
else
{
 echo "<p>\n";
 echo "<b>Für die kommende Saison wurde noch kein Spielplan eingegeben.</b>\n";
 echo "</p>\n";
}

mysql_close();
 
?> </DIV></td></tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> </table></div>
</body>
</html>
