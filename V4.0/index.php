<html>
<head>
<title>Heidelberger Dart Liga e.V.</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="robots" content="noindex, noarchive, nofollow">

<link rel="stylesheet" title="orangeblue (Default)" href="screen.css" type="text/css" media="screen">
<link rel="stylesheet" href="print.css" type="text/css" media="print">

</head>

<?php
if(!$content){$content="home";}
include("colours.php");
$root="http://www.hdlev.de";

?>

<body>

<a name="TOP"></a><!-- Tabelle 01: Komplette Seite (fünf Zeilen)-->
<table width="100%" border="0" cellspacing="2" cellpadding="1">

<!-- Tabelle 01 - Zeile 01: Kopfzeile (eine einzelne Zelle) -->
  <tr>
    <td>

<!-- Tabelle 02: Rahmen für Zelleninhalt von T01-Z01 (eine einzelne Zelle) -->
      <table width="100%" border="0" cellspacing="5" cellpadding="5" bgcolor="<?php echo"$tablebg"; ?>">
        <tr bgcolor="<?php echo"$tablebrd"; ?>">
          <td valign="middle">


<!-- Tabelle 03: Zelleninhalt von T01-Z01/T02 (eine einzelne Zeile, 3 Zellen (2xLogo, 1xÜberschrift)) -->
           <table border="0" align="center" width="100%">
              <tr>
                <td>
                  <div align="left"> <img src="mgs/hdl.gif" width="89" height="60" alt="gif: Logo der HDL">
                  </div>
                </td>
                <td>
                  <div align="center">
                    <font size="+3" color="<?php echo"$tablebg"; ?>">
                      <b>Heidelberger Dart Liga e.V.</b>
                    </font>
                  </div>
                </td>
                <td>
                  <div align="right"> <img src="mgs/hdl.gif" width="89" height="60" alt="gif: Logo der HDL">
                  </div>
                </td>
              </tr>
            </table>
            <!-- Tabelle 03 Ende --> </td>
        </tr>
      </table>
<!-- Tabelle 02 Ende -->

    </td>
  </tr>
<!-- Tabelle 01 - Zeile 01 (Kopfzeile) Ende -->

<!-- Tabelle 01 - Zeile 02: Abstandshalter (eine einzelne Zelle) -->
  <tr>
    <td><font size="1">&nbsp;</font></td>
  </tr>
<!-- Tabelle 01 - Zeile 02 (Abstandshalter) Ende -->

<!-- Tabelle 01 - Zeile 03: Seiteninhalt (eine einzelne Zelle) -->
  <tr>
    <td>

<!-- Tabelle 04: Seiteninhalt (eine Zeile, drei Zellen) -->
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>

<!-- Tabelle 04 - Zelle 01: Linke Spalte -->
          <td width="160" valign="top">
<div class="table">
<!-- Tabelle 05: Navigation (eine Zeile, eine Zelle) -->
<table width="100%" border="0" cellspacing="2" cellpadding="3" bgcolor="<?php echo"$tablebrd"; ?>">
  <tr bgcolor="<?php echo"$tablebg"; ?>">
                  <td>

                    <div class="skip"> <a href="#SKIP"><font face="Arial, Helvetica, sans-serif">direkt
                      zum Inhalt...</font></a> </div>

                    <!----------------------------------------------------> <?php
include("components/navi.php");
?></b><!---------------------------------------------------->
                  </td>
  </tr>
</table>
<!-- Tabelle 05 (Navigation) Ende -->

<br>

<!-- Tabelle 06: Impressum (eine Zeile, eine Zelle) -->
<table width="100%" border="0" cellspacing="2" cellpadding="3" bgcolor="<?php echo"$tablebrd"; ?>">
  <tr bgcolor="<?php echo"$tablebg"; ?>">
    <td>
      <?php if($content=="contact"){echo"<img src='x_ge.gif'>&nbsp;";}?><a href="index.php?content=contact">Kontakt</a>
      <hr noshade>
      <?php if($content=="impressum"){echo"<img src='x_ge.gif'>&nbsp;";}?><a href="index.php?content=impressum">Impressum</a>
      <hr noshade>
      <?php if($content=="disclaimer"){echo"<img src='x_ge.gif'>&nbsp;";}?><a href="index.php?content=disclaimer">Hinweise</a>
      <hr noshade>
                    <font color="<?php echo"$tablefnt"; ?>">Datum des letzten<br>
                    G&auml;stebucheintrags:<br>

<?php
include ("components/mysql.php");
 $befehl="select max(guestbook_datetime) as guestbook_datetime from guestbook";
 $antwort=mysql_query($befehl);
 $dataled=mysql_fetch_array($antwort);
 $led=$dataled['guestbook_datetime'];
$ledformat = "<b>".substr($led,8,2).".".substr($led,5,2).".".substr($led,0,4)." ".substr($led,11,5)."h.</b>";
echo $ledformat;
?>

                    </font><br>
                    <?php if($content=="guestbook"){echo"<img src='x_ge.gif'>&nbsp;";}?><a href="index.php?content=guestbook"> G&auml;stebuch ansehen</a><br>
                    <?php if($content=="guestbook.new"){echo"<img src='x_ge.gif'>&nbsp;";}?><a href="index.php?content=guestbook.new">neuen Eintrag schreiben</a></td>
  </tr>
</table>
<!-- Tabelle 06 (Impressum) Ende -->

<br>

<!-- Tabelle 07: Counter (eine Zeile, eine Zelle) -->
<table width="100%" border="0" cellspacing="2" cellpadding="3" bgcolor="<?php echo"$tablebrd"; ?>">
  <tr bgcolor="<?php echo"$tablebg"; ?>">
                  <td>

<script language="JavaScript" type="text/javascript" src="http://www.hdlev.de/pphlogger.js"></script>
<noscript><a href="http://counter.primawebtools.de" target="_blank"><img src="http://count.primawebtools.de/pphlogger.php?encid=18227&amp;st=nosc" alt=""></a></noscript>

<font color="<?php echo"$tablefnt"; ?>">Webhits seit dem letzten Redesign:&nbsp;
<script language="JavaScript" src="http://count.primawebtools.de/showhits.php?encid=18227&st=js&type=hits"></script>
<br>Webhits heute:&nbsp;
<script language="JavaScript" src="http://count.primawebtools.de/showhits.php?encid=18227&st=js&type=today"></script>
<br>User online:&nbsp;
<script language="JavaScript" src="http://count.primawebtools.de/showhits.php?encid=18227&st=js&type=onlineusr"></script>
</td>
  </tr>
</table>
<!-- Tabelle 07 (Counter) Ende -->

<br>

<!-- Tabelle 08: About (eine Zeile, eine Zelle) -->
<table width="100%" border="0" cellspacing="2" cellpadding="3" bgcolor="<?php echo"$tablebrd"; ?>">
  <tr bgcolor="<?php echo"$tablebg"; ?>">
                  <td> <font color="<?php echo"$tablefnt"; ?>">Diese Seite informiert 
                    &uuml;ber unsere Liga - den Spielbetrieb und die Leute, die 
                    dahinterstecken. Webseiten &uuml;ber Darts gibt es gen&uuml;gend. 
                    Wer sich &uuml;ber Bristledarts informieren will, kann das 
                    bei <a href="http://www.bristledarts.info" target="_blank">bristledarts.info</a> 
                    tun. Auch der <a href="http://www.deutscherdartverband.de" target="_blank">deutsche 
                    Dart Verband</a> hat umfangreiche Informationen zum Thema 
                    im Netz. Darts und Zubeh&ouml;r kann man bei uns nicht kaufen, 
                    aber daf&uuml;r gibt's ja <a href="http://www.pmsport.de/" target="_blank">pm 
                    Sport & Pokale</a>.</font> </td>
  </tr>
</table>
<!-- Tabelle 08 (About) Ende -->
</div>
          </td>
<!-- Tabelle 04 - Zelle 01 (linke Spalte) Ende -->

<!-- Tabelle 04 - Zelle 02: Mittlere Spalte (Hauptinhalt) -->
          <td valign="top"> <!-- Tabelle 09: Hauptinhalt (eine Zeile, drei Zellen (Abstand, Content, Abstand)-->
            <table width="100%" height="100%" cellpadding="0" cellspacing="0">
              <tr> <!-- Tabelle 09 - Zelle 01: Abstandshalter -->
                <td width="15">&nbsp; </td>
                <!-- Tabelle 09 - Zelle 01 (Abstandshalter) Ende --> <!-- Tabelle 09 - Zelle 02: Content -->
                <td> <!-- Tabelle 10: Inhalt (eine Zeile, eine Zelle) -->
                  <table width="100%" border="0" cellspacing="2" cellpadding="1" bgcolor="<?php echo"$contentbrd"; ?>">
                    <tr bgcolor="<?php echo"$contentbg"; ?>">
                      <td height="2">
                        <div align="left"> <a name="SKIP"></a><!-------------------------------------------------------->
                          <?php
include("content/".$content.".php");
?> <!--------------------------------------------------------> </div>
                      </td>
                    </tr>
                  </table>
                  <!-- Tabelle 10 (Inhalt) Ende --> </td>
                <!-- Tabelle 09 - Zelle 02 (Content) Ende --> <!-- Tabelle 09 - Zelle 03: Abstandshalter -->
                <td width="15">&nbsp; </td>
                <!-- Tabelle 09 - Zelle 03 (Abstandshalter) Ende --> </tr>
            </table>
            <!-- Tabelle 09 (Hauptinhalt) Ende --> </td>
<!-- Tabelle 04 - Zelle 02 (mittlere Spalte) Ende -->

<!-- Tabelle 04 - Zelle 03: Rechte Spalte -->
          <td width="170" valign="top">
<div class="table">

<!-- Tabelle 11: Teaser (eine Zeile, eine Zelle) -->
<table width="100%" border="0" cellspacing="2" cellpadding="3" bgcolor="<?php echo"$teaserbrd"; ?>">
  <tr bgcolor="<?php echo"$teaserbg"; ?>">
    <td>
                    <div align="center"> <font color="<?php echo"$teaserfnt"; ?>"> 
                      <b>Spielortwechsel bei DC Yesterday:</b><br>Dartspub, Nu&szlig;locher Str. 68, 69190 Walldorf, 06227 1411.</font></div>
    </td>
  </tr>
</table>
<!-- Tabelle 11 (Teaser) Ende -->

<br>

<!-- Tabelle 12: Email-Accounts-Rahmen (eine Zeile, eine Zelle) -->
<table width="100%" border="0" cellspacing="2" cellpadding="3" bgcolor="<?php echo"$tablebrd"; ?>">
  <tr bgcolor="<?php echo"$tablebg"; ?>">
    <td>

<!-- Tabelle 13: Email-Accounts (zwei Zeilen (Überschrift, Inhalt), je eine Zelle) -->
       <table width="100%" border="0">

<!-- Tabelle 13 - Zeile 1: Überschrift -->
          <tr bgcolor="<?php echo"$tablebrd"; ?>">
            <td>
              <div align="center">
                <font color="<?php echo"$tablebg"; ?>">
                  <b>Nur f&uuml;r HDL-Mitglieder :</b>
                </font>
              </div>
            </td>
          </tr>
<!-- Tabelle 13 - Zeile 1 (Überschrift) Ende -->

<!-- Tabelle 13 - Zeile 2: Inhalt -->
          <tr>
                        <td> <font color="<?php echo"$tablefnt"; ?>"> Habt Ihr Euch lange
                          genug &uuml;ber die Werbeflut und Spam bei Freemailern
                          ge&auml;rgert? Dann gibt's hier Abhilfe: Euer pers&ouml;nliches
                          und kostenloses POP3-eMail-Konto bei der HDL. Mit Webmailer
                          und spam-/virengesch&uuml;tzt. Wendet Euch an den &nbsp;<a href="index.php?content=contact">Webmaster</a>,
                          damit Ihr bald unter Wunschname(at)hdlev.de erreichbar
                          seid.</font> </td>
          </tr>
<!-- Tabelle 13 - Zeile 2 (Inhalt) Ende -->

       </table>
<!-- Tabelle 13 (Email-Accounts) Ende -->

    </td>
  </tr>
</table>
<!-- Tabelle 12 (Email-Accounts-Rahmen) Ende -->

<br>

<!-- Tabelle 14: Downloads-Rahmen (eine Zeile, eine Zelle) -->
<table width="100%" border="0" cellspacing="2" cellpadding="3" bgcolor="<?php echo"$tablebrd"; ?>">
  <tr bgcolor="<?php echo"$tablebg"; ?>">
    <td>

<!-- Tabelle 15: Downloads (zwei Zeilen (Überschrift, Inhalt), je eine Zelle) -->
       <table width="100%" border="0">

<!-- Tabelle 15 - Zeile 1: Überschrift -->
         <tr bgcolor="<?php echo"$tablebrd"; ?>">
           <td>
             <div align="center">
               <font color="<?php echo"$tablebg"; ?>">
                 <b>Downloads:</b>
               </font>
             </div>
           </td>
         </tr>
<!-- Tabelle 15 - Zeile 1 (Überschrift) Ende -->

<!-- Tabelle 15 - Zeile 2: Inhalt -->
                      <tr>
                        <td>
                          <p>
                          <font color="<?php echo"$tablefnt"; ?>"><a href="http://count.primawebtools.de/dlcountx.php?encid=18227&id=241626">n01
                          (.exe 127,53kB)</a><br>
                            Erstklassiger x01-Scorer, individuell einstellbar!
                            Freeware (GPL). (Downloads: <script language="JavaScript" src="http://count.primawebtools.de/showhits.php?encid=18227&type=dlhits&idx=241626"></script>)<br>
                          <a href="http://count.primawebtools.de/dlcountx.php?encid=18227&id=241628">Plug-In&nbsp;(.zip
                          73,89kB)</a> f&uuml;r n01 zur formatierten Ausgabe der
                          Daten als Excel-Datei (sehr zu empfehlen). (Downloads: <script language="JavaScript" src="http://count.primawebtools.de/showhits.php?encid=18227&type=dlhits&idx=241628"></script>)
                          <hr noshade>
                          <a href="http://count.primawebtools.de/dlcountx.php?encid=18227&id=266283">9-Darter
                          (.wmv 4,7MB)</a><br>
                          aus dem niederl&auml;ndischen Fernsehen. Geworfen am 3.2.2002 im Finale der Dutch Open von Shaun Greatbatch (BDO). Dies war weltweit die erste Live-&Uuml;bertragung eines 9-Darters. (Downloads: <script language="JavaScript" src="http://count.primawebtools.de/showhits.php?encid=18227&type=dlhits&idx=266283"></script>)
                          <br><a href="http://count.primawebtools.de/dlcountx.php?encid=18227&id=266312">9-Darter
                          (.wmv 4,56MB)</a><br>
                          von Phil Taylor. Geworfen am 1.8.2002 im Viertelfinale der Stan James World Matchplay Darts Championship 2002. Entgegen der Aussage des Kommentators war dies NICHT die erste Live-&Uuml;bertragung eines 9-Darters. Der von Shaun Greatbatch (s.o.) war ein halbes Jahr fr&uuml;her. Allerdings war Phil Taylor der Erste, der mehr als einen - n&auml;mlich bisher drei - live-&uuml;bertragene 9-Darter warf. (Downloads: <script language="JavaScript" src="http://count.primawebtools.de/showhits.php?encid=18227&type=dlhits&idx=266312"></script>)
                          <br><a href="http://count.primawebtools.de/dlcountx.php?encid=18227&id=266298">9-Darter
                          (.wmv 4,99MB)</a><br>
                          von John Lowe geworfen beim World Matchplay Championship 1984. Das erste perfect game vor laufenden TV-Kameras. (Downloads: <script language="JavaScript" src="http://count.primawebtools.de/showhits.php?encid=18227&type=dlhits&idx=266298"></script>)
                          <br><a href="http://count.primawebtools.de/dlcountx.php?encid=18227&id=266296">9-Darter
                          (.mpg 1,92MB)</a><br>
                          von Paul Lim geworfen 1990 beim World Professional Darts Championship. (Downloads: <script language="JavaScript" src="http://count.primawebtools.de/showhits.php?encid=18227&type=dlhits&idx=266296"></script>)




</font></p></td>
          </tr>
<!-- Tabelle 15 - Zeile 2 (Inhalt) Ende -->

       </table>
<!-- Tabelle 15 (Downloads) Ende -->

    </td>
  </tr>
</table>
<!-- Tabelle 14 (Downloads-Rahmen) Ende -->

<br>

<!-- Tabelle 16: Login-Rahmen (eine Zeile, eine Zelle) -->
<table width="100%" border="0" cellspacing="2" cellpadding="3" bgcolor="<?php echo"$tablebrd"; ?>">
  <tr bgcolor="<?php echo"$tablebg"; ?>">
    <td>

<!-- Tabelle 17: Login (zwei Zeilen (Überschrift, Inhalt), je eine Zelle) -->
      <table width="100%" border="0">

<!-- Tabelle 17 - Zeile 1: Überschrift -->
        <tr bgcolor="<?php echo"$tablebrd"; ?>">
          <td>
             <div align="center"><font color="<?php echo"$tablebg"; ?>"><b>Adminbereich:</b></font></div>
          </td>
        </tr>
<!-- Tabelle 17 - Zeile 1 (Überschrift) Ende -->

<!-- Tabelle 17 - Zeile 2: Inhalt -->
        <tr>
                        <td>
                          <form method="post" action="http://www.hdlev.de/Dreamweaver/Seiten/admin.check.php">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td>><font color="<?php echo"$tablefnt"; ?>">Benutzer:</font></td>
                              </tr>
                              <tr>
                                <td>
                                  <input type="text" name="login_user" style="font: verdana, arial, helvetica, sans-serif; font-size: xx-small; border: inset 1px #ff9;
background-color: #9cf; color: #000;">
                                </td>
                              </tr>
                              <tr>
                                <td>><font color="<?php echo"$tablefnt"; ?>">Pa&szlig;wort:</font></td>
                              </tr>
                              <tr>
                                <td>
                                  <input type="password" name="login_passwd" style="font: verdana, arial, helvetica, sans-serif; font-size: xx-small; border: inset 1px #ff9;
background-color: #9cf; color: #000;">
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <br><input type="submit" name="Submit" value="login" style="font: verdana, arial, helvetica, sans-serif; font-size: xx-small; font-weight: bold; border: outset 2px #f60; background-color: #ff9; color: #000;">
                                </td>
                              </tr>
                            </table>
                          </form>
                        </td>
         </tr>
<!-- Tabelle 17 - Zeile 2 (Inhalt) Ende -->

       </table>
<!-- Tabelle 17 (Login) Ende -->

    </td>
  </tr>
</table>
<!-- Tabelle 16 (Login-Rahmen) Ende -->
</div>
          </td>
<!-- Tabelle 04 - Zelle 03 (rechte Spalte) Ende -->

        </tr>
      </table>
<!-- Tabelle 04 (Seiteninhalt) Ende -->

    </td>
  </tr>
<!-- Tabelle 01 - Zeile 03 (Seiteninhalt) Ende-->

<!-- Tabelle 01 - Zeile 04: Abstandshalter (eine einzelne Zelle)-->
  <tr>
    <td>
      <div class="top" align="center"><a href="#TOP">nach oben</a></div>
    </td>
  </tr>
<!-- Tabelle 01 - Zeile 04 (Abstandshalter) Ende -->

<!-- Tabelle 01 - Zeile 05: Fußzeile (eine einzelne Zelle)-->
  <tr>
    <td>

<!-- Tabelle 18: Fußzeileninhalt (eine einzelne Zelle) -->
       <table width="100%" border="0" cellspacing="2" cellpadding="3" bgcolor="<?php echo"$tablebrd"; ?>">
         <tr bgcolor="<?php echo"$tablebg"; ?>">
           <td>
             <div class="table" align="center">
               <font color="<?php echo"$tablefnt"; ?>">
                 &copy; 2005 <a href="http://www.wwwebinform.de" target="_blank">WWWeb inForm</a>

<!-- PrimaWebtoolsCounter TrackingCode Start //-->
<!-- Ein Service von http://www.PrimaWebtools.de //-->
<center><a href="http://www.primawebtools.de" target="_blank"><img src="http://www.primawebtools.de/counter.gif" border="0" alt="Seitenzähler"></a></center>
<!-- PrimaWebtoolsCounter TrackingCode Ende //-->

             </font></div>
           </td>
         </tr>
       </table>
<!-- Tabelle 18 (Fußzeileninhalt) Ende -->
    </td>
  </tr>
<!-- Tabelle 01 - Zeile 05 (Fußzeile) Ende -->

</table>
<!-- Tabelle 01 (komplette Seite) Ende -->

</body>



</html>