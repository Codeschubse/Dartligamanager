<div align="center">
  <h3>Willkommen auf der Website der</h3>
    <h2>Heidelberger Dart Liga e.V.</h2>
</div>
<div align="center">
  <img src="Images/180er.gif" width="124" height="65" align="middle" alt="gif:180'er" title="m&ouml;gen die 180er mit Dir sein!">
  <br><h4>Wir w&uuml;nschen allen Freunden des Dartsports allezeit &ldquo;good darts&rdquo;!</h4>
</div>

<!-- Bevor wir zur Tagesordnung uebergehen, erstmal der Teaser mit wichtigen Mitteilungen! -->
<?php
	include ("Components/mysql.php");
	$sql="SELECT * FROM teaser";
	$result=mysql_query($sql);
	$teaser=mysql_fetch_array($result);
	if($teaser['teaser_text']!=NULL)
	{
		echo "<div class='teaser'>";
		echo $teaser['teaser_text'];
		echo "</div>";
	}
	mysql_close();
?>

<!-- Termine und Neuigkeiten -->
<div class="left">
  <?php include("Components/datehome.php"); ?>
  <br /><a href="?content=date">Termine anzeigen</a>
</div>
<div class="right">
  <?php include("Components/newshome.php"); ?>
  <br /><a href="?content=news">alle Newsmeldungen anzeigen</a>
</div>
<div class="clear">
</div>

<hr class="light" />
  
<!-- Linktipp -->
<div class="center">
<h4>Linktipp:</h4>
<a href="http://www.dartspub.de"><img src="Images/LogoDartsPub.gif" alt="Dartspub&nbsp;Walldorf" border="0"></a>
<br>&laquo;unser&raquo; Bundesligateam ;-)
</div>

<!-- ueber diese Website und Merchandising -->
<div>
	<div class="left">
		<h5>&Uuml;ber diese Webseiten:</h5>
		Diese Seiten informieren &uuml;ber unsere Liga&nbsp;&mdash; den Spielbetrieb und die Leute, die dahinterstecken. Webseiten &uuml;ber Darts gibt es gen&uuml;gend. Wer sich &uuml;ber Bristledarts informieren will, kann das bei <a href="http://wiki.bussela.de/index.php?n=BusselaWiki.Bristledarts">bristledarts.info</a> tun. Auch der <a href="http://www.deutscherdartverband.de">deutsche&nbsp;Dart&nbsp;Verband</a> hat umfangreiche Informationen zum Thema im Netz.
	</div>
	<div class="right">
		<h5>Merchandising:</h5>
		Fanartikel kauft man im <a href="http://www.hdlev.de/?content=shop">HDL-Shop</a><br/>
		Darts und Zubeh&ouml;r kann man bei uns nicht kaufen, aber daf&uuml;r gibt's ja <a href="http://www.pmsport.de/">pm&nbsp;Sport&nbsp;&amp;&nbsp;Pokale</a>.
	</div>
	<div class="clear">
	</div>
</div>

<hr class="dark" />

<!-- Gaestebuchhinweis und Counter-->
<div>
	<div class="left">
		<h6>G&auml;stebuch:</h6>
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
		<a href="index.php?content=buch<?php if($style){echo "&amp;style=".$style;} ?>">ansehen</a><br />
		<a href="index.php?content=eintrag<?php if($style){echo "&amp;style=".$style;} ?>">eintragen</a>
	</div>
	<div class="right">
		<h6>Counter:</h6>
		<script language="JavaScript" type="text/javascript" src="http://www.hdlev.de/pphlogger.js"></script>
		<noscript><a href="http://counter.primawebtools.de"><img src="http://count.primawebtools.de/pphlogger.php?encid=18227&amp;st=nosc" alt=""></a></noscript>

		Webhits seit dem letzten Redesign:&nbsp;<script language="JavaScript" type="text/javascript" src="http://count.primawebtools.de/showhits.php?encid=18227&amp;st=js&amp;type=hits"></script>
		<br>Webhits heute:&nbsp;<script language="JavaScript" type="text/javascript" src="http://count.primawebtools.de/showhits.php?encid=18227&amp;st=js&amp;type=today"></script>
		<br>User online:&nbsp;<script language="JavaScript" type="text/javascript" src="http://count.primawebtools.de/showhits.php?encid=18227&amp;st=js&amp;type=onlineusr"></script>

		<br />
		<!-- PrimaWebtoolsCounter TrackingCode Start //-->
		<!-- Ein Service von http://www.PrimaWebtools.de //-->
		<a href="http://www.primawebtools.de"><img src="http://www.primawebtools.de/counter.gif" border="0" alt="Seitenz&auml;hler"></a><small>&nbsp;Die Webstatistiken sind ein Service von <a href="http://www.primawebtools.de">PrimaWebtools</a>.</small>
		<!-- PrimaWebtoolsCounter TrackingCode Ende //-->
	</div>
	<div class="clear">
	</div>
</div>

<hr class="light" />

<!-- Badges und Credits -->
<div class="center">
<h4>Credits:</h4>
<?php
	if($browser=="ie"){
		echo "<p>Dir als Nutzer des Internet Explorer empfiehlt der <a href='http://www.hdlev.de/index.php?content=impressum'>Webmaster</a> vor allem die Links zu <a href='http://www.spreadfirefox.com/?q=affiliates&amp;id=158863&amp;t=83'>Firefox</a> und <a href='http://my.opera.com/bussela/affiliate/'>Opera</a>, damit Du mal siehst, wie sch&ouml;n das Internet sein kann! ;-)</p>";
	}
?>
<!-- Firefox (affiliate) -->
<a href="http://www.spreadfirefox.com/?q=affiliates&amp;id=158863&amp;t=83"><img border="0" alt="Get Firefox!" title="Get Firefox!" src="http://sfx-images.mozilla.org/affiliates/Buttons/80x15/white_2.gif"/></a>

<!-- Opera (affiliate) -->
<a href="http://my.opera.com/bussela/affiliate/"><img border="0" src="http://promote.opera.com/small/opera80x15.gif"  width="80" height="15" alt="Opera" title="get Opera!"/></a>

<br /><br />

<!-- Domainmedia -->
<a href="http://www.domainmedia.de"><img src="Images/domainmedia.png" border="0" alt="Domainmedia" title="gehosted von DomainMedia" /></a>

<!-- <sehls.net /> -->
<a href="http://www.sehls.net"><img src="Images/sehlsnet.png" border="0" alt="&lt;sehls.net /&gt;" title="made by &lt;sehls.net /&gt;" /></a>

<!-- Stu Nicholls -->
<a href="http://www.cssplay.co.uk"><img src="Images/cssplay_button.gif" border="0" alt="CSS PLaY" title="CSS PLaY - experiments with cascading style sheets" width="75" height="14"></a>

<br /><br />

<!-- Open Office -->
<a href="http://www.openoffice.org"><img src="http://marketing.openoffice.org/art/galleries/marketing/web_buttons/nicu/80x15_3.png" border="0" alt=" Use OpenOffice.org" title="Use OpenOffice.org"></a>

<!-- Scribus -->
<a href="http://www.scribus.net"><img src="Images/scribus_badge.gif" border="0" alt="Scribus Desktop Publishing" title="Scribus Desktop Publishing"></a>

<br /><br />

<!-- W3C -->
<a href="http://www.w3.org/TR/WCAG10"><img src="Images/w3c_wai-aaa.png" alt="Barrierefreiheit" border="0" title="Barrierefreiheit"/></a>
<a href="http://validator.w3.org/check?uri=referer"><img src="Images/w3c_html401.png" alt="Valid HTML 4.01 Transitional" border="0" title="Validieren Sie das HTML dieser Seite"/></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer"><img style="border:0;" src="Images/w3c_validcssb.png" alt="Valid CSS!" title="Validieren Sie das CSS dieser Seite"/></a>

</div>