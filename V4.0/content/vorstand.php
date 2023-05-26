<?php

//Verbindung zur Datenbank aufbauen
include ("components/mysql.php");

//Vorstand auswählen
$sql_befehl="select * from spieler where sp_head='1'";
$antwort=mysql_query($sql_befehl);
$data=mysql_fetch_array($antwort);
$email=$data['sp_mail'];
if($email)
{
 $head_name="<a href='mailto:".$email."?subject=bitte%20gib%20einen%20Betreff%20an%2C%20please%20type%20a%20subject&body=Das%20%22%28at%29%22%20muss%20durch%20den%20Klammeraffen%20%22@%22%20ersetzt%20werden%0D%0A%0D%0A%22%28at%29%22%20must%20be%20replaced%20by%20%22@%22' title='Das (at) muss durch den Klammeraffen @ ersetzt werden!'>".$data['sp_vor']." ".$data['sp_name']."</a>";
}
else
{
 $head_name=$data['sp_vor']." ".$data['sp_name'];
}
$head_adr =$data['sp_str'].", ".$data['sp_plz']." ".$data['sp_ort']."<br>\n";
$head_adr.="Tel.: ".$data['sp_tel'];

//stellv. Vorstand auswählen
$sql_befehl="select * from spieler where sp_vice='1'";
$antwort=mysql_query($sql_befehl);
$data=mysql_fetch_array($antwort);
$email=$data['sp_mail'];
if($email)
{
 $vice_name="<a href='mailto:".$email."?subject=bitte%20gib%20einen%20Betreff%20an%2C%20please%20type%20a%20subject&body=Das%20%22%28at%29%22%20muss%20durch%20den%20Klammeraffen%20%22@%22%20ersetzt%20werden%0D%0A%0D%0A%22%28at%29%22%20must%20be%20replaced%20by%20%22@%22' title='Das (at) muss durch den Klammeraffen @ ersetzt werden!'>".$data['sp_vor']." ".$data['sp_name']."</a>";
}
else
{
 $vice_name=$data['sp_vor']." ".$data['sp_name'];
}
$vice_adr =$data['sp_str'].", ".$data['sp_plz']." ".$data['sp_ort']."<br>\n";
$vice_adr.="Tel.: ".$data['sp_tel'];

//Ligaleiter auswählen
$sql_befehl="select * from spieler where sp_man='1'";
$antwort=mysql_query($sql_befehl);
$data=mysql_fetch_array($antwort);
$email=$data['sp_mail'];
if($email)
{
 $man_name="<a href='mailto:".$email."?subject=bitte%20gib%20einen%20Betreff%20an%2C%20please%20type%20a%20subject&body=Das%20%22%28at%29%22%20muss%20durch%20den%20Klammeraffen%20%22@%22%20ersetzt%20werden%0D%0A%0D%0A%22%28at%29%22%20must%20be%20replaced%20by%20%22@%22' title='Das (at) muss durch den Klammeraffen @ ersetzt werden!'>".$data['sp_vor']." ".$data['sp_name']."</a>";
}
else
{
 $man_name=$data['sp_vor']." ".$data['sp_name'];
}
$man_adr =$data['sp_str'].", ".$data['sp_plz']." ".$data['sp_ort']."<br>\n";
$man_adr.="Tel.: ".$data['sp_tel'];

//Kassenwart auswählen
$sql_befehl="select * from spieler where sp_cash='1'";
$antwort=mysql_query($sql_befehl);
$data=mysql_fetch_array($antwort);
$email=$data['sp_mail'];
if($email)
{
 $cash_name="<a href='mailto:".$email."?subject=bitte%20gib%20einen%20Betreff%20an%2C%20please%20type%20a%20subject&body=Das%20%22%28at%29%22%20muss%20durch%20den%20Klammeraffen%20%22@%22%20ersetzt%20werden%0D%0A%0D%0A%22%28at%29%22%20must%20be%20replaced%20by%20%22@%22' title='Das (at) muss durch den Klammeraffen @ ersetzt werden!'>".$data['sp_vor']." ".$data['sp_name']."</a>";
}
else
{
 $cash_name=$data['sp_vor']." ".$data['sp_name'];
}
$cash_adr =$data['sp_str'].", ".$data['sp_plz']." ".$data['sp_ort']."<br>\n";
$cash_adr.="Tel.: ".$data['sp_tel'];

//Pressewart auswählen
$sql_befehl="select * from spieler where sp_pr='1'";
$antwort=mysql_query($sql_befehl);
$data=mysql_fetch_array($antwort);
$email=$data['sp_mail'];
if($email)
{
 $pr_name="<a href='mailto:".$email."?subject=bitte%20gib%20einen%20Betreff%20an%2C%20please%20type%20a%20subject&body=Das%20%22%28at%29%22%20muss%20durch%20den%20Klammeraffen%20%22@%22%20ersetzt%20werden%0D%0A%0D%0A%22%28at%29%22%20must%20be%20replaced%20by%20%22@%22' title='Das (at) muss durch den Klammeraffen @ ersetzt werden!'>".$data['sp_vor']." ".$data['sp_name']."</a>";
}
else
{
 $pr_name=$data['sp_vor']." ".$data['sp_name'];
}
$pr_adr =$data['sp_str'].", ".$data['sp_plz']." ".$data['sp_ort']."<br>\n";
$pr_adr.="Tel.: ".$data['sp_tel'];

//Datenbank schließen
mysql_close();

?>

<p>&nbsp;</p><table width="65%" align="center" bgcolor="ff9900" cellspacing="1" cellpadding="2" border="0">
  <tr bgcolor="#FFCC66">
    <th colspan="2">Vorsitzender</th>
          </tr>
          <tr>

    <td width="36%" valign="top" bgcolor="FFFF99"><b><?php echo $head_name ?></b></td>

    <td width="64%" bgcolor="#FFFF99"><?php echo $head_adr ?></td>
          </tr>

  <tr bgcolor="#FFCC66">
    <th colspan="2">stellv. Vorsitzender</th>
          </tr>
          <tr>

    <td width="36%" valign="top" bgcolor="#FFFF99"><b><?php echo $vice_name ?></b></td>

    <td width="64%" bgcolor="#FFFF99"><?php echo $vice_adr ?></td>
          </tr>

  <tr bgcolor="#FFCC66">
    <th colspan="2">Ligaleiter</th>
          </tr>
          <tr>

    <td width="36%" valign="top" bgcolor="#FFFF99"><b><?php echo $man_name ?></b></td>

    <td width="64%" bgcolor="#FFFF99"><?php echo $man_adr ?><br>
      Fax.: 01805 999 1897 2127</td>
          </tr>

  <tr bgcolor="#FFCC66">
    <th colspan="2">Kassenwart</th>
          </tr>
          <tr>

    <td width="36%" valign="top" bgcolor="#FFFF99"><b><?php echo $cash_name ?></b></td>

    <td width="64%" bgcolor="#FFFF99"><?php echo $cash_adr ?></td>
          </tr>

  <tr bgcolor="#FFCC66">
    <th colspan="2">Pressewart</th>
          </tr>
          <tr>

    <td width="36%" valign="top" bgcolor="#FFFF99"><b><?php echo $pr_name ?></b></td>

    <td width="64%" bgcolor="#FFFF99"><?php echo $pr_adr ?></td>
          </tr>
        </table>
        <div align="center"><br>
          <font size="-2">Gem&auml;&szlig; &sect; 28 BDSG widersprechen wir jeder
          kommerziellen Verwendung und Weitergabe unserer Daten!</font> </div>
