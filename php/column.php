<?php
include 'header.php';
$sql="SELECT * FROM list ";
$result=$conn->query($sql);
?>
        <div class="row">
        	<div class="col-md-3">
            	<ul class="list-group">
                  <li class="list-group-item list-group-item-success">文章栏目</li>
                  <li class="list-group-item"><a href="#">Web前端开发</a></li>
                  <li class="list-group-item"><a href="#">UI设计</a></li>
                  <li class="list-group-item"><a href="#">PHP开发</a></li>
                  <li class="list-group-item"><a href="#">JAVA开发</a></li>
                  <li class="list-group-item"><a href="#">网络营销</a></li>
                  <li class="list-group-item list-group-item-success"><a href="publish.php">发布文章</a></li>
                </ul>
            </div>
            <div class="col-md-9" style="border-left:1px solid #eaeaea;">
            
            	<table class="table">
                    <tr>
                        <th>id</th>
                        <th>文章标题</th>
                        <th>发布日期</th>
                        <th>操作</th>
                    </tr>
                   <?php
								while($row=$result->fetch_assoc())
								{
									
							?>	
                    <tr>
                        <td><?php echo $row["id"];?></td>
                        <td><?php echo $row["title"];?></td>
                        <td><?php echo date("Y-m-d H:i:s",$row["reg_date"]);?></td>
                        <td><a href="delete.php?id=<?php echo $row["id"];?>">删除</a> <a href="update.php?id=<?php echo $row["id"];?>">修改</a></td>
								</tr>
							<?php
								}
							?>             	     	
                                   
               </table>

            </div>
        </div>
        <div class="panel-footer" style="margin-top:50px;">
    		Copyright1999-2016 北京中公教育科技股份有限公司 .All Rights Reserved 京ICP证161188号
    	</div>
    </div>
</body>
</html>