<?php
include"head.php";
$sql1="SELECT * FROM list WHERE `column`='Web前端开发'";
$sql2="SELECT * FROM list WHERE `column`='UI设计'";
$sql3="SELECT * FROM list WHERE `column`='PHP开发'";
$sql4="SELECT * FROM list WHERE `column`='JAVA开发'";
$sql5="SELECT * FROM list WHERE `column`='网络营销'";
$result1=$conn->query($sql1);
$result2=$conn->query($sql2);
$result3=$conn->query($sql3);
$result4=$conn->query($sql4);
$result5=$conn->query($sql5);
?>
<div class="container">
    <ul class="breadcrumb">
        <li><a href="index.php">首页</a></li>
        <li class="active">前端咨询</li>
    </ul>
</div>
	
    <div class="container">
        <ul class="list-unstyled col-md-6 list-group">
         <li class="list-group-item-success  list-group-item"><span class="glyphicon glyphicon-user text-success"><a href="liebiao.php?column=Web前端开发">Web前端开发</a></span></li>
          <?php
           if($result1->num_rows)
           {
			   		while($row1=$result1->fetch_assoc())
					{
				?>		
						<li class="list-group-item"><a href="content.php?id=<?php echo $row1["id"];?>"><?php echo $row1["title"] ?></a></li>
				<?php		
					}
		   		}
				else{
					echo "暂时没有数据";
				}
			   ?>
          
            
        </ul>
        <ul class="list-unstyled col-md-6 list-group">
         <li class="list-group-item-success  list-group-item"><span class="glyphicon glyphicon-user text-success"><a href="liebiao.php?column=UI设计">UI设计</a></span></li>
          <?php
           if($result2->num_rows)
           {
			   		while($row2=$result2->fetch_assoc())
					{
				?>		
						<li class="list-group-item"><a href="content.php?id=<?php echo $row2["id"];?>"><?php echo $row2["title"] ?></a></li>
				<?php		
					}
		   		}
				else{
					echo "暂时没有数据";
				}
			   ?>
          
            
        </ul>
        <ul class="list-unstyled col-md-6 list-group">
         <li class="list-group-item-success  list-group-item"><span class="glyphicon glyphicon-user text-success"><a href="liebiao.php?column=PHP开发">PHP开发</a></span></li>
          <?php
           if($result3->num_rows)
           {
			   		while($row3=$result3->fetch_assoc())
					{
				?>		
						<li class="list-group-item"><a href="content.php?id=<?php echo $row3["id"];?>"><?php echo $row3["title"] ?></a></li>
				<?php		
					}
		   		}
				else{
					echo "暂时没有数据";
				}
			   ?>
          
            
        </ul>
        <ul class="list-unstyled col-md-6 list-group">
         <li class="list-group-item-success  list-group-item"><span class="glyphicon glyphicon-user text-success"><a href="liebiao.php?column=JAVA开发">JAVA开发</a></span></li>
          <?php
           if($result4->num_rows)
           {
			   		while($row4=$result4->fetch_assoc())
					{
				?>		
						<li class="list-group-item"><a href="content.php?id=<?php echo $row4["id"];?>"><?php echo $row4["title"] ?></a></li>
				<?php		
					}
		   		}
				else{
					echo "暂时没有数据";
				}
			   ?>
          
            
        </ul>
       <ul class="list-unstyled col-md-6 list-group">
         <li class="list-group-item-success  list-group-item"><span class="glyphicon glyphicon-user text-success"><a href="liebiao.php?column=网络营销">网络营销</a></span></li>
          <?php
           if($result5->num_rows)
           {
			   		while($row5=$result5->fetch_assoc())
					{
				?>		
						<li class="list-group-item"><a href="content.php?id=<?php echo $row5["id"];?>"><?php echo $row5["title"] ?></a></li>
				<?php		
					}
		   		}
				else{
					echo "暂时没有数据";
				}
			   ?>
          
            
        </ul>
        
    </div>
    <div class="container">
        <div class="foot">
            <p>Copyright1999-2016北京中公教育科技股份有限公司.All Rights Reserved 京ICP证161188号</p>
        </div>
    </div>
</body>
</html>