<?
include("../Bausteine/top.php");
?>
<html>
<body>
<div align="left"> <table width="100%" height="85%" border="1" bordercolor="#000000"> 
<tr> 
      <td height="30" width="17%"> <?php include("../Bausteine/copyright.php"); ?> 
      </td>
      <td height="30" width="83%"><?
include("../Navigation/navitop.php");
?></td>
    </tr> <tr> 
      <td height="159" rowspan="5" valign="top" width="17%"> 
        <div align="center"></div><div align="center"></div><div align="left"></div><div align="left"> 
<table width="100%" border="0"> <tr> <th height="30"> <div align="center"></div><div align="center">Hauptmen&uuml;</div></th></tr> 
<tr> <td height="80"><?
include("../Navigation/navileft.php");
?></td></tr> <tr> 
              <th height="30">Hochzeit</th>
            </tr> <tr valign="top"> 
              <td> 
                <form method="post" action="hochzeit.php">
                  <table border="0" width="100%">
                    <tr> 
                      <td colspan="2"> 
                        <div align="center"><b>Dein Eintrag<br>
                          ins G&auml;stebuch</b></div>
                      </td>
                    </tr>
                    <tr> 
                      <td colspan="2">Ich bin... </td>
                    </tr>
                    <tr> 
                      <td colspan="2"> 
                        <input type="text" name="name" size="20">
                      </td>
                    </tr>
                    <tr> 
                      <td colspan="2">Mein Gru&szlig;: </td>
                    </tr>
                    <tr> 
                      <td colspan="2"> 
                        <textarea name="eintrag" cols="20" rows="8"></textarea>
                      </td>
                    </tr>
                    <tr align="center"> 
                      <td colspan="2"> 
                        <input type="submit" name="GuestbookNew" value="senden">
                      </td>
                    </tr>
                    <tr align="center">
                      <td colspan="2"><font size="-2"><a href="printversion.hochzeit.php" target="_blank">Printversion 
                        der<br>
                        Hochzeitsgr&uuml;&szlig;e</a></font> </td>
                    </tr>
                  </table>
                </form>
                
              </td>
            </tr> 
</table></div></td>
      <td rowspan="5" width="83%" VALIGN="TOP"> 
        <p align="left"><?
include("inhalt.hochzeit.php");
?></p>
        </td></tr> 
<tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> </table></div>
</body>
</html>
