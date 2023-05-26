<?
require_once("../Bausteine/proof_session.php");
include("../Bausteine/top.php");
?>
<html>
<body>
<div align="left"> 
  <table width="100%" height="85%" border="1" bordercolor="#000000">
    <tr> 
      <td height="30" width="200"> 
<?php include("../Bausteine/copyright.php"); ?>
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

<!-- Datenbankverbindung -->
<?php include ("../Bausteine/mysql.php") ?>

<?php

// BEMERKUNG EINGEGEBEN
if($Bemerkung){

// NEUER EINTRAG, $exist=0, AKTUALISIERTER EINTRAG, $exist=1, SONST FEHLERMELDUNG
if($exist == 0)
{
  if (strlen($bemerkung)<1)// KEIN EINTRAG VORGENOMMEN
  {
    echo "Es wurde keine &Auml;nderung vorgenommen.<br>\n";
    echo "<br><a href='admin.pokalbemerkungen.php'>Zur&uuml;ck zur Eingabemaske...</a>\n";
  }
  else // EINTRAG VORGENOMMEN
  {
    $befehl ="insert into bemerkungen (bem_tag, bem_saison, bem_text, bem_pokal)";
    $befehl.=" values ('$tag', '$saison', '$bemerkung', '1')";
    mysql_query($befehl);
    $tab ="<table>\n";
    $tab.="<tr><th colspan='2'>Folgende Daten wurden eingetragen:</th></tr>\n";
    $tab.="<tr><td>Saison:</td><td>".$saison."</td></tr>\n";
    $tab.="<tr><td>Spieltag:</td><td>".$tag."</td></tr>\n";
    $tab.="<tr><td>Bemerkung:</td><td>".$bemerkung."</td></tr>\n";
    $tab.="</table>\n";
    echo $tab;
    echo "<br><a href='admin.pokalbemerkungen.php'>Zur&uuml;ck zur Eingabemaske...</a>\n";
  }
}
else if($exist == 1)
{
  if (strlen($bemerkung)<1)// KEIN EINTRAG VORGENOMMEN
  {
    $befehl ="delete from bemerkungen where bem_tag='$tag' and bem_saison='$saison' and bem_pokal is not null";
    mysql_query($befehl);
    echo "Eintrag wurde gel&ouml;scht.<br>\n";
    echo "<br><a href='admin.pokalbemerkungen.php'>Zur&uuml;ck zur Eingabemaske...</a>\n";
  }
  else // EINTRAG VORGENOMMEN
  {
    $befehl ="update bemerkungen set bem_text='$bemerkung' where bem_tag='$tag'";
    $befehl.=" and bem_saison='$saison' and bem_pokal is not null";
    mysql_query($befehl);
    $tab ="<table>\n";
    $tab.="<tr><th colspan='2'>Daten wurden wie folgt aktualisiert:</th></tr>\n";
    $tab.="<tr><td>Saison:</td><td>".$saison."</td></tr>\n";
    $tab.="<tr><td>Spieltag:</td><td>".$tag."</td></tr>\n";
    $tab.="<tr><td>Bemerkung:</td><td>".$bemerkung."</td></tr>\n";
    $tab.="</table>\n";
    echo $tab;
    echo "<br><a href='admin.pokalbemerkungen.php'>Zur&uuml;ck zur Eingabemaske...</a>\n";
  }
}
else
{
  echo "Ein Fehler ist aufgetreten. Bitte wende Dich an den Webmaster!<br>\n";
  echo "<br><a href='admin.pokalbemerkungen.php'>Zur&uuml;ck zur Eingabemaske...</a>\n";
}

// schließende Klammer für BEMERKUNG EINGEGEBEN
}

// KEINE BEMERKUNG EINGEGEBEN
else{

// TAG GEWÄHLT
if($Tag){

// feststellen, ob an besagtem Spieltag bereits ein Eintrag existiert
$befehl="select * from bemerkungen where bem_tag=$tag and bem_saison=$saison and bem_pokal is not null";
$antwort=mysql_query($befehl);
$exist=mysql_num_rows($antwort);

// wenn vorhanden, Eintrag auslesen
if ($exist == 1 )
{
 $befehl="select bem_text from bemerkungen where bem_tag=$tag and bem_saison=$saison and bem_pokal is not null";
 $antwort=mysql_query($befehl);
 $data=mysql_fetch_array($antwort);
 $eintrag=$data['bem_text'];
}

?>

<form action="admin.pokalbemerkungen.php" method="post" name="Bemerkung">
<table align="center" cellspacing="3"> 
<tr><th>Bemerkungen&nbsp;eingeben</th></tr>
<tr>
                    <td>Saison&nbsp;<b><?php echo $saison ?></b>&nbsp;und Spieltag&nbsp;<b><?php echo $tag ?></b>&nbsp;wurden&nbsp;ausgew&auml;hlt.</td>
                  </tr>
<tr><td>Bitte&nbsp;Bemerkungen&nbsp;eingeben:</td></tr>
<tr>
                    <td> 
                      <textarea name="bemerkung" cols="65" rows="10">
<?php echo $eintrag ?>
</textarea>
                    </td>
                  </tr>
<tr><td>
    <input type="submit" name="Bemerkung" value="eintragen">
    <input type="hidden" name="saison" value="<?php echo $saison ?>">
    <input type="hidden" name="tag" value="<?php echo $tag ?>">
    <input type="hidden" name="exist" value="<?php echo $exist ?>">
</td></tr>
</table>
</form>
              <p>Nein, lieber <a href="admin.pokalbemerkungen.php">zur&uuml;ck zur Eingabemaske...</a></p>
              <p>(Um Bemerkungen wieder zu l&ouml;schen einfach leeres Feld abschicken.)</p>

<?php
// schließende Klammer für TAG GEWÄHLT
}

// TAG NICHT GEWÄHLT
else{

// SAISON GEWÄHLT
if($Saison){

// mögliche Tage herausfinden
$antwort=mysql_query("select distinct tag_index from spieltag where tag_saison=$saison");
?>

<form action="admin.pokalbemerkungen.php" method="post" name="Tag">
                <table align="center" cellspacing="3">
                  <tr><th colspan="2">Bemerkungen&nbsp;eingeben</th></tr>
<tr><td colspan="2">Saison <b><?php echo $saison ?></b> wurde ausgew&auml;hlt.</td></tr>
<tr><td colspan="2">Jetzt bitte Spieltag w&auml;hlen:</td></tr>
<tr>
                    <td align="center"> 
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
                    <td align="center"> 
                      <input type="hidden" name="saison" value="<?php echo $saison ?>">
  <input type="submit" name="Tag" value="w&auml;hlen">
                    </td>
                  </tr>
</table>
</form>
<p>Nein, lieber <a href="admin.bemerkungen.php">zur&uuml;ck zur Eingabemaske...</a></p>

<?php
// schließende Klammer für SAISON GEWÄHLT
}

// SAISON NICHT GEWÄHLT
else{

// mögliche Saisons herausfinden
$antwort=mysql_query("select distinct tag_saison from spieltag order by tag_saison desc");
?> 
<form action="admin.pokalbemerkungen.php" method="post" name="Saison">
                <table cellspacing="3" align="center">
                  <tr><th colspan="2">Bemerkungen&nbsp;eingeben</th><tr>
<tr><td colspan="2">Bitte&nbsp;zuerst&nbsp;Saison&nbsp;w&auml;hlen:</td><tr>
<tr>
                    <td align="center"> 
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
                    <td align="center"> 
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

// schließende Klammer für KEINE BEMERKUNG EINGEGEBEN
}
?>

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
<!--Datenbank schließen -->
<?php mysql_close() ?>
</body>
</html>
