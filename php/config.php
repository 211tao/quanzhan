<?php
session_start();
header("Content-type:text/html;charset=utf8");
$msg="";
$jumUrl="";
$conn=new MySQLi("localhost","root","root","myitem");
if($conn->connect_error)
{
	die("数据库连接失败");
}
?>