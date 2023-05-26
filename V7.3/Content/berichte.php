<?php

include ("Components/mysql.php");

$ko=$_GET['ko'];

if(!$ko)
{
 $ko="4";
}

$sql="SELECT * FROM berichte WHERE ko=$ko";
$result=mysql_query($sql);
$bericht=mysql_fetch_array($result);

echo $bericht['text'];

mysql_close();
?>