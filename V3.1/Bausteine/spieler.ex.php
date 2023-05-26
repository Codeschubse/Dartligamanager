<form method="post" action="../Seiten/admin.spieler.php">
  <table width="75%" border="0" align="center">
    <tr> 
      <th colspan="2">aktiven Spieler l&ouml;schen</th>
    </tr>
    <tr> 
      <td width="24%">Pa&szlig;nummer:</td>
      <td width="76%">

<?php
$sql_befehl="select sp_pass from spieler where sp_team<>'vac' order by sp_pass";
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
      <td colspan="2" height="20"> 
        <div align="center">
          <input type="submit" name="spielerex" value="l&ouml;schen">
        </div>
      </td>
    </tr>
  </table>
</form>
