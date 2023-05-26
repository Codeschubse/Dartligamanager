<?php

// Optionsschaltflächenauflistung als Funktion
function option()
{
  for($zähler = 100; $zähler < 171; $zähler++)
  {
    $not=array(159,162,163,165,166,168,169); 
    if(in_array($zähler,$not))
    { 
      continue;
    }
    echo "<option value='".$zähler."'>".$zähler."</option>\n";
  }
}

// MAX EINGEGEBEN
if($Max){

$tab ="<table cellspacing='3'>\n";
$tab.="<tr><th colspan='2'>Folgende Daten wurden eingetragen:</th></tr>\n";
$tab.="<tr><td>Saison:</td><td><b>".$saison."</b></td></tr>\n";
$tab.="<tr><td>Spieltag:</td><td><b>".$tag."</b></td></tr>\n";
$tab.="<tr><td>Pa&szlig;nummer:</td><td><b>".$pass."</b></td></tr>\n";


// WURDEN 180'er GEWORFEN
if($max!="-")
{
 $befehl ="insert into max (max_max, max_tag, max_saison, max_pass)";
 $befehl.=" values ('$max', '$tag', '$saison', '$pass')";
 mysql_query($befehl);
 $tab.="<tr><td>Anzahl 180er:</td><td><b>".$max."</b></td></tr>\n";
}

// WURDEN HIFI GEWORFEN (1-7)
if($hifi1!="-")
{
 $befehl ="insert into max (max_hifi, max_tag, max_saison, max_pass)";
 $befehl.=" values ('$hifi1', '$tag', '$saison', '$pass')";
 mysql_query($befehl);
 $tab.="<tr><td>High Finish:</td><td><b>".$hifi1."</b></td></tr>\n";

 if($hifi2!="-")
 {
  $befehl ="insert into max (max_hifi, max_tag, max_saison, max_pass)";
  $befehl.=" values ('$hifi2', '$tag', '$saison', '$pass')";
  mysql_query($befehl);
  $tab.="<tr><td>2. High Finish:</td><td><b>".$hifi2."</b></td></tr>\n";

  if($hifi3!="-")
  {
   $befehl ="insert into max (max_hifi, max_tag, max_saison, max_pass)";
   $befehl.=" values ('$hifi3', '$tag', '$saison', '$pass')";
   mysql_query($befehl);
   $tab.="<tr><td>3. High Finish:</td><td><b>".$hifi3."</b></td></tr>\n";

   if($hifi4!="-")
   {
    $befehl ="insert into max (max_hifi, max_tag, max_saison, max_pass)";
    $befehl.=" values ('$hifi4', '$tag', '$saison', '$pass')";
    mysql_query($befehl);
    $tab.="<tr><td>4. High Finish:</td><td><b>".$hifi4."</b></td></tr>\n";

    if($hifi5!="-")
    {
     $befehl ="insert into max (max_hifi, max_tag, max_saison, max_pass)";
     $befehl.=" values ('$hifi5', '$tag', '$saison', '$pass')";
     mysql_query($befehl);
     $tab.="<tr><td>5. High Finish:</td><td><b>".$hifi5."</b></td></tr>\n";

     if($hifi6!="-")
     {
      $befehl ="insert into max (max_hifi, max_tag, max_saison, max_pass)";
      $befehl.=" values ('$hifi6', '$tag', '$saison', '$pass')";
      mysql_query($befehl);
      $tab.="<tr><td>6. High Finish:</td><td><b>".$hifi6."</b></td></tr>\n";

      if($hifi7!="-")
      {
       $befehl ="insert into max (max_hifi, max_tag, max_saison, max_pass)";
       $befehl.=" values ('$hifi7', '$tag', '$saison', '$pass')";
       mysql_query($befehl);
       $tab.="<tr><td>7. High Finish:</td><td><b>".$hifi7."</b></td></tr>\n";
      }
     }
    }
   }
  }
 }
}

$tab.="</table>\n";

echo $tab;
echo "<br><a href='index.php'>Zur&uuml;ck zur Eingabemaske...</a>\n";


// schließende Klammer für MAX EINGEGEBEN
}

// KEINE MAX EINGEGEBEN
else{

// TAG GEWÄHLT
if($Tag){

?>

<form action="index.php" method="post" name="Max">
  <table cellspacing="3">
    <tr> 
      <th colspan="7"><strong>180'er/High&nbsp;Finishs&nbsp;eingeben</strong></th>
    </tr>
    <tr> 
      <td colspan="7">Saison&nbsp;<b><?php echo $saison ?></b>&nbsp;und Spieltag&nbsp;<b><?php echo $tag ?></b>&nbsp;wurden&nbsp;ausgew&auml;hlt.</td>
    </tr>
    <tr>
      <td colspan="7"><b>Bitte&nbsp;Pa&szlig;nummer&nbsp;eingeben:</b></td>
    </tr>
    <tr>
      <td colspan="7">

<?php
$befehl="select sp_pass from spieler where sp_team!='vac' order by sp_pass";
$antwort=mysql_query($befehl);
echo "<select name='pass'>\n";
while($data=mysql_fetch_array($antwort)){
$pass=$data['sp_pass'];
echo "<option value='".$pass."'>".$pass."</option>\n";
}
echo "</select>\n";
?>

      </td>
    </tr>
    <tr> 
      <td colspan="7"><b>Bitte&nbsp;Anzahl&nbsp;180'er&nbsp;eingeben:</b></td>
    </tr>
    <tr> 
      <td colspan="7"> 
        <select name="max">
          <option value="-" selected>-</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="17">18</option>
          <option value="17">19</option>
          <option value="17">20</option>
          <option value="17">21</option>
          <option value="17">22</option>
          <option value="17">23</option>
          <option value="17">24</option>
          <option value="17">25</option>
        </select>
      </td>
    </tr>
    <tr> 
      <td colspan="7"><b>Bitte High Finishs eingeben:</b></td>
    </tr>
    <tr> 
      <td> 
        <select name="hifi1">
          <option value="-" selected>-</option>
          <?php option() ?> 
        </select>
      </td>
      <td> 
        <select name="hifi2">
          <option value="-" selected>-</option>
          <?php option() ?> 
        </select>
      </td>
      <td> 
        <select name="hifi3">
          <option value="-" selected>-</option>
          <?php option() ?> 
        </select>
      </td>
      <td> 
        <select name="hifi4">
          <option value="-" selected>-</option>
          <?php option() ?> 
        </select>
      </td>
      <td> 
        <select name="hifi5">
          <option value="-" selected>-</option>
          <?php option() ?> 
        </select>
      </td>
      <td> 
        <select name="hifi6">
          <option value="-" selected>-</option>
          <?php option() ?> 
        </select>
      </td>
      <td> 
        <select name="hifi7">
          <option value="-" selected>-</option>
          <?php option() ?> 
        </select>
      </td>
    </tr>
    <tr> 
      <td colspan="7"> 
        <input type="submit" name="Max" value="eintragen">
        <input type="hidden" name="saison" value="<?php echo $saison ?>">
        <input type="hidden" name="tag" value="<?php echo $tag ?>">
      </td>
    </tr>
  </table>
</form>
<p>Nein, lieber <a href="index.php">zur&uuml;ck zur Eingabemaske...</a></p>
<p><b>ACHTUNG! Keine Sicherheitsabfrage!</b></p>

<?php
// schließende Klammer für TAG GEWÄHLT
}

// schließende Klammer für KEINE MAX EINGEGEBEN
}
?>