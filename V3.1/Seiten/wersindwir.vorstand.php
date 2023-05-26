<?
include("../Bausteine/top.php");
?>
<div align="left"> 
  <table width="100%" height="85%" border="1" bordercolor="#000000">
    <tr> 
      <td height="30"> 
<?php include("../Bausteine/copyright.php"); ?>
      </td>
      <td height="30"><?
include("../Navigation/navitop.php");
?></td>
    </tr>
    <tr> 
      <td height="159" rowspan="5" valign="top"> 
        <div align="center"></div>
        <div align="center">
          <table width="100%" border="0">
            <tr> 
              <th height="30"> 
                <div align="center"></div>
                <div align="center">Hauptmen&uuml;</div>
              </th>
            </tr>
            <tr> 
              <td height="80"><?
include("../Navigation/navileft.php");
?></td>
            </tr>
            <tr> 
              <th height="30">Wer sind wir?</th>
            </tr>
            <tr valign="top"> 
              <td><?
include("../Navigation/naviwersindwir.php");
?></td>
            </tr>
          </table>
        </div>
        </td>
      
<?php

//Verbindung zur Datenbank aufbauen
include ("../Bausteine/mysql.php");

//Vorstand auswählen
$sql_befehl="select * from spieler where sp_head='1'";
$antwort=mysql_query($sql_befehl);
$data=mysql_fetch_array($antwort);
$email=$data['sp_mail'];
if($email)
{
 $head_name="<a href='mailto:".$email."'>".$data['sp_vor']." ".$data['sp_name']."</a>";
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
 $vice_name="<a href='mailto:".$email."'>".$data['sp_vor']." ".$data['sp_name']."</a>";
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
 $man_name="<a href='mailto:".$email."'>".$data['sp_vor']." ".$data['sp_name']."</a>";
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
 $cash_name="<a href='mailto:".$email."'>".$data['sp_vor']." ".$data['sp_name']."</a>";
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
 $pr_name="<a href='mailto:".$email."'>".$data['sp_vor']." ".$data['sp_name']."</a>";
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

<td rowspan="5" width="81%" valign="top"> 
        <table width="65%" border="0" align="center">
          <tr> 
            <th colspan="2">Vorsitzender</th>
          </tr>
          <tr> 
            <td width="36%"><b><?php echo $head_name ?></b></td>
            <td width="64%"><?php echo $head_adr ?></td>
          </tr>
          <tr> 
            <th colspan="2">stellv. Vorsitzender</th>
          </tr>
          <tr> 
            <td width="36%"><b><?php echo $vice_name ?></b></td>
            <td width="64%"><?php echo $vice_adr ?></td>
          </tr>
          <tr> 
            <th colspan="2">Ligaleiter</th>
          </tr>
          <tr> 
            <td width="36%"><b><?php echo $man_name ?></b></td>
            <td width="64%"><?php echo $man_adr ?></td>
          </tr>
          <tr> 
            <th colspan="2">Kassenwart</th>
          </tr>
          <tr> 
            <td width="36%"><b><?php echo $cash_name ?></b></td>
            <td width="64%"><?php echo $cash_adr ?></td>
          </tr>
          <tr> 
            <th colspan="2">Pressewart</th>
          </tr>
          <tr> 
            <td width="36%"><b><?php echo $pr_name ?></b></td>
            <td width="64%"><?php echo $pr_adr ?></td>
          </tr>
        </table>
        <div align="center"><br>
          <font size="-2">Gem&auml;&szlig; &sect; 28 BDSG widersprechen wir jeder 
          kommerziellen Verwendung und Weitergabe unserer Daten!</font> </div>
      </td>
    </tr>
    <tr> </tr>
    <tr> </tr>
    <tr> </tr>
    <tr> </tr>
  </table>
</div>
</body>
</html>
