<?php
   session_start();
   if($auth_user && $auth_addr) { 
      if($REMOTE_ADDR != $auth_addr) { 
        header("Location: ../Seiten/admin.fehler.php"); 
        exit; 
      }
   } 
   else {
      Header("Location: ../Seiten/admin.fehler.php");
   }
?> 
