<?php
   session_start();
   if($auth_user && $auth_addr) { 
      if($REMOTE_ADDR != $auth_addr) { 
        header("Location: index.php"); 
        exit; 
      }
   } 
   else {
      Header("Location: index.php");
   }
?> 
