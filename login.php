<?php

header("content-type:text/html;charset=utf-8");
$username=$password1="";
$msg="";$jumUrl="login.html";

if(empty($_POST["username"]))
{
	$msg= "用户名不能为空!"."<br>";
	
	include("tip.php");
	exit;
}
else{
	$username=exam($_POST["username"]);
	$password1=exam($_POST["password1"]);
	
	$reg="/^\w{6,18}$/";
	
	if(!preg_match($reg,$username))
	{
		$msg=  "用户名格式不正确!"."<br>";
		
		include("tip.php");
		exit;
	}
}
if(empty($_POST["password1"]))
{
	$msg= "密码不能为空!"."<br>";
	
	include("tip.php");
	exit;
}
else{
	
	$reg="/^\S{6,18}$/";
	
	if(!preg_match($reg,$password1))
	{
		$msg= "密码格式错误!"."<br>";
		
		include("tip.php");
		exit;
	}
}
function exam($data)
{
	$data=htmlspecialchars($data);
	$data=trim($data);
	$data=stripslashes($data);
	return $data;
}

$conn=new MySQLi("localhost","root","root","myitem");
if($conn->connect_error)
{
	die("数据库连接失败");
	
}
$sql="SELECT * FROM u_user WHERE username='$username'";
$result=$conn->query($sql);

if($result->num_rows)
{
	$row=$result->fetch_assoc();
	if($row["password"]==$password1)
	{
		
		session_start();
		if(!empty($_POST["denglu"]))
		{
			setcookie("username",$username,time()+5*24*3600,"/");
		}
		else{
			$_SESSION["username"]=$username;
		}
		$msg= "登录成功";
		$jumUrl="index.php";
		include"tip.php";
		exit;
	}
	else{
		$msg= "密码不对";
		
		include"tip.php";
		exit;
	}
}

		$msg= "您还未注册!请先注册"."<br>";
		$jumUrl="register.html";
		include("tip.php");
		exit;

/*$f=fopen("info.txt","r");
while($fl=fgets($f))
{
	$arr=explode("//",$fl);
	if($arr[0]==$username)
	{
		if($arr[1]==$password1)	
		{
			session_start();
			
			if(!empty($_POST["denglu"]))
			{
				setcookie("username",$username,time()+5*24*60*60,"/");
			}
			else{
				$_SESSION["username"]=$username;
			}
			$msg= "登录成功";
			$jumUrl="index.php";
			include"tip.php";
			exit;
		}
		else
		{
			$msg= "密码不正确!"."<br>";
			$jumUrl="login.html";
			include("tip.php");
			exit;
		}
		
	}
}*/
		/*$msg= "您还未注册!请先注册"."<br>";
		$jumUrl="register.html";
		include("tip.php");
		exit;*/
		
		
	

?>




