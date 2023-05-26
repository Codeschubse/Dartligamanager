<?
include("../Bausteine/top.php");
?>
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
        

<form method="post" action="admin.check.php">
            <table>
              <tr> 
                <td colspan="2"> 
                  <div align="left"></div>
                  <div align="center"><b>Ligaleiter </b></div>
                </td>
              </tr>
              <tr> 
                <td><font size="-1">Name:</font></td>
                <td> 
                  <input value="" name="login_user" size="10" maxlength="20">
                </td>
              </tr>
              <tr> 
                <td> 
                  <div align="left"><font size="-1">Passwort:</font></div>
                </td>
                <td> 
                  <div align="left"> 
                    <input type="password" value="" name="login_passwd" size="10" maxlength="20">
                  </div>
                </td>
              </tr>
              <tr> 
                <td colspan='2'> 
                  <div align="center"> 
                    <input type="submit" name="login" value="log in...">
                  </div>
                </td>
              </tr>
            </table>
            </form>

<form method="post" action="admin.check.news.php">
            <table>
              <tr> 
                <td colspan="2"> 
                  <div align="left"></div>
                  <div align="center"><b>Pressewart</b> </div>
                </td>
              </tr>
              <tr> 
                <td><font size="-1">Name:</font></td>
                <td> 
                  <input value="" name="login_user" size="10" maxlength="20">
                </td>
              </tr>
              <tr> 
                <td> 
                  <div align="left"><font size="-1">Passwort:</font></div>
                </td>
                <td> 
                  <div align="left"> 
                    <input type="password" value="" name="login_passwd" size="10" maxlength="20">
                  </div>
                </td>
              </tr>
              <tr> 
                <td colspan='2'> 
                  <div align="center"> 
                    <input type="submit" name="login" value="log in...">
                  </div>
                </td>
              </tr>
            </table>
            </form>  
        </div>
      </td>
      <td rowspan="5" width="81%" valign="top">
        <p>&nbsp;</p>
        </td>
    </tr>
  </table>
</div>
</body>
</html>
