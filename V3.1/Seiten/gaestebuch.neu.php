<?php
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
      <td height="30"><?php
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
              <td height="80"><?php
include("../Navigation/navileft.php");
?></td>
            </tr>
            <tr> 
              <th height="30">G&auml;stebuch</th>
            </tr>
            <tr valign="top"> 
              <td> 
                <p><a href="gaestebuch.neu.php">In das G&auml;stebuch eintragen</a><br>
                  <a href="gaestebuch.php">G&auml;stebuch ansehen</a></p>
                </td>
            </tr>
          </table>
        </div>
      </td>
      <td rowspan="5" width="81%" valign="top" align="center">
        <form method="post" action="gaestebuch.php">
          <table width="75%" border="0">
            <tr> 
              <td width="33%">Dein Name:</td>
              <td width="67%"> 
                <input type="text" name="name" size="40">
              </td>
            </tr>
            <tr> 
              <td width="33%">Deine eMail-Adresse:</td>
              <td width="67%"> 
                <input type="text" name="email" size="40">
              </td>
            </tr>
            <tr> 
              <td width="33%">Deine Homepage:</td>
              <td width="67%"> 
                <input type="text" name="homepage" size="40">
              </td>
            </tr>
            <tr> 
              <td width="33%">Dein Eintrag:</td>
              <td width="67%"> 
                <textarea name="eintrag" cols="35" rows="3"></textarea>
              </td>
            </tr>
            <tr align="center"> 
              <td colspan="2"> 
                <input type="submit" name="GuestbookNew" value="Abschicken">
              </td>
            </tr>
          </table>
        </form>
        
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
