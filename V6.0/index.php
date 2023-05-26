<!-- Der jeweilige Seiteninhalt wird durch $content festgelegt. Beim ersten Aufruf der Seite soll die Homepage geladen werden. -->

<?php
	if(!$content)
	{
		$content="home";
	}

// ...doch zuvor wird nachgeschaut, welchen Browser der Surfer benutzt,
// um sicherzustellen, dass das richtige Stylesheet geladen wird.
// Das hatte ich vorher mit conditional comments versucht, aber das
// funktionierte nicht zuverlaessig.
// Diese Variante funktioniert zuverlaessig.

	$browser = getenv('HTTP_USER_AGENT');
	if(eregi("ie", $browser))
	{
		if(eregi("mac", $browser))
		{
			echo '<meta http-equiv="refresh" content="0; URL=http://www.hdlev.de/macindex.php">';
		}
		else
		{
			$css="ie";
		}
	}
	else
	{
		$css="design";
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
          "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>

  <title>Heidelberger Dart Liga e.V.</title>

  <meta name="robots" content="noindex">

  <link rel="stylesheet" title="Design oder IE (Default)" type="text/css" href="CSS/<?php echo $css; ?>.css" media="screen">

<!-- Fuer alle Browser außer dem IE wird noch ein zweites Stylesheet zur Verfuegung gestellt -->

<?php
	$browser = getenv('HTTP_USER_AGENT');
	if(!eregi("ie", $browser))
	{
		echo"  <link rel='stylesheet' title='bessere Lesbarkeit' type='text/css' href='CSS/bigger.css' media='screen'>\n";
	}
?>

  <link rel="stylesheet" href="CSS/print.css" type="text/css" media="print">

</head>

<body>

<!--Seitenkopf-->
<div id="header">
  <?php
    include("Components/header.php");
  ?>  
</div>

<!--Navigation-->
<div id="menu">
  <?php
    include("Components/navi.php");
  ?>  
</div>

<!--Infospalte-->
<div id="info">
  <?php
    include("Components/infospalte.php");
  ?>  
</div>

<!--Seiteninhalt-->
<a name="SKIP"></a>
<div id="inhalt">
  <?php
    include("Content/".$content.".php");
  ?>  
</div>

<!--Fussbereich-->
<div id="footer">
  <?php
    include("Components/footer.php");
  ?>  
</div>

</body>
</html>