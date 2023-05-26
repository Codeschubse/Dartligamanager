<?php
session_start();

require('captcha/captcha.php');
$captcha = new captcha();

// if form was submitted, check if CAPTCHA word is correct:
if(isset($_POST['form_submit']))
 {
  if($captcha->check_captcha($_SESSION['captcha_session'],$_POST['captcha_word'])!=TRUE) $errors[] = 'Falschen Code eingegeben!';

  if(empty($errors))
   {
    // additional checks for the other form fields...
		$name = stripslashes ($name); 
		$name = trim ($name); 
		$name = strip_tags ($name); 
		$email = stripslashes ($email); 
		$email = trim ($email); 
		$email = strip_tags ($email); 
		$message = stripslashes ($message); 
		$message = trim ($message); 
		$message = strip_tags ($message); 
		$email = preg_replace("/[^a-z0-9 !?:;,.\/_\-=+@#$&\*\(\)]/im", "", $email ); 
		$email = preg_replace("/(content-type:|bcc:|cc:|to:|from:)/im", "", $email ); 
		$message = preg_replace("/(content-type:|bcc:|cc:|to:|from:)/im", "", $message ); 
		$name = preg_replace("/(content-type:|bcc:|cc:|to:|from:)/im", "", $name ); 

		if(strlen($name)<1){
			$errors[] ="Bitte gib Deinen Namen an.<br>";
		}
		if(!ereg("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$",$email)){
			$errors[] ="Bitte gib eine g&uuml;ltige eMail-Adresse an.<br>";
		}
		if(strlen($message)<3){
			$errors[] ="Bitte gib eine Nachricht/Anfrage ein.<br>";
		}

   }

  if(empty($errors))
   {
    // code to be executed if form passed
    // e.g. save or send submitted values
    // ...

			//Alle Felder ausgefuellt - eMail generieren
			$subject="HDL-Kontaktformular";
			$header = "From: ".$email."\r\n"."Reply-To:".$email."\r\n"."X-Mailer: PHP/".phpversion()."Date: ".date("r")."Message-Id: <" . date("YmdHis") . "." . substr($temp_array[0],2) . "@domain.com>";
			$mail_body ="Das Anfrage-Formular wurde am " . date("d.m.Y") . " um " . date("H:i") . "h ausgef&uuml;hrt.\n";
			$mail_body.="Folgende Werte wurden eingetragen:\n\n";
			$mail_body.="Name: " . $name . "\n";
			$mail_body.="eMail: " . $email . "\n\n";
			$mail_body.="Anfrage:\n";
			$mail_body.=$message . "\n\n ---- Ende der automatisch generierten eMail ----";
     
			if(mail($recipient,$subject,$mail_body,$header)) {
		    $action = 'passed';
			} 
			else {
				echo "<p><strong>Fehler</strong>:Deine Nachricht konnte nicht gesendet werden. Bitte versuche es noch einmal. <a href=\"#\" onclick=\"history.back()\">Zurück zum Formular</a></p>";
			}

   }
  else $action = 'main';
 }

if(isset($_REQUEST['action']))  $action = $_REQUEST['action'];
if(empty($action)) $action = 'main';

?>

<h2>Kontakt</h2>
<?php

switch($action)
 {
  case 'main':
   $_SESSION['captcha_session'] = $captcha->generate_code();

   if(isset($errors)) { ?><h4>Fehler:</h4><ul><?php foreach($errors as $error) { ?><li><?php echo $error; ?></li><?php } ?></ul><br /></p><?php }

// Teamnamen herausfinden
include ("Components/mysql.php");
$sql_befehl="select * from teams where team_kurz='$team'";
$antwort=mysql_query($sql_befehl);
$data=mysql_fetch_array($antwort);
$empfaenger=$data['team_name'];
$recipient=$data['team_mail'];

      if(!$recipient)
       {
         $recipient="webmaster@hdlev.de";
         $empfaenger="Webmaster";
       }

   // display form:
   ?>
   
   <p>Zum Schutz vor Mi&szlig;brauch des Kontaktformulars durch sogenannte <span class="color">&laquo;Spambots&laquo;</span> wird hier ein sogenanntes grafisches <acronym title="Completely Automated Public Turing test to tell Computers and Humans Apart (w&ouml;rtlich &uuml;bersetzt bedeutet das Vollautomatischer &ouml;ffentlicher Turing-Test, um Computer von Menschen zu unterscheiden)">CAPTCHA</acronym> eingesetzt.<!-- Wenn Du Schwierigkeiten hast, das CAPTCHA zu erkennen, verwende bitte alternativ das Kontaktformular mit einem <a href="?content=kontakt2">mathematischen CAPTCHA</a>.--></p>
    
   <form action="<?php echo '?content=kontakt'; ?>" method="post">
   <div>
   <input type="hidden" name="<?php echo session_name(); ?>" value="<?php echo session_id(); ?>" />
   <p>Bitte nenne Deinen Namen:</p>
   <input type="text" name="name" size="40" />
   <p>Unter welcher eMail-Adresse bist Du erreichbar?</p>
   <input type="text" name="email" size="40" />
   <p>Gib hier bitte Deine Nachricht ein:<br />
   <textarea name="message" cols="50" rows="5"><?php if(isset($message)) echo htmlspecialchars($message); ?></textarea></p>
   <p style="margin-bottom:0px;">Bitte gib den folgenden Code ein:</p>
   <table>
   <tr>
   <td class="noborder"><img class="captcha" src="captcha/captcha_image.php<?php echo '?'.SID; ?>" alt="CAPTCHA" width="180" height="40"/></td>
   <td class="noborder">&raquo;</td>
   <td class="noborder"><input class="captcha" type="text" name="captcha_word" value="" size="10" /></td>
   </tr>
   </table>
   <p><input type="submit" name="form_submit" value="&nbsp;senden&nbsp;" /> an: <?php echo $empfaenger; ?></p>
   </div>
	<input type="hidden" name="recipient" value="<?php echo $recipient; ?>">
	<input type="hidden" name="empfaenger" value="<?php echo $empfaenger; ?>">
   </form><?php
  break;
  case 'passed':
   if(isset($error)) die();

// Teamnamen herausfinden
include ("Components/mysql.php");
$sql_befehl="select * from teams where team_kurz='$team'";
$antwort=mysql_query($sql_befehl);
$data=mysql_fetch_array($antwort);
$empfaenger=$data['team_name'];
$recipient=$data['team_mail'];

      if(!$recipient)
       {
         $recipient="webmaster@hdlev.de";
         $empfaenger="Webmaster";
       }

   ?><p>Vielen Dank! Folgende Nachricht wurde an <?php echo $empfaenger; ?> gesandt:</p>
   <p class="box"><?php echo nl2br(htmlspecialchars(stripslashes($_POST['message']))); ?></p>
   <p><a href="<?php echo '?content=kontakt'; ?>">zur&uuml;ck</a></p><?php
  break;
 }
?>