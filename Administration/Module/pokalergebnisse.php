<?php

// Tabelleneintrag für Ergebnis formatieren, abhängig von vorhandenen Daten
function pokaltabelle($tag,$saison,$heim)
{
 $befehl ="select rr_erg from roundrobin where rr_index=$tag and rr_saison=$saison";
 $befehl.=" and rr_heim='$heim'";
 $antwort=mysql_query($befehl);
 $datatab=mysql_fetch_array($antwort);
 $ergebnis=$datatab['rr_erg'];

 switch($ergebnis)
 {
  case 1:

  $tabelle ="<option value='9'>kein Ergebnis</option>\n";
  $tabelle.="<option value='10'>10:0</option>\n";
  $tabelle.="<option value='8'>9:1</option>\n";
  $tabelle.="<option value='6'>8:2</option>\n";
  $tabelle.="<option value='4'>7:3</option>\n";
  $tabelle.="<option value='2'>6:4</option>\n";
  $tabelle.="<option value='0'>5:5</option>\n";
  $tabelle.="<option value='-2'>4:6</option>\n";
  $tabelle.="<option value='-4'>3:7</option>\n";
  $tabelle.="<option value='-6'>2:8</option>\n";
  $tabelle.="<option value='-8'>1:9</option>\n";
  $tabelle.="<option value='-10'>0:10</option>\n";
  $tabelle.="<option value='-9'>Spielbericht fehlt</option>\n";
  $tabelle.="<option value='1' selected>verlegt</option>\n";
  $tabelle.="<option value='-1'>ohne Wertung</option>\n";

  break;

  case -1:

  $tabelle ="<option value='9'>kein Ergebnis</option>\n";
  $tabelle.="<option value='10'>10:0</option>\n";
  $tabelle.="<option value='8'>9:1</option>\n";
  $tabelle.="<option value='6'>8:2</option>\n";
  $tabelle.="<option value='4'>7:3</option>\n";
  $tabelle.="<option value='2'>6:4</option>\n";
  $tabelle.="<option value='0'>5:5</option>\n";
  $tabelle.="<option value='-2'>4:6</option>\n";
  $tabelle.="<option value='-4'>3:7</option>\n";
  $tabelle.="<option value='-6'>2:8</option>\n";
  $tabelle.="<option value='-8'>1:9</option>\n";
  $tabelle.="<option value='-10'>0:10</option>\n";
  $tabelle.="<option value='-9'>Spielbericht fehlt</option>\n";
  $tabelle.="<option value='1'>verlegt</option>\n";
  $tabelle.="<option value='-1' selected>ohne Wertung</option>\n";

  break;

  case 10:

  $tabelle ="<option value='9'>kein Ergebnis</option>\n";
  $tabelle.="<option value='10' selected>10:0</option>\n";
  $tabelle.="<option value='8'>9:1</option>\n";
  $tabelle.="<option value='6'>8:2</option>\n";
  $tabelle.="<option value='4'>7:3</option>\n";
  $tabelle.="<option value='2'>6:4</option>\n";
  $tabelle.="<option value='0'>5:5</option>\n";
  $tabelle.="<option value='-2'>4:6</option>\n";
  $tabelle.="<option value='-4'>3:7</option>\n";
  $tabelle.="<option value='-6'>2:8</option>\n";
  $tabelle.="<option value='-8'>1:9</option>\n";
  $tabelle.="<option value='-10'>0:10</option>\n";
  $tabelle.="<option value='-9'>Spielbericht fehlt</option>\n";
  $tabelle.="<option value='1'>verlegt</option>\n";
  $tabelle.="<option value='-1'>ohne Wertung</option>\n";

  break;

  case 8:

  $tabelle ="<option value='9'>kein Ergebnis</option>\n";
  $tabelle.="<option value='10'>10:0</option>\n";
  $tabelle.="<option value='8' selected>9:1</option>\n";
  $tabelle.="<option value='6'>8:2</option>\n";
  $tabelle.="<option value='4'>7:3</option>\n";
  $tabelle.="<option value='2'>6:4</option>\n";
  $tabelle.="<option value='0'>5:5</option>\n";
  $tabelle.="<option value='-2'>4:6</option>\n";
  $tabelle.="<option value='-4'>3:7</option>\n";
  $tabelle.="<option value='-6'>2:8</option>\n";
  $tabelle.="<option value='-8'>1:9</option>\n";
  $tabelle.="<option value='-10'>0:10</option>\n";
  $tabelle.="<option value='-9'>Spielbericht fehlt</option>\n";
  $tabelle.="<option value='1'>verlegt</option>\n";
  $tabelle.="<option value='-1'>ohne Wertung</option>\n";

  break;

  case 6:

  $tabelle ="<option value='9'>kein Ergebnis</option>\n";
  $tabelle.="<option value='10'>10:0</option>\n";
  $tabelle.="<option value='8'>9:1</option>\n";
  $tabelle.="<option value='6' selected>8:2</option>\n";
  $tabelle.="<option value='4'>7:3</option>\n";
  $tabelle.="<option value='2'>6:4</option>\n";
  $tabelle.="<option value='0'>5:5</option>\n";
  $tabelle.="<option value='-2'>4:6</option>\n";
  $tabelle.="<option value='-4'>3:7</option>\n";
  $tabelle.="<option value='-6'>2:8</option>\n";
  $tabelle.="<option value='-8'>1:9</option>\n";
  $tabelle.="<option value='-10'>0:10</option>\n";
  $tabelle.="<option value='-9'>Spielbericht fehlt</option>\n";
  $tabelle.="<option value='1'>verlegt</option>\n";
  $tabelle.="<option value='-1'>ohne Wertung</option>\n";

  break;

  case 4:

  $tabelle ="<option value='9'>kein Ergebnis</option>\n";
  $tabelle.="<option value='10'>10:0</option>\n";
  $tabelle.="<option value='8'>9:1</option>\n";
  $tabelle.="<option value='6'>8:2</option>\n";
  $tabelle.="<option value='4' selected>7:3</option>\n";
  $tabelle.="<option value='2'>6:4</option>\n";
  $tabelle.="<option value='0'>5:5</option>\n";
  $tabelle.="<option value='-2'>4:6</option>\n";
  $tabelle.="<option value='-4'>3:7</option>\n";
  $tabelle.="<option value='-6'>2:8</option>\n";
  $tabelle.="<option value='-8'>1:9</option>\n";
  $tabelle.="<option value='-10'>0:10</option>\n";
  $tabelle.="<option value='-9'>Spielbericht fehlt</option>\n";
  $tabelle.="<option value='1'>verlegt</option>\n";
  $tabelle.="<option value='-1'>ohne Wertung</option>\n";

  break;

  case 2:

  $tabelle ="<option value='9'>kein Ergebnis</option>\n";
  $tabelle.="<option value='10'>10:0</option>\n";
  $tabelle.="<option value='8'>9:1</option>\n";
  $tabelle.="<option value='6'>8:2</option>\n";
  $tabelle.="<option value='4'>7:3</option>\n";
  $tabelle.="<option value='2' selected>6:4</option>\n";
  $tabelle.="<option value='0'>5:5</option>\n";
  $tabelle.="<option value='-2'>4:6</option>\n";
  $tabelle.="<option value='-4'>3:7</option>\n";
  $tabelle.="<option value='-6'>2:8</option>\n";
  $tabelle.="<option value='-8'>1:9</option>\n";
  $tabelle.="<option value='-10'>0:10</option>\n";
  $tabelle.="<option value='-9'>Spielbericht fehlt</option>\n";
  $tabelle.="<option value='1'>verlegt</option>\n";
  $tabelle.="<option value='-1'>ohne Wertung</option>\n";

  break;

  case 0:

  $tabelle ="<option value='9'>kein Ergebnis</option>\n";
  $tabelle.="<option value='10'>10:0</option>\n";
  $tabelle.="<option value='8'>9:1</option>\n";
  $tabelle.="<option value='6'>8:2</option>\n";
  $tabelle.="<option value='4'>7:3</option>\n";
  $tabelle.="<option value='2'>6:4</option>\n";
  $tabelle.="<option value='0' selected>5:5</option>\n";
  $tabelle.="<option value='-2'>4:6</option>\n";
  $tabelle.="<option value='-4'>3:7</option>\n";
  $tabelle.="<option value='-6'>2:8</option>\n";
  $tabelle.="<option value='-8'>1:9</option>\n";
  $tabelle.="<option value='-10'>0:10</option>\n";
  $tabelle.="<option value='-9'>Spielbericht fehlt</option>\n";
  $tabelle.="<option value='1'>verlegt</option>\n";
  $tabelle.="<option value='-1'>ohne Wertung</option>\n";

  break;

  case -2:

  $tabelle ="<option value='9'>kein Ergebnis</option>\n";
  $tabelle.="<option value='10'>10:0</option>\n";
  $tabelle.="<option value='8'>9:1</option>\n";
  $tabelle.="<option value='6'>8:2</option>\n";
  $tabelle.="<option value='4'>7:3</option>\n";
  $tabelle.="<option value='2'>6:4</option>\n";
  $tabelle.="<option value='0'>5:5</option>\n";
  $tabelle.="<option value='-2' selected>4:6</option>\n";
  $tabelle.="<option value='-4'>3:7</option>\n";
  $tabelle.="<option value='-6'>2:8</option>\n";
  $tabelle.="<option value='-8'>1:9</option>\n";
  $tabelle.="<option value='-10'>0:10</option>\n";
  $tabelle.="<option value='-9'>Spielbericht fehlt</option>\n";
  $tabelle.="<option value='1'>verlegt</option>\n";
  $tabelle.="<option value='-1'>ohne Wertung</option>\n";

  break;

  case -4:

  $tabelle ="<option value='9'>kein Ergebnis</option>\n";
  $tabelle.="<option value='10'>10:0</option>\n";
  $tabelle.="<option value='8'>9:1</option>\n";
  $tabelle.="<option value='6'>8:2</option>\n";
  $tabelle.="<option value='4'>7:3</option>\n";
  $tabelle.="<option value='2'>6:4</option>\n";
  $tabelle.="<option value='0'>5:5</option>\n";
  $tabelle.="<option value='-2'>4:6</option>\n";
  $tabelle.="<option value='-4' selected>3:7</option>\n";
  $tabelle.="<option value='-6'>2:8</option>\n";
  $tabelle.="<option value='-8'>1:9</option>\n";
  $tabelle.="<option value='-10'>0:10</option>\n";
  $tabelle.="<option value='-9'>Spielbericht fehlt</option>\n";
  $tabelle.="<option value='1'>verlegt</option>\n";
  $tabelle.="<option value='-1'>ohne Wertung</option>\n";

  break;

  case -6:

  $tabelle ="<option value='9'>kein Ergebnis</option>\n";
  $tabelle.="<option value='10'>10:0</option>\n";
  $tabelle.="<option value='8'>9:1</option>\n";
  $tabelle.="<option value='6'>8:2</option>\n";
  $tabelle.="<option value='4'>7:3</option>\n";
  $tabelle.="<option value='2'>6:4</option>\n";
  $tabelle.="<option value='0'>5:5</option>\n";
  $tabelle.="<option value='-2'>4:6</option>\n";
  $tabelle.="<option value='-4'>3:7</option>\n";
  $tabelle.="<option value='-6' selected>2:8</option>\n";
  $tabelle.="<option value='-8'>1:9</option>\n";
  $tabelle.="<option value='-10'>0:10</option>\n";
  $tabelle.="<option value='-9'>Spielbericht fehlt</option>\n";
  $tabelle.="<option value='1'>verlegt</option>\n";
  $tabelle.="<option value='-1'>ohne Wertung</option>\n";

  break;

  case -8:

  $tabelle ="<option value='9'>kein Ergebnis</option>\n";
  $tabelle.="<option value='10'>10:0</option>\n";
  $tabelle.="<option value='8'>9:1</option>\n";
  $tabelle.="<option value='6'>8:2</option>\n";
  $tabelle.="<option value='4'>7:3</option>\n";
  $tabelle.="<option value='2'>6:4</option>\n";
  $tabelle.="<option value='0'>5:5</option>\n";
  $tabelle.="<option value='-2'>4:6</option>\n";
  $tabelle.="<option value='-4'>3:7</option>\n";
  $tabelle.="<option value='-6'>2:8</option>\n";
  $tabelle.="<option value='-8' selected>1:9</option>\n";
  $tabelle.="<option value='-10'>0:10</option>\n";
  $tabelle.="<option value='-9'>Spielbericht fehlt</option>\n";
  $tabelle.="<option value='1'>verlegt</option>\n";
  $tabelle.="<option value='-1'>ohne Wertung</option>\n";
 
  break;

  case -10:

  $tabelle ="<option value='9'>kein Ergebnis</option>\n";
  $tabelle.="<option value='10'>10:0</option>\n";
  $tabelle.="<option value='8'>9:1</option>\n";
  $tabelle.="<option value='6'>8:2</option>\n";
  $tabelle.="<option value='4'>7:3</option>\n";
  $tabelle.="<option value='2'>6:4</option>\n";
  $tabelle.="<option value='0'>5:5</option>\n";
  $tabelle.="<option value='-2'>4:6</option>\n";
  $tabelle.="<option value='-4'>3:7</option>\n";
  $tabelle.="<option value='-6'>2:8</option>\n";
  $tabelle.="<option value='-8'>1:9</option>\n";
  $tabelle.="<option value='-10' selected>0:10</option>\n";
  $tabelle.="<option value='-9'>Spielbericht fehlt</option>\n";
  $tabelle.="<option value='1'>verlegt</option>\n";
  $tabelle.="<option value='-1'>ohne Wertung</option>\n";

  break;

  case -9:

  $tabelle ="<option value='9'>kein Ergebnis</option>\n";
  $tabelle.="<option value='10'>10:0</option>\n";
  $tabelle.="<option value='8'>9:1</option>\n";
  $tabelle.="<option value='6'>8:2</option>\n";
  $tabelle.="<option value='4'>7:3</option>\n";
  $tabelle.="<option value='2'>6:4</option>\n";
  $tabelle.="<option value='0'>5:5</option>\n";
  $tabelle.="<option value='-2'>4:6</option>\n";
  $tabelle.="<option value='-4'>3:7</option>\n";
  $tabelle.="<option value='-6'>2:8</option>\n";
  $tabelle.="<option value='-8'>1:9</option>\n";
  $tabelle.="<option value='-10'>0:10</option>\n";
  $tabelle.="<option value='-9' selected>Spielbericht fehlt</option>\n";
  $tabelle.="<option value='1'>verlegt</option>\n";
  $tabelle.="<option value='-1'>ohne Wertung</option>\n";

  break;

  default:

  $tabelle ="<option value='9' selected>kein Ergebnis</option>\n";
  $tabelle.="<option value='10'>10:0</option>\n";
  $tabelle.="<option value='8'>9:1</option>\n";
  $tabelle.="<option value='6'>8:2</option>\n";
  $tabelle.="<option value='4'>7:3</option>\n";
  $tabelle.="<option value='2'>6:4</option>\n";
  $tabelle.="<option value='0'>5:5</option>\n";
  $tabelle.="<option value='-2'>4:6</option>\n";
  $tabelle.="<option value='-4'>3:7</option>\n";
  $tabelle.="<option value='-6'>2:8</option>\n";
  $tabelle.="<option value='-8'>1:9</option>\n";
  $tabelle.="<option value='-10'>0:10</option>\n";
  $tabelle.="<option value='-9'>Spielbericht fehlt</option>\n";
  $tabelle.="<option value='1'>verlegt</option>\n";
  $tabelle.="<option value='-1'>ohne Wertung</option>\n";
 }

 return $tabelle;
}

// Anzeige formatieren
function pokalresult($tag,$saison,$heim)
{
 $befehl ="select rr_erg from roundrobin where rr_index=$tag and rr_saison=$saison";
 $befehl.=" and rr_heim='$heim'";
 $antwort=mysql_query($befehl);
 $datatab=mysql_fetch_array($antwort);
 $ergebnis=$datatab['rr_erg'];

 switch($ergebnis)
 {
  case 1:
   $result="verlegt";
  break;

  case -1:
   $result="ohne Wertung";
  break;

  case 10:
   $result="10:0";
  break;

  case 8:
   $result="9:1";
  break;

  case 6:
   $result="8:2";
  break;

  case 4:
   $result="7:3";
  break;

  case 2:
   $result="6:4";
  break;

  case 0:
   $result="5:5";
  break;

  case -2:
   $result="4:6";
  break;

  case -4:
   $result="3:7";
  break;

  case -6:
   $result="2:8";
  break;

  case -8:
   $result="1:9";
  break;

  case -10:
   $result="0:10";
  break;

  case -9:
   $result="0:10 k. Spielbericht";
  break;

  default:
   $result="kein Ergebnis";
 }
 
 return $result;
}

// ERGEBNISSE EINGEGEBEN
if($PErg){

// Es können nicht mehr Ergebnisse eingetragen werden als Begegnungen
if($heim0)
{
 $befehl ="update roundrobin set rr_erg=$erg0 where rr_heim='$heim0'";
 $befehl.=" and rr_index=$tag and rr_saison=$saison";
 mysql_query($befehl);

 if($heim1)
 {
  $befehl ="update roundrobin set rr_erg=$erg1 where rr_heim='$heim1'";
  $befehl.=" and rr_index=$tag and rr_saison=$saison";
  mysql_query($befehl);

  if($heim2)
  {
   $befehl ="update roundrobin set rr_erg=$erg2 where rr_heim='$heim2'";
   $befehl.=" and rr_index=$tag and rr_saison=$saison";
   mysql_query($befehl);

   if($heim3)
   {
    $befehl ="update roundrobin set rr_erg=$erg3 where rr_heim='$heim3'";
    $befehl.=" and rr_index=$tag and rr_saison=$saison";
    mysql_query($befehl);

    if($heim4)
    {
     $befehl ="update roundrobin set rr_erg=$erg4 where rr_heim='$heim4'";
     $befehl.=" and rr_index=$tag and rr_saison=$saison";
     mysql_query($befehl);

     if($heim5)
     {
      $befehl ="update roundrobin set rr_erg=$erg5 where rr_heim='$heim5'";
      $befehl.=" and rr_index=$tag and rr_saison=$saison";
      mysql_query($befehl);

      if($heim6)
      {
       $befehl ="update roundrobin set rr_erg=$erg6 where rr_heim='$heim6'";
       $befehl.=" and rr_index=$tag and rr_saison=$saison";
       mysql_query($befehl);

       if($heim7)
       {
        $befehl ="update roundrobin set rr_erg=$erg7 where rr_heim='$heim7'";
        $befehl.=" and rr_index=$tag and rr_saison=$saison";
        mysql_query($befehl);

        if($heim8)
        {
         $befehl ="update roundrobin set rr_erg=$erg8 where rr_heim='$heim8'";
         $befehl.=" and rr_index=$tag and rr_saison=$saison";
         mysql_query($befehl);

         if($heim9)
         {
          $befehl ="update roundrobin set rr_erg=$erg9 where rr_heim='$heim9'";
          $befehl.=" and rr_index=$tag and rr_saison=$saison";
          mysql_query($befehl);
         }
        }
       }
      }
     }
    }
   }
  }
 }
}

// Teams usw auslesen
$befehl="select rr_heim,rr_gast from roundrobin where rr_index=$tag and rr_saison=$saison";
$antwortm=mysql_query($befehl);

$tab ="<table cellspacing='4' align='center'><tr>\n";
$tab.="<th colspan='3'>Folgende Daten wurden eingetragen:</th></tr>\n";
$tab.="<tr><td align='center'><b>Heim</b></td><td>&nbsp;</td>";
$tab.="<td align='center'><b>Gast</b></td></tr>\n";

// Paarungen samt Ergebnis ausgeben
$i=0;
while($data=mysql_fetch_array($antwortm))
{
 $heim[]=$data['rr_heim'];
 $gast[]=$data['rr_gast'];
 $home=teamname($heim[$i]);
 $away=teamname($gast[$i]);

 $tab.="<tr>\n";
 $tab.="<td>";
 $tab.=$home;
 $tab.="</td>\n";
 $tab.="<td align='center'>";
 $tab.=pokalresult($tag,$saison,$heim[$i]);
 $tab.="</td>\n";
 $tab.="<td>";
 $tab.=$away;
 $tab.="</td>\n";
 $tab.="</tr>\n";

 $i++;
}

$tab.="</table>\n";

echo $tab;
echo "<br><a href='index.php'>Zur&uuml;ck zur Eingabemaske...</a>\n";


// schließende Klammer für ERGEBNISSE EINGEGEBEN
}

// KEINE ERGEBNISSE EINGEGEBEN
else{

// TAG GEWÄHLT
if($PTag){

// Heim- und Gastmannschaften auslesen
$befehl="select rr_heim,rr_gast from roundrobin where rr_index=$tag and rr_saison=$saison";
$antwortm=mysql_query($befehl);

?> 
<form method="post" action="index.php" name="PErg">
  <table border="0" cellspacing="5">
    <tr> 
      <th colspan="3"><strong>Spielergebnisse&nbsp;eingeben</strong></th>
    </tr>
    <tr> 
      <td colspan="3"> 
        <div align="center">Saison&nbsp;<b><?php echo $saison ?></b>&nbsp;und 
          Spieltag&nbsp;<b><?php echo $tag ?></b>&nbsp;wurden&nbsp;ausgew&auml;hlt.</div>
      </td>
    </tr>
    <tr> 
      <td> 
        <div><b>Heim</b></div>
      </td>
      <td> 
        <div><b>Ergebnis</b></div>
      </td>
      <td> 
        <div><b>Gast</b></div>
      </td>
    </tr>
    <?php

// Heim- und Gastmannschaften ausgeben und die jeweiligen Ergebnisse
$i=0;
while($data=mysql_fetch_array($antwortm))
{
 $heim[]=$data['rr_heim'];
 $gast[]=$data['rr_gast'];
 $home=teamname($heim[$i]);
 $away=teamname($gast[$i]);

 $tab ="<tr>\n";
 $tab.="<td>\n";
 $tab.=$home."\n";
 $tab.="</td>\n";
 $tab.="<td>\n";
 $tab.="<select name='erg".$i."'>\n";
 $tab.=pokaltabelle($tag,$saison,$heim[$i]);
 $tab.="</select>\n";
 $tab.="</td>\n";
 $tab.="<td>\n";
 $tab.=$away."\n";
 $tab.="<input type='hidden' name='heim".$i."' value='".$heim[$i]."'>\n";
 $tab.="</td>\n";
 $tab.="</tr>\n";

 echo $tab;

 $i++;
}

?> 
    <tr> 
      <td colspan="3" height="35"> 
        <div> 
          <input type="submit" name="PErg" value="eintragen">
          <input type="hidden" name="saison" value="<?php echo $saison ?>">
          <input type="hidden" name="tag" value="<?php echo $tag ?>">
        </div>
      </td>
    </tr>
  </table>
</form>
<p>Nein, lieber <a href="index.php">zur&uuml;ck zur Eingabemaske...</a></p>
              <p><b>Achtung! Keine Sicherheitsabfrage!</b><br>
                Daten werden sofort nach Klicken der 'eintragen'-Schaltfl&auml;che 
                in die Datenbank eingetragen!<?php
// schließende Klammer für TAG GEWÄHLT
}

// TAG NICHT GEWÄHLT
else{

// SAISON GEWÄHLT
if($PSaison){

// mögliche Tage herausfinden
$antwort=mysql_query("select distinct rr_index from roundrobin where rr_saison=$saison");
?> </p>
              <form action="index.php" method="post" name="PTag">
                <table cellspacing="3">
                  <tr>
      <th colspan="2"><strong>Spielergebnisse&nbsp;eingeben</strong></th>
    </tr>
<tr><td colspan="2">Saison <b><?php echo $saison ?></b> wurde ausgew&auml;hlt.</td></tr>
<tr><td colspan="2">Jetzt bitte Spieltag w&auml;hlen:</td></tr>
<tr>
                    <td> 
                      <select name="tag">

<?php
// Tage als Listenpunkte/Listenwerte ausgeben
while($data=mysql_fetch_array($antwort))
{
 $wert=$data['rr_index'];
 echo "<option value='".$wert."'>".$wert."</option>\n";
}
?>

  </select>
                    </td>
                    <td> 
                      <input type="hidden" name="saison" value="<?php echo $saison ?>">
  <input type="submit" name="PTag" value="w&auml;hlen">
                    </td>
                  </tr>
</table>
</form>
<p>Nein, lieber <a href="index.php">zur&uuml;ck zur Eingabemaske...</a></p>

<?php
// schließende Klammer für SAISON GEWÄHLT
}

// SAISON NICHT GEWÄHLT
else{

// mögliche Saisons herausfinden
$antwort=mysql_query("select distinct rr_saison from roundrobin order by rr_saison desc");
?> 
<form action="index.php" method="post" name="PSaison">
                <table cellspacing="3">
                  <tr>
      <th colspan="2"><strong>Spielergebnisse&nbsp;eingeben</strong></th>
    <tr>
<tr><td colspan="2">Bitte&nbsp;zuerst&nbsp;Saison&nbsp;w&auml;hlen:</td><tr>
<tr>
                    <td> 
                      <select name="saison">
                        <?php
        // Saisons als Listenpunkte/Listenwerte ausgeben
        while($data=mysql_fetch_array($antwort))
        {
          $wert=$data['rr_saison'];
          echo "<option value='".$wert."'>".$wert."</option>\n";
        }
    ?> 
                      </select>
                    </td>                    
                    <td> 
                      <input type="submit" name="PSaison" value="w&auml;hlen">
                    </td>
                  </tr>
</table>
</form>

<?php
// schließende Klammer für SAISON NICHT GEWÄHLT
}

// schließende Klammer für TAG NICHT GEWÄHLT
}

// schließende Klammer für KEINE ERGEBNISSE EINGEGEBEN
}
?>