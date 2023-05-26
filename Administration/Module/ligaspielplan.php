<?php

// Teamkuerzelauflistung als Funktion definieren, damit sie nicht jedesmal
// getippt werden muß bei OPTION-Feldern weiter unten (20 Stück)
function list_teams()
{
 // Teamkuerzel und Teamnamen auslesen
 $befehl="select team_kurz,team_name from teams where team_kurz='x'";
 $antwort=mysql_query($befehl);
 while($data=mysql_fetch_array($antwort))
 {
  $teamname=$data['team_name'];
  $teamkurz=$data['team_kurz'];
  // spielfrei als vorausgewÃ¤hlt definieren
  echo "<option selected value='".$teamkurz."'>".$teamname."</option>\n";
 }
 // Teamkuerzel und Teamnamen auslesen
 $befehl="select team_kurz,team_name from teams where team_kurz<>'vac' and team_kurz<>'x' order by team_name";
 $antwort=mysql_query($befehl);
 while($data=mysql_fetch_array($antwort))
 {
  $teamname=$data['team_name'];
  $teamkurz=$data['team_kurz'];
  echo "<option value='".$teamkurz."'>".$teamname."</option>\n";
 }
}

// Teamnamen auslesen als Funktion
function team_name($team)
{
 $befehl="select team_name from teams where team_kurz='$team'";
 $antwort=mysql_query($befehl);
 $data=mysql_fetch_array($antwort);
 $teamname=$data['team_name'];
 return $teamname;
}

// moegliche Saisons herausfinden
$befehl="SELECT DISTINCT tag_saison FROM spieltag order by tag_saison desc";
$antwort=mysql_query($befehl);

// aktuelles Jahr herausfinden
$jahr=date('Y');
$jahrfolgend=date('Y')+1;

// SICHERHEITSABFRAGE
switch ($go){

// AUSFUEHREN WURDE GEKLICKT
case "eintragen":

if ($heim1!=$gast1)
{
 $befehl ="insert into spieltag (tag_index,tag_heim,tag_gast,tag_datum,tag_saison,tag_erg";
 if($liga!="null")
 {
  $befehl.=",tag_liga";
 }
 $befehl.=")";
 $befehl.=" values ('$tag','$heim1','$gast1','$datum','$saison','9'";
 if($liga!="null")
 {
  $befehl.=",'$liga'";
 }
 $befehl.=")";
 mysql_query($befehl);
}

if ($heim2!=$gast2)
{
 $befehl ="insert into spieltag (tag_index,tag_heim,tag_gast,tag_datum,tag_saison,tag_erg";
 if($liga!="null")
 {
  $befehl.=",tag_liga";
 }
 $befehl.=")";
 $befehl.=" values ('$tag','$heim2','$gast2','$datum','$saison','9'";
 if($liga!="null")
 {
  $befehl.=",'$liga'";
 }
 $befehl.=")";
 mysql_query($befehl);
}

if ($heim3!=$gast3)
{
 $befehl ="insert into spieltag (tag_index,tag_heim,tag_gast,tag_datum,tag_saison,tag_erg";
 if($liga!="null")
 {
  $befehl.=",tag_liga";
 }
 $befehl.=")";
 $befehl.=" values ('$tag','$heim3','$gast3','$datum','$saison','9'";
 if($liga!="null")
 {
  $befehl.=",'$liga'";
 }
 $befehl.=")";
 mysql_query($befehl);
}

if ($heim4!=$gast4)
{
 $befehl ="insert into spieltag (tag_index,tag_heim,tag_gast,tag_datum,tag_saison,tag_erg";
 if($liga!="null")
 {
  $befehl.=",tag_liga";
 }
 $befehl.=")";
 $befehl.=" values ('$tag','$heim4','$gast4','$datum','$saison','9'";
 if($liga!="null")
 {
  $befehl.=",'$liga'";
 }
 $befehl.=")";
 mysql_query($befehl);
}

if ($heim5!=$gast5)
{
 $befehl ="insert into spieltag (tag_index,tag_heim,tag_gast,tag_datum,tag_saison,tag_erg";
 if($liga!="null")
 {
  $befehl.=",tag_liga";
 }
 $befehl.=")";
 $befehl.=" values ('$tag','$heim5','$gast5','$datum','$saison','9'";
 if($liga!="null")
 {
  $befehl.=",'$liga'";
 }
 $befehl.=")";
 mysql_query($befehl);
}

if ($heim6!=$gast6)
{
 $befehl ="insert into spieltag (tag_index,tag_heim,tag_gast,tag_datum,tag_saison,tag_erg";
 if($liga!="null")
 {
  $befehl.=",tag_liga";
 }
 $befehl.=")";
 $befehl.=" values ('$tag','$heim6','$gast6','$datum','$saison','9'";
 if($liga!="null")
 {
  $befehl.=",'$liga'";
 }
 $befehl.=")";
 mysql_query($befehl);
}

if ($heim7!=$gast7)
{
 $befehl ="insert into spieltag (tag_index,tag_heim,tag_gast,tag_datum,tag_saison,tag_erg";
 if($liga!="null")
 {
  $befehl.=",tag_liga";
 }
 $befehl.=")";
 $befehl.=" values ('$tag','$heim7','$gast7','$datum','$saison','9'";
 if($liga!="null")
 {
  $befehl.=",'$liga'";
 }
 $befehl.=")";
 mysql_query($befehl);
}

if ($heim8!=$gast8)
{
 $befehl ="insert into spieltag (tag_index,tag_heim,tag_gast,tag_datum,tag_saison,tag_erg";
 if($liga!="null")
 {
  $befehl.=",tag_liga";
 }
 $befehl.=")";
 $befehl.=" values ('$tag','$heim8','$gast8','$datum','$saison','9'";
 if($liga!="null")
 {
  $befehl.=",'$liga'";
 }
 $befehl.=")";
 mysql_query($befehl);
}

if ($heim9!=$gast9)
{
 $befehl ="insert into spieltag (tag_index,tag_heim,tag_gast,tag_datum,tag_saison,tag_erg";
 if($liga!="null")
 {
  $befehl.=",tag_liga";
 }
 $befehl.=")";
 $befehl.=" values ('$tag','$heim9','$gast9','$datum','$saison','9'";
 if($liga!="null")
 {
  $befehl.=",'$liga'";
 }
 $befehl.=")";
 mysql_query($befehl);
}

if ($heim10!=$gast10)
{
 $befehl ="insert into spieltag (tag_index,tag_heim,tag_gast,tag_datum,tag_saison,tag_erg";
 if($liga!="null")
 {
  $befehl.=",tag_liga";
 }
 $befehl.=")";
 $befehl.=" values ('$tag','$heim10','$gast10','$datum','$saison','9'";
 if($liga!="null")
 {
  $befehl.=",'$liga'";
 }
 $befehl.=")";
 mysql_query($befehl);
}

echo "<p><b>Folgende Daten wurden in die Datenbank geschrieben:</b></p><div>\n";

$tab ="<table cellspacing='2'>\n";
$tab.="<tr>\n";
$tab.="<th colspan='2'>Begegnungen";
if($liga!="null")
{
 $tab.=" der Division/Gruppe ".$liga;
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

$tab.="</table></div><br>\n";

echo $tab;
echo "<br><br><a href='index.php'>zur&uuml;ck zur Eingabemaske</a>\n";

break;

// AUSFÃHREN WURDE NICHT GEKLICKT
default:

// SENDENSCHALTFLÃCHE WURDE GEDRÃCKT - hier weiter, sonst weiter bei ELSE
if ($Spielplan){

$datum=$djahr."-".$dmonat."-".$dtag;

echo "<p><b>Folgende Daten sollen in die Datenbank geschrieben werden:</b></p><div>\n";

$tab ="<table cellspacing='2'>\n";
$tab.="<tr>\n";
$tab.="<th colspan='2'>Begegnungen";
if($liga!="null")
{
 $tab.=" der Division/Gruppe ".$liga;
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

$anhang ="?go=eintragen";
$anhang.="&saison=".$saison;
$anhang.="&tag=".$tag;
$anhang.="&liga=".$liga;
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
</div>
<p align="left"><b>Achtung!</b></p>
<p align="left">Bitte Daten genau kontrollieren vor dem Ausf&uuml;hren.
Es ist keine automatische Kontrolle 
programmiert, die verhindert, da&szlig; Spieltage oder Paarungen o. &auml;. 
doppelt (oder sonst irgendwie falsch) eingegeben werden.</p>

<?php

// schlieÃende Klammer fÃ¼r SENDENSCHALTFLÃCHE WURDE GEDRÃCKT
}

// SENDENSCHALTFLÃCHE WURDE NICHT GEDRÃCKT
else{

?>
<div>
                <form method="post" action="index.php" name="Spieltag">
                  <table border="0">
                    <tr> 
                      <th colspan="4"><strong>Ligaspielplan eingeben</strong></th>
                    </tr>
                    <tr> 
                      <th>Saison</th>
                      <th>Spieltag</th>
                      <th>Liga</th>
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
$autojahr=$data_saison['tag_saison'];
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
                          <select name="liga">
                            <option value="1">1. Div</option>
                            <option value="2">2. Div</option>
                            <option value="3">3. Div</option>
                            <option value="4">4. Div</option>
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
$befehl="SELECT DISTINCT tag_saison FROM spieltag order by tag_saison desc";
$antwort=mysql_query($befehl);

// saisons und aktuelles jahr ausgeben
while($data_saison=mysql_fetch_array($antwort)){
$autojahr=$data_saison['tag_saison'];
if ($autojahr!=$jahr){
echo "<option value='$autojahr'>".$autojahr."</option>\n";
}}
*/

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
                          <input type="submit" name="Spielplan" value="eintragen">
                          <input type="reset" name="Button" value="zur&uuml;cksetzen">
                        </div>
                      </td>
                    </tr>
                  </table>
  </form>
  </div>

  <p align="left"><b>Achtung!</b></p>
                <p align="left">Bitte Daten genau kontrollieren vor dem Ausf&uuml;hren (es erfolgt 
                  noch eine Sicherheitsabfrage). Es ist keine automatische 
                  Kontrolle programmiert, die verhindert, da&szlig; Spieltage 
                  oder Paarungen o. &auml;. doppelt eingegeben werden.</p>

<?php

// schlieÃende Klammer fÃ¼r SENDENSCHALTFLÃCHE WURDE NICHT GEDRÃCKT
}

// schlieÃende Klammer fÃ¼r SICHERHEITSABFRAGE
}

?>