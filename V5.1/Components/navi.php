Allgemein:
<ul class="navi">
  <li><a href="index.php">Startseite</a></li>
  <li><a href="index.php?content=gruss">&uuml;ber uns</a></li>
    <?php if($content=="gruss" or $content=="vorstand" or $content=="teams"){ ?>
    </ul><ul class="sub">
      <li><a href='index.php?content=gruss'>Gru&szlig;wort</a></li>
      <li><a href='index.php?content=vorstand'>Vorstand</a></li>
      <li><a href='index.php?content=teams'>Teams</a></li>
    </ul><ul class="navi">
    <?php } ?>
  <li><a href="index.php?content=shop">Fan-Shop</a></li>
</ul>
Spielbetrieb:
<ul class="navi">
 <li><a href="index.php?content=liga">Liga</a></li>
 <li><a href="index.php?content=pokal">Pokal</a></li>
    <?php if($content=="pokal" or $content=="rrobin"){ ?>
    </ul><ul class="sub">
      <li><a href='index.php?content=rrobin'>Gruppen</a></li>
      <li><a href='index.php?content=pokal'>Finalrunde</a></li>
    </ul><ul class="navi">
    <?php } ?>
  <li><a href="index.php?content=hof" title="die besten High Finish- und 180'er-Werfer">Hall of Fame</a></li>
  <li><a href="index.php?content=turnier" title="Ausschreibungen und Berichte">Kurpfalz Open</a></li>
    <?php if($content=="turnier" or $content=="berichte"){ ?>
    </ul><ul class="sub">
      <li><a href='index.php?content=turnier'>Ausschreibung</a></li>
      <li><a href='index.php?content=berichte&amp;ko=1'>1. Kurpfalz Open</a></li>
      <li><a href='index.php?content=berichte&amp;ko=2'>2. Kurpfalz Open</a></li>
      <li><a href='index.php?content=berichte&amp;ko=3'>3. Kurpfalz Open</a></li>
      <li><a href='index.php?content=berichte&amp;ko=4'>4. Kurpfalz Open</a></li>
    <?php } ?>
</ul>
Kommunikation:
<ul class="navi">
  <li><a href="index.php?content=contact">Kontakt</a></li>
  <li><a href="index.php?content=impressum">Impressum</a></li>
  <li><a href="index.php?content=hinweise">Hinweise</a></li>
</ul>
G&auml;stebuch:
<br>
<font style="font: 9px Verdana;">
Datum des letzten Eintrags:
</font>
<?php
include ("Components/mysql.php");
 $befehl="select max(guestbook_datetime) as guestbook_datetime from guestbook";
 $antwort=mysql_query($befehl);
 $dataled=mysql_fetch_array($antwort);
 $led=$dataled['guestbook_datetime'];
$ledformat = "<b>".substr($led,8,2).".".substr($led,5,2).".".substr($led,0,4)." ".substr($led,11,5)."h.</b>";
echo $ledformat;
?>
<br>
<ul class="navi">
  <li><a href="index.php?content=buch">ansehen</a></li>
  <li><a href="index.php?content=eintrag">eintragen</a></li>
</ul>
Inhaltsverzeichnis:
<ul class="navi">
  <li><a href="index.php?content=map">Sitemap</a></li>
</ul>
