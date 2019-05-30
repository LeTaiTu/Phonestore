<?php 
session_start();
setcookie('admin', '', time() - 3600, '/', '', 0);
session_destroy();

header("Location: ../index.php");
 ?>