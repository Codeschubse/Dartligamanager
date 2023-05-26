<form method="post" action="../Seiten/admin.spieler.php">
  <table width="75%" border="0" align="center">
    <tr> 
      <th colspan="2">aktiven Spieler ummelden / vakanten Spieler anmelden</th>
    </tr>
    <tr> 
      <td width="24%">Pa&szlig;nummer:</td>
      <td width="76%">

<?php
$sql_befehl="select sp_pass,sp_team from spieler order by sp_pass";
$antwort=mysql_query($sql_befehl);
echo "<select name='pass'>\n";
while($data=mysql_fetch_array($antwort)){
$passnr=$data['sp_pass'];
echo "<option value='".$passnr."'>".$passnr."</option>\n";
}
echo "</select>\n";
?>

      </td>
    </tr>
    <tr> 
      <td width="24%">Team:</td>
      <td width="76%"> 

<?php
$sql_befehl="select team_kurz,team_name from teams where team_kurz<>'vac' and team_aktiv is not null order by team_name";
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
          <input type="submit" name="spielerum" value="ummelden">
        </div>
      </td>
    </tr>
  </table>
</form>
