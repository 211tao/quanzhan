<?php
include"php/config.php";
$column=$_GET["q"];
$pageSize=3;
if(empty($_GET["pageno"]))
	{
		$currentPage=1;
	}
else{
		$currentPage=$_GET["pageno"];
	}
$pageindex=($currentPage-1)*3;
/*if(empty($_GET["column"]))
{
	$column="全部内容";
	
}
else{
	$column=$_GET["column"];
	
}*/
if($column == "全部内容")
{
	$sql="SELECT * FROM list  LIMIT $pageindex,$pageSize";
	$sqlTotal="SELECT * FROM list";
}
else
{
	$sql="SELECT * FROM list WHERE `column`='$column' LIMIT $pageindex,$pageSize";
	$sqlTotal="SELECT * FROM list WHERE `column`='$column'";
}
$result=$conn->query($sql);
$resultTotal=$conn->query($sqlTotal);
$pageTotal=ceil($resultTotal->num_rows/$pageSize);
?>

<div class="row">
 <?php
  if($result->num_rows>0)
{
	while($row=$result->fetch_assoc())
	{			
?>	
   <div class="col-md-3">
       <div class="thumbnail">
          <a href="content.php?id=<?php echo $row["id"];?>"><img src="<?php echo $row["thumb"];?>">
          </a>
       </div>
   </div>
 <?php
	}
}
	else
	{
		echo "没有数据";
	};
?>
</div>
<div class="container">
    <ul class="pager">
        <li class="previous"><a href="kcxz2.php?pageno=<?php echo $currentPage-1;?>&column=<?php echo $column;?>" class="btn <?php if($currentPage==1){ echo disabled;}; ?>"><span class="glyphicon glyphicon-arrow-left"></span> Older</a></li>
        <li class="next"><a href="kcxz2.php?pageno=<?php echo $currentPage+1;?>&column=<?php echo $column;?> " class="btn <?php if($currentPage==$pageTotal){echo disabled;};?>">Newer <span class="glyphicon glyphicon-arrow-right"></span> </a></li>
    </ul>
</div>

