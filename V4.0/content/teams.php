<?php

//wenn Details...-Link geklickt wurde hier weiter sonst weiter bei ELSE
if($team){

//Verbindung zur Datenbank aufbauen
include ("components/mysql.php");

//Zahl der Spieler errechnen
$sql_befehl="select * from spieler where sp_team='$team'";
$antwort=mysql_query($sql_befehl);
$spielerzahl=mysql_num_rows($antwort);

//Teamdaten abfragen
$sql_befehl="select * from teams where team_kurz='$team'";
$antwort=mysql_query($sql_befehl);
$data=mysql_fetch_array($antwort);

//Captaindaten abfragen
$sql_befehl="select * from spieler where sp_team='$team' and sp_cap='1'";
$antwort=mysql_query($sql_befehl);
$datax=mysql_fetch_array($antwort);

// Lokal Einträge zusammensetzen
$lok ="<b>".$data['team_lokal']."</b><br>\n";
$lok.=$data['team_str'].", ".$data['team_plz']."&nbsp;".$data['team_ort']."<br>\n";
$lok.="Tel.: ".$data['team_tel'];
$homepage=$data['team_lokalhome'];
if($homepage){
$lok.="<br>Homepage: <a href='".$homepage."' target='_blank'>".$homepage."</a>";
}

$teamname ="<div align='center'><b><font size='+2'>".$data['team_name']."</font></b><br>\n";
$teamname.="<font size'-2'>(".$spielerzahl." Spieler)</font>\n";
$website=$data['team_home'];
if($website){
$teamname.="<br>Homepage: <a href='".$website."' target='_blank'>".$website."</a>";
}
$teammail=$data['team_mail'];
if($teammail){
$teamname.="<br><br><a href='http://www.hdlev.de/index.php?content=contact&team=".$team."'>Nachricht and dieses Team senden...</a>";
}
$teamname.="<br><br>&nbsp;&nbsp;&nbsp;<a href='index.php?content=teams'>zur&uuml;ck zur &Uuml;bersicht</a></div>\n";
$teamname.="<div align='center'><font size='-2'><br>Gem&auml;&szlig; &sect; 28 BDSG widersprechen wir jeder kommerziellen Verwendung und Weitergabe unserer Daten!</font></div><br>\n";
echo $teamname;

echo "<table border='0' align='center'>\n";
echo " <tr>\n";
echo "   <th>Heimlokal</th>\n";
echo " </tr>\n";
echo " <tr>\n";
echo "   <td valign='top'>".$lok."</td>\n";
echo " </tr>\n";
echo "</table>\n";
echo "<br>\n";
echo"  <table border='0' align='center'>\n";
echo"    <tr>\n";
echo"      <th>Pa&szlig;nummer</th>\n";
echo"      <th align='left'>Spieler</th>\n";
echo"    </tr>\n";

//Spieler ausgeben
$sql_befehl="select sp_pass,sp_vor,sp_name from spieler where sp_team='$team' order by sp_pass";
$antwort=mysql_query($sql_befehl);
while($data=mysql_fetch_array($antwort)){
$nr=$data['sp_pass'];
$name=$data['sp_vor']." ".$data['sp_name'];
$tab ="    <tr>\n";
$tab.="     <td align='right'>".$nr."</td>\n";
$tab.="     <td>".$name."</td>\n";
$tab.="    </tr>\n";
echo $tab;

//schließende Klammer für WHILE($DATA)
}

echo "  </table>\n";

//Details...-Link wurde nicht gecklickt, Übersicht ausgeben IF($TEAM)
}else{

//Verbindung zur Datenbank aufbauen
include ("components/mysql.php");

//Zahl der Spieler errechnen
$sql_befehly="select * from spieler where sp_team<>'vac'";
$antworty=mysql_query($sql_befehly);
$spielerzahl=mysql_num_rows($antworty);

//Zahl der Teams errechnen
$sql_befehl="select * from teams where team_kurz<>'vac' and team_aktiv is not null order by team_name";
$antwort=mysql_query($sql_befehl);
$teamzahl=mysql_num_rows($antwort);

echo "<p>Derzeit nehmen ".$spielerzahl." Spieler in\n";
echo $teamzahl." Mannschaften am Ligabetrieb teil. Um die Adressen\n";
echo " der Captains und Lokale sowie die Spielerlisten zu betrachten, bitte\n";
echo " bei der entsprechenden Mannschaft auf 'Details...' klicken.</p>\n";

echo "<table align='center' border='0' cellpadding='1' cellspacing='2'>\n";
echo "<tr><th>Team</th><th>Captain</th><th>Lokal</th><th>mehr Info...</th></tr>\n";

//von jedem Team den Namen und Lokal ausgeben
//und außerdem in zweiter anfrage (mit X) Name des Captains auslesen und ausgeben
while($data=mysql_fetch_array($antwort)){
$nr=$data['team_cap'];
$team=$data['team_kurz'];
$sql_befehlx="select sp_vor,sp_name from spieler where sp_pass=$nr";
$antwortx=mysql_query($sql_befehlx);
$datax=mysql_fetch_array($antwortx);
$tab="<tr><td><b>" . $data['team_name'] . "</b></td>\n";
$tab.="<td>" . $datax['sp_vor'] . " " . $datax['sp_name'] . "</td>\n";
$tab.="<td>" . $data['team_lokal'] . "</td>\n";
$tab.="<td align='center'>\n";
$tab.="<a href=index.php?content=teams&team=$team>Details...</a>\n";
$tab.="</td></tr>\n";
echo $tab;
}
echo "</table>\n";

//Datenbank schließen
mysql_close();

//schließende Klammer für IF($INFO)
}
?>