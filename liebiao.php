<?php
$jumUrl="login.html";
include"head.php";
date_default_timezone_set("Asia/Shanghai");
$pageSize=3;$j=0;
if(empty($_GET["pageno"]))
	{
		$currentPage=1;
	}
else{
		$currentPage=$_GET["pageno"];
	}
$pageindex=($currentPage-1)*3;

if(empty($_GET["column"]))
{
	$column="全部内容";
	
}
else{
	$column=$_GET["column"];
	
}
if($column=="全部内容")
{
	$sql="SELECT * FROM list  LIMIT $pageindex,$pageSize";
	$sqlTotal="SELECT * FROM list";
}
else{
	$sql="SELECT * FROM list WHERE `column`='$column' LIMIT $pageindex,$pageSize";
	$sqlTotal="SELECT * FROM list WHERE `column`='$column'";
}
$result=$conn->query($sql);
$resultTotal=$conn->query($sqlTotal);
$pageTotal=ceil($resultTotal->num_rows/$pageSize);
?>

<div class="container">
    <ul class="breadcrumb">
        <li><a href="index.php">首页</a></li>
        <li class="active"><?php echo $column;?></li>
    </ul>
</div>
<div class="container">
 	<h3><?php echo $column; ?></h3>
 	<hr>
 	<ul class="list-unstyled ">
  	<?php
   	if($result->num_rows)
	{	
		while($row=$result->fetch_assoc())
		{
			$j++;
					if($j%5==0)
					{
			?>
						<li class="li_line"></li>
			<?php			
					}
			
	?>
        <li class="row"><a href="content.php?id=<?php echo $row["id"];?>" class="col-md-10"><?php echo $row["title"];?></a><span class="col-md-2"><?php echo date("Y-m-d H:i:s", $row["reg_date"]);?></span></li>
   <?php 
		}
    }
	else{
		echo "没有数据";
	}
	?>
	</ul>
    <div class="text-center">
    <ul class="pagination ">
       
        <li><a href="liebiao.php?column=<?php echo $column;?>&pageno=<?php echo $currentPage-1;?>" class="btn <?php if($currentPage==1){echo disabled;};?>">&lt;&lt;</a></li>
        <?php
        	for($i=0;$i<$pageTotal;$i++)
				{
					
        ?>
  			<li class="<?php if($i+1==$currentPage) {echo active ;}?>"><a href="liebiao.php?column=<?php echo $column;?>&pageno=<?php echo $i+1;?> "><?php echo $i+1;?></a>
  			</li>
  			<?php
				}
			?>
   			<li><a href="liebiao.php?column=<?php echo $column;?>&pageno=<?php echo $currentPage+1;?>" class="btn <?php if($currentPage==$pageTotal) { echo  disabled;};?>">&gt;&gt;</a></li>
    </ul>
	</div>
    <div class="container">
        <div class="foot">
            <p>Copyright1999-2016北京中公教育科技股份有限公司.All Rights Reserved 京ICP证161188号</p>
        </div>
    </div>
</div>
</body>
</html>