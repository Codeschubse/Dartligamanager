<?
include("../Bausteine/top.php");
?>
<div align="left"> 
  <table width="100%" height="85%" border="1" bordercolor="#000000">
    <tr> 
      <td height="30"> 
<?php include("../Bausteine/copyright.php"); ?>
      </td>
      <td height="30"><?
include("../Navigation/navitop.php");
?></td>
    </tr>
    <tr> 
      <td height="159" rowspan="5" valign="top"> 
        <div align="center">
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
              <th height="30">Wer sind wir?</th>
            </tr>
            <tr valign="top"> 
              <td><?
include("../Navigation/naviwersindwir.php");
?></td>
            </tr>
          </table>
        </div>
        </td>
      <td rowspan="5" width="81%" valign="top"> 
        <p> <?php

//wenn Senden-Schaltfläche gedrückt wurde hier weiter sonst weiter bei ELSE
if($team){

//Verbindung zur Datenbank aufbauen
include ("../Bausteine/mysql.php");

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

//Captain und Lokal Einträge zusammensetzen
$cap ="<b>".$datax['sp_vor']." ".$datax['sp_name']."</b><br>\n";
$cap.=$datax['sp_str'].", ".$datax['sp_plz']."&nbsp;".$datax['sp_ort']."<br>\n";
$cap.="Tel.: ".$datax['sp_tel'];
$capmail=$datax['sp_mail'];
if($capmail){
$cap.="<br>eMail: <a href='mailto:".$capmail."'>".$capmail."</a>";
}
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
$teamname.="<br><br>&nbsp;&nbsp;&nbsp;<a href='wersindwir.teams.php'>zurück zur &Uuml;bersicht</a></div>\n";
$teamname.="<div align='center'><font size='-2'>Gem&auml;&szlig; &sect; 28 BDSG widersprechen wir jeder kommerziellen Verwendung und Weitergabe unserer Daten!</font></div><br>\n";
echo $teamname;

echo "<table width='85%' border='0' align='center'>\n";
echo " <tr>\n";
echo "   <th width='45%'>Captain</th>\n";
echo "   <td width='6%'>&nbsp;</td>\n";
echo "   <th width='45%'>Heimlokal</th>\n";
echo " </tr>\n";
echo " <tr>\n";
echo "   <td width='45%' valign='top'>".$cap."</td>\n";
echo "   <td width='6%'>&nbsp;</td>\n";
echo "   <td width='45%' valign='top'>".$lok."</td>\n";
echo " </tr>\n";
echo "</table>\n";
echo "<br>\n";
echo"  <table width='45%' border='0' align='center'>\n";
echo"    <tr>\n";
echo"      <th width='25%'>Pa&szlig;nummer</th>\n";
echo"      <th width='75%'>Spieler</th>\n";
echo"    </tr>\n";

//Spieler ausgeben
$sql_befehl="select sp_pass,sp_vor,sp_name from spieler where sp_team='$team' order by sp_pass";
$antwort=mysql_query($sql_befehl);
while($data=mysql_fetch_array($antwort)){
$nr=$data['sp_pass'];
$name=$data['sp_vor']." ".$data['sp_name'];
$tab ="    <tr>\n";
$tab.="     <td width='25%' align='right'>".$nr."</td>\n";
$tab.="     <td width='75%'>".$name."</td>\n";
$tab.="    </tr>\n";
echo $tab;

//schließende Klammer für WHILE($DATA)
}

echo "  </table>\n";

//Senden-Schaltfläche wurde nicht gecklickt, Übersicht ausgeben IF($TEAM)
}else{

//Verbindung zur Datenbank aufbauen
include ("../Bausteine/mysql.php");

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
$tab.="<a href=wersindwir.teams.php?team=$team>Details...</a>\n";
$tab.="</td></tr>\n";
echo $tab;
}
echo "</table>\n";

//Datenbank schließen
mysql_close();

//schließende Klammer für IF($INFO)
}
?> </p>
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
