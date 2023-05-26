<form method="post" action="../Seiten/admin.spieler.php">
  <table width="75%" border="0" align="center">
    <tr> 
      <th colspan="2">neuen Spieler eintragen / Spielerdaten ändern</th>
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
        <div align="center">
          <input type="submit" name="spielerneu" value="eintragen">
        </div>
      </td>
    </tr>
  </table>
</form>
