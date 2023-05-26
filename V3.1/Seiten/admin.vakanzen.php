<?
require_once("../Bausteine/proof_session.php");
include("../Bausteine/top.php");
?>
<html>
<body>
<div align="left"> 
  <table width="100%" height="85%" border="1" bordercolor="#000000">
    <tr> 
      <td height="30" width="200"> <?php include("../Bausteine/copyright.php"); ?> 
      </td>
      <td height="30"><?
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
              <td height="80"><?
include("../Navigation/navileft.php");
?></td>
            </tr>
            <tr> 
              <th height="30">Adminbereich</th>
            </tr>
            <tr valign="top"> 
              <td><?
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
              <table width="100%" border="0">
                <tr> 
                  <td align="center"><b>Inaktive Spieler</b> <br>
                    (ehemals in der HDL gemeldet):</td>
                  <td rowspan="2" width="5%">&nbsp;</td>
                  <td align="center"><b>Inaktive Mannschaften</b> <br>
                    (ehemals in der HDL gemeldet):</td>
                </tr>
                <tr> 
                  <td align="center" valign="top"><?php
// Datenbankverbindung
include ("../Bausteine/mysql.php");
$befehl="select sp_pass,sp_vor,sp_name from spieler where sp_team='vac' order by sp_pass";
$antwort=mysql_query($befehl);

// Tabelle mit vakanten Spielern ausgeben
echo "<table cellspacing='3'><tr><th>Pa�</th><th colspan='2'>Name</th></tr>\n";
while($data=mysql_fetch_array($antwort)){
echo "<tr><td align='right'>".$data['sp_pass']."</td><td align='right'>".$data['sp_vor']."</td><td align='left'>".$data['sp_name']."</td></tr>\n";
} // schlie�ende Klammer f�r while($data=mysql...)
echo "</table>\n";
?></td>
                  <td align="center" valign="top"><?php
$befehl="select team_name from teams where team_aktiv is null and team_kurz!='x' order by team_name";
$antwort=mysql_query($befehl);

// Tabelle mit vakanten Teams ausgeben
echo "<table cellspacing='3'><tr><th>Team</th></tr>\n";
while($data=mysql_fetch_array($antwort)){
echo "<tr><td>".$data['team_name']."</td></tr>\n";
} // schlie�ende Klammer f�r while($data=mysql...)
echo "</table>\n";
?></td>
                </tr>
              </table>
              <p align="center">&nbsp;</p>
            </td>
            <td width="3%" height="374">&nbsp;</td>
          </tr>
          <tr> 
            <td colspan="3">&nbsp;</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr> </tr>
    <tr> </tr>
    <tr> </tr>
    <tr> </tr>
  </table>
</div>
<!--Datenbank schlie�en -->
<?php mysql_close() ?>
</body>
</html>
