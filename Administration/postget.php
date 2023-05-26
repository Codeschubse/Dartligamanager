<?php

// scheiss POST und GET gedoens

// Ligabemerkungen
$bemerkung=$_POST['bemerkung'];
$Bemerkung=$_POST['Bemerkung'];
$exist=$_POST['exist'];

// Ligaergebnisse
$Saison=$_POST['Saison'];
//$saison=$_POST['saison'];
$Tag=$_POST['Tag'];
//$tag=$_POST['tag'];
$Erg=$_POST['Erg'];
$erg0=$_GET['erg0'].$_POST['erg0'];
$erg1=$_GET['erg1'].$_POST['erg1'];
$erg2=$_GET['erg2'].$_POST['erg2'];
$erg3=$_GET['erg3'].$_POST['erg3'];
$erg4=$_GET['erg4'].$_POST['erg4'];
$erg5=$_GET['erg5'].$_POST['erg5'];
$erg6=$_GET['erg6'].$_POST['erg6'];
$erg7=$_GET['erg7'].$_POST['erg7'];
$erg8=$_GET['erg8'].$_POST['erg8'];
$erg9=$_GET['erg9'].$_POST['erg9'];
$erg10=$_GET['erg10'].$_POST['erg10'];

// Ligamax
$Max=$_POST['Max'];
$pass=$_POST['pass'];
$max=$_POST['max'];
$hifi0=$_POST['hifi0'];
$hifi1=$_POST['hifi1'];
$hifi2=$_POST['hifi2'];
$hifi3=$_POST['hifi3'];
$hifi4=$_POST['hifi4'];
$hifi5=$_POST['hifi5'];
$hifi6=$_POST['hifi6'];
$hifi7=$_POST['hifi7'];

// Ligaspielplan
$Spielplan=$_GET['Spielplan'].$_POST['Spielplan'];
$go=$_GET['go'].$_POST['go'];
$saison=$_GET['saison'].$_POST['saison'];
$tag=$_GET['tag'].$_POST['tag'];
$liga=$_GET['liga'].$_POST['liga'];
$datum=$_GET['datum'].$_POST['datum'];
$djahr=$_GET['djahr'].$_POST['djahr'];
$dmonat=$_GET['dmonat'].$_POST['dmonat'];
$dtag=$_GET['dtag'].$_POST['dtag'];
$heim0=$_GET['heim0'].$_POST['heim0'];
$heim1=$_GET['heim1'].$_POST['heim1'];
$heim2=$_GET['heim2'].$_POST['heim2'];
$heim3=$_GET['heim3'].$_POST['heim3'];
$heim4=$_GET['heim4'].$_POST['heim4'];
$heim5=$_GET['heim5'].$_POST['heim5'];
$heim6=$_GET['heim6'].$_POST['heim6'];
$heim7=$_GET['heim7'].$_POST['heim7'];
$heim8=$_GET['heim8'].$_POST['heim8'];
$heim9=$_GET['heim9'].$_POST['heim9'];
$heim10=$_GET['heim10'].$_POST['heim10'];
$gast0=$_GET['gast0'].$_POST['gast0'];
$gast1=$_GET['gast1'].$_POST['gast1'];
$gast2=$_GET['gast2'].$_POST['gast2'];
$gast3=$_GET['gast3'].$_POST['gast3'];
$gast4=$_GET['gast4'].$_POST['gast4'];
$gast5=$_GET['gast5'].$_POST['gast5'];
$gast6=$_GET['gast6'].$_POST['gast6'];
$gast7=$_GET['gast7'].$_POST['gast7'];
$gast8=$_GET['gast8'].$_POST['gast8'];
$gast9=$_GET['gast9'].$_POST['gast9'];
$gast10=$_GET['gast10'].$_POST['gast10'];

// News
$newsaktion=$_GET['newsaktion'];
$newsaction=$_POST['newsaction'];
$news_ID=$_GET['news_ID'].$_POST['news_ID'];
$news_datetime=$_POST['news_datetime'];
$news_main=$_POST['news_main'];
$news_header=$_POST['news_header'];

// Pokalspielplan
$Pokalspielplan=$_GET['Pokalspielplan'].$_POST['Pokalspielplan'];
$do=$_GET['do'].$_POST['do'];
$gruppe=$_GET['gruppe'].$_POST['gruppe'];
/*$saison=$_GET['saison'].$_POST['saison'];
$tag=$_GET['tag'].$_POST['tag'];
$datum=$_GET['datum'].$_POST['datum'];
$djahr=$_GET['djahr'].$_POST['djahr'];
$dmonat=$_GET['dmonat'].$_POST['dmonat'];
$dtag=$_GET['dtag'].$_POST['dtag'];
$heim1=$_GET['heim1'].$_POST['heim1'];
$heim2=$_GET['heim2'].$_POST['heim2'];
$heim3=$_GET['heim3'].$_POST['heim3'];
$heim4=$_GET['heim4'].$_POST['heim4'];
$heim5=$_GET['heim5'].$_POST['heim5'];
$heim6=$_GET['heim6'].$_POST['heim6'];
$heim7=$_GET['heim7'].$_POST['heim7'];
$heim8=$_GET['heim8'].$_POST['heim8'];
$heim9=$_GET['heim9'].$_POST['heim9'];
$heim10=$_GET['heim10'].$_POST['heim10'];
$gast1=$_GET['gast1'].$_POST['gast1'];
$gast2=$_GET['gast2'].$_POST['gast2'];
$gast3=$_GET['gast3'].$_POST['gast3'];
$gast4=$_GET['gast4'].$_POST['gast4'];
$gast5=$_GET['gast5'].$_POST['gast5'];
$gast6=$_GET['gast6'].$_POST['gast6'];
$gast7=$_GET['gast7'].$_POST['gast7'];
$gast8=$_GET['gast8'].$_POST['gast8'];
$gast9=$_GET['gast9'].$_POST['gast9'];
$gast10=$_GET['gast10'].$_POST['gast10'];*/

// Spieler
$sgo=$_GET['sgo'];
$spielerneu=$_POST['spielerneu'];
$spielerum=$_POST['spielerum'];
$spielerex=$_POST['spielerex'];
$pass=$_POST['pass'].$_GET['pass'];
$vorname=$_POST['vorname'].$_GET['vorname'];
$nachname=$_POST['nachname'].$_GET['nachname'];
$team=$_POST['team'].$_GET['team'];
//$passnr=$_POST['passnr'];
//$teamkurz=$_POST['teamkurz'];

// Teams
$tgo=$_GET['tgo'];
$teamneu=$_POST['teamneu'];
$tkurz=$_GET['tkurz'].$_POST['tkurz'];
$tname=$_GET['tname'].$_POST['tname'];
$thome=$_GET['thome'].$_POST['thome'];
$cpass=$_GET['cpass'].$_POST['cpass'];
$cvor=$_GET['cvor'].$_POST['cvor'];
$cname=$_GET['cname'].$_POST['cname'];
$cstr=$_GET['cstr'].$_POST['cstr'];
$cplz=$_GET['cplz'].$_POST['cplz'];
$cort=$_GET['cort'].$_POST['cort'];
$ctel=$_GET['ctel'].$_POST['ctel'];
$cemail=$_GET['cemail'].$_POST['cemail'];
$lname=$_GET['lname'].$_POST['lname'];
$lstr=$_GET['lstr'].$_POST['lstr'];
$lplz=$_GET['lplz'].$_POST['lplz'];
$lort=$_GET['lort'].$_POST['lort'];
$ltel=$_GET['ltel'].$_POST['ltel'];
$lhome=$_GET['lhome'].$_POST['lhome'];

// Teaser
$Teaser=$_POST['Teaser'];
$teaser=$_POST['teaser'];
$exist=$_POST['exist'];

// Termine
$termineaktion=$_GET['termineaktion'];
$dateaction=$_POST['dateaction'];
//$news_ID=$_GET['news_ID'].$_POST['news_ID'];
//$news_datetime=$_POST['news_datetime'];
//$news_main=$_POST['news_main'];
//$news_header=$_POST['news_header'];

// Vakant
//  --> nicht noetig

?>