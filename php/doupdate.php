<?php
include"config.php";
$id=$_POST["id"];
$jumUrl="update.php";
$title=$_POST["title"];
$description=$_POST["describe"];
$column=$_POST["column"];
$keyword=$_POST["keyworld"];
$content=$_POST["editorValue"];

if($_FILES["upfile"]["error"]==0)
{
	$fileMaxsize="1*1024*1024";
	if($_FILES["upfile"]["size"]>$fileMaxsize)
	{
		$msg="文件太大";
		include "tip.php";
		exit;
	}
	$fileArr=["image/jpeg","image/jpg","image/png"];
	if(!in_array($_FILES["upfile"]["type"],$fileArr))
	{
		$msg="文件类型不对";
		include"tip.php";
		exit;
	}
	$filenameArr=explode(".",$_FILES["upfile"]["name"]);
	$fileS=array_pop($filenameArr);
	$fileNew=date("YmdHis",time()).rand(1000,9999).".".$fileS;
	move_uploaded_file($_FILES["upfile"]["tmp_name"],"upload/".$fileNew);
}
	$sql="UPDATE list SET title='$title',description='$description',keyword='$keyword',`column`='$column',content='$content' WHERE id=$id";

	if($conn->query($sql))
	{
		$msg="修改成功";
		$jumUrl="column.php";
		include"tip.php";
		exit;
	}

?>