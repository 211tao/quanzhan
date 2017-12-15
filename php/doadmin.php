<?php
session_start();//开启session


$msg = '';
$jumUrl = 'admin.php';
if( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
	$username=$_POST["username"];
	$password=$_POST["password"];
	if( empty( $_POST['username'] ) )
	{
		$msg = '用户名不能为空';
		include 'tip.php';
		exit;
	}
	else{
		$reg="/^\w+$/";
	if(!preg_match($reg,$username))
	{
		$msg="用户名格式不正确!";
		
		include "tip.php";
		exit;
	}
	}
	
	if( empty( $_POST['password'] ) )
	{
		$msg = '密码不能为空';
		include 'tip.php';
		exit;
	}
	else{
		$reg="/^\w{6,18}$/";
		if(!preg_match($reg,$password))
		{
			$msg="密码格式不正确";
			include"tip.php";
			exit;
		}
	}
	$conn=new MySQLi("localhost","root","root","myitem");
	$sql="SELECT * FROM h_user WHERE username='$username'";
	$result=$conn->query($sql);
	if($result->num_rows)
	{
		$row=$result->fetch_assoc();
		if($row["password"]==$password)
		{
			$_SESSION['adminname'] = $_POST['username'];
			$msg="登录成功";
			$jumUrl ="column.php";
			include("tip.php");
			exit;
		}
		else{
			$msg="密码不正确";
			$jumUrl ="admin.php";
			include("tip.php");
			exit;
		}
	}
	else{
			$msg="用户名不存在";
			$jumUrl ="admin.php";
			include("tip.php");
			exit;
	}
	
	/*$msg = '登录成功';
	$jumUrl = 'column.php';
	include 'tip.php';
	exit;*/
	
}
else
{
	$msg = '非法登录';
	include 'tip.php';
	exit;
};


?>