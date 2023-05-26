<?php

include ("components/mysql.php");

$ko="3";

$sql="SELECT * FROM berichte WHERE ko=3";
$result=mysql_query($sql);
$bericht=mysql_fetch_array($result);
mysql_close();

echo $bericht['text'];

?>