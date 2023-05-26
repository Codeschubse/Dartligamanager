<?
include("../Bausteine/top.php");

//Verbindung zur Datenbank aufbauen
include ("../Bausteine/mysql.php");

//Zahl der Spieler errechnen
$sql_befehly="select * from spieler where sp_team<>'vac'";
$antworty=mysql_query($sql_befehly);
$spielerzahl=mysql_num_rows($antworty);

//Zahl der Teams errechnen
$sql_befehl="select * from teams where team_kurz<>'vac' and team_aktiv is not null order by team_name";
$antwort=mysql_query($sql_befehl);
$teamzahl=mysql_num_rows($antwort)

?>
<div align="left"> 
  <table width="100%" height="85%" border="1" bordercolor="#000000">
    <tr> 
      <td height="30"> 
<?php include("../Bausteine/copyright.php"); ?>
      </td>
      <td height="30"><?
include("../Navigation/navitop.php");
?></td>
    </tr>
    <tr> 
      <td height="159" rowspan="5" valign="top"> 
        <div align="center">
          <table width="100%" border="0">
            <tr> 
              <th height="30"> 
                <div align="center"></div>
                <div align="center">Hauptmen&uuml;</div>
              </th>
            </tr>
            <tr> 
              <td height="80"><?
include("../Navigation/navileft.php");
?></td>
            </tr>
            <tr> 
              <th height="30">Wer sind wir?</th>
            </tr>
            <tr valign="top"> 
              <td><?
include("../Navigation/naviwersindwir.php");
?></td>
            </tr>
          </table>
        </div>
        </td>
      <td rowspan="5" width="81%" valign="top"> 
        <div align="justify"> 
          <table width="100%" border="0">
            <tr> 
              <td colspan="3" height="4">&nbsp;</td>
            </tr>
            <tr> 
              <td width="2%">&nbsp;</td>
              <td width="96%" align="justify">Die Heidelberger Dart Liga ist - seit ihrer Gründung 
                im Jahre 1985 - die Liga für Bristle-Dart im Rhein-Neckar-Kreis. 
                Wir sind eine freie Liga mit derzeit <?php echo $teamzahl; ?> Teams und <?php echo $spielerzahl; ?> aktiven 
                Spielern. Darunter sind vom Freizeit-Darter bis zum Weltmeister 
                alle Spielstärken vertreten. <br>
                Seit dem Februar 2000 sind wir ein eingetragener Verein, der sich 
                zum Ziel gesetzt hat den verbandsunabhängigen Steeldart-Sport 
                im Rhein-Neckar-Kreis zu fördern. <br>
                Die Heidelberger Dart Liga organisiert einen regelmässigen Spielbetrieb 
                von Mitte September bis Ende Mai. Dazu kommen noch der Pokalwettbewerb 
                und verschiedene offene Ranglistenturniere. Der reguläre Spieltag 
                unserer Liga ist der Dienstag, an dem ab 20 Uhr die Begegnungen 
                ausgetragen werden. Die Pokalspiele der ersten und zweiten Runde 
                werden ebenfalls an Dienstagen gespielt. Die besten vier Teams 
                bestreiten das Pokalfinale am Samstag nach dem letzten Ligaspiel. 
                <br>
                Ranglistenturniere werden von uns als offene Turniere ausgerichtet. 
                Es können daher auch Spieler teilnehmen, die nicht in der HDL 
                gemeldet sind. Die Ranglistenturniere werden von den Teams selbst 
                organisiert und ausgerichtet. Die Termine (meistens Samstage) 
                werden rechtzeitig vor den Turnieren bekanntgegeben. <br>
                Am Ende der Saison veranstaltet die HDL für alle Teams eine Abschlussfeier. 
                Hier treffen sich noch einmal alle Spieler zu einem geselligen 
                Abend, bevor es in die Sommerpause geht. <br>
                Spieler, die sich einem Team anschliessen oder an einem der Ranglistenturniere 
                teilnehmen wollen, sind uns herzlich willkommen. Eine Nachmeldung, 
                die zur Teilnahme am Ligabetrieb berechtigt, ist während der laufenden 
                Spielzeit jederzeit möglich. Auch neuen Teams gegenüber sind wir 
                stets aufgeschlossen und unterstützen Euch beim Start in die Liga. 
                <br>
                Wenn wir Euer Interesse geweckt haben, könnt Ihr über die Teamkapitäne, 
                die Vorstandsmitglieder oder via e-mail mit uns Kontakt aufnehmen. 
                Oder einfach an einem der Spielabende bei einem der Teams vorbeischauen.<br>
                <font size="-2">(Text von R. Schwegler)</font> </td>
              <td width="2%">&nbsp;</td>
            </tr>
            <tr> 
              <td colspan="3">&nbsp;</td>
            </tr>
          </table>
        </div>
      </td>
    </tr>
  </table>
</div>
</body>
</html>
