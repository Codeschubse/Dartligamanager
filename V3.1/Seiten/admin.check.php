<?php
require_once("../Bausteine/db.php");
require_once("../Bausteine/check_passwd.php");

$fd = mylib_connect_db();

if (check_passwd($login_user, $login_passwd, $fd) == 1) {
   session_start();
   session_unset();
   session_register("auth_addr");
   session_register("auth_user");
   $auth_user = $login_user;
   $auth_addr = $REMOTE_ADDR;

   mysql_close( $fd );

   Header("Location: ../Seiten/admin.eingang.php");  
}
else {
   mysql_close( $fd );
   Header("Location: ../Seiten/admin.fehler.php");
}
?>
