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
              <th height="30">Turniere</th>
            </tr>
            <tr valign="top"> 
              <td><?
include("../Navigation/naviturniere.php");
?></td>
            </tr>
          </table>
        </div>
        </td>
      <td rowspan="5" width="81%" valign="top"> 
        <p align="left"><?
include("../Seiten/turniere.ausschreibung.php");
?></p>
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
