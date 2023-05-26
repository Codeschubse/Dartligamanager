<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
          "http://www.w3.org/TR/html4/loose.dtd">
<!-- tinyMCE -->
<script language="javascript" type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
	// Notice: The simple theme does not use all options some of them are limited to the advanced theme
	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});
</script>
<!-- /tinyMCE -->

<html>
<head>
 <title>Heidelberger Dart Liga e.V.</title>

 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<!--
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
 -->
  <link rel="stylesheet" title="Default-Style" type="text/css" href="admin.css" media="screen">
<!--  <link rel="stylesheet" href="print.css" type="text/css" media="print"> -->

</head>

<?php include ("mysql.php"); ?>
<?php include ("postget.php"); ?>

<body>

	<div id="inhalt">
		<h1>Adminbereich</h1>
		<h2>Unbefugte (und Unbedarfte) Finger weg!</h2>
		<div id="left">
			<div class="modul">
				<h3>Ligaspielplan f&uuml;r n&auml;chste Saison</h3>
				<?php include ("Module/ligaspielplan.php"); ?>
			</div>
			<div class="modul">
				<h3>Ligaspieltage bearbeiten</h3>
				<?php include ("Module/ligaergebnisse.php"); ?>
				<?php include ("Module/ligamax.php"); ?>
				<?php include ("Module/ligabemerkungen.php"); ?>
			</div>
			<div class="modul">
				<h3>Pokalspielplan f&uuml;r n&auml;chste Saison</h3>
				<?php include ("Module/pokalspielplan.php"); ?>
			</div>
			<div class="modul">
				<h3>Pokalspieltage bearbeiten</h3>
				<?php include ("Module/pokalergebnisse.php"); ?>
				<?php include ("Module/pokalmax.php"); ?>
				<?php include ("Module/pokalbemerkungen.php"); ?>
			</div>
			<div class="modul">
				<h3>Teams verwalten</h3>
				<?php include ("Module/teams.php"); ?>
			</div>
			<div class="modul">
				<h3>Spieler verwalten</h3>
				<?php include ("Module/spieler.php"); ?>
			</div>
			<div class="modul">
				<h3>&Auml;mter verwalten</h3>
				<?php include ("Module/aemter.php"); ?>
			</div>
			<div class="modul">
				<h3>Vakanzen</h3>
				<?php include ("Module/vakant.php"); ?>
			</div>
		</div>
		<div id="right">
			<div class="modul">
				<h3>Teaser (Startseite/Homepage) bearbeiten</h3>
				<?php include ("Module/teaser.php"); ?>
			</div>
			<div class="modul">
				<h3>Termine bearbeiten</h3>
				<?php include ("Module/termine.php"); ?>
			</div>
			<div class="modul">
				<h3>News bearbeiten</h3>
				<?php include ("Module/news.php"); ?>
			</div>
		</div>
	</div>

</body>

<?php mysql_close() ?>

</html>