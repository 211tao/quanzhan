<?php
session_start();
header('Content-type:text/html;charset=utf8');

$msg = '';
$jumpUrl = '../index.php';
if( !empty($_SESSION['username']) )
{
	session_destroy();
	$msg = '退出成功';
	include '../tips.php';
}
else
{
	setcookie('username',1,time()-1,'/');
	$msg = '退出成功';
	include '../tips.php';
};


?>