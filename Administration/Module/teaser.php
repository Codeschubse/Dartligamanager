<?php

// TEASER EINGEGEBEN
if($Teaser){

// NEUER EINTRAG, $exist=0, AKTUALISIERTER EINTRAG, $exist=1, SONST FEHLERMELDUNG
if($exist == 0)
{
  if (strip_tags($teaser)=="&nbsp;")// KEIN EINTRAG VORGENOMMEN
  {
    echo "Es wurde keine &Auml;nderung vorgenommen.<br>\n";
    echo "<br><a href='index.php'>Zur&uuml;ck zur Eingabemaske...</a>\n";
  }
  else // EINTRAG VORGENOMMEN
  {
    $befehl ="insert into teaser (teaser_text)";
    $befehl.=" values ('$teaser')";
    mysql_query($befehl);
    echo "<h3>Folgender Eintrag wurde vorgenommen:</h3>\n";
    echo "<hr />\n";
    echo $teaser."\n";
    echo "<hr />\n";
    echo "<a href='index.php'>Zur&uuml;ck zur Eingabemaske...</a>\n";
  }
}
else if($exist == 1)
{
  if (strip_tags($teaser)=="&nbsp;")// KEIN EINTRAG VORGENOMMEN
  {
    $befehl ="delete from teaser where teaser_text is not null";
    mysql_query($befehl);
    echo "<h3>Eintrag wurde gel&ouml;scht.</h3>\n";
    echo "<a href='index.php'>Zur&uuml;ck zur Eingabemaske...</a>\n";
  }
  else // EINTRAG VORGENOMMEN
  {
    $befehl ="update teaser set teaser_text='$teaser'";
    mysql_query($befehl);
    echo "<h3>Der Eintrag wurde wie folgt ge&auml;ndert:</h3>\n";
    echo "<hr />\n";
    echo $teaser."\n";
    echo "<hr />\n";
    echo "<a href='index.php'>Zur&uuml;ck zur Eingabemaske...</a>\n";
  }
}
else
{
  echo "<h3>Ein Fehler ist aufgetreten. Bitte wende Dich an den Webmaster!</h3>\n";
  echo "<a href='index.php'>Zur&uuml;ck zur Eingabemaske...</a>\n";
}

// schliessende Klammer fuer TEASER EINGEGEBEN
}

// KEIN TEASER EINGEGEBEN
else{

// feststellen, ob bereits ein Eintrag existiert
$befehl="select teaser_text from teaser";
$antwort=mysql_query($befehl);
$exist=mysql_num_rows($antwort);

// wenn vorhanden, Eintrag auslesen
if ($exist == 1 )
{
 $befehl="select teaser_text from teaser";
 $antwort=mysql_query($befehl);
 $data=mysql_fetch_array($antwort);
 $teaser=$data['teaser_text'];
}

?>

<form action="index.php" method="post" name="Teaser">
<table cellspacing="3"> 
<tr><th><strong>Teaser&nbsp;eingeben</strong></th></tr>
<tr>
                    <td> 
                      <textarea name="teaser" cols="65" rows="10">
<?php echo $teaser ?>
</textarea>
                    </td>
                  </tr>
<tr><td>
    <input type="submit" name="Teaser" value="eintragen">
    <input type="hidden" name="exist" value="<?php echo $exist ?>">
</td></tr>
</table>
</form>
              <p><a href="index.php">&Auml;nderungen verwerfen&hellip;</a></p>
              <p>(Um Teaser wieder zu l&ouml;schen einfach leeres Feld abschicken.)</p>

<?php

//schliessende Klammer fuer KEIN TEASER EINGEGEBEN
}

?>