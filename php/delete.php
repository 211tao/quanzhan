<?php
include "config.php";
$id=$_GET["id"];
$sql="DELETE FROM list WHERE id=$id";
$conn->query($sql);
$msg="删除成功";
$jumUrl="column.php";
include"tip.php";
exit;
?>