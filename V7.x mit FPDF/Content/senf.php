<?php
//Verbindung zur Datenbank aufbauen
include ("Components/mysql.php");

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
		$website = stripslashes ($website); 
		$website = trim ($website); 
		$website = strip_tags ($website);
		$website = preg_replace("/[^a-z0-9 !?:;,.\/_\-=+@#$&\*\(\)]/im", "", $website );
		if($website){if(!ereg("^http:",$website)){$website="http://" . $website;}}
		$email = preg_replace("/[^a-z0-9 !?:;,.\/_\-=+@#$&\*\(\)]/im", "", $email ); 
		$email = preg_replace("/(content-type:|bcc:|cc:|to:|from:)/im", "", $email ); 
		$message = preg_replace("/(content-type:|bcc:|cc:|to:|from:)/im", "", $message ); 
		$name = preg_replace("/(content-type:|bcc:|cc:|to:|from:)/im", "", $name ); 

		if(strlen($name)<1){
			$errors[] ="Bitte gib Deinen Namen oder Deinen Nick an.<br>";
		}if($email){
			if(!ereg("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$",$email)){
				$errors[] ="Wenn Du eine eMail-Adresse angibst, sollte sie auch g&uuml;ltig sein. ;-)<br>";
			}
		}
		if(strlen($message)<3){
			$errors[] ="Hast Du den Gru&szlig; vergessen?<br>";
		}
		
		$email = ereg_replace("@","(at)",$email);
		
		if($website){$hp_format="<br><b>Website: </b><a href=".$website.">".$website."</a>";}
		
   }

  if(empty($errors))
   {
    // code to be executed if form passed
    // e.g. save or send submitted values
    // ...

			//Alle Felder ausgefuellt - Eintrag vorbereiten
			//Neuen Gaestebucheintrag vornehmen
			$now=date("Y-m-d H:i:s");
			$guestbook_SQL_insert="INSERT INTO guestbook (guestbook_name,guestbook_email,guestbook_homepage,guestbook_text,guestbook_datetime) VALUES ('$name','$email','$hp_format','$message','$now')";
			//Mail verschicken
			$recipient="webmaster@hdlev.de";
			$subject="Neuer Eintrag im HDL-Gaestebuch";
			if($email){$header="From: ".$email."\n";}
			else{$header="From: webmaster@hdlev.de\n";}
     
			$mail_body="Von: ".$name." (".$email.")\n\nGruss: ".$message;
     
			mail($recipient,$subject,$mail_body,$header);

			// Eintrag vornehmen
			if(mysql_query($guestbook_SQL_insert)) {
		    $action = 'passed';
			} 
			else {
				echo "<p><strong>Fehler</strong>:Dein Gru&szlig; konnte nicht eingetragen werden. Bitte versuche es noch einmal. <a href=\"#\" onclick=\"history.back()\">Zurück zum Formular</a></p>";
			}

   }
  else $action = 'main';
 }

if(isset($_REQUEST['action']))  $action = $_REQUEST['action'];
if(empty($action)) $action = 'main';

?>

<h2>G&auml;stebucheintrag schreiben</h2>
<?php

switch($action)
 {
  case 'main':
   $_SESSION['captcha_session'] = $captcha->generate_code();

   if(isset($errors)) { ?><h4>Fehler:</h4><ul><?php foreach($errors as $error) { ?><li><?php echo $error; ?></li><?php } ?></ul><br /></p><?php }

   // display form:
   ?>

   <p>Zum Schutz vor Mi&szlig;brauch des G&auml;stebuchs durch sogenannte <span class="color">&laquo;Spambots&raquo;</span> wird hier ein sogenanntes grafisches <acronym title="Completely Automated Public Turing test to tell Computers and Humans Apart (w&ouml;rtlich &uuml;bersetzt bedeutet das Vollautomatischer &ouml;ffentlicher Turing-Test, um Computer und Menschen zu unterscheiden)">CAPTCHA</acronym> eingesetzt. Wenn Du Schwierigkeiten hast, das CAPTCHA zu erkennen, verwende bitte alternativ das Gru&szlig;formular mit einem <a href="?content=senf2">mathematischen CAPTCHA</a>.</p>

   <form action="<?php echo '?content=senf2'; ?>" method="post">
   <div>
   <input type="hidden" name="<?php echo session_name(); ?>" value="<?php echo session_id(); ?>" />
   <p>Bitte nenne Deinen Namen:</p>
   <input type="text" name="name" size="40" />
   <p>Unter welcher eMail-Adresse bist Du erreichbar?</p>
   <input type="text" name="email" size="40" />
   <p>Hast Du eine eigene Website?</p>
   <input type="text" name="website" size="60" />
   <p>Gib hier bitte Deinen Gru&szlig; ein:<br />
   <textarea name="message" cols="50" rows="5"><?php if(isset($message)) echo htmlspecialchars($message); ?></textarea></p>
   <table>
   <tr>
   <td class="noborder"><img class="captcha" src="captcha/captcha_image.php<?php echo '?'.SID; ?>" alt="CAPTCHA" width="180" height="40"/></td>
   <td class="noborder">&raquo;</td>
   <td class="noborder"><input class="captcha" type="text" name="captcha_word" value="" size="10" /></td>
   </tr>
   </table>
   <p><input type="submit" name="form_submit" value="&nbsp;eintragen&nbsp;" /></p>
   </div>
   </form><?php
  break;
  case 'passed':
   if(isset($error)) die();
   ?><p>Vielen Dank! Dieser Gru&szlig; wurde eingetragen:</p>
   <p class="box">
   	<?php
   		echo "Name/Nick: ".$name."<br />\n";
   		echo "eMail: ".$emailadresse."<br />\n";
   		echo "Website: ".$website."<br />\n";
   		echo "Gru&szlig;: ".nl2br(htmlspecialchars(stripslashes($_POST['message'])));
   	?>
   </p>
   <p><a href="<?php echo '?content=buch'; ?>">zur&uuml;ck zum G&auml;stebuch</a></p><?php
  break;
 }

mysql_close();
?>