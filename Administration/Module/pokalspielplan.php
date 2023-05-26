<?php

// SICHERHEITSABFRAGE
switch ($do){

// AUSFÜHREN WURDE GEKLICKT
case "eintragen":

if ($heim1!=$gast1)
{
 $befehl ="insert into roundrobin (rr_index,rr_heim,rr_gast,rr_datum,rr_saison,rr_erg";
 if($gruppe!="null")
 {
  $befehl.=",rr_gruppe";
 }
 $befehl.=")";
 $befehl.=" values ('$tag','$heim1','$gast1','$datum','$saison','9'";
 if($gruppe!="null")
 {
  $befehl.=",'$gruppe'";
 }
 $befehl.=")";
 mysql_query($befehl);
}

if ($heim2!=$gast2)
{
 $befehl ="insert into roundrobin (rr_index,rr_heim,rr_gast,rr_datum,rr_saison,rr_erg";
 if($gruppe!="null")
 {
  $befehl.=",rr_gruppe";
 }
 $befehl.=")";
 $befehl.=" values ('$tag','$heim2','$gast2','$datum','$saison','9'";
 if($gruppe!="null")
 {
  $befehl.=",'$gruppe'";
 }
 $befehl.=")";
 mysql_query($befehl);
}

if ($heim3!=$gast3)
{
 $befehl ="insert into roundrobin (rr_index,rr_heim,rr_gast,rr_datum,rr_saison,rr_erg";
 if($gruppe!="null")
 {
  $befehl.=",rr_gruppe";
 }
 $befehl.=")";
 $befehl.=" values ('$tag','$heim3','$gast3','$datum','$saison','9'";
 if($gruppe!="null")
 {
  $befehl.=",'$gruppe'";
 }
 $befehl.=")";
 mysql_query($befehl);
}

if ($heim4!=$gast4)
{
 $befehl ="insert into roundrobin (rr_index,rr_heim,rr_gast,rr_datum,rr_saison,rr_erg";
 if($gruppe!="null")
 {
  $befehl.=",rr_gruppe";
 }
 $befehl.=")";
 $befehl.=" values ('$tag','$heim4','$gast4','$datum','$saison','9'";
 if($gruppe!="null")
 {
  $befehl.=",'$gruppe'";
 }
 $befehl.=")";
 mysql_query($befehl);
}

if ($heim5!=$gast5)
{
 $befehl ="insert into roundrobin (rr_index,rr_heim,rr_gast,rr_datum,rr_saison,rr_erg";
 if($gruppe!="null")
 {
  $befehl.=",rr_gruppe";
 }
 $befehl.=")";
 $befehl.=" values ('$tag','$heim5','$gast5','$datum','$saison','9'";
 if($gruppe!="null")
 {
  $befehl.=",'$gruppe'";
 }
 $befehl.=")";
 mysql_query($befehl);
}

if ($heim6!=$gast6)
{
 $befehl ="insert into roundrobin (rr_index,rr_heim,rr_gast,rr_datum,rr_saison,rr_erg";
 if($gruppe!="null")
 {
  $befehl.=",rr_gruppe";
 }
 $befehl.=")";
 $befehl.=" values ('$tag','$heim6','$gast6','$datum','$saison','9'";
 if($gruppe!="null")
 {
  $befehl.=",'$gruppe'";
 }
 $befehl.=")";
 mysql_query($befehl);
}

if ($heim7!=$gast7)
{
 $befehl ="insert into roundrobin (rr_index,rr_heim,rr_gast,rr_datum,rr_saison,rr_erg";
 if($gruppe!="null")
 {
  $befehl.=",rr_gruppe";
 }
 $befehl.=")";
 $befehl.=" values ('$tag','$heim7','$gast7','$datum','$saison','9'";
 if($gruppe!="null")
 {
  $befehl.=",'$gruppe'";
 }
 $befehl.=")";
 mysql_query($befehl);
}

if ($heim8!=$gast8)
{
 $befehl ="insert into roundrobin (rr_index,rr_heim,rr_gast,rr_datum,rr_saison,rr_erg";
 if($gruppe!="null")
 {
  $befehl.=",rr_gruppe";
 }
 $befehl.=")";
 $befehl.=" values ('$tag','$heim8','$gast8','$datum','$saison','9'";
 if($gruppe!="null")
 {
  $befehl.=",'$gruppe'";
 }
 $befehl.=")";
 mysql_query($befehl);
}

if ($heim9!=$gast9)
{
 $befehl ="insert into roundrobin (rr_index,rr_heim,rr_gast,rr_datum,rr_saison,rr_erg";
 if($gruppe!="null")
 {
  $befehl.=",rr_gruppe";
 }
 $befehl.=")";
 $befehl.=" values ('$tag','$heim9','$gast9','$datum','$saison','9'";
 if($gruppe!="null")
 {
  $befehl.=",'$gruppe'";
 }
 $befehl.=")";
 mysql_query($befehl);
}

if ($heim10!=$gast10)
{
 $befehl ="insert into roundrobin (rr_index,rr_heim,rr_gast,rr_datum,rr_saison,rr_erg";
 if($gruppe!="null")
 {
  $befehl.=",rr_gruppe";
 }
 $befehl.=")";
 $befehl.=" values ('$tag','$heim10','$gast10','$datum','$saison','9'";
 if($gruppe!="null")
 {
  $befehl.=",'$gruppe'";
 }
 $befehl.=")";
 mysql_query($befehl);
}

echo "<b>Folgende Daten wurden in die Datenbank geschrieben:</b><br><br>\n";

$tab ="<table cellspacing='2'>\n";
$tab.="<tr>\n";
$tab.="<th colspan='2'>Begegnungen";
if($gruppe!="null")
{
 $tab.=" der Gruppe ".$gruppe;
}
$tab.=" f&uuml;r:<br>Saison ".$saison.", Spieltag ".$tag." (".$datum.")\n";
$tab.="</tr>\n";
$tab.="<tr>\n";
$tab.="<td><b>Heim:</b></td><td><b>Gast:</b></td>\n";
$tab.="</tr>\n";

if ($heim1!=$gast1)
{
 $tab.="<tr><td>".team_name($heim1)."</td><td>".team_name($gast1)."</td></tr>\n";
}

if ($heim2!=$gast2)
{
 $tab.="<tr><td>".team_name($heim2)."</td><td>".team_name($gast2)."</td></tr>\n";
}

if ($heim3!=$gast3)
{
 $tab.="<tr><td>".team_name($heim3)."</td><td>".team_name($gast3)."</td></tr>\n";
}

if ($heim4!=$gast4)
{
 $tab.="<tr><td>".team_name($heim4)."</td><td>".team_name($gast4)."</td></tr>\n";
}

if ($heim5!=$gast5)
{
 $tab.="<tr><td>".team_name($heim5)."</td><td>".team_name($gast5)."</td></tr>\n";
}

if ($heim6!=$gast6)
{
 $tab.="<tr><td>".team_name($heim6)."</td><td>".team_name($gast6)."</td></tr>\n";
}

if ($heim7!=$gast7)
{
 $tab.="<tr><td>".team_name($heim7)."</td><td>".team_name($gast7)."</td></tr>\n";
}

if ($heim8!=$gast8)
{
 $tab.="<tr><td>".team_name($heim8)."</td><td>".team_name($gast8)."</td></tr>\n";
}

if ($heim9!=$gast9)
{
 $tab.="<tr><td>".team_name($heim9)."</td><td>".team_name($gast9)."</td></tr>\n";
}

if ($heim10!=$gast10)
{
 $tab.="<tr><td>".team_name($heim10)."</td><td>".team_name($gast10)."</td></tr>\n";
}

$tab.="</table><br>\n";

echo $tab;
echo "<br><br><a href='index.php'>zur&uuml;ck zur Eingabemaske</a>\n";

break;

// AUSFÜHREN WURDE NICHT GEKLICKT
default:

// SENDENSCHALTFLÄCHE WURDE GEDRÜCKT - hier weiter, sonst weiter bei ELSE
if ($Pokalspielplan){

$datum=$djahr."-".$dmonat."-".$dtag;

echo "<b>Folgende Daten sollen in die Datenbank geschrieben werden:</b><br><br>\n";

$tab ="<table cellspacing='2'>\n";
$tab.="<tr>\n";
$tab.="<th colspan='2'>Begegnungen";
if($gruppe!="null")
{
 $tab.=" der Gruppe ".$gruppe;
}
$tab.=" f&uuml;r:<br>Saison ".$saison.", Spieltag ".$tag." (".$datum.")\n";
$tab.="</tr>\n";
$tab.="<tr>\n";
$tab.="<td><b>Heim:</b></td><td><b>Gast:</b></td>\n";
$tab.="</tr>\n";
if ($heim1!=$gast1)
{
 $tab.="<tr><td>".team_name($heim1)."</td><td>".team_name($gast1)."</td></tr>\n";
}

if ($heim2!=$gast2)
{
 $tab.="<tr><td>".team_name($heim2)."</td><td>".team_name($gast2)."</td></tr>\n";
}

if ($heim3!=$gast3)
{
 $tab.="<tr><td>".team_name($heim3)."</td><td>".team_name($gast3)."</td></tr>\n";
}

if ($heim4!=$gast4)
{
 $tab.="<tr><td>".team_name($heim4)."</td><td>".team_name($gast4)."</td></tr>\n";
}

if ($heim5!=$gast5)
{
 $tab.="<tr><td>".team_name($heim5)."</td><td>".team_name($gast5)."</td></tr>\n";
}

if ($heim6!=$gast6)
{
 $tab.="<tr><td>".team_name($heim6)."</td><td>".team_name($gast6)."</td></tr>\n";
}

if ($heim7!=$gast7)
{
 $tab.="<tr><td>".team_name($heim7)."</td><td>".team_name($gast7)."</td></tr>\n";
}

if ($heim8!=$gast8)
{
 $tab.="<tr><td>".team_name($heim8)."</td><td>".team_name($gast8)."</td></tr>\n";
}

if ($heim9!=$gast9)
{
 $tab.="<tr><td>".team_name($heim9)."</td><td>".team_name($gast9)."</td></tr>\n";
}

if ($heim10!=$gast10)
{
 $tab.="<tr><td>".team_name($heim10)."</td><td>".team_name($gast10)."</td></tr>\n";
}
$tab.="</table><br>\n";

echo $tab;

$anhang ="?do=eintragen";
$anhang.="&saison=".$saison;
$anhang.="&tag=".$tag;
$anhang.="&gruppe=".$gruppe;
$anhang.="&datum=".$datum;
$anhang.="&heim1=".$heim1;
$anhang.="&gast1=".$gast1;
$anhang.="&heim2=".$heim2;
$anhang.="&gast2=".$gast2;
$anhang.="&heim3=".$heim3;
$anhang.="&gast3=".$gast3;
$anhang.="&heim4=".$heim4;
$anhang.="&gast4=".$gast4;
$anhang.="&heim5=".$heim5;
$anhang.="&gast5=".$gast5;
$anhang.="&heim6=".$heim6;
$anhang.="&gast6=".$gast6;
$anhang.="&heim7=".$heim7;
$anhang.="&gast7=".$gast7;
$anhang.="&heim8=".$heim8;
$anhang.="&gast8=".$gast8;
$anhang.="&heim9=".$heim9;
$anhang.="&gast9=".$gast9;
$anhang.="&heim10=".$heim10;
$anhang.="&gast10=".$gast10;

echo "<br><br><a href='index.php".$anhang."'>ausf&uuml;hren!</a>\n";
echo "<br><br><a href='index.php'>zur&uuml;ck zur Eingabemaske</a>\n";

?>

<p align="left"><b>Achtung!</b></p>
<p align="left">Bitte Daten genau kontrollieren vor dem Ausf&uuml;hren.
Bisher ist noch keine automatische Kontrolle 
programmiert, die verhindert, da&szlig; Spieltage oder Paarungen o. &auml;. 
doppelt eingegeben werden.</p>

<?php

// schließende Klammer für SENDENSCHALTFLÄCHE WURDE GEDRÜCKT
}

// SENDENSCHALTFLÄCHE WURDE NICHT GEDRÜCKT
else{

?>

                <form method="post" action="index.php" name="Pokalspieltag">
                  <table border="0">
                    <tr> 
                      <th colspan="4"><strong>Spielplan eingeben</strong></th>
                    </tr>
                    <tr> 
                      <th>Saison</th>
                      <th>Spieltag</th>
                      <th>Gruppe</th>
                      <th>Datum</th>
                    </tr>
                    <tr> 
                      <td rowspan="10" valign="top"> 
                        <div> 
                          <select name="saison">
                            <?php

echo "<option selected value='$jahr'>".$jahr."</option>\n";
/* Falls vergangene Saisonspieltage nachgetragen werden sollen, dann diese Bemerkung entfernen und dadurch Block aktivieren
// saisons und aktuelles jahr ausgeben
while($data_saison=mysql_fetch_array($antwort)){
$autojahr=$data_saison['rr_saison'];
if ($autojahr!=$jahr){
echo "<option value='$autojahr'>".$autojahr."</option>\n";
}}*/

?> 
                          </select>
                        </div>
                      </td>
                      <td rowspan="10" valign="top"> 
                        <div> 
                          <select name="tag">
                            <option value="1" selected>1</option>
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
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                          </select>
                        </div>
                      </td>
                      <td rowspan="10" valign="top"> 
                        <div>
                          <select name="gruppe">
                            <option value="A" selected>Gruppe A</option>
                            <option value="B">Gruppe B</option>
                            <option value="C">Gruppe C</option>
                            <option value="D">Gruppe D</option>
                            <option value="E">Gruppe E</option>
                            <option value="F">Gruppe F</option>
                            <option value="G">Gruppe G</option>
                            <option value="H">Gruppe H</option>
                            <option value="I">Gruppe I</option>
                            <option value="J">Gruppe J</option>
                          </select>
                        </div>
                      </td>
                      <td rowspan="10" valign="top">
                        <select name="dtag">
                          <option value="01">1.</option>
                          <option value="02">2.</option>
                          <option value="03">3.</option>
                          <option value="04">4.</option>
                          <option value="05">5.</option>
                          <option value="06">6.</option>
                          <option value="07">7.</option>
                          <option value="08">8.</option>
                          <option value="09">9.</option>
                          <option value="10">10.</option>
                          <option value="11">11.</option>
                          <option value="12">12.</option>
                          <option value="13">13.</option>
                          <option value="14">14.</option>
                          <option value="15">15.</option>
                          <option value="16">16.</option>
                          <option value="17">17.</option>
                          <option value="18">18.</option>
                          <option value="19">19.</option>
                          <option value="20">20.</option>
                          <option value="21">21.</option>
                          <option value="22">22.</option>
                          <option value="23">23.</option>
                          <option value="24">24.</option>
                          <option value="25">25.</option>
                          <option value="26">26.</option>
                          <option value="27">27.</option>
                          <option value="28">28.</option>
                          <option value="29">29.</option>
                          <option value="30">30.</option>
                          <option value="31">31.</option>
                        </select>
                        <select name="dmonat">
                          <option value="01">1.</option>
                          <option value="02">2.</option>
                          <option value="03">3.</option>
                          <option value="04">4.</option>
                          <option value="05">5.</option>
                          <option value="06">6.</option>
                          <option value="07">7.</option>
                          <option value="08">8.</option>
                          <option value="09">9.</option>
                          <option value="10">10.</option>
                          <option value="11">11.</option>
                          <option value="12">12.</option>
                        </select>
                        <select name="djahr">
                          <?php


echo "<option value='$jahrfolgend'>".$jahrfolgend."</option>\n";
echo "<option selected value='$jahr'>".$jahr."</option>\n";

//wenn Spieltage in vergangenen Jahren nachgetragen werden sollen die folgenden Zeilen
//durch entfernen von /* und */ aktivieren:
/*
// vergangene Saisons herausfinden
$befehl="SELECT DISTINCT rr_saison FROM roundrobin order by rr_saison desc";
$antwort=mysql_query($befehl);

// saisons und aktuelles jahr ausgeben
while($data_saison=mysql_fetch_array($antwort)){
$autojahr=$data_saison['rr_saison'];
if ($autojahr!=$jahr){
echo "<option value='$autojahr'>".$autojahr."</option>\n";
}}*/

?> 
                        </select>
                      </td>
                    </tr>
                    <tr> </tr>
                    <tr> </tr>
                    <tr> </tr>
                    <tr> </tr>
                    <tr> </tr>
                    <tr> </tr>
                    <tr> </tr>
                    <tr> </tr>
                    <tr> </tr>
                    <tr> 
                      <td colspan="4"> 
                        <table>
                          <tr> 
                            <th>Heim</th>
                            <th>Gast</th>
                          </tr>
                          <tr> 
                            <td> 
                              <select name="heim1">
                                <?php list_teams(); ?> 
                              </select>
                            </td>
                            <td> 
                              <select name="gast1">
                                <?php list_teams(); ?> 
                              </select>
                            </td>
                          </tr>
                          <tr> 
                            <td> 
                              <select name="heim2">
                                <?php list_teams(); ?> 
                              </select>
                            </td>
                            <td> 
                              <select name="gast2">
                                <?php list_teams(); ?> 
                              </select>
                            </td>
                          </tr>
                          <tr> 
                            <td> 
                              <select name="heim3">
                                <?php list_teams(); ?> 
                              </select>
                            </td>
                            <td> 
                              <select name="gast3">
                                <?php list_teams(); ?> 
                              </select>
                            </td>
                          </tr>
                          <tr> 
                            <td> 
                              <select name="heim4">
                                <?php list_teams(); ?> 
                              </select>
                            </td>
                            <td> 
                              <select name="gast4">
                                <?php list_teams(); ?> 
                              </select>
                            </td>
                          </tr>
                          <tr> 
                            <td> 
                              <select name="heim5">
                                <?php list_teams(); ?> 
                              </select>
                            </td>
                            <td> 
                              <select name="gast5">
                                <?php list_teams(); ?> 
                              </select>
                            </td>
                          </tr>
                          <tr> 
                            <td> 
                              <select name="heim6">
                                <?php list_teams(); ?> 
                              </select>
                            </td>
                            <td> 
                              <select name="gast6">
                                <?php list_teams(); ?> 
                              </select>
                            </td>
                          </tr>
                          <tr> 
                            <td> 
                              <select name="heim7">
                                <?php list_teams(); ?> 
                              </select>
                            </td>
                            <td> 
                              <select name="gast7">
                                <?php list_teams(); ?> 
                              </select>
                            </td>
                          </tr>
                          <tr> 
                            <td> 
                              <select name="heim8">
                                <?php list_teams(); ?> 
                              </select>
                            </td>
                            <td> 
                              <select name="gast8">
                                <?php list_teams(); ?> 
                              </select>
                            </td>
                          </tr>
                          <tr> 
                            <td> 
                              <select name="heim9">
                                <?php list_teams(); ?> 
                              </select>
                            </td>
                            <td> 
                              <select name="gast9">
                                <?php list_teams(); ?> 
                              </select>
                            </td>
                          </tr>
                          <tr> 
                            <td> 
                              <select name="heim10">
                                <?php list_teams(); ?> 
                              </select>
                            </td>
                            <td> 
                              <select name="gast10">
                                <?php list_teams(); ?> 
                              </select>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr> 
                      <td colspan="4"> 
                        <div> 
                          <input type="submit" name="Pokalspielplan" value="eintragen">
                          <input type="reset" name="Button" value="zur&uuml;cksetzen">
                        </div>
                      </td>
                    </tr>
                  </table>
  </form>

  <p align="left"><b>Achtung!</b></p>
                <p align="left">Bitte Daten genau kontrollieren vor dem Ausf&uuml;hren (es erfolgt 
                  noch eine Sicherheitsabfrage). Bisher ist noch keine automatische 
                  Kontrolle programmiert, die verhindert, da&szlig; Spieltage 
                  oder Paarungen o. &auml;. doppelt eingegeben werden.<br>
    (<a href="mailto:webmaster@hdlev.de">Webmaster</a>)</p>

<?php

// schließende Klammer für SENDENSCHALTFLÄCHE WURDE NICHT GEDRÜCKT
}

// schließende Klammer für SICHERHEITSABFRAGE
}

?>
