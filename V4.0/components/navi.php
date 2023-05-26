<?php if($content=="home"){echo"<img src='x_ge.gif'>&nbsp;";}?><a href="index.php">Startseite</a>
<br><a href="index.php?content=gruss">&uuml;ber uns</a>

<?php
if($content=="gruss" or $content=="vorstand" or $content=="teams")
{

 echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;";
 if($content=="gruss")
 {
  echo "<img src='x_ge.gif'>&nbsp;";
 }
 echo "<a href='index.php?content=gruss'>Gru&szlig;wort</a>\n";

 echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;";
 if($content=="vorstand")
 {
  echo "<img src='x_ge.gif'>&nbsp;";
 }
 echo "<a href='index.php?content=vorstand'>Vorstand</a>\n";

 echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;";
 if($content=="teams")
 {
  echo "<img src='x_ge.gif'>&nbsp;";
 }
 echo "<a href='index.php?content=teams'>Teams</a>\n";

}
?>

<br><?php if($content=="shop"){echo"<img src='x_ge.gif'>&nbsp;";}?><a href="index.php?content=shop">Fan-Shop</a>

<br><a href="index.php?content=turnier" title="Ausschreibungen und Berichte">Kurpfalz Open</a>

<?php
if($content=="turnier" or $content=="berichte")
{

 echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;";
 if($content=="turnier")
 {
  echo "<img src='x_ge.gif'>&nbsp;";
 }
 echo "<a href='index.php?content=turnier'>Ausschreibung</a>\n";

 echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;";
 if($content=="berichte")
 {
  echo "<img src='x_ge.gif'>&nbsp;";
 }
 echo "<a href='index.php?content=berichte'>Berichte</a>\n";

}
?>

<hr noshade>
<font color="<?php echo"$tablefnt"; ?>">Tabelle/Ergebnisse:</font><br>
<?php
 if($content=="liga")
 {
  echo "<img src='x_ge.gif'>&nbsp;";
 }
 echo "<a href='index.php?content=liga'>Liga</a>\n";
?>

<br><a href="index.php?content=rrobin">Pokal</a>

<?php
if($content=="pokal" or $content=="rrobin")
{

 echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;";
 if($content=="rrobin")
 {
  echo "<img src='x_ge.gif'>&nbsp;";
 }
 echo "<a href='index.php?content=rrobin'>Gruppen</a>\n";

 echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;";
 if($content=="pokal")
 {
  echo "<img src='x_ge.gif'>&nbsp;";
 }
 echo "<a href='index.php?content=pokal'>Finalrunde</a>\n";

}
?>
<br><?php if($content=="hof"){echo"<img src='x_ge.gif'>&nbsp;";}?><a href="index.php?content=hof" title="die besten High Finish- und 180'er-Werfer">Hall of Fame</a>