<?php
include"config.php";
date_default_timezone_set("Asia/Shanghai");
$jumUrl="publish.php";
if($_SERVER['REQUEST_METHOD']=="POST")
{
	$title=$_POST["title"];
	$column=$_POST["column"];
	$description=$_POST["describe"];
	$keyword=$_POST["keyworld"];
	$content=$_POST["editorValue"];
	$reg_date=time();
	$author=$_SESSION["adminname"];
	if($_FILES["upfile"]["error"]==0)
	{
		$fileMaxsize=1*1024*1024;
		if($_FILES["upfile"]["size"]>$fileMaxsize)
		{
			$msg="文件太大";
			include"tip.php";
			exit;
		}
		$fileArr=["image/jpeg","image/png","image/jpg"];
		if(!in_array($_FILES["upfile"]["type"],$fileArr))
		{
			$msg="文件类型不对";
			include"tip.php";
			exit;
		}
		$filenameA=explode(".",$_FILES["upfile"]["name"]);
		$fileS=array_pop($filenameA);
		$fileNewname=date("YmdHis").rand(1000,9999).".".$fileS;
		move_uploaded_file($_FILES["upfile"]["tmp_name"],"upload/".$fileNewname);
		$thumb="php/upload/".$fileNewname;
	}
	
$sql="INSERT INTO list(`title`,`column`,`description`,`keyword`,`content`,`thumb`,`reg_date`,`author`) VALUES('$title','$column','$description','$keyword','$content','$thumb','$reg_date','$author')";
if($conn->query($sql))
{
	$msg="发布成功";
	
	include"tip.php";
	exit;
	
}
	else{
		echo $conn->error;
	}
}
else{
	$msg="非法发布";
	
	include"tip.php";
	exit;
}

?>