<?php

// aktuelle Amtsinhaber schreiben
function head()
{
 $befehl="select sp_vor,sp_name from spieler where sp_head='1'";
 $antwort=mysql_query($befehl);
 $data=mysql_fetch_array($antwort);
 $name =$data['sp_vor'];
 $name.=" ";
 $name.=$data['sp_name'];
 echo $name;
}

function vice()
{
 $befehl="select sp_vor,sp_name from spieler where sp_vice='1'";
 $antwort=mysql_query($befehl);
 $data=mysql_fetch_array($antwort);
 $name =$data['sp_vor'];
 $name.=" ";
 $name.=$data['sp_name'];
 echo $name;
}

function man()
{
 $befehl="select sp_vor,sp_name from spieler where sp_man='1'";
 $antwort=mysql_query($befehl);
 $data=mysql_fetch_array($antwort);
 $name =$data['sp_vor'];
 $name.=" ";
 $name.=$data['sp_name'];
 echo $name;
}

function cash()
{
 $befehl="select sp_vor,sp_name from spieler where sp_cash='1'";
 $antwort=mysql_query($befehl);
 $data=mysql_fetch_array($antwort);
 $name =$data['sp_vor'];
 $name.=" ";
 $name.=$data['sp_name'];
 echo $name;
}

function pr()
{
 $befehl="select sp_vor,sp_name from spieler where sp_pr='1'";
 $antwort=mysql_query($befehl);
 $data=mysql_fetch_array($antwort);
 $name =$data['sp_vor'];
 $name.=" ";
 $name.=$data['sp_name'];
 echo $name;
}

// Amtsbezeichnung herausfinden
function amt($bez)
{
 if($bez=="sp_head"){$bez="Vorsitzender";}
 if($bez=="sp_vice"){$bez="stellvertretender Vorsitzender";}
 if($bez=="sp_man"){$bez="Ligaleiter";}
 if($bez=="sp_cash"){$bez="Kassenwart";}
 if($bez=="sp_pr"){$bez="Pressewart";}
 return $bez;
}

// Dropdownmenü mit allen Passnummern ausgeben
function pass()
{
 $sql_befehl= "select * from spieler order by sp_pass";
 $antwort=mysql_query($sql_befehl);
 while($data=mysql_fetch_array($antwort))
 {
  $passnr=$data['sp_pass'];
  $spielername=$data['sp_vor']."&nbsp;".$data['sp_name'];
  echo "<option value='".$passnr."'>".$passnr."&nbsp;".$spielername."</option>\n";
 }
}

// Sicherheitsabfrage und eintragen
function safe($nr,$dataneu,$amt)
{
  $pass=$dataneu['sp_pass'];
  $vor=$dataneu['sp_vor'];
  $name=$dataneu['sp_name'];
  $str=$dataneu['sp_str'];
  $plz=$dataneu['sp_plz'];
  $ort=$dataneu['sp_ort'];
  $tel=$dataneu['sp_tel'];
  $head=$dataneu['sp_head'];
  $vice=$dataneu['sp_vice'];
  $man=$dataneu['sp_man'];
  $cash=$dataneu['sp_cash'];
  $pr=$dataneu['sp_pr'];
  $mail=$dataneu['sp_mail'];

  echo "<br>Daten sollen wie folgt eingetragen werden:<br><br>\n";
  echo "<table>\n";
  echo "<tr><th colspan='2'><strong>".amt($amt)."</strong></th></tr>\n";
  echo "<tr><td>Passnummer:</td><td>".$pass."</td></tr>\n";
  echo "<tr><td>Name:</td><td>".$vor." ".$name."</td></tr>\n";
  echo "<tr><td>Stra&szlig;e:</td><td>".$str."</td></tr>\n";
  echo "<tr><td>Postleitzahl:</td><td>".$plz."</td></tr>\n";
  echo "<tr><td>Ort:</td><td>".$ort."</td></tr>\n";
  echo "<tr><td>Telefon:</td><td>".$tel."</td></tr>\n";
  if($mail){echo "<tr><td>eMail:</td><td>".$mail."</td></tr>\n";}
  echo "</table>\n";

  $tail ="?amtgo=eintragen";
  $tail.="&amt=".$amt;
  $tail.="&nr=".$nr;
  $tail.="&pass=".$pass;
  $tail.="&vor=".$vor;
  $tail.="&name=".$name;
  $tail.="&str=".$str;
  $tail.="&plz=".$plz;
  $tail.="&ort=".$ort;
  $tail.="&tel=".$tel;
  if($mail){$tail.="&mail=".$mail;}

  echo "<a href='index.php".$tail."'>ausf&uuml;hren&hellip;</a>\n";
}

// Daten prüfen und ggf. Formular zur Eingabe von Daten ausgeben
function pruef($dataalt,$dataneu,$amt)
{
  $nr=$dataalt['sp_pass'];

  $pass=$dataneu['sp_pass'];
  $vor=$dataneu['sp_vor'];
  $name=$dataneu['sp_name'];
  $str=$dataneu['sp_str'];
  $plz=$dataneu['sp_plz'];
  $ort=$dataneu['sp_ort'];
  $tel=$dataneu['sp_tel'];
  $head=$dataneu['sp_head'];
  $vice=$dataneu['sp_vice'];
  $man=$dataneu['sp_man'];
  $cash=$dataneu['sp_cash'];
  $pr=$dataneu['sp_pr'];
  $mail=$dataneu['sp_mail'];

  if($nr==$pass) // ALT=NEU
  {
    echo "<br><b>Keine &Auml;nderung vorgenommen</b>";
  }
  else // ALT<>NEU
  {
    // SPIELER HAT NOCH KEIN AMT
    if($head<>'1' and $vice<>'1' and $man<>'1' and $cash<>'1' and $pr<>'1')
    {
      if(strlen($str)<1){$fehler ="<br>Stra&szlig;e.";}  
      if(strlen($plz)<5){$fehler.="<br>Postleitzahl.";}  
      if(strlen($ort)<1){$fehler.="<br>Ort.";}  
      if(strlen($tel)<1){$fehler.="<br>Telefonnummer.";}  

      // FEHLENDE EINGABEN NACHHOLEN
      if($fehler)
      {
        echo "<br>Es fehlen noch folgende Angaben:<br>";
        echo "<b>".$fehler."</b><br><br>";

?>

<form method="post" action="index.php" name="Fehldaten">
  <table border="0" cellspacing="1" cellpadding="1">
    <tr> 
      <th colspan="2"><strong><?php echo amt($amt) ?></strong></th>
    </tr>
    <tr> 
      <td>Stra&szlig;e:</td>
      <td>
        <input type="text" name="str" size="30" maxlength="30" value="<?php echo $str ?>">
      </td>
    </tr>
    <tr> 
      <td>Postleitzahl:</td>
      <td>
        <input type="text" name="plz" size="5" maxlength="5" value="<?php echo $plz ?>">
      </td>
    </tr>
    <tr> 
      <td>Ort:</td>
      <td>
        <input type="text" name="ort" size="30" maxlength="30" value="<?php echo $ort ?>">
      </td>
    </tr>
    <tr> 
      <td>Telefon:</td>
      <td>
        <input type="text" name="tel" size="30" maxlength="30" value="<?php echo $tel ?>">
      </td>
    </tr>
    <tr> 
      <td>eMail (freiwillig):</td>
      <td>
        <input type="text" name="mail" size="40" maxlength="40" value="<?php echo $mail ?>">
      </td>
    </tr>
    <tr> 
      <td colspan="2"> 
        <div>
          <input type="submit" name="Fehldaten" value="eintragen">
          <br>
          <input type="hidden" name="amtgo" value="pruefen">
          <input type="hidden" name="amt" value="<?php echo $amt ?>">
          <input type="hidden" name="nr" value="<?php echo $nr ?>">
          <input type="hidden" name="pass" value="<?php echo $pass ?>">
          <input type="hidden" name="vor" value="<?php echo $vor ?>">
          <input type="hidden" name="name" value="<?php echo $name ?>">
        </div>
      </td>
    </tr>
  </table>
</form>

<?php

      }
      else // KEINE FEHLENDEN EINGABEN
      {
        safe($nr,$dataneu,$amt);
      }
    }
    else // SPIELER HAT SCHON AMT
    {
      echo "<br><b>Spieler hat bereits ein Amt inne!</b>";
    }
  }

  echo "<br><br><a href='index.php'>zur&uuml;ck zur Eingabemaske...</a>";

}

// SWITCH EINTRAGEN
switch($amtgo){

case eintragen: // SWITCH

// alten Amtsinhaber entmachten ;-)
$befehl ="update spieler set ";
$befehl.=$amt;
$befehl.="=null where sp_pass='$nr'";
mysql_query($befehl);

// Daten bei neuem Amtsinhaber eintragen
$befehl ="update spieler set ";
$befehl.=$amt;
$befehl.="='1'";
$befehl.=", sp_str='$str'";
$befehl.=", sp_plz='$plz'";
$befehl.=", sp_ort='$ort'";
$befehl.=", sp_tel='$tel'";
if($mail){$befehl.=", sp_mail='$mail'";}
$befehl.=" where sp_pass='$pass'";
mysql_query($befehl);

echo "<b>Daten wurden eingetragen.</b><br><br>\n";

echo "<a href='index.php'>zur&uuml;ck zur Eingabemaske&hellip;</a>\n";

break;

case pruefen:

if(strlen($str)<1){$fehler ="<br>Stra&szlig;e.";}  
if(strlen($plz)<5){$fehler.="<br>Postleitzahl.";}  
if(strlen($ort)<1){$fehler.="<br>Ort.";}  
if(strlen($tel)<1){$fehler.="<br>Telefonnummer.";}  

// DATEN UNVOLLSTÄNDIG
if($fehler)
{
  echo "<br>Die Daten m&uuml;ssen schon korrekt eingegeben werden!<br>\n";
  echo "<br><br><a href='index.php'>also nochmal von vorn...</a>";
}
else //DATEN KORREKT
{
  $dataneu["sp_pass"]=$pass;
  $dataneu["sp_vor"]=$vor;
  $dataneu["sp_name"]=$name;
  $dataneu["sp_str"]=$str;
  $dataneu["sp_plz"]=$plz;
  $dataneu["sp_ort"]=$ort;
  $dataneu["sp_tel"]=$tel;
  $dataneu["sp_head"]=$head;
  $dataneu["sp_vice"]=$vice;
  $dataneu["sp_man"]=$man;
  $dataneu["sp_cash"]=$cash;
  $dataneu["sp_pr"]=$pr;
  $dataneu["sp_mail"]=$mail;

  safe($nr,$dataneu,$amt);
}

break;

default: // SWITCH

// AEMTER WURDE GEKLICKT
if($Head or $Vice or $Man or $Cash or $Pr){

// HEAD ÄNDERN
if($Head)
{
 $amt="sp_head";
 $befehl="select * from spieler where sp_head='1'";
 $antwort=mysql_query($befehl);
 $dataalt=mysql_fetch_array($antwort);
 $befehl="select * from spieler where sp_pass='$head'";
 $antwort=mysql_query($befehl);
 $dataneu=mysql_fetch_array($antwort);
 pruef($dataalt,$dataneu,$amt);
}

if($Vice)
{
 $amt="sp_vice";
 $befehl="select * from spieler where sp_vice='1'";
 $antwort=mysql_query($befehl);
 $dataalt=mysql_fetch_array($antwort);
 $befehl="select * from spieler where sp_pass='$vice'";
 $antwort=mysql_query($befehl);
 $dataneu=mysql_fetch_array($antwort);
 pruef($dataalt,$dataneu,$amt);
}

if($Man)
{
 $amt="sp_man";
 $befehl="select * from spieler where sp_man='1'";
 $antwort=mysql_query($befehl);
 $dataalt=mysql_fetch_array($antwort);
 $befehl="select * from spieler where sp_pass='$man'";
 $antwort=mysql_query($befehl);
 $dataneu=mysql_fetch_array($antwort);
 pruef($dataalt,$dataneu,$amt);
}

if($Cash)
{
 $amt="sp_cash";
 $befehl="select * from spieler where sp_cash='1'";
 $antwort=mysql_query($befehl);
 $dataalt=mysql_fetch_array($antwort);
 $befehl="select * from spieler where sp_pass='$cash'";
 $antwort=mysql_query($befehl);
 $dataneu=mysql_fetch_array($antwort);
 pruef($dataalt,$dataneu,$amt);
}

if($Pr)
{
 $amt="sp_pr";
 $befehl="select * from spieler where sp_pr='1'";
 $antwort=mysql_query($befehl);
 $dataalt=mysql_fetch_array($antwort);
 $befehl="select * from spieler where sp_pass='$pr'";
 $antwort=mysql_query($befehl);
 $dataneu=mysql_fetch_array($antwort);
 pruef($dataalt,$dataneu,$amt);
}

// schließende Klammer für AEMTER WURDE GEKLICKT
}

// AEMTER WURDE NICHT GEKLICKT
else{

?>

              <form method="post" action="index.php" name="aemter">
                <table width="85%" border="0" cellspacing="1" cellpadding="1">
                  <tr> 
                    <th colspan="4"><strong>&Auml;mter zuweisen</strong></th>
                  </tr>
                  <tr> 
                    <td><b>Amt</b></td>
                    <td> 
                      <div align="left"><b>momentan</b></div>
                    </td>
                    <td> 
                      <div align="center"><b>&auml;ndern auf</b></div>
                    </td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr> 
                    <td>Vorsitzender</td>
                    <td><?php head() ?> 
                      <div align="left"></div>
                    </td>
                    <td> 
                      <div align="center"> 
                        <select name="head">
                          <?php pass() ?> 
                        </select>
                      </div>
                    </td>
                    <td> 
                      <input type="submit" name="Head" value="&auml;ndern">
                    </td>
                  </tr>
                  <tr> 
                    <td>stellvertretender Vorsitzender</td>
                    <td><?php vice() ?> 
                      <div align="left"></div>
                    </td>
                    <td> 
                      <div align="center"> 
                        <select name="vice">
                          <?php pass() ?> 
                        </select>
                      </div>
                    </td>
                    <td> 
                      <input type="submit" name="Vice" value="&auml;ndern">
                    </td>
                  </tr>
                  <tr> 
                    <td>Ligaleiter</td>
                    <td><?php man() ?> 
                      <div align="left"></div>
                    </td>
                    <td> 
                      <div align="center"> 
                        <select name="man">
                          <?php pass() ?> 
                        </select>
                      </div>
                    </td>
                    <td> 
                      <input type="submit" name="Man" value="&auml;ndern">
                    </td>
                  </tr>
                  <tr> 
                    <td>Kassenwart</td>
                    <td><?php cash() ?> 
                      <div align="left"></div>
                    </td>
                    <td> 
                      <div align="center"> 
                        <select name="cash">
                          <?php pass() ?> 
                        </select>
                      </div>
                    </td>
                    <td> 
                      <input type="submit" name="Cash" value="&auml;ndern">
                    </td>
                  </tr>
                  <tr> 
                    <td>Pressewart</td>
                    <td><?php pr() ?> 
                      <div align="left"></div>
                    </td>
                    <td> 
                      <div align="center"> 
                        <select name="pr">
                          <?php pass() ?> 
                        </select>
                      </div>
                    </td>
                    <td> 
                      <input type="submit" name="Pr" value="&auml;ndern">
                    </td>
                  </tr>
                </table>
              </form>
              
              <p>Es k&ouml;nnen nicht mehrere &Auml;nderungen gleichzeitig vorgenommen 
                werden, sondern immer nur ein Amt nach dem anderen.</p>

<?php

// schließende Klammer für AEMTER WURDE NICHT GEKLICKT
}

// schließende Klammer für SWITCH EINTRAGEN
}

?>