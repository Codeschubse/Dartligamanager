<table cellspacing="20">
	<tr valign="top">
		<td>

<?php

// Alle vakanten Spieler auslesen
$befehl="select sp_pass,sp_vor,sp_name from spieler where sp_team='vac' order by sp_pass";
$antwort=mysql_query($befehl);

// Tabelle mit vakanten Spielern ausgeben
echo "<table cellspacing='3'><tr><th>Pa&szlig;</th><th colspan='2'>Name</th></tr>\n";
while($data=mysql_fetch_array($antwort)){
	echo "<tr><td align='right'>".$data['sp_pass']."</td><td align='right'>".$data['sp_vor']."</td><td align='left'>".$data['sp_name']."</td></tr>\n";
	}
echo "</table>\n";

?>

		</td>
		<td>

<?php

// Alle vakanten Teams auslesen
$befehl="select team_name from teams where team_aktiv is null and team_kurz!='x' order by team_name";
$antwort=mysql_query($befehl);

// Tabelle mit vakanten Teams ausgeben
echo "<table cellspacing='3'><tr><th>Team</th></tr>\n";
while($data=mysql_fetch_array($antwort)){
	echo "<tr><td>".$data['team_name']."</td></tr>\n";
	}
echo "</table>\n";

?>

		</td>
	</tr>
</table>