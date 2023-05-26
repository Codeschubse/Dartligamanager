<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
          "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
 <title>Heidelberger Dart Liga e.V.</title>

 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 

  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
 
  <link rel="stylesheet" title="Default-Style" type="text/css" href="CSS/default.css" media="screen">
  <link rel="stylesheet" href="CSS/print.css" type="text/css" media="print">

<!--[if lte IE 6]>
<style type="text/css">
/* ================================================================ 
This copyright notice must be untouched at all times.

The original version of this stylesheet and the associated (x)html
is available at http://www.cssplay.co.uk/menus/padding.html
Copyright (c) 2005-2007 Stu Nicholls. All rights reserved.
This stylesheet and the assocaited (x)html may be modified in any 
way to fit your requirements.
=================================================================== */
.menu ul ul {left:-1px; margin-left:-1px;}
</style>
<![endif]--> 
</head>

<body>

<!-- Feststellen, welcher Browser verwendet wird -->
<?php
	$ua = getenv('HTTP_USER_AGENT');
	if(eregi("ie", $ua))
	{
		$browser="ie";
	}
	else
	{
		$browser="mozilloid";
	}
?>

<!-- Der jeweilige Seiteninhalt wird durch $content festgelegt. Beim ersten Aufruf der Seite soll die Homepage geladen werden. -->
<?php

/* Seitendefinition mit Injektionsschutz durch Whitelist */
	include_once('Components/whitelist.php');
    if(in_array($_GET['content'],$whitelist)){
        $content=$_GET['content'];
    }else{
        $content='home';
    }

/* Seitendefinition ohne Injektionsschutz
  if($_GET['content'])
  {
  	$content=$_GET['content'];
  }
  else
  {
    $content="home";
  } */
  
?>

<!-- Gesamtbreite auf 640px festlegen und zentrieren -->
<div id="master">

<!-- IE-Nutzer bekommen erklaert, dass der Browser fehlerhaft darstellt
<?php
	if($browser=="ie"){
?>
<div id="warnung">
	<?php
		include("Components/warnung.php");
	?>
</div>
<?php
	}
?> -->

<!--Kopf-->
<div id="header">
<div id="logo">
  <?php
    include("Components/logo.php");
  ?>  
</div>
<div id="title">
  <?php
    include("Components/title.php");
  ?>  
</div>
<div class="clear">
</div>
</div>

<!--Menue-->
<div class="menu">
  <?php
		include("Components/menu.php");
  ?>  
</div>

<!--Inhalt-->
<a name="SKIP"></a>
<div id="inhalt">
  <?php
    include("Content/".$content.".php");
  ?>  
</div>

<!--Fuss-->
<div id="footer">
  <?php
    include("Components/footer.php");
  ?>  
</div>

</div>

</body>
</html>