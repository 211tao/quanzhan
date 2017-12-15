<?php
session_start();
header("Content-type:text/html;charset=utf8");

$jumpUrl = '../login.html';
$msg = '';

if( $_SERVER['REQUEST_METHOD']=='POST' )
{
	
	$user = input_fn($_POST['user']);
	$password = input_fn($_POST['pass']);
	
	/*
		登录成功
		登录失败（ 用户名不存在、密码不正确 ）
	*/
	
	if(empty($user))
	{
		$msg = '用户名不能为空';
		include '../tips.php';
		exit;
	};
	if(empty($password))
	{
		$msg = '密码不能为空';
		include '../tips.php';
		exit;
	};
	
	
	$f = fopen('u.txt','r');
	while($fl=fgets($f))
	{
		$userArr = explode('/',$fl);
		//echo '<pre>';
		//var_dump( $userArr );
		
		if( $userArr[0] == $user  )
		{
			if($userArr[1] == $password)
			{
				
				
				
				
				if( empty($_POST['isCheck']) )
				{
					$_SESSION['username'] = $user;
				}
				else
				{
					setcookie('username',$user,time()+5*24*60*60,'/');
				};
				
				
				$msg = '登录成功';
				$jumpUrl = '../index.php';
				include '../tips.php';
				exit;
			}
			else
			{
				$msg = '密码错误';
				include '../tips.php';
				exit;
			};
		};
		
		
	};
	$msg = '用户名不存在';
	include '../tips.php';
	exit;
	
}
else
{
	$msg = '不允许非法登录';
	include '../tips.php';
	exit;
};

function input_fn( $data )
{
	$data = htmlspecialchars($data);
	$data = trim($data);
	$data = stripslashes($data);
	return $data;
};
?>
