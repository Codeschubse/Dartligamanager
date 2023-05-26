<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
          "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
 <title>Heidelberger Dart Liga e.V.</title>
<meta name="description" content="Die Bristledartliga für Heidelberg und Umgebung">
<meta name="author" content="WWWeb inForm">
<meta name="keywords" content="Heidelberg, Dart, Darts, Liga, eingetragener, Verein, hdl, neun, darter, weltmeister, bundesliga">
<meta http-equiv="Content-Style-Type" content="text/css; charset=iso-8859-1">
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="DC.Title" content="HDL Heidelberger Dart Liga e.V.">
<meta name="DC.Creator" content="R&uuml;diger Sehls">
<meta name="DC.Subject" content="Darts">
<meta name="DC.Description"
      content="Die Bristledartliga für Heidelberg und Umgebung">
<meta name="DC.Publisher" content="R&uuml;diger Sehls">
<meta name="DC.Contributor" content="R&uuml;diger Sehls, HDL">
<meta name="DC.Date" content="2003-06-01">
<!-- <meta name="DC.Type" content=""> -->
<!-- <meta name="DC.Format" content=""> -->
<meta name="DC.Identifier" content="http://www.hdlev.de">
<meta name="DC.Source" content="Heidelberger Dart Liga">
<meta name="DC.Language" content="de">
<!-- <meta name="DC.Relation" content=""> -->
<meta name="DC.Coverage" content="Heidelberg">
<meta name="DC.Rights" content="Alle Rechte liegen beim Autor">
<meta name="robots" content="noarchive">

  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />


 <!--[if IE]><![if !IE]><![endif]-->
 <link rel="stylesheet" title="Design (Default)" type="text/css" href="CSS/design.css" media="screen">
 <link rel="stylesheet" title="bessere Lesbarkeit" type="text/css" href="CSS/bigger.css" media="screen">
 <!--[if IE]<![endif]><![endif]-->

 <!--[if IE]>
 <link rel="stylesheet" title="IE-gerecht" type="text/css" href="CSS/ie.css" media="screen">
 <![endif]-->
 

 <link rel="stylesheet" href="CSS/print.css" type="text/css" media="print">
</head>
<body>
<!-- Der jeweilige Seiteninhalt wird durch $content festgelegt. Beim ersten Aufruf der Seite soll die Homepage geladen werden. -->
<?php
  if(!$content)
  {
    $content="home";
  }
?>

<!--Header-->
<div id="header">
  <?php
    include("Components/header.php");
  ?>  
</div>

<!--Links-->
<div id="links">
  <?php
    include("Components/navi.php");
  ?>  
</div>

<!--Rechts-->
<div id="rechts">
  <?php
    include("Components/rightcol.php");
  ?>  
</div>

<!--Mitte-->
<div id="mitte">
<a name="SKIP"></a>
  <?php
    include("Content/".$content.".php");
  ?>  
</div>

<!--Footer-->
<div id="footer">
  <?php
    include("Components/footer.php");
  ?>  
</div>

</body>
</html>