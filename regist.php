<?php
header("content-type:text/html;charset=utf-8");
if($_SERVER['REQUEST_METHOD']=="POST")
{
	$username=$password1=$password2=$email1=$phone=$select1=$sex=$hobby="";
	$username= exam($_POST["username"]);
	$password1= exam($_POST["password1"]);
	$password2= exam($_POST["password2"]);
	$email1= exam($_POST["email1"]);
	$phone= exam($_POST["phone"]);
	$select1=$_POST["select1"];
/*$sex=$_POST["sex"];*/
$hobbystr="";
$msg="";

if(empty($username))
{
	$msg= "用户名不能为空!";
	$jumUrl="register.html";
	include "tip.php";
	exit;
}
else{
	$reg="/^\w+$/";
	if(!preg_match($reg,$username))
	{
		$msg="用户名格式不正确!";
		$jumUrl="register.html";
		include "tip.php";
		exit;
	}
}
if(empty($password1))
{
	$msg= "密码不能为空!";
	$jumUrl="register.html";
	include "tip.php";
	exit;
}

else{
	$reg="/^\w{6,18}$/";
	if(!preg_match($reg,$password1))
	{
		$msg= "密码格式不正确!";
		$jumUrl="register.html";
		include "tip.php";
		exit;
	}
	$reg1="/^\d+$/";
	{
		if(preg_match($reg1,$password1))
		{
			$msg="密码过于简单!";
			$jumUrl="register.html";
			include"tip.php";
			exit;
		}
	}
}
if($password1!=$password2)
{
	$msg="两次密码不一样!";
	$jumUrl="register.html";
	include "tip.php";
	exit;
}
if(empty($email1))
{
	$msg="邮箱不能为空!";
	$jumUrl="register.html";
	include "tip.php";
	exit;
}
else{
	$reg="/^\w+@[0-9a-zA-Z]{2,5}\.(com|cn|com\.cn|net|edu|org)$/";
	if(!preg_match($reg,$email1))
	{
		$msg="邮箱格式不正确!";
		$jumUrl="register.html";
		include "tip.php";
		exit;
	}
}
if(empty($phone))
{
	$msg="手机不能为空!";
	$jumUrl="register.html";
	include "tip.php";
	exit;
}

else{
	$reg="/^0?1[3578]\d{9}/";
	if(!preg_match($reg,$phone))
	{
		$msg="手机格式不正确!";
		$jumUrl="register.html";
		include "tip.php";
		exit;
	}
}
if($select1=="请选择地区")
{
	$msg="地区不能为空!";
	$jumUrl="register.html";
	include "tip.php";
	exit;
}
if(empty($_POST["sex"]))
{
	$msg="性别不能为空!";
	$jumUrl="register.html";
	include "tip.php";
	exit;
}
else{
	$sex=$_POST["sex"];
}
if(empty($_POST["hobby"]))
{
	$msg="请选择爱好!";
	$jumUrl="register.html";
	include "tip.php";
	exit;
}
if(empty($_POST["xieyi"]))
{
	$msg="请认真阅读协议！";
	$jumUrl="register.html";
	include "tip.php";
	exit;
}
$hobby=$_POST["hobby"];
for($i=0;$i<count($hobby);$i++)
{
	if($i==0)
	{
		$hobbystr.=$hobby[$i];
	}
	else{
		$hobbystr.="||".$hobby[$i];
	}
}


/*$str="";
$str=$username."//".$password1."//".$email1."//".$phone."//".$select1."//".$_POST["sex"]."//".$hobbystr;
$f=fopen("info.txt","a+");
while($fl=fgets($f))
{
	$arr=explode("//",$fl);
	if($arr[0]==$username)
	{
		$msg="用户名已经存在!";
		$jumUrl="register.html";
		include "tip.php";
		exit;
	}
}
if(fwrite($f,$str."\r\n"))
{
		$msg="注册成功!";
		$jumUrl="login.html";
		include "tip.php";
		exit;
}*/
$host="localhost";
$hostname="root";
$hostpass="root";
$conn=new MySQLi($host,$hostname,$hostpass,"myitem");
if($conn->connect_error)
{
	die("连接数据库失败");
}
$sql="SELECT * FROM u_user WHERE username='$username'";
$result=$conn->query($sql);	
if($result->num_rows)
{
	$msg="用户名已被注册";
	
	$jumUrl="register.html";
	include"tip.php";
	exit;
}
	
$sql="INSERT INTO u_user(username,password,email,tel,area,sex,hobby) VALUES('$username','$password1','$email1','$phone','$select1','$sex','$hobbystr')";

if($conn->query($sql))
{
	$msg="注册成功";
	
	$jumUrl="login.html";
	include"tip.php";
	exit;
}
}
else
{
	$msg="非法注册";
	
	$jumUrl="register.html";
	include"tip.php";
	exit;
}
function exam($data)
{
	$data=htmlspecialchars($data);
	$data=trim($data);
	$data=stripslashes($data);
	return $data;
}


?>










