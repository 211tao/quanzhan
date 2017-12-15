<?php
session_start();
header("content-type:text/html;charset=utf8");
$msg="";

if(!empty($_SESSION["username"]))
{
	unset($_SESSION["username"]);
}
else{
	setcookie("username",1,time()-1,"/");
}

$msg="注销成功";
$jumUrl="login.html";
include"tip.php";





?>