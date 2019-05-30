<?php 
session_start();
setcookie('admin', 'admin', time() + 3600, '/', '', 0);

require_once 'views/login_view.php';
?>