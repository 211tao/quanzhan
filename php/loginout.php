<?php
session_start();
unset($_SESSION["adminname"]);
$msg = '成功退出';
$jumUrl = 'admin.php';
include '../tip.php';
exit;
?>