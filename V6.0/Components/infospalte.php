
<!-- Bevor wir zur Tagesordnung uebergehen, erstmal der Teaser mit wichtigen Mitteilungen! -->
<div class="teaser">
Achtung! Schaut auch in der Sommerpause regelm&auml;&szlig;ig in die E-Mail-Postf&auml;cher!
</div>

<!-- hier ueber diese Website -->
<div class="green">
<h6 class="green">&Uuml;ber diese Webseiten:</h6>
Diese Seiten informieren &uuml;ber unsere Liga&nbsp;- den Spielbetrieb und die Leute, die dahinterstecken. Webseiten &uuml;ber Darts gibt es gen&uuml;gend. Wer sich &uuml;ber Bristledarts informieren will, kann das bei <a href="http://sehls.de/PmWiki/pmwiki.php?n=BusselaWiki.Bristledarts" target="_blank" class="ext">bristledarts.info</a> tun. Auch der <a href="http://www.deutscherdartverband.de" target="_blank" class="ext">deutsche&nbsp;Dart&nbsp;Verband</a> hat umfangreiche Informationen zum Thema im Netz.
</div>

<!-- unser Fanshop -->
<div class="red">
<h6 class="red">Merchandising:</h6>
Fanartikel kauft man im <a href="http://www.equisto.de/hdl" target="_blank" class="ext">HDL-Shop</a><br/>
Darts und Zubeh&ouml;r kann man bei uns nicht kaufen, aber daf&uuml;r gibt's ja <a href="http://www.pmsport.de/" target="_blank" class="ext">pm&nbsp;Sport&nbsp;&amp;&nbsp;Pokale</a>.
</div>

<!-- und weitere Links -->
<div class="green">
<h6 class="green">Linktips:</h6>
<a href="http://www.dartspub.de" target="_blank" class="ext"><img src="Images/LogoDartsPub.gif" alt="Dartspub&nbsp;Walldorf" border="0"></a>
<br>"unser" Bundesligateam ;-)
</div>

<!-- Gaestebuchhinweis -->
<div class="red">
<h6 class="red">G&auml;stebuch:</h6>
Datum des letzten Eintrags:
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
<a href="index.php?content=buch" class="int">ansehen</a><br />
<a href="index.php?content=eintrag" class="int">eintragen</a>
</div>

<!-- Counter und alte Versionen -->
<div class="green">
<h6 class="green">Counter:</h6>
<script language="JavaScript" type="text/javascript" src="http://www.hdlev.de/pphlogger.js"></script>
<noscript><a href="http://counter.primawebtools.de" target="_blank"><img src="http://count.primawebtools.de/pphlogger.php?encid=18227&amp;st=nosc" alt=""></a></noscript>

Webhits seit dem letzten Redesign:&nbsp;<script language="JavaScript" type="text/javascript" src="http://count.primawebtools.de/showhits.php?encid=18227&amp;st=js&amp;type=hits"></script>
<br>Webhits heute:&nbsp;<script language="JavaScript" type="text/javascript" src="http://count.primawebtools.de/showhits.php?encid=18227&amp;st=js&amp;type=today"></script>
<br>User online:&nbsp;<script language="JavaScript" type="text/javascript" src="http://count.primawebtools.de/showhits.php?encid=18227&amp;st=js&amp;type=onlineusr"></script>

<br />
<!-- PrimaWebtoolsCounter TrackingCode Start //-->
<!-- Ein Service von http://www.PrimaWebtools.de //-->
<a href="http://www.primawebtools.de" target="_blank" class="ext"><img src="http://www.primawebtools.de/counter.gif" border="0" alt="Seitenz&auml;hler"></a><small>&nbsp;Die Webstatistiken sind ein Service von <a href="http://www.primawebtools.de" target="_blank" class="ext">PrimaWebtools</a>.</small>
<!-- PrimaWebtoolsCounter TrackingCode Ende //-->
</div>

<!-- Badges und Credits -->
<div class="red">
<h6 class="red">Credits:</h6>
<!-- Stu Nicholls -->
<a href="http://www.cssplay.co.uk" target="_blank" class="ext"><img src="Images/cssplay_button.gif" border="0" alt="CSS PLaY" title="CSS PLaY - experiments with cascading style sheets" width="75" height="14"></a>
<br />
<!-- Domainmedia -->
<a href="http://www.domainmedia.de" target="_blank" class="ext"><img src="Images/domainmedia.png" border="0" alt="Domainmedia" title="gehosted von DomainMedia" /></a>
<br />
<!-- Firefox (affiliate) -->
<a href="http://www.spreadfirefox.com/?q=affiliates&amp;id=158863&amp;t=83" target="_blank" class="ext"><img border="0" alt="Get Firefox!" title="Get Firefox!" src="http://sfx-images.mozilla.org/affiliates/Buttons/80x15/white_2.gif"/></a>
<br />
<!-- Opera (affiliate) -->
<a href="http://my.opera.com/bussela/affiliate/" target="_blank" class="ext"><img border="0" src="http://promote.opera.com/small/opera80x15.gif"  width="80" height="15" alt="Opera" title="get Opera!"/></a>
<br />
<!-- W3C -->
<a href="http://validator.w3.org/check?uri=referer"><img src="Images/w3c_html401.png" alt="Valid HTML 4.01 Transitional" border="0" title="Validieren Sie das HTML dieser Seite"/></a>
<br />
<a href="http://jigsaw.w3.org/css-validator/"><img style="border:0;" src="Images/w3c_validcssb.png" alt="Valid CSS!" title="Validieren Sie das CSS dieser Seite"/></a>
</div>