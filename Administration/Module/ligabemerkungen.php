<?php

// BEMERKUNG EINGEGEBEN
if($Bemerkung){

// NEUER EINTRAG, $exist=0, AKTUALISIERTER EINTRAG, $exist=1, SONST FEHLERMELDUNG
if($exist == 0)
{
  if (strlen($bemerkung)<1)// KEIN EINTRAG VORGENOMMEN
  {
    echo "Es wurde keine &Auml;nderung vorgenommen.<br>\n";
    echo "<br><a href='index.php'>Zur&uuml;ck zur Eingabemaske...</a>\n";
  }
  else // EINTRAG VORGENOMMEN
  {
    $befehl ="insert into bemerkungen (bem_tag, bem_saison, bem_text)";
    $befehl.=" values ('$tag', '$saison', '$bemerkung')";
    mysql_query($befehl);
    $tab ="<table>\n";
    $tab.="<tr><th colspan='2'>Folgende Daten wurden eingetragen:</th></tr>\n";
    $tab.="<tr><td>Saison:</td><td>".$saison."</td></tr>\n";
    $tab.="<tr><td>Spieltag:</td><td>".$tag."</td></tr>\n";
    $tab.="<tr><td>Bemerkung:</td><td>".$bemerkung."</td></tr>\n";
    $tab.="</table>\n";
    echo $tab;
    echo "<br><a href='index.php'>Zur&uuml;ck zur Eingabemaske...</a>\n";
  }
}
else if($exist == 1)
{
  if (strlen($bemerkung)<1)// KEIN EINTRAG VORGENOMMEN
  {
    $befehl ="delete from bemerkungen where bem_tag='$tag' and bem_saison='$saison' and bem_pokal is null";
    mysql_query($befehl);
    echo "Eintrag wurde gel&ouml;scht.<br>\n";
    echo "<br><a href='index.php'>Zur&uuml;ck zur Eingabemaske...</a>\n";
  }
  else // EINTRAG VORGENOMMEN
  {
    $befehl ="update bemerkungen set bem_text='$bemerkung' where bem_tag='$tag'";
    $befehl.=" and bem_saison='$saison' and bem_pokal is null";
    mysql_query($befehl);
    $tab ="<table>\n";
    $tab.="<tr><th colspan='2'>Daten wurden wie folgt aktualisiert:</th></tr>\n";
    $tab.="<tr><td>Saison:</td><td>".$saison."</td></tr>\n";
    $tab.="<tr><td>Spieltag:</td><td>".$tag."</td></tr>\n";
    $tab.="<tr><td>Bemerkung:</td><td>".$bemerkung."</td></tr>\n";
    $tab.="</table>\n";
    echo $tab;
    echo "<br><a href='index.php'>Zur&uuml;ck zur Eingabemaske...</a>\n";
  }
}
else
{
  echo "Ein Fehler ist aufgetreten. Bitte wende Dich an den Webmaster!<br>\n";
  echo "<br><a href='index.php'>Zur&uuml;ck zur Eingabemaske...</a>\n";
}

// schließende Klammer für BEMERKUNG EINGEGEBEN
}

// KEINE BEMERKUNG EINGEGEBEN
else{

// TAG GEWÄHLT
if($Tag){

// feststellen, ob an besagtem Spieltag bereits ein Eintrag existiert
$befehl="select * from bemerkungen where bem_tag=$tag and bem_saison=$saison and bem_pokal is null";
$antwort=mysql_query($befehl);
$exist=mysql_num_rows($antwort);

// wenn vorhanden, Eintrag auslesen
if ($exist == 1 )
{
 $befehl="select bem_text from bemerkungen where bem_tag=$tag and bem_saison=$saison and bem_pokal is null";
 $antwort=mysql_query($befehl);
 $data=mysql_fetch_array($antwort);
 $eintrag=$data['bem_text'];
}

?>

<form action="index.php" method="post" name="Bemerkung">
<table cellspacing="3"> 
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
              <p>Nein, lieber <a href="index.php">zur&uuml;ck zur Eingabemaske...</a></p>
              <p><strong>ACHTUNG! Keine Sicherheitsabfrage!</strong></p>
              <p>(Um Bemerkungen wieder zu l&ouml;schen einfach leeres Feld abschicken.)</p>

<?php
// schließende Klammer für TAG GEWÄHLT
}

// schließende Klammer für KEINE BEMERKUNG EINGEGEBEN
}