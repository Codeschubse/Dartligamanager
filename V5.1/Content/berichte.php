<?php

include ("Components/mysql.php");

if(!$ko)
{
 $ko="3";
}

$sql="SELECT * FROM berichte WHERE ko=$ko";
$result=mysql_query($sql);
$bericht=mysql_fetch_array($result);

echo $bericht['text'];

mysql_close();
?>