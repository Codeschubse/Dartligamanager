<?php

include ("Components/mysql.php");

//Zahl der Spieler errechnen
$sql_befehly="select * from spieler where sp_team<>'vac'";
$antworty=mysql_query($sql_befehly);
$spielerzahl=mysql_num_rows($antworty);

//Zahl der Teams errechnen
$sql_befehl="select * from teams where team_kurz<>'vac' and team_aktiv is not null order by team_name";
$antwort=mysql_query($sql_befehl);
$teamzahl=mysql_num_rows($antwort)

?>
<h2>Gru&szlig;wort des 1. Vorsitzenden</h2>
<p>Die Heidelberger Dart Liga ist - seit ihrer Gr&uuml;ndung im Jahre 1985 - die Liga 
f&uuml;r Bristle-Dart im Rhein-Neckar-Kreis. Wir sind eine freie Liga mit derzeit <?php echo $teamzahl; ?> 
Teams und <?php echo $spielerzahl; ?> aktiven Spielern. Darunter sind vom Freizeit-Darter 
bis zum Weltmeister alle Spielst&auml;rken vertreten.</p>
<p>Seit dem Februar 2000 sind wir ein eingetragener Verein, der sich zum Ziel gesetzt 
hat den verbandsunabh&auml;ngigen Steeldart-Sport im Rhein-Neckar-Kreis zu f&ouml;rdern.</p>
<p>Die Heidelberger Dart Liga organisiert einen regelm&auml;ssigen Spielbetrieb von Mitte 
September bis Ende Mai. Dazu kommen noch der Pokalwettbewerb und verschiedene 
offene Ranglistenturniere. Der regul&auml;re Spieltag unserer Liga ist der Dienstag, 
an dem ab 20 Uhr die Begegnungen ausgetragen werden. Die Pokalspiele der ersten 
und zweiten Runde werden ebenfalls an Dienstagen gespielt. Die besten vier Teams 
bestreiten das Pokalfinale am Samstag nach dem letzten Ligaspiel.</p>
<p>Ranglistenturniere werden von uns als offene Turniere ausgerichtet. Es k&ouml;nnen 
daher auch Spieler teilnehmen, die nicht in der HDL gemeldet sind. Die Ranglistenturniere 
werden von den Teams selbst organisiert und ausgerichtet. Die Termine (meistens 
Samstage) werden rechtzeitig vor den Turnieren bekanntgegeben. <br>
Am Ende der Saison veranstaltet die HDL f&uuml;r alle Teams eine Abschlussfeier. Hier 
treffen sich noch einmal alle Spieler zu einem geselligen Abend, bevor es in die 
Sommerpause geht.</p>
<p>Spieler, die sich einem Team anschliessen oder an einem der Ranglistenturniere 
teilnehmen wollen, sind uns herzlich willkommen. Eine Nachmeldung, die zur Teilnahme 
am Ligabetrieb berechtigt, ist w&auml;hrend der laufenden Spielzeit jederzeit m&ouml;glich. 
Auch neuen Teams gegen&uuml;ber sind wir stets aufgeschlossen und unterst&uuml;tzen Euch 
beim Start in die Liga.</p>
<p>Wenn wir Euer Interesse geweckt haben, k&ouml;nnt Ihr &uuml;ber die Teamkapit&auml;ne, die Vorstandsmitglieder 
oder via e-mail mit uns Kontakt aufnehmen. Oder einfach an einem der Spielabende 
bei einem der Teams vorbeischauen.</p>