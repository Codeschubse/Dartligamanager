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

Die Heidelberger Dart Liga ist - seit ihrer Gr�ndung im Jahre 1985 - die Liga 
f�r Bristle-Dart im Rhein-Neckar-Kreis. Wir sind eine freie Liga mit derzeit <?php echo $teamzahl; ?> 
Teams und <?php echo $spielerzahl; ?> aktiven Spielern. Darunter sind vom Freizeit-Darter 
bis zum Weltmeister alle Spielst�rken vertreten. <br>
Seit dem Februar 2000 sind wir ein eingetragener Verein, der sich zum Ziel gesetzt 
hat den verbandsunabh�ngigen Steeldart-Sport im Rhein-Neckar-Kreis zu f�rdern. 
<br>
Die Heidelberger Dart Liga organisiert einen regelm�ssigen Spielbetrieb von Mitte 
September bis Ende Mai. Dazu kommen noch der Pokalwettbewerb und verschiedene 
offene Ranglistenturniere. Der regul�re Spieltag unserer Liga ist der Dienstag, 
an dem ab 20 Uhr die Begegnungen ausgetragen werden. Die Pokalspiele der ersten 
und zweiten Runde werden ebenfalls an Dienstagen gespielt. Die besten vier Teams 
bestreiten das Pokalfinale am Samstag nach dem letzten Ligaspiel. <br>
Ranglistenturniere werden von uns als offene Turniere ausgerichtet. Es k�nnen 
daher auch Spieler teilnehmen, die nicht in der HDL gemeldet sind. Die Ranglistenturniere 
werden von den Teams selbst organisiert und ausgerichtet. Die Termine (meistens 
Samstage) werden rechtzeitig vor den Turnieren bekanntgegeben. <br>
Am Ende der Saison veranstaltet die HDL f�r alle Teams eine Abschlussfeier. Hier 
treffen sich noch einmal alle Spieler zu einem geselligen Abend, bevor es in die 
Sommerpause geht. <br>
Spieler, die sich einem Team anschliessen oder an einem der Ranglistenturniere 
teilnehmen wollen, sind uns herzlich willkommen. Eine Nachmeldung, die zur Teilnahme 
am Ligabetrieb berechtigt, ist w�hrend der laufenden Spielzeit jederzeit m�glich. 
Auch neuen Teams gegen�ber sind wir stets aufgeschlossen und unterst�tzen Euch 
beim Start in die Liga. <br>
Wenn wir Euer Interesse geweckt haben, k�nnt Ihr �ber die Teamkapit�ne, die Vorstandsmitglieder 
oder via e-mail mit uns Kontakt aufnehmen. Oder einfach an einem der Spielabende 
bei einem der Teams vorbeischauen.<br>
<font size="-2">(Text von R. Schwegler)</font>