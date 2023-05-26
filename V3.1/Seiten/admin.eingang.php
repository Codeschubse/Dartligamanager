<?
require_once("../Bausteine/proof_session.php");
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
              <td><?
include("../Navigation/naviadmin.php");
?> </td>
            </tr>
          </table>
        </div>
      </td>
      <td rowspan="5" width="81%" valign="top">
        <table width="100%" border="0" height="100%">
          <tr bgcolor="#FF9999"> 
            <td colspan="3" height="12"><font size="-2">Hier k&ouml;nnen registrierte 
              Administratoren Daten in die Datenbank eingeben und vorhandene Datens&auml;tze 
              &auml;ndern. Bei Fragen bitte an den Webmaster wenden: R&uuml;diger 
              Sehls, . Diese Telefonnummer bitte vertraulich behandeln.</font></td>
          </tr>
          <tr> 
            <td colspan="3" height="10"></td>
          </tr>
          <tr> 
            <td width="2%" height="374">&nbsp;</td>
            <td width="95%" height="374" valign="top">
              <p>An die Administratoren:</p>
              <p>Einige Skripte &uuml;bergeben Daten per URL. Das hei&szlig;t, 
                Ihr solltet NICHT die Browserschaltfl&auml;chen f&uuml;r die Navigation 
                benutzen, sondern nur die programmierten Links. Sonst k&ouml;nnte 
                es passieren, da&szlig; Eintr&auml;ge doppelt vorgenommen werden, 
                was zu Fehlern in der MySql-Datenbank f&uuml;hren kann.</p>
              <p>Es sind zwar alle Eingabemasken mit Sicherheitsabfragen gesichert, 
                die MySql-Datenbank aber leider nicht (die m&uuml;ssen wir so 
                nehmen, wie 1&amp;1 sie zur Verf&uuml;gung stellt). Um sie nicht 
                mit unsinnigen Eingaben durcheinander zu bringen, bitte ich darum, 
                alle Eingaben zu pr&uuml;fen, bevor die Submit-Schaltfl&auml;chen 
                benutzt werden.</p>
              <p>Sollte es doch einmal Probleme geben, k&ouml;nnt Ihr mich gerne 
                unter o.g. Mobilfunknummer anrufen. Sollte ich dort nicht erreichbar 
                sein, bin ich in einem Funkloch oder in einer Umgebung, die das 
                Abschalten erfordert (Lokal, Kirche etc.) oder ich liege im Bett. 
                Letzteres ist meistens nur sp&auml;t in der Nacht der Fall ;-)</p>
              <p>Manche der Prozeduren plane ich noch zu verfeinern, jedoch wollte 
                ich zuerst die Homepage soweit fertigstellen, da&szlig; ich sie 
                guten Gewissens ins Netz stellen kann. Dann ist immernoch Zeit 
                f&uuml;r Komfortverbesserungen.</p>
              <p>der Webmaster.</p>
              </td>
            <td width="3%" height="374">&nbsp;</td>
          </tr>
          <tr> 
            <td colspan="3">&nbsp;</td>
          </tr>
        </table>
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
