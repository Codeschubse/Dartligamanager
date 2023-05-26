<?php
require_once("../Components/db.php");
require_once("../Components/check_passwd.php");

$fd = mylib_connect_db();

if (check_passwd($login_user, $login_passwd, $fd) == 1) {
   session_start();
   session_unset();
   session_register("auth_addr");
   session_register("auth_user");
   $auth_user = $login_user;
   $auth_addr = $REMOTE_ADDR;

   mysql_close( $fd );

   Header("Location: http://root.hdlev.de/V2.1/Seiten/admin.eingang.php");  

}
else {
   mysql_close( $fd );
   Header("Location: http://www.hdlev.de/index.php?content=adminfehler");
}
?>
