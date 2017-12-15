<?php
header("Content-type:text/html;charset=utf8");

$msg = '';
$jumpUrl = '../register.html';

if( $_SERVER['REQUEST_METHOD']=='POST' )
{
	
	$user = input_fn($_POST['user']);
	$pass1 = input_fn($_POST['pass1']);
	$pass2 = input_fn($_POST['pass2']);
	$email = input_fn($_POST['email']);
	$tel = input_fn($_POST['tel']);
	$area = input_fn($_POST['area']);
	//$sex = $_POST['sex'];
	//$hobby = $_POST['hobby'];
	//$ischeck = $_POST['ischeck'];
	//echo $user;
	
	
	if(empty($user))
	{
		$msg = '用户名不能为空';
		include '../tips.php';
		exit;
	}
	else
	{
		$re = '/^[a-zA-Z]+$/';
		if(!preg_match($re,$user))
		{
			$msg = '用户名格式不正确';
			include '../tips.php';
			exit;
		};
	};
	
	if(empty($pass1))
	{
		$msg = '密码不能为空';
		include '../tips.php';
		exit;
	}
	else
	{
		$re = '/^[a-zA-Z1-9]+$/';
		if(!preg_match($re,$pass1))
		{
			$msg = '密码格式不正确';
			include '../tips.php';
			exit;
		};
	};
	
	if($pass1!=$pass2)
	{
		$msg = '两次密码不正确';
		include '../tips.php';
		exit;
	};
	
	
	if(empty($email))
	{
		$msg = '邮箱不能为空';
		include '../tips.php';
		exit;
	}
	else
	{
		$re = '/^\w+@\w+\.\w+$/';
		if(!preg_match($re,$email))
		{
			$msg = '邮箱格式不正确';
			include '../tips.php';
			exit;
		};
	};
	
	
	if(empty($tel))
	{
		$msg = '手机号不能为空';
		include '../tips.php';
		exit;
	}
	else
	{
		$re = '/^1[35789]\d{9}$/';
		if(!preg_match($re,$tel))
		{
			$msg = '手机号格式不正确';
			include '../tips.php';
			exit;
		};
	};
	
	if(empty($area))
	{
		$msg = '地区不能为空';
		include '../tips.php';
		exit;
	}
	
	if($area=='请选择省份')
	{
		$msg = '请选择省份';
		include '../tips.php';
		exit;
	};
	
	if(empty($_POST['sex']))
	{
		$msg = '请选择性别';
		include '../tips.php';
		exit;
	}
	else
	{
		$sex = $_POST['sex'];
	};
	
	$hobbyStr = '';
	if(empty($_POST['hobby']))
	{
		echo '选一个爱好吧';
		exit;
	}
	else
	{
		$hobby = $_POST['hobby'];
		for($i=0;$i<count($hobby);$i++)
		{
			if($i==0)
			{
				$hobbyStr = $hobby[$i];
			}
			else
			{
				$hobbyStr = $hobbyStr.'|'.$hobby[$i];
			};
		};
		//echo $hobbyStr;
	};
	
	
	//echo $_POST['ischeck'];
	if(empty($_POST['ischeck']))
	{
		$msg = '请认真阅读协议';
		include '../tips.php';
		exit;
	};
	
	
	//$user = input_fn($_POST['user']);
//	$pass1 = input_fn($_POST['pass1']);
//	$pass2 = input_fn($_POST['pass2']);
//	$email = input_fn($_POST['email']);
//	$tel = input_fn($_POST['tel']);
//	$area = input_fn($_POST['area']);
	//$sex = $_POST['sex'];
	//$hobby = $_POST['hobby'];
	//$ischeck = $_POST['ischeck'];
	//echo $user;
	
	$userInformation = $user.'/'.$pass1.'/'.$email.'/'.$tel.'/'.$area.'/'.$sex.'/'.$hobbyStr;
	
	//echo $userInformation;
	$f = fopen('u.txt','a+');
	
	//判断输入的用户名是否存在， 如果存在，则跳转到注册页面重新注册，并提示用户，用户名已经存在 
	while($fl=fgets($f))
	{
		//echo "<pre>";
		//var_dump($fl);
		
		$userArr = explode('/',$fl);
		if($userArr[0]==$user)
		{
			$msg = '用户名已存在';
			include '../tips.php';
			exit;
		};
		
	};
	
	if(fwrite($f,$userInformation."\r\n"))
	{
		$msg = '注册成功';
		$jumpUrl = '../login.html';
		include '../tips.php';
		exit;
	};
	
	
}
else
{
	$msg = '不允许非法提交';
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
