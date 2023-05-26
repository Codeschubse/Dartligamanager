<?php

include('mysql.php');

require('../fpdf/fpdf.php');

// Funktion zum formatieren des Datums definieren
function datum($datum)
{
 $tag=substr($datum,8,2);
 $monat=substr($datum,5,2);
 $jahr=substr($datum,0,4);
 $datum=$tag.".".$monat.".".$jahr;

 return $datum;
}

// Funktion zum Feststellen des Teamnamens anhand des Kuerzels definieren
function teamname($name)
{
 $befehl="select team_name from teams where team_kurz='$name'";
 $antwort=mysql_query($befehl);
 $datatn=mysql_fetch_array($antwort);
 $name=strip_tags($datatn['team_name']);

 return $name;
}

// Funktion zum Feststellen der Spielerdaten definieren
function spielerdaten($pass)
{
 $befehl="select sp_vor,sp_name,sp_team from spieler where sp_pass='$pass'";
 $antwort=mysql_query($befehl);
 $data=mysql_fetch_array($antwort);
 $spielerdaten["name"]=$data['sp_vor']." ".$data['sp_name'];
 $spielerdaten["team"]=$data['sp_team'];

 return $spielerdaten;
}

// Funktion zum Formatieren der Ergebnisanzeige definieren
function result($erg)
{
 switch($erg)
 {
  case 1:
   $result="verlegt";
  break;

  case -1:
   $result="ohne Wertung";
  break;

  case 10:
   $result="10:0";
  break;

  case 8:
   $result="9:1";
  break;

  case 6:
   $result="8:2";
  break;

  case 4:
   $result="7:3";
  break;

  case 2:
   $result="6:4";
  break;

  case 0:
   $result="5:5";
  break;

  case -2:
   $result="4:6";
  break;

  case -4:
   $result="3:7";
  break;

  case -6:
   $result="2:8";
  break;

  case -8:
   $result="1:9";
  break;

  case -9:
   $result="0:10*";
  break;

  case -10:
   $result="0:10";
  break;

  default:
   $result="-";
 }

 return $result;
}

// neue Klasse beerbt FPDF (Kopf und Fu§ aendern)
class PDF extends FPDF
{
//Page header
function Header()
{
	//Logo
	$this->Image('../Images/hdl-logo.png',10,10,33);
	//Times bold italic 16
	$this->SetFont('Times','BI',20);
	//Blue text colour
	$this->SetTextColor(0,0,140);
	//Move to the right
	$this->Cell(65);
	//Title
	$this->Cell(70,25,'Heidelberger Dart Liga e.V.',0,0,'C');
	//Line break
	$this->Ln(30);
}
//Page footer
function Footer()
{
	//Position at 1.5 cm from bottom
	$this->SetY(-15);
	//Arial italic 8
	$this->SetFont('Arial','I',8);
	//Page number
	$this->Cell(0,10,'Seite '.$this->PageNo().' von {nb}',0,0,'C');
}
//Header
function TableHeader($header,$w,$h,$f,$l,$a,$b)
{
	$i=0;
	foreach($header as $col)
		{
		$this->Cell($w[$i],$h,$col,$f,$l,$a[$i],$b);
		$i++;
		}
	$this->Ln();
}
function TableRow($row,$w,$h,$f,$l,$a,$b)
{
	$i=0;
	foreach($row as $col)
		{
		$this->Cell($w[$i],$h,$col,$f,$l,$a[$i],$b);
		$i++;
		}
	$this->Ln();
}

var $widths;
var $aligns;
var $height;

function SetWidths($w)
{
	//Set the array of column widths
	$this->widths=$w;
}

function SetAligns($a)
{
	//Set the array of column alignments
	$this->aligns=$a;
}

function SetHeight($ht)
{
	//Set the height of columns
	$this->height=$ht;
}

function MTableRow($data)
{
	//Calculate the height of the row
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=$this->height*$nb;
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border
		$this->Rect($x,$y,$w,$h);
		//Print the text
		$this->MultiCell($w,$this->height,$data[$i],0,$a);
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}

function CheckPageBreak($h)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
	//Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}
}

// Neue PDF-Seite generieren
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Aktuelles Datum auswaehlen
$auswahl=date("Y-m-d");

// Datum des Spieltags herausfinden
$befehl ="select distinct tag_datum from spieltag where tag_saison=$saison";
$befehl.=" and tag_index='$tag'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$datum=$data['tag_datum'];

// vorher noch feststellen, wieviele Divisionen an diesem Spieltag spielen
$befehl="SELECT count(DISTINCT tag_liga) FROM spieltag WHERE tag_saison = $saison";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$divanzahl=$data['count(DISTINCT tag_liga)'];

// bei mehreren Divisionen Ergebnisse & Tabelle mehrmals anzeigen (1x fuer jede Div)
$div=0;

// WIEDERHOLUNG FUER JEDE DIVISION
do
{
$div++;

if($divanzahl > 1)
{
  $divnennung = " der ".$div.". Division";
}

$pdf->SetFont('Times','B',12);
$pdf->Cell(0,10,'Ergebnisse aller Begegnungen und Tabelle'.$divnennung.' vom '.$tag.'. Spieltag der Saison '.$saison.', '.datum($datum),0,1);


////////////////
// Ergebnisse
////////////////

//Tabellenkopf
$w=array(60,60,17);
$pdf->SetFont('Times','B',10);
$header=array('Heim','Gast','Ergebnis');
$align=array('L','L','C');
$pdf->TableHeader($header,$w,7,1,0,$align,0);

//Tabelleninhalt
$pdf->SetFont('Times','',10);

// MANNSCHAFTEN UND ERGEBNISSE AUSLESEN UND EINTRAGEN
$befehl="select tag_heim from spieltag where tag_saison='$saison' and tag_index='$tag' and tag_liga='$div'";
$antwort=mysql_query($befehl);
while($data=mysql_fetch_array($antwort))
{
	$heim=$data['tag_heim'];
	$unterbefehl ="select tag_gast, tag_erg from spieltag where tag_saison='$saison' and tag_liga='$div'";
	$unterbefehl.=" and tag_index='$tag' and tag_heim='$heim'";
	$unterantwort=mysql_query($unterbefehl);
	$unterdata=mysql_fetch_array($unterantwort);
	$gast=$unterdata['tag_gast'];
	$erg=$unterdata['tag_erg'];

	$row=array(teamname($heim),teamname($gast),result($erg));
	$align=array('L','L','C');
	$pdf->TableRow($row,$w,6,1,0,$align,0);
}

// etwas Abstand zw. Ergebnisse und Tabelle
$pdf->Cell(0,5,'',0,1);

// =======================
// TABELLE AB HIER
// =======================

mysql_query("truncate table tabelle");

// MySql-TABELLE MIT ALLEN TABELLENEINTRAEGEN ALLER TEAMS ERZEUGEN
$teambefehl ="select distinct tag_heim from spieltag where tag_heim<>'x'";
$teambefehl.=" and tag_saison=$saison and tag_liga='$div'";
$teamantwort=mysql_query($teambefehl);
while($teamdaten=mysql_fetch_array($teamantwort))
{

$team=$teamdaten['tag_heim'];
$pluspunkte=0;
$minuspunkte=0;
$plusspiele=0;
$minusspiele=0;
$spiele=0;
$siege=0;
$nieder=0;
$deuce=0;
$punktdiff=0;
$spieldiff=0;

// SPIELTAGE EINZELN AUSLESEN
$befehl ="select distinct tag_datum, tag_index from spieltag where tag_saison=$saison";
$befehl.=" and tag_liga='$div' and tag_index<='$tag' order by tag_index";
$antwort=mysql_query($befehl);
while($data=mysql_fetch_array($antwort))
{
 $datum=$data['tag_datum'];
 $index=$data['tag_index'];

 // von momentan gewaehltem Datum Gegner und Ergebnis auslesen und darstellen
 $unterbefehl ="select tag_heim, tag_gast, tag_erg from spieltag where tag_datum='$datum' and tag_liga='$div'";
 $unterantwort=mysql_query($unterbefehl);

 // HEIM UND GAST ERFAHREN
 while($unterdata=mysql_fetch_array($unterantwort))
 {
  $heim=$unterdata['tag_heim'];
  $gast=$unterdata['tag_gast'];
  $ergebnis=$unterdata['tag_erg'];

// NICHT GESPIELTE NICHT ZAEHLEN
if($ergebnis<>9 and $ergebnis<>1)
{

  // HEIMSPIEL
  if($heim==$team)
  {

   // SPIELFREIE AUSLASSEN
   if($gast!='x')
   {
    $spiele++;
    if($ergebnis<0)
    {
     if($ergebnis==-9)
     {
      $nieder++;
      $ergebnis=-10;
      $pluspunkte=$pluspunkte-2;
      $minuspunkte=$minuspunkte+2;
      $plusspiele=$plusspiele+(5+$ergebnis/2);
      $minusspiele=$minusspiele+(5-$ergebnis/2);
     }
     else
     {
      $nieder++;
      $minuspunkte=$minuspunkte+2;
      $plusspiele=$plusspiele+(5+$ergebnis/2);
      $minusspiele=$minusspiele+(5-$ergebnis/2);
     }
    }
    if($ergebnis==0)
    {
     $deuce++;
     $pluspunkte++;
     $minuspunkte++;
     $plusspiele=$plusspiele+5;
     $minusspiele=$minusspiele+5;
    }
    if($ergebnis>0)
    {
     $siege++;
     $pluspunkte=$pluspunkte+2;
     $plusspiele=$plusspiele+(5+$ergebnis/2);
     $minusspiele=$minusspiele+(5-$ergebnis/2);
    }

    $spieldiff=$plusspiele-$minusspiele;
    $punktdiff=$pluspunkte-$minuspunkte;

   // schliessende Klammer fuer SPIELFREIE AUSLASSEN
   }

  // schliessende Klammer fuer HEIMSPIEL
  }

  // AUSWAERTSSPIEL
  if($gast==$team)
  {

   // SPIELFREIE AUSLASSEN
   if($heim!='x')
   {
    $spiele++;
    if($ergebnis>0)
    {
     $nieder++;
     $minuspunkte=$minuspunkte+2;
     $plusspiele=$plusspiele+(5-$ergebnis/2);
     $minusspiele=$minusspiele+(5+$ergebnis/2);
    }
    if($ergebnis==0)
    {
     $deuce++;
     $pluspunkte++;
     $minuspunkte++;
     $plusspiele=$plusspiele+5;
     $minusspiele=$minusspiele+5;
    }
    if($ergebnis<0)
    {
     if($ergebnis==-9)
     {
      $ergebnis=-10;
      $siege++;
      $pluspunkte=$pluspunkte+2;
      $plusspiele=$plusspiele+(5-$ergebnis/2);
      $minusspiele=$minusspiele+(5+$ergebnis/2);
     }
     else
     {
      $siege++;
      $pluspunkte=$pluspunkte+2;
      $plusspiele=$plusspiele+(5-$ergebnis/2);
      $minusspiele=$minusspiele+(5+$ergebnis/2);
     }
    }

    $spieldiff=$plusspiele-$minusspiele;
    $punktdiff=$pluspunkte-$minuspunkte;

   // schliessende Klammer fuer SPIELFREIE AUSLASSEN
   }

  // schliessende Klammer fuer AUSWAERTSSPIEL
  }

// schliessende Klammer zu NICHT GESPIELTE NICHT ZAEHLEN
}

 // schliessende Klammer fuer HEIM UND GAST ERFAHREN
 }

// schliessende Klammer fuer SPIELTAGE EINZELN AUSLESEN
}

// Teamname herausfinden
$befehl ="select team_name from teams where team_kurz='$team'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);
$teamname=$data['team_name'];

// Tabelleneintraege in Tabelle zwischenspeichern
$save_befehl ="insert into tabelle (team, anz, plus, minus, diff, p, m, d, s, u, n)";
$save_befehl.=" values ('$teamname', '$spiele', '$pluspunkte', '$minuspunkte', '$punktdiff',";
$save_befehl.=" '$plusspiele', '$minusspiele', '$spieldiff', '$siege', '$deuce', '$nieder')";
mysql_query($save_befehl);

// schliessende Klammer fuer MySql-TABELLE MIT ALLEN TABELLENEINTRAEGEN ALLER TEAMS ERZEUGEN
}

//Tabellenkopf
$w=array(10,60,10,20,10,20,10,8,8,8);
$pdf->SetFont('Times','B',10);
$header=array('Platz','Team','Anz.','Punkte','Diff.','Spiele','Diff.','S','U','N');
$align=array('R','L','R','C','R','C','R','R','R','R');
$pdf->TableHeader($header,$w,7,1,0,$align,0);

//Tabelleninhalt
$pdf->SetFont('Times','',10);

$platz=0;
$tabbefehl ="select * from tabelle order by plus desc, minus asc, p desc, m asc";
$tabantwort=mysql_query($tabbefehl);
while($tabdata=mysql_fetch_array($tabantwort))
{
	$platz++;

	$row=array($platz,$tabdata['team'],$tabdata['anz'],$tabdata['plus']." : ".$tabdata['minus'],$tabdata['diff'],$tabdata['p']." : ".$tabdata['m'],$tabdata['d'],$tabdata['s'],$tabdata['u'],$tabdata['n']);
	$pdf->TableRow($row,$w,6,1,0,$align,0);
}

// etwas Abstand nach Tabelle
$pdf->Cell(0,5,'',0,1);

// schliessende Klammer zu WIEDERHOLUNG FUER JEDE DIVISION
} while ($div < $divanzahl);


// ======================================
// MAXIMUMS UND HIGH FINISHS AB HIER
// ======================================

//Tabellenkopf
$pdf->SetFont('Times','BU',9);
$header=array('Maximums','High Finishs');
$w=array(90,90);
$align=array('C','C');
$pdf->TableHeader($header,$w,7,1,0,$align,0);

//Tabelleninhalt
$pdf->SetFont('Times','',8);

$befehl ="SELECT max_pass, sum( max_max )  AS  'max' FROM max where max_saison='$saison' and max_tag='$tag'";
$befehl.="and max_max is not null GROUP  BY max_pass ORDER  BY max DESC ";
$antwort=mysql_query($befehl);
$anzahl=mysql_num_rows($antwort);

// KEINE MAX - EINTRAG "KEINE"
if($anzahl==0)
{
$lzelle.="keine";
}

while($data=mysql_fetch_array($antwort))
{
 $spielerdaten=spielerdaten($data['max_pass']);
 $spielername=$spielerdaten["name"];
 $spielerteam=$spielerdaten["team"];
 $lzelle.=$data['max']." x ".$spielername." (".$data['max_pass'].", ".teamname($spielerteam).")\n";
}

// dann die haifinnischs

$befehl ="select max_pass,max_hifi from max where max_saison='$saison' and max_tag='$tag'";
$befehl.=" and max_hifi is not null order by max_hifi desc";
$antwort=mysql_query($befehl);
$anzahl=mysql_num_rows($antwort);

// KEINE MAX - EINTRAG "KEINE"
if($anzahl==0)
{
$rzelle.="keine";
}

while($data=mysql_fetch_array($antwort))
{
 $spielerdaten=spielerdaten($data['max_pass']);
 $spielername=$spielerdaten["name"];
 $spielerteam=$spielerdaten["team"];
 $rzelle.=$data['max_hifi']." - ".$spielername." (".$data['max_pass'].", ".teamname($spielerteam).")\n";
}

$row=array($lzelle,$rzelle);
$pdf->SetWidths(array(90,90));
$pdf->SetAligns(array('L','L'));
$pdf->SetHeight(4);
$pdf->MTableRow($row);

// ===============================
// BEMERKUNGEN AB HIER
// ===============================

$befehl="select bem_text from bemerkungen where bem_saison='$saison' and bem_tag='$tag'";
$antwort=mysql_query($befehl);
$data=mysql_fetch_array($antwort);

// KEINE BEMERKUNGEN - KEINE ANZEIGE
if($data['bem_text'])
{

// etwas Abstand nach Max und HiFi
$pdf->Cell(0,5,'',0,1);

//Tabellenkopf
$pdf->SetFont('Times','BU',9);
$header=array('Bemerkungen');
$w=array(180);
$align=array('C');
$pdf->TableHeader($header,$w,7,1,0,$align,0);

//Tabelleninhalt
$pdf->SetFont('Times','',8);
$row=array(strip_tags(html_entity_decode($data['bem_text'])));
$pdf->SetWidths(array(180));
$pdf->SetAligns(array('L'));
$pdf->SetHeight(4);
$pdf->MTableRow($row);

// schliessende Klammer zu KEINE BEMERKUNGEN - KEINE ANZEIGE
}

// PDF-Seite an Browser senden
$pdf->Output();

?>