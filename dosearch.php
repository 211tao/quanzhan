<?php
include "head.php";
date_default_timezone_set("Asia/Shanghai");
$j=0;$pageSize=2;
if(empty($_GET["pageno"]))
	{
		$currentPage=1;
	}
else{
		$currentPage=$_GET["pageno"];
	}
$pageindex=($currentPage-1)*2;
$title=$_GET["search"];
if(empty($title))
{
	/*$sql="SELECT * FROM list";*/
	$sql="SELECT * FROM list  LIMIT $pageindex,$pageSize";
	$sqlTotal="SELECT * FROM list";
}
else
{
	/*$sql="SELECT * FROM list WHERE title LIKE '%$title%'";*/
	$sql="SELECT * FROM list WHERE title LIKE '%$title%' LIMIT $pageindex,$pageSize";
	$sqlTotal="SELECT * FROM list WHERE title LIKE '%$title%'";
}
$result=$conn->query($sql);
$resultTotal=$conn->query($sqlTotal);
$pageTotal=ceil($resultTotal->num_rows/$pageSize);
?>
<div class="container">
    <ul class="breadcrumb">
        <li><a href="index.php">首页</a></li>
        <li class="active">搜索内容:<?php echo $title;?></li>
    </ul>
</div>
<div class="container">
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
		echo "暂时没有数据";
	}
	?>
	</ul>
    <div class="text-center">
    <ul class="pagination ">
       <?php
		 		if($result->num_rows)
				{
					
				
			?>
        <li><a href="dosearch.php?search=<?php echo $title;?>&pageno=<?php echo $currentPage-1;?>" class="btn <?php if($currentPage==1){echo disabled;};?>">&lt;&lt;</a></li>
        <?php
				}
			?>
        <?php
        	for($i=0;$i<$pageTotal;$i++)
				{
					
        ?>
  			<li class="<?php if($i+1==$currentPage) {echo active ;};?>"><a href="dosearch.php?pageno=<?php echo $i+1;?>&search=<?php echo $title;?> "><?php echo $i+1;?></a>
  			</li>
  			<?php
				}
				if($result->num_rows)
				{
					
				
			?>
  			
   			<li><a href="dosearch.php?search=<?php echo $title;?>&pageno=<?php echo $currentPage+1;?>" class="btn <?php if($currentPage==$pageTotal) { echo  disabled;};?>">&gt;&gt;</a></li>
   			<?php
				}
				?>
    </ul>
	</div>