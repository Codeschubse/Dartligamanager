<?
include("../Bausteine/top.php");
?>
<html>
<body>
<div align="left"> 
  <table width="100%" height="85%" border="1" bordercolor="#000000">
    <tr> 
      <td height="30" width="200"> 
<?php include("../Bausteine/copyright.php"); ?>
      </td>
      <td height="30"><?
include("../Navigation/navitop.php");
?></td>
    </tr>
    <tr> 
      <td height="159" rowspan="5" valign="top" width="200"> 
        <div align="center"></div>
        <div align="center"></div>
        <div align="left"></div>
        <div align="left">
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
              <th height="30">Adminbereich</th>
            </tr>
            <tr valign="top"> 
              <td>
            </td>
            </tr>
          </table>
          <a href="adminbereich.php">zum Login...</a></div>
      </td>
      <td rowspan="5" width="81%" valign="top">
        <p>&nbsp;</p>
        <p>Es ist ein Fehler aufgetreten! Entweder bist Du nicht als Administrator 
          registriert oder Name bzw. Pa&szlig;wort wurden falsch geschrieben.</p>
        <p>Falls Du Probleme mit dem einloggen hast, wende dich bitte an den Webmaster.</p>
      </td>
    </tr>
  </table>
</div>
</body>
</html>
