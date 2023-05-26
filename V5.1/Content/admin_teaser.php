<?php
include ("Components/mysql.php");
require_once("Components/proof_session.php");

// BEMERKUNG EINGEGEBEN
if($Teaser){

// NEUER EINTRAG, $exist=0, AKTUALISIERTER EINTRAG, $exist=1, SONST FEHLERMELDUNG
if($exist == 0)
{
  if (strlen($teaser)<1)// KEIN EINTRAG VORGENOMMEN
  {
    echo "Es wurde keine &Auml;nderung vorgenommen.<br>\n";
    echo "<br><a href=javascript:history.back(1)>zur&uuml;ck...</a>\n";
  }
  else // EINTRAG VORGENOMMEN
  {
    $befehl ="insert into teaser (teaser_text)";
    $befehl.=" values ('$teaser')";
    mysql_query($befehl);
    $tab ="Folgende Daten wurden eingetragen:\n";
    $tab.="<br>Teasertext: ".$teaser."\n";
    echo $tab;
    echo "<br><a href='".$php_self."'>zur&uuml;ck...</a>\n";
  }
}
else if($exist == 1)
{
  if (strlen($teaser)<1)// KEIN EINTRAG VORGENOMMEN
  {
    $befehl ="delete from teaser where teaser_text is not null";
    mysql_query($befehl);
    echo "Eintrag wurde gel&ouml;scht.<br>\n";
    echo "<br><a href='".$php_self."'>zur&uuml;ck...</a>\n";
  }
  else // EINTRAG VORGENOMMEN
  {
    $befehl ="update teaser set teaser_text='$teaser'";
    mysql_query($befehl);
    $tab ="Daten wurden wie folgt aktualisiert:\n";
    $tab.="<br>Teaser-Text:".$teaser."\n";
    echo $tab;
    echo "<br><a href='".$php_self."'>zur&uuml;ck...</a>\n";
  }
}
else
{
  echo "Ein Fehler ist aufgetreten. Bitte wende Dich an den Webmaster!<br>\n";
  echo "<br><a href=javascript:history.back(1)>zur&uuml;ck...</a>\n";
}

// schliessende Klammer fuer BEMERKUNG EINGEGEBEN
}

// KEINE BEMERKUNG EINGEGEBEN
else{

// feststellen, ob an besagtem Spieltag bereits ein Eintrag existiert
$befehl="select * from teaser";
$antwort=mysql_query($befehl);
$exist=mysql_num_rows($antwort);

// wenn vorhanden, Eintrag auslesen
if ($exist == 1 )
{
 $befehl="select teaser_text from teaser";
 $antwort=mysql_query($befehl);
 $data=mysql_fetch_array($antwort);
 $eintrag=$data['teaser_text'];
}

?>

<form action="<?php $php_self ?>" method="post" name="Teaser">
<table align="center" cellspacing="3"> 
<tr><th>Teaser&nbsp;eingeben</th></tr>

<tr><td>Bitte&nbsp;Teasertext&nbsp;eingeben:</td></tr>
<tr>
                    <td> 
                      <textarea name="teaser" cols="65" rows="10">
<?php echo $eintrag ?>
</textarea>
                    </td>
                  </tr>
<tr><td>
    <input type="submit" name="Teaser" value="eintragen">
    <input type="hidden" name="exist" value="<?php echo $exist ?>">
</td></tr>
</table>
</form>
              <p>Nein, lieber <a href=javascript:history.back(1)>zur&uuml;ck...</a></p>
              <p>(Um Bemerkungen wieder zu l&ouml;schen einfach leeres Feld abschicken.)</p>

<?php

// schliessende Klammer fuer KEINE BEMERKUNG EINGEGEBEN
}

mysql_close();
?>